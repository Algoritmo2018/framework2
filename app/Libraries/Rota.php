<?php
/*
    * Classe rota
    * Cria as URL, carrega os controladores, metodos e parametros
    * FORMATO URL - /controlador/metodo/parametros
*/ 
class Rota{
    //Atributos da classe
    private $controlador = 'Paginas';
    private $metodo = 'index';
    private $parametros = [];
    
    public function __construct()
    {
        //se a url existir joga na variavel url
        $url = $this->url() ? $this->url() : [0];
        //checa se o controlador existe
        //ucwords - Converte para maiusculas o primeiro caractere de cada palavra
        if(file_exists('../app/Controllers/'.ucwords($url[0]).'.php')):
            //se existir seta como controlador
            $this->controlador = ucwords($url[0]);
            //unset - Destrói a variavel especifica
            unset($url[0]);
        endif;

        //requere o controlador
        require_once '../app/Controllers/'.$this->controlador.'.php';
        //instancia o controlador
        $this->controlador = new $this->controlador;

        //checa se o metodo existe, segunda parte da url
        if(isset($url[1])):
            //method_exists - checa se o método da classe existe
            if(method_exists($this->controlador, $url[1])):
                $this->metodo = $url[1];
                unset($url[1]);
            endif;
        endif;

        //Se existir retorna um array com os valores se não retorna um array vazio
        //array_values - Retorna todos os valores de um array
        $this->parametros = $url ? array_values($url) : [];
        //call_user_func_array - Chama uma dada função de um usuário com um array de parâmetros
        call_user_func_array([$this->controlador, $this->metodo], $this->parametros);
   
        
    }
    
    //retorna a url em um array
    private function url(){
        //o filtro FILTER_SANITIZE_URL remove todos os caracteres ilegais de uma URL
        $url = filter_input(INPUT_GET,'url', FILTER_SANITIZE_URL);
        //verifica se a URL existe
        if(isset($url)):
            //trim - Retira espaço no inicio e final de uma string
            //rtrim - Retira espaço em branco (ou outros caracteres) do final da string
            $url = trim(rtrim($url,'/'));
            //explode - Divide uma string em strings, retorna um array
            $url = explode('/', $url);
            return $url;
        endif;
    }
}