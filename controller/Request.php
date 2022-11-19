<?php

    namespace Router;

    use Service\Func;
    use Controller\ControlRoom;

    $value = json_decode(file_get_contents("php://input"), true);

    // Check if the data is json
    if(json_last_error() === JSON_ERROR_NONE):

        print_r($value);

        $value = $value ?? [];

        if(is_array($value)):

            foreach($value as $key => $val):
                // Check is value is array
                if(is_array($val)):
                    foreach($val as $key1 => $val1):
                        if(is_array($val1)):
                            foreach($val1 as $key2 => $val2):
                                $value[$key][$key2] = Func::cleanData($val2, 'string');
                            endforeach;
                        else:
                            $value[$key][$key1] = Func::cleanData($val1, 'string');
                        endif;
                    endforeach;
                else:
                    // Collect and clean the data gotten from the client
                    $value[$key] = Func::cleanData($val, 'string');
                endif;

            endforeach;
            print_r("Hello");

            print_r($value);
        else:
            $value = Func::cleanData($value, 'string');
        endif;

        //print_r(ControlRoom::process($value));

    endif;

?>