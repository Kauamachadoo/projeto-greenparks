<?php
//CHAMA O ARQUIVO DE USUÁRIOS.
require_once '../Controller/usuarios.php';

//CHAMA CLASSE.
$u = new Usuario; 
?>

 <!-- HTML  --> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<!-- LOGIN  --> 
<title>Login</title>
</head>

<body id="body">
    <!-- TELA DE LOGIN -->
    <section class="h-100 gradient-form">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <!-- FORMULÁRIO -->
                                    <form method="POST">

                                        <!-- USUÁRIO -->
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="usuario" required name="usuario" maxlength="75" placeholder="Digite o usuário">
                                            <label for="usuario">Usuário <i class="fas fa-user"></i> </label>
                                        </div>

                                        <!-- SENHA -->
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="senha" required name="senha" maxlength="75" placeholder="Digite a senha">
                                            <label for="senha"> Senha <i class="fas fa-key"></i> </label>
                                            <div id="olho"><abbr title="Mostrar senha" id="##"><i class="fas fa-eye-slash" id="btn-eye" onclick="mostrar()"></i></abbr></div>
                                        </div>

                                        <!-- BOTÃO -->
                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <input type="submit" value="ACESSAR" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 mt-4">
                                        </div>
                                    </form>

                                    <!-- PHP -->
                                    <?php
                                    //DEFINE VARIÁVEIS.
                                    if (isset($_POST['usuario'])) { 
                                        //VARIÁVEIS RECEBEM SEUS VALORES.
                                        $usuario = addslashes($_POST['usuario']); 
                                        $senha   = addslashes($_POST['senha']);    

                                        //se as variáveis não estiverem vazias
                                        if (!empty($usuario) && !empty($senha)) { 
                                            //CONECTA AO BANCO DE DADOS.
                                            $u->conectar("greenpark", "localhost", "root", "");

                                            //se não apresentar nenhuma mensagem de erro
                                            if ($u->msgErro == "") {
                                                //Se as informações estiverem erradas
                                                if (!$u->logar($usuario, $senha)) {
                                    ?>
                                                    <div class="text-center p-3 mb-2 bg-danger text-black bg-opacity-75 rounded">
                                                        <?php echo "Credenciais incorretas!"; ?>
                                                    </div>
                                                <?php
                                                }

                                            //SE TIVER ALGUM ERRO, IMPRIME NA TELA.
                                            } else { 
                                                ?>
                                                <div class="text-center p-3 mb-2 bg-danger text-black bg-opacity-75 rounded">
                                                    <?php echo "Erro: " . $u->msgErro; ?>
                                                </div>
                                            <?php
                                            }

                                        //SE ALGUM CAMPO ESTIVER VAZIO...
                                        } else { 
                                            ?>
                                            <div class="text-center p-3 mb-2 bg-danger text-black bg-opacity-75 rounded">
                                                <?php echo "Preencha todos os campos obrigatórios!"; ?>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <!-- /PHP -->
                                </div>
                            </div>
                                    <h4 class="mb-4">BEM VINDO</h4>
                                    <p class="mb-4">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<!--
    <script src="../javascript/login.js"></script>
    <script src="../../../Controller/Pages/_js/password.js"></script>
-->
</html>