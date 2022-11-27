<?php
    class Select {

        public $type;
        public $value = [];
        public $more = "";
        public $more1;
        public $prepared = [];

        public function __construct(object $conn) {
            $this->connect = $conn;
        }

        public function more_details(string $more) {
            $this->more = $more;
        }

        public function get_result($stmt){
            $stmt->execute(); //Execute query
            $stmt->store_result(); //Store the results
            $num_rows = $stmt->num_rows; //Get the number of results
            $results = NULL;
            if($num_rows > 0){
                //Get metadata about the results
                $meta = $stmt->result_metadata();
                //Here we get all the column/field names and create the binding code
                $bind_code = "return mysqli_stmt_bind_result(\$stmt, ";
                while($_field = $meta->fetch_field()){
                    $bind_code .= "\$row[\"".$_field->name."\"], ";
                }
                //Replace trailing ", " with ");"
                $bind_code = substr_replace($bind_code,");", -2);
               //Run the code, if it doesn't work return NULL
                if(!eval($bind_code)) {
                    $stmt->close();
                    return NULL;
                }
                //This is where we create the object and add it to our final result array
                for($i=0;$i<$num_rows;$i++){
                   //Gets the row by index
                    $stmt->data_seek($i);
                    //Update bound variables used in $bind_code with new row values
                    $stmt->fetch();
                    foreach($row as $key=>$value){
                        //Create array using the column/field name as the index
                        $_result[$key] = $value;
                    }
                    //Cast $_result to object and append to our final results
                    $results[$i] = (object)$_result;
                }
            }else{
                $results = [];
            }
            $stmt->close();
            return $results;
        }

        public function process() {
            if($this->more != "" && strlen(trim($this->more)) > 0) {
                $more_split = explode(',', $this->more);
                $this->more1 = $more_split[0];
                $more_len = count($more_split);

                for($a = 0; $a < $more_len; $a++) {
                    if($a > 0) {
                        array_push($this->prepared, 's');
                        $more_value = $more_split[$a];
                        array_push($this->value, stripslashes(trim($more_value)));
                    }
                }
                $this->type = join($this->prepared);
            }
        }

        public function pull(string $select_what, string $where) : array {
            $this->process();
            $more_split = explode(',', $this->more);
            $more_ = $this->more1;
            $value = [];
            $confirm = $this->connect->prepare("SELECT $select_what FROM $where $more_");
            if(count($more_split) > 1) {
                $confirm->bind_param($this->type, ...$this->value);
            }
            //$confirm->execute();

            $a = json_decode(json_encode($this->get_result($confirm)), true);
            //$value = $a->fetch_all(MYSQLI_ASSOC);
            return [$a, count($a)];
            $confirm->close();
        }

        public function reset() {
            $this->value = [];
            $this->prepared = [];
            $this->type = "";
            $this->more = "";
            $this->more1 = "";
        }

        public function close() {
            $this->connect->close();
        }

    }

    class Insert {

        static $ques = [];

        public function __construct(object $conn, string $where, array $items, string $more) {
            $this->connect = $conn;
            $this->where = $where;
            $this->items = $items;
            $this->more = $more;

            $this->items_len = count($items);
        }

        public function create_ques() : array {
            for($a = 0; $a < $this->items_len; $a++):
                $sum = $a + 1;
                if($sum < $this->items_len):
                    array_push(self::$ques, "?,");
                elseif($sum === $this->items_len):
                    array_push(self::$ques, "?");
                endif;
            endfor;

            return self::$ques;
        }

        public function push(array $values, string $type) : bool {
            $this->create_ques();

            $item = implode(",", $this->items);
            $prepared = join(self::$ques);

            $insert = $this->connect->prepare("INSERT INTO $this->where ($item) VALUES ($prepared) $this->more");
            $insert->bind_param($type, ...$values);
            return $insert->execute();
            $insert->close();
        }

        public function reset() {
            self::$ques = [];
            $this->items = [];
        }
    }

    class Update
        {

        public $value = [];
        public $more1 = "";

        public function __construct(object $conn, string $more) {
            $this->connect = $conn;
            $this->more = $more;
        }

        public function process() {
            if($this->more != "" && strlen(trim($this->more)) > 0) {
                $more_split = explode('#', $this->more);
                $this->more1 = $more_split[0];
                $more_len = count($more_split);

                for($a = 0; $a < $more_len; $a++) {
                    if($a > 0) {
                        $more_value = $more_split[$a];
                        array_push($this->value, stripslashes(trim($more_value)));
                    }
                }
            }
        }

        public function mutate(string $type, string $where) : bool {
            $this->process();
            
            $more_ = $this->more1;
            $update = $this->connect->prepare("UPDATE $where $more_");
            $more_split = explode('#', $this->more);
            if(count($more_split) > 1){
                $update->bind_param($type, ...$this->value);
            }
            if($update->execute()){
                return true;
            }else{
                return false;
            }
            $update->close();
        }

        public function close() : bool {
            return $this->connect->close();
        }

    }

    class Delete {

        public $type;
        public $value = [];
        public $more1;
        public $prepared = [];

        public function __construct(object $conn, string $more) {
            $this->connect = $conn;
            $this->more = $more;
        }

        public function process(){
            if($this->more != "" && strlen(trim($this->more)) > 0) {
                $more_split = explode(',', $this->more);
                $this->more1 = $more_split[0];
                $more_len = count($more_split);

                for($a = 0; $a < $more_len; $a++) {
                    if($a > 0) {
                        array_push($this->prepared, 's');
                        $more_value = $more_split[$a];
                        array_push($this->value, stripslashes(trim($more_value)));
                    }
                }
                $this->type = join($this->prepared);
            }
        }

        public function proceed(string $where) : bool {
            $more_ = $this->more1;
            $deleting = $this->connect->prepare("DELETE FROM $where $more_");
            $more_split = explode(',', $this->more);
            if(count($more_split) > 1){
                $deleting->bind_param($this->type, ...$this->value);
            }
            return $deleting->execute();
            $deleting->close();
        }

        public function end() {
            unset($this->value);
        }

        public function close() : bool {
            return $this->connect->close();
        }
    }
?>