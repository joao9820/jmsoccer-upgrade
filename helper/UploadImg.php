<?php

class UploadImg
{
    private $DadosImagem;
    private $Diretorio;
    private $NomeImg;
    private $Resultado;
    private $Imagem;

    function getResultado()
    {
        return $this->Resultado;
    }

    public function __construct(array $Imagem, $Diretorio)
    {
        $this->DadosImagem = $Imagem; // Recebe todos os dados do array da imagem
        $this->Diretorio = $Diretorio; // Diretorio onde será salva
        $this->NomeImg = $Imagem['name']; // Nome da imagem
        $this->validarImagem();

    }

    private function validarImagem()
    {

        switch ($this->DadosImagem['type']):
            case 'image/jpeg':
            case 'image/pjpeg':
                $this->Imagem = imagecreatefromjpeg($this->DadosImagem['tmp_name']);
                break;

            case 'image/png':
            case 'image/x-png':
                $this->Imagem = imagecreatefrompng($this->DadosImagem['tmp_name']);
                break;
        endswitch;
/* 
        
        var_dump($this->Imagem);
        die(); */

        if ($this->Imagem) {

            // Validar o diretorio
            $this->valDiretorio();

        } else {

            /* $alert = new AlertMensagem();
            $_SESSION['msg'] = $alert->alertMensagemJavaScript("A extensão da imagem é inválida! Selecione uma imagem JPEG ou PNG.","danger"); */
            $this->Resultado = false;

        }

    }


    private function valDiretorio()
    {
        // Caso o diretorio não exista ele será criado
        if (!file_exists($this->Diretorio) && !is_dir($this->Diretorio))
        {
            mkdir($this->Diretorio,0755);
        }
        // Agora chamar o metodo para realizar o upload
        $this->realizarUpload();

    }


    private function realizarUpload()
    {
        if (move_uploaded_file($this->DadosImagem['tmp_name'], $this->Diretorio . $this->NomeImg))
        {

            $this->Resultado = true;

        } else {
/* 
            $alert = new AlertMensagem();
            $_SESSION['msg'] = $alert->alertMensagemJavaScript("Não foi possível realizar o upload da imagem.","danger"); */
            $this->Resultado = false;

        }
    }



}