<?php

    require '../vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class Mailing extends PHPMailer{

        public function __construct(string $email, string $gmail_id, string $gmail_pass, string $full_name) {
            //Instantiation and passing 'true' enables exceptions
            parent::__construct(false);

            $this->email = (string) $email;
            $this->gmail_id = (string) $gmail_id;
            $this->gmail_pass = (int) $gmail_pass;
            $this->full_name = $full_name;
        }

        public function config() {
            $id = 'invest@reynance.com';
            $pass = 'Anthonyval1';
            //Server settings
            $this->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
            $this->isSMTP();                                            // Send using SMTP
            $this->CharSet = "utf-8";
            $this->Host       = 'reynance.com';                    // Set the SMTP server to send through
            $this->SMTPAuth   = true;                                   // Enable SMTP authentication
            $this->Username   = $id;//$this->gmail_id;                     // SMTP username
            $this->Password   = $pass;                               // SMTP password
            
            $this->SMTPSecure = 'TLS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $this->Port = 465;                                    // TCP port to connect to
            $this->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
        }
        
        public function add_image(string $path) {
            //$this->AddEmbeddedImage($path, "quandary_logo");
        }

        public function set_params(string $msg, string $subject) {
            //Recipients
            $this->setFrom($this->gmail_id, 'Reynance');
            $this->addAddress($this->email, $this->full_name);     // Add a recipient

            $this->isHTML(true);                                  // Set email format to HTML
            $this->Subject = $subject;
            $message = $msg;

            $this->msgHTML($message);
            
            //$this->AltBody = $this->code;
       
        }

        public function send_mail() : bool {
            return $this->send();
        }
    }
?>