<?php

class Checa {
    //Verifica si o nome a ser cadastrado cumpre com as normas estabelecidas abaixo
    public static function checarNome($nome){
        //Expressões regulares
        //preg_match -permite trabalhar com expressões regulares
        $nome = trim(rtrim($nome,'/'));
        if(!preg_match('/^([áÁàÀãÃâÂéÉèÈêÊíÍìÌóÓòÒõÕôÔúÚùÙçÇaA-zZ]+)+((\s[áÁàÀãÃâÂéÉèÈêÊíÍìÌóÓòÒõÕôÔúÚùÙçÇaA-zZ]+)+)?$/', $nome)):
            return true;

        else:
            return false;
        endif;
    }

    //Trata da formatação da data 
    public static function dataBr($data){
        if(isset($data)):
            return date('d/m/Y H:i',strtotime($data));
        else:
            return false;
        endif;
    }


    
    //Filtra o email
    public static function checarEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)):
            return true;

        else:
            return false;
        endif;
    }
}