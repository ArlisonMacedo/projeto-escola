<? include 'Includes/Header.html'; session_start(); 
if(!isset($_SESSION['FUNCIONARIO'])){
    header("Location: index.php");
} 
?>

<h1>Dashboard Admin <?php echo $_SESSION['FUNCIONARIO']; ?></h1>

    <a href="insertAluno.php">Inserir Aluno</a><br><br>
    <a href="insertCurso.php">Inserir Curso</a><br><br>
    <table border="1"> 
        <tr>
            <th>Matricula</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Data Nasc</th>
            <th>Curso</th>
            <th>Diciplina</th>
            <th>Nota 1</th>
            <th>Nota 2</th>
            <th>Media</th>
            <th colspan="2">Opções</th>
        </tr>
        <tr>
            
            <?php 
                include 'Class/Crud.php';
                $crud = new Crud;
                $row = $crud->selectAluno();

                foreach($row as $key => $value){
                    echo "<tr>";
                    foreach($value as $key => $dados){
                        if($key != "Alunos_MAT" && $key != "ID"){
                            echo "<td>".$dados."</td>";
                        }
                    }
                    ?>
                    <td><form action="update.php" method="post">
                            <input type="hidden" name="ID" value="<?php echo $value['ID'];?>">
                            <input type="hidden" name="MAT" value="<?php echo $value['MAT'];?>">
                            <input type="submit" value="Editar">
                        </form></td>
                    <td><form action="Routes/deleteAlun.php" method="post">
                            <input type="hidden" name="ID" value="<?php echo $value['ID']?>">
                            <input type="hidden" name="MAT" value="<?php echo $value['MAT'];?>">
                            <input type="submit" value="Excluir">
                        </form></td>
                    <?php
                    echo "</tr>";
                }
            ?>
            
        </tr>
    </table>
    <br><br>
    <a href="Includes/Destroy.php">Sair</a>
