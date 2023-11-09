<!DOCTYPE html>
<?php
    include_once("conexao.php");
    session_start();
    if(isset($_POST["submit"])){
        $nome=mysqli_escape_string($conexao,$_POST['nome']);
        $email=mysqli_escape_string($conexao,$_POST['email']);
        $senha=mysqli_escape_string($conexao,$_POST['senha']);

        $sql="INSERT INTO USUARIO(nome,email,senha) VALUES('$nome','$email',MD5('$senha'));";
        mysqli_query($conexao,$sql);
        $sql2="SELECT id FROM USUARIO WHERE nome='$nome' AND email='$email' AND senha=MD5('$senha');";
        $dados=mysqli_fetch_assoc($conexao->query($sql2));
        $_SESSION['logado']=true;
        $_SESSION['id_usuario']=$dados["id"];
        header("Location:home.php");
    }
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar cadastro</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" required>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" required>
        <input type="submit" value="cadastrar" name="submit">
    </form>
</body>
</html>