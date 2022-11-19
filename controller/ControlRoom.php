<?php
    namespace Controller;

    use Config\Database;
    use Model\Login;

    class ControlRoom{

        public static $db;

        public function __construct() {
            self::$db  = new Database;
        }

        public static function process(array $data) {

            print_r($data);

            switch ($data['part']) {
                case 'login':
                    $login = new Login(self::$db);
                    $login->process($data);

                    break;

                case 'signup':

                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }
?>