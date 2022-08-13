<?php

class Posts extends Controller{
    
    public function __construct()
    {
        if(!Sessao::estarLogado()):
            Url::redirecionar('usuarios/login');
        endif;

        $this->postModel = $this->model('Post');
        $this->usuarioModel = $this->model('Usuario');
    } 

    public function index(){

        $dados = [
            'posts' => $this->postModel->lerPosts()
        ];

        $this->view('posts/index', $dados);
    }

    public function cadastrar(){
        
        //Verifica si o formulario existe
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($formulario)):
            //Dados vindo do formulario cadastrar
            $dados =[
                'usuario_id' => $_SESSION['usuario_id'],
                'titulo' => trim ($formulario['titulo']),
                'texto' => trim ($formulario['texto'])
            ];

            //Validando os campos do formulario
            //in_array()- verifica si no array existe campo vazio
            if(in_array("", $formulario)):
                if(empty($formulario['titulo'])):
                    $dados['titulo_erro'] = 'Preencha o campo titulo';
                endif;

                if(empty($formulario['texto'])):
                    $dados['texto_erro'] = 'Preencha o campo texto';
                endif;
            else:
                
                if($this->postModel->armazenar($dados)):
                    Sessao::mensagem('post','Post cadastrado com sucesso');
                    Url::redirecionar('posts');
                else:
                    die("Erro ao armazenar o post no banco de dados");
                endif;              
            endif;
        else:
            $dados =[
                'usuario_id' => '',
                'titulo' => '',
                'texto' => '',
                'titulo_erro' => '',
                'texto_erro' => ''
            ]; 
        endif;
       
 
        $this->view('posts/cadastrar', $dados);
    }

    public function editar($id){
        
        //Verifica si o formulario existe
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($formulario)):
            //Dados vindo do formulario cadastrar
            $dados =[
                'id' => $id,
                'titulo' => trim ($formulario['titulo']),
                'texto' => trim ($formulario['texto'])
            ];

            //Validando os campos do formulario
            //in_array()- verifica si no array existe campo vazio
            if(in_array("", $formulario)):
                if(empty($formulario['titulo'])):
                    $dados['titulo_erro'] = 'Preencha o campo titulo';
                endif;

                if(empty($formulario['texto'])):
                    $dados['texto_erro'] = 'Preencha o campo texto';
                endif;
            else:
                
                if($this->postModel->atualizar($dados)):
                    Sessao::mensagem('post','Post atualizado com sucesso');
                    Url::redirecionar('posts');
                else:
                    die("Erro ao atualizar o post no banco de dados");
                endif;              
            endif;
        else:
            
            $post = $this->postModel->lerPostPorId($id);

            if($_SESSION['usuario_id'] == 28):
                
            else:
                if($post->usuario_id != $_SESSION['usuario_id']):
                    Sessao::mensagem('post', 'Você não tem autorização pra editar esse post', 'alert alert-danger');
                    Url::redirecionar('posts');
                endif;
        endif;
           
            $dados =[
                'id' => $post->id,
                'titulo' => $post->titulo,
                'texto' => $post->texto,
                'titulo_erro' => '',
                'texto_erro' => ''
            ]; 
        endif;

    
       
 
        $this->view('posts/editar', $dados);
    }

    public function ver($id){
        $post = $this->postModel->lerPostPorId($id);
        $usuario = $this->usuarioModel->lerUsuarioPorId($post->usuario_id);

        $dados = [
            'post' => $post,
            'usuario' => $usuario
        ];

        $this->view('posts/ver', $dados);
    }

    public function deletar($id){
        //Verificar si o utilizador têm permissão para apagar o post
        if(!$this->checarAutorizacao($id)):
            $id = filter_var($id, FILTER_VALIDATE_INT);
            $metodo = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING);

            if($id && $metodo == 'POST'):  
                if($this->postModel->destruir($id)):
                    Sessao::mensagem('post', 'Post deletado com sucesso');
                    Url::redirecionar('posts');
                endif;
            else:
                Sessao::mensagem('post', 'Você não têm autorização pra deletar esse post','alert alert-danger');
                Url::redirecionar('posts');
            endif;

        else:
            Sessao::mensagem('post', 'Você não têm autorização pra deletar esse post','alert alert-danger');
            Url::redirecionar('posts');
        endif;
    }

    private function checarAutorizacao($id)
    {
        $post = $this->postModel->lerPostPorId($id);
        if($_SESSION['usuario_id'] == 28):
            return false;    
        else:
            if($post->usuario_id != $_SESSION['usuario_id']):
            return true;
            else: 
            return false;
            endif;
        endif;
    }
}