<!DOCTYPE html>
<?php
    include_once("conexao.php");
    session_start();
    if(isset($_POST["submit"])){
        $erros= array();
        $email=mysqli_escape_string($conexao,$_POST["email"]);
        $senha=mysqli_escape_string($conexao,$_POST["senha"]);
        if(!empty($email) and !empty($senha)){
            $senhaCripto=md5($senha);
            $sql="SELECT * FROM USUARIO WHERE EMAIL='$email' AND SENHA='$senhaCripto';";
            $resultado=$conexao->query($sql);
            if(mysqli_num_rows($resultado)> 0){
                $dados=mysqli_fetch_assoc($resultado);
                $_SESSION['logado']=true;
                $_SESSION['id_sessao']= session_id();
                $_SESSION['id_usuario']=$dados["id"];
                header('Location:home.php');
            }else{
                $erros[]="<li>Erro! Email e senha não conferem!</li>";
            }
        }else{
            $erros[]="<li>Erro! Todos os campos devem ser preenchidos!</li>";
        }
    }
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bd e Sessões com php</title>
</head>
<body>
    <?php
        if(!empty($erros)){
            foreach($erros as $erro){
                echo $erro;
            }
        }
    ?>
    <h1>Login</h1>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="email">Email</label>
        <input type="email" id="email" name="email">
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha">
        <input type="submit" value="Fazer login" name="submit">
    </form>
    <button>
        <a href="cadastro.php">Fazer cadastro</a>
    </button>
</body>
</html>