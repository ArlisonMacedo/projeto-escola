<?php include 'Includes/Header.html';

    if(isset($_POST['MAT'])){
        include 'Class/Crud.php';
        include 'Class/Aluno.php';
        $aluno = new Aluno;
        $aluno->setMat($_POST['MAT']);
        $crud = new Crud;
        $row = $crud->selectUpdate($aluno);
        if($dados = $row){
    ?>
        <form action="Routes/updateCurso.php" method="post">
            Aluno: <input type="text" name="nome" value="<?php echo $dados['NOMEALUNO']?>"><br>
            CPF: <input type="text" name="cpf" value="<?php echo $dados['CPF'];?>"><br>
            Data Nasc: <input type="text" name="data_nasc" value="<?php echo $dados['Data_nasc'];?>"><br>
            Curso: <input type="text" name="curso" value="<?php echo $dados['cUrSo'] ;?>"><br>
            Diciplina: <input type="text" name="diciplina" value="<?php echo $dados['DICIPLINA']; ?>"><br>
            Nota 1°: <input type="text" name="nota1" value="<?php echo $dados['NOTA1'];?>"><br>
            Nota 2°: <input type="text" name="nota2" value="<?php echo $dados['NOTA2'];?>"> <br>
            <input type="hidden" name="MAT" value="<?php echo $dados['MAT'];?>">
            <input type="hidden" name="ID" value="<?php echo $dados['ID'] ;?>">
            <input type="submit" value="Atualizar">
        </form>
    <?php } 
    }


?>
