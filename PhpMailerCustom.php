<?php
namespace PhpMailerCustom;
require './vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

class PhpMailerCustom
{

    private $Resultado;
    private $DadosCredEmail;
    private $Dados;

    function __construct()
    {
        $this->confEmail();
    }

    private function confEmail()
    {

        $mail = new PHPMailer();
        try {
            //Server settings
            $mail->SMTPDebug = 2;     
            $mail->isSMTP();                                     
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;                              
            $mail->Username = 'dc5b8de3260f12';                
            $mail->Password = '60bd4a18bddd9d';                          
            $mail->Port = 2525;
            $mail->CharSet = "UTF-8";
                                            
            //Recipients
            $mail->setFrom('jmsoccer@gmail.com');
            $mail->addAddress('cliente@gmail.com');

            //header()
        
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'TESTE CÓD. RASTREIO';
            $mail->Body = 'TESTE CÓD. RASTREIO';
            $mail->AltBody = 'TESTE CÓD. RASTREIO';

            

            if ($mail->send()) {
                var_dump('ENVIADO');
                die();
               /*  $alert = new AlertMensagem();
                $_SESSION['msg'] = $alert->alertMensagemJavaScript("E-mail enviado com sucesso!","success");
                $this->Resultado = true; */
            } else {
               /*  $alert = new AlertMensagem();
                $_SESSION['msg'] = $alert->alertMensagemJavaScript("E-mail não foi enviado!","danger");
                $this->Resultado = false; */
            }
        } catch (\Exception $e) {
            var_dump($e);
            die();
            $this->Resultado = false;
        }
    }

}
