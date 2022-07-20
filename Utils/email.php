<?php
    require_once '../autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    class Email {
        private $mail;

        public function __construct() {
            $this->mail = new PHPMailer(true);
		}

        public function sendEmail($data) {

            var_dump($data);
            try {
                //Server settings
                $this->mail->SMTPDebug = 0;
                $this->mail->isSMTP();
                $this->mail->Host       = "smtp.gmail.com";
                $this->mail->SMTPAuth   = true;
                $this->mail->Username   = "serranocamilo95@gmail.com";
                $this->mail->Password   = "mzawkdvnhfsyasik";
                $this->mail->SMTPSecure = "tls";
                $this->mail->Port       = 587;
            
                //Recipients
                $this->mail->setFrom('serranocamilo95@gmail.com', 'Administrador');
                $this->mail->addAddress($data['to'], $data['nameTo']);
        
                $this->mail->isHTML($data['html']);
                $this->mail->Subject = $data['subject'];
                $this->mail->Body    = $data['body'];
            
                $this->mail->send();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
            }
        }
    }