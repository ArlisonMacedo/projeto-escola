<? include 'Includes/Header.html'; session_start(); 
if(!isset($_SESSION['NOME'])){
    header("Location: index.php");
} 
?>

<h1>Dashboard <?php echo $_SESSION['NOME']; ?></h1>


    <?php 
        include 'Class/Crud.php';
        $crud = new Crud;
        $row = $crud->selectFunc();
            foreach($row as $dados){
                echo "<td>";
                echo $dados['MAT']." ".$dados['NOME']." ".$dados['CPF']."<br />";
                echo "</td>";
            }
    ?>
