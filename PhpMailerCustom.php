<?php
namespace PhpMailerCustom;
require_once('logica-usuario.php');
require './vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

class PhpMailerCustom
{

    private $Resultado;
    private $DadosCredEmail;
    private $email;
    private $Dados;
    private $codRastreamento;

    function __construct($email, $codRastreamento)
    {
        $this->email = $email;
        $this->codRastreamento = $codRastreamento;
    }

    public function enviarEmail()
    {

        $mail = new PHPMailer();
        try {
            //Server settings
            $mail->SMTPDebug = 2;     
            $mail->isSMTP();                                     
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;                              
            $mail->Username = '1d6d014e49f05c';                
            $mail->Password = '969a56047e5e08';                          
            $mail->Port = 2525;
            $mail->CharSet = "UTF-8";
                                            
            //Recipients
            $mail->setFrom('jmsoccer@gmail.com');
            $mail->addAddress($this->email);

            //header()
        
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'CÓD. RASTREIO CORREIOS - PEDIDO JMSOCCER';
            $mail->Body = '<h2>Olá caro cliente, o seu pedido já foi registrado no serviço de entrega</h2><h4>Acompanhe a situação do pedido através do código:</h4> <h4><b style="color: red">' . $this->codRastreamento . '</b></h4>' . 
            '<h4>A equipe JMSOCCER agradece a sua preferência! :)</h4>';
            $mail->AltBody = 'CÓD. RASTREIO CORREIOS - PEDIDO JMSOCCER';

            if ($mail->send()) {

                $_SESSION['alert'] = [
                    "status" => true,
                    "title" => "PEDIDO ATUALIZADO E E-MAIL ENVIADO COM SUCESSO",
                    "desc" =>  "O pedido foi atualizado e o e-mail enviado ao cliente corretamente",
                    "voltar_link" => 'pedidosAdm.php', //colocar a pág. de pedidos
                    "voltar_title" => 'Pedidos'
                ];

                /* var_dump('ENVIADO');
                die(); */
            } else {

                $_SESSION['alert'] = [
                    "status" => false,
                    "title" => "O PEDIDO ATUALIZADO E E-MAIL NÃO ENVIADO ",
                    "desc" =>  "O pedido foi atualizado, porém o e-mail enviado não foi enviado ao cliente corretamente",
                    "voltar_link" => 'pedidosAdm.php', //colocar a pág. de pedidos
                    "voltar_title" => 'Pedidos'
                ];
    
            }
            
            header('Location:alerta.php');
            exit();

        } catch (\Exception $e) {

            $_SESSION['alert'] = [
                "status" => false,
                "title" => "O PEDIDO ATUALIZADO E E-MAIL NÃO ENVIADO ",
                "desc" =>  "O pedido foi atualizado, porém o e-mail enviado não foi enviado ao cliente corretamente",
                "voltar_link" => 'pedidosAdm.php', //colocar a pág. de pedidos
                "voltar_title" => 'Pedidos'
            ];

            header('Location:alerta.php');
            exit();

            //var_dump($e);
            //die();
            //$this->Resultado = false;
        }
    }

}
