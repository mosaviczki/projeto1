<?php
require_once '../Classes/usuarios.php';
$u = new Usuario;
?>
<html lang="pt-BR">

<head>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <div class="main_forms">
        <div class="left_forms">
            <div class="logo">
                <img src="../Imagens/logo.png" alt="logo" width="300">
            </div>
            <div class="imagem">
                <img src="../Imagens/Movie Night-amico.svg" alt="img">
            </div>
        </div>
        <div class=right_forms>
            <div class="body_forms">
                <h1>ENTRAR</h1>
                <form method="POST">
                    <input type="email" placeholder="Usuário" name=email maxlenght="30">
                    <input type="password" placeholder="Senha" name=senha maxlenght="30">
                    <input type="submit" value="ACESSAR" maxlenght="30">
                    <a href="../Cadastrar/cadastrar.php">Ainda não é inscrito? <strong> Cadastre-se</strong>
                </form>
            </div>
        </div>
    </div>

    <?php
    //verificar se clicou no botão
    if (isset($_POST['email'])) {

        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        //verificação de campo em branco
        if (!empty($email) && !empty($senha)) {
            $u->conectar("projeto_login", "localhost", "root", "");
            if ($u->msgErro == "") {
                if ($u->logar($email, $senha)) {
                    header("location: ../site/index.php");
                } else {
    ?>
                    <div class="msg-erro">
                        Email e/ou senha incorretos.
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="msg-erro">
                    <?php echo "Erro: " . $u->$msgErro; ?>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="msg-erro">
                Preencha todos os campos!
            </div>
    <?php
        }
    }
    ?>
</body>

</html>