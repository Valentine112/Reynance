<?php
    ini_set('display_errors', 1);

    require '../vendor/vendor/autoload.php';

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
            //Server settings
            $this->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
            $this->isSMTP();                                            // Send using SMTP
            $this->CharSet = "utf-8";
            $this->Host       = 'mail.quandaryvisions.com';                    // Set the SMTP server to send through
            $this->SMTPAuth   = true;                                   // Enable SMTP authentication
            $this->Username   = 'invest@delunance.com';                    // SMTP username
            $this->Password   = 'investondelunance';                               // SMTP password
            //$this->SMTPSecure = 'TLS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $this->Port       =  26;                                        // TCP port to connect to
            $this->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
        }
        
        public function add_image(string $path) {
            //$this->AddEmbeddedImage(dirname(__FILE__).$path, "quandary_logo");
        }

        public function set_params(string $msg, string $subject) {
            //Recipients
            $this->setFrom($this->gmail_id, 'Quandary Visions');
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