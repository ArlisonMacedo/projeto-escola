<?php include 'Includes/Header.html' ;?>

<form action="Routes/insertAluno.php" method="post">
    <h3>Dados do Aluno</h3>
    Nome do Aluno: <input type="text"name="nome"><br>
    CPF: <input type="text" name="cpf"><br>
    data de nasc: <input type="date" name="data_nasc" id=""><br>
    <hr>
    
    <input type="submit" value="Cadastrar">
</form>