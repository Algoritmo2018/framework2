<?php

class Paginas extends Controller {
    
   

    public function index(){

        if(Sessao::estarLogado()):
            Url::redirecionar('posts');
        endif;

        $dados = [
            'tituloPagina' => 'Pagina inicial'
        ];
       $this->view('paginas/home', $dados);
    }
    
    public function sobre(){
        $dados = [
            'tituloPagina' => 'Pagina Sobre nós'

        ];
       $this->view('paginas/sobre', $dados);
    }
}