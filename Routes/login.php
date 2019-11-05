<?php 

    include '../Class/Crud.php';

    $usuario = $_POST['nome'];
    $senha = $_POST['senha'];

    if(preg_match('/^[A-Z]{1}[A-Za-z0-9@]{5,}$/',$usuario) && 
       preg_match('/^[\w@]{6,}$/',$senha)){
        
        include '../Class/Func.php';
        $func = new Func;
        $func->setNome($usuario);
        $func->setSenha($senha);
        $crud = new Crud;
        $crud->login($func);
        
       }


?>