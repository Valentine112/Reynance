<?php
    namespace Model;

    use mysqli;

    class Login {

        public function __construct(mysqli $db)
        {
            $this->db = $db;
        }

        public function process(array $data) {

        }


    }

?>