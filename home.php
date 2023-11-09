<!DOCTYPE html>
<?php
    include_once("conexao.php");
    session_start();
    if(!isset($_SESSION['logado'])):
        header("Location:index.php");
    endif;
    $sql="SELECT * FROM USUARIO WHERE id='".$_SESSION['id_usuario']."'";
    $resultado=mysqli_query($conexao,$sql);
    $dados=mysqli_fetch_assoc($resultado);
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body onload="alert('Seja bem vindo, <?= $dados['nome'] ?> :)');">
    <h1>Página inicial</h1>
    <table>
        <tr>
            <th>
                Id
            </th>
            <th>
                Email
            </th>
            <th>
                Nome
            </th>
        </tr>
        <?php
        for($i=0;$i<mysqli_num_rows($resultado);$i++){
            echo"<tr>";
            echo "<td>".$dados['id']."</td>";
            echo "<td>".$dados['email']."</td>";
            echo "<td>".$dados['nome']."</td>";
            echo "<tr>";
        }
    ?>
    </table>
    
    <button>
        <a href="logout.php">Sair</a>
    </button>
</body>
</html>