<?php

class Usuarios extends Controller{

    public function __construct()
    {
        $this->usuarioModel = $this->model('Usuario');
 
    }
    public function cadastrar(){
        
        //Verifica si o formulario existe
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($formulario)):
            //Dados vindo do formulario cadastrar
            $dados =[
                'nome' => trim ($formulario['nome']),
                'email' => trim ($formulario['email']),
                'senha' => trim ($formulario['senha']),
                'confirmar_senha' => trim ($formulario['confirmar_senha']),
                'biografia' => trim ($formulario['biografia'])
            ];

            //Validando os campos do formulario
            //in_array()- verifica si no array existe campo vazio
            if(in_array("", $formulario)):
                if(empty($formulario['nome'])):
                    $dados['nome_erro'] = 'Preencha o campo nome';
                endif;

                if(empty($formulario['email'])):
                    $dados['email_erro'] = 'Preencha o campo email';
                endif;

                if(empty($formulario['senha'])):
                    $dados['senha_erro'] = 'Preencha o campo senha';
                endif;

                if(empty($formulario['confirmar_senha'])):
                    $dados['confirmar_senha_erro'] = 'Preencha o campo confirmar senha';
                endif;

                if(empty($formulario['biografia'])):
                    $dados['biografia_erro'] = 'Preencha o campo biográfia';
                endif;
            else:
                
                if(Checa::checarNome($formulario['nome'])):
                    $dados['nome_erro'] = 'O nome informado é invalido';

                elseif(Checa::checarEmail($formulario['email'])):
                    $dados['email_erro'] = 'O e-mail informado é invalido';
                    elseif($this->usuarioModel->checarEmail($formulario['email'])):
                        $dados['email_erro'] = 'O e-mail informado já está cadastrado';
    

                elseif(strlen($formulario['senha']) < 6 ):
                    $dados['senha_erro'] = 'A senha deve ter no minimo 6 caracteres ';
                elseif($formulario['senha'] != $formulario['confirmar_senha']):
                    $dados['confirmar_senha_erro'] = 'As senhas são diferentes';
                else:
                    $dados['senha'] = password_hash($formulario['senha'], PASSWORD_DEFAULT);

                    if($this->usuarioModel->armazenar($dados)):
                        Sessao::mensagem('usuario','Cadastro realizado com sucesso');
                        Url::redirecionar('usuarios/login');
                    else:
                        die("Erro ao armazenar usuario no banco de dados");
                    endif;

                   
                endif;
            endif;
        else:
            $dados =[
                'nome' => '',
                'email' => '',
                'senha' => '',
                'confirmar_senha' => '',
                'biografia' => '',
                'nome_erro' => '',
                'email_erro' => '',
                'senha_erro' => '',
                'confirmar_senha_erro' => '',
                'biografia_erro' => '',
            ]; 
        endif;
 
        $this->view('usuarios/cadastrar', $dados);
    }

    //Trata do perfil do utilizador
    public function perfil($id){
        
        //Verifica si o formulario existe
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($formulario)):
            //Dados vindo do formulario cadastrar
            $dados =[
                'id' => $_SESSION['usuario_id'],
                'nome' => trim ($formulario['nome']),
                'email' => trim ($formulario['email']),
                'senha' => trim ($formulario['senha']),
                'biografia' => trim ($formulario['biografia'])
            ];

            //Validando os campos do formulario
            //in_array()- verifica si no array existe campo vazio
            if(in_array("", $formulario)):
                if(empty($formulario['nome'])):
                    $dados['nome_erro'] = 'Preencha o campo nome';
                endif;

                if(empty($formulario['email'])):
                    $dados['email_erro'] = 'Preencha o campo email';
                endif;

                if(empty($formulario['senha'])):
                    $dados['senha_erro'] = 'Preencha o campo senha';
                endif;

                if(empty($formulario['biografia'])):
                    $dados['biografia_erro'] = 'Preencha o campo biográfia';
                endif;
            else:
               
                if(Checa::checarNome($formulario['nome'])):
                    $dados['nome_erro'] = 'O nome informado é invalido';

                elseif(Checa::checarEmail($formulario['email'])):
                    $dados['email_erro'] = 'O e-mail informado é invalido';
                   
    

               elseif(strlen($formulario['senha']) < 6 ):
                    $dados['senha_erro'] = 'A senha deve ter no minimo 6 caracteres ';
                else:
                        $dados['senha'] = password_hash($formulario['senha'], PASSWORD_DEFAULT);

                    if($this->usuarioModel->atualizar($dados)):
                        Sessao::mensagem('usuario',' A Atualização dos Dados do utilizador '.$dados['nome'].' foi realizada com sucesso');
                        Url::redirecionar('posts');
                    else:
                        die("Erro ao armazenar usuario no banco de dados");
                    endif;

                   
                endif;
           endif;
        else:
            $usuario = $this->usuarioModel->lerUsuarioPorId($id);
            $dados =[
                'id' => '',
                'nome' => $usuario->nome,
                'email' => $usuario->email,
                'senha' => '',
                'biografia' => $usuario->biografia,
                'nome_erro' => '',
                'email_erro' => '',
                'senha_erro' => '',
                'biografia_erro' => ''
            ]; 
        endif;
        $this->view('usuarios/perfil', $dados);
    }

    public function login(){
        //Verifica si o formulario existe
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($formulario)):
            //Dados vindo do formulario cadastrar
            $dados =[
                'email' => trim ($formulario['email']),
                'senha' => trim ($formulario['senha'])
            ];
            //Validando os campos do formulario
            //in_array()- verifica si no array existe campo vazio
            if(in_array("", $formulario)):
                if(empty($formulario['email'])):
                    $dados['email_erro'] = 'Preencha o campo email';
                endif;

                if(empty($formulario['senha'])):
                    $dados['senha_erro'] = 'Preencha o campo senha';
                endif;
            else:

               if(Checa::checarEmail($formulario['email'])):
                    $dados['email_erro'] = 'O e-mail informado é invalido';
                else:
                 
                    $usuario = $this->usuarioModel->checarLogin($formulario['email'], $formulario['senha']);
                    if($usuario):
                        $this->criarSessaoUsuario($usuario);
                    else:
                        Sessao::mensagem('usuario','Usuario ou senha invalidos','alert alert-danger');
                    endif;
                   
                endif;
            endif;
        else:
            $dados =[
                'email' => '',
                'senha' => '',
                'email_erro' => '',
                'senha_erro' => ''
            ]; 
        endif;
 
        $this->view('usuarios/login', $dados);
    }

    //Cria uma sessão
    private function criarSessaoUsuario($usuario){
        $_SESSION['usuario_id'] = $usuario->id;
        $_SESSION['usuario_nome'] = $usuario->nome;
        $_SESSION['usuario_email'] = $usuario->email;

        Url::redirecionar('posts');
    }

    //Destruir sessão
    public function sair(){
        unset($_SESSION['usuario_id']);
        unset($_SESSION['usuario_nome']);
        unset($_SESSION['usuario_email']);

        session_destroy();

        Url::redirecionar('usuarios/login');

    }

    

    
}