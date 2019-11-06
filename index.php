<?php 
session_start();
    
include 'Class/Crud.php';    
if(isset($_SESSION['FUNCIONARIO'])){
    echo $_SESSION['FUNCIONARIO'];
}else{
    echo "Entre";
}

?>

<?php include 'Includes/Header.html';?>
    <!--Todo codigo inicia Aqui -->
    <form action="Routes/insertFunc.php" method="post">
        <!-- Matricula <input type="text" name="mat" id=""><br> -->
        Nome <input type="text" name="nome" id=""><br>
        cpf <input type="text" name="cpf" id=""><br>
        Senha <input type="password" name="senha" id="">
        <input type="submit" value="Cadastrar">
    </form>
    <a href="Includes/Destroy.php">Sair</a>
    <!--Todo codigo finaliza Aqui -->
<?php include 'Includes/Footer.html'; ?>