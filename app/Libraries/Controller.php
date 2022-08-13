<?php
/*
*Controlador base
*Carrega os modelos e as views
*/
class Controller {
    
    //Carrega os  Modelos
    public function model($model){
        //requere o arquivo de modelo
        require_once '../app/Models/'.$model.'.php';
        //instancia o modelo
        return new $model;
    }
    //Carrega as views
    public function view($view, $dados = []){
        $arquivo = ('../app/Views/'.$view.'.php');
        
        //para verificar se a view consta na pasta views 
        if(file_exists($arquivo)):
            //requere o arquivo de view
            require_once $arquivo;
        else: 
            //a função die() termina a execução do script
            die('O arquivo de view não existe!');
        endif;
    }
}