<?php 

    include 'Conexao.php';
    //include '../Includes/Session.php';
    //include 'Func.php';
    //include 'Aluno.php';

    class Crud extends Conexao {

        public function select(){
            $row = array();
            $sql = "SELECT * FROM Alunos, Alunos_has_CURSO, CURSO";
            try {
                //code...
                $stmt = $this->connectionDB()->query($sql);
                $stmt->execute();
                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $row;
            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }
        }
        public function selectFunc(){
            $row = array();
            $sql = "SELECT * FROM FUNCIONARIO";
            try {
                //code...
                $stmt = $this->connectionDB()->query($sql);
                $stmt->execute();
                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $row;
            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }
        }

        public function insertFunc(Func $func){
            $sql = "INSERT INTO FUNCIONARIO VALUES (null,:NOME,:CPF,:SENHA)";
            try {
                //code...
                $stmt = $this->connectionDB()->prepare($sql);
                
                $stmt->bindValue(":NOME",$func->getNome());
                $stmt->bindValue(":CPF",$func->getCpf());
                $stmt->bindValue(":SENHA",$func->getSenha());
                
                if($stmt->execute()){
                    echo "Dados inseridos com sucesso";
                }
            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }
        }
        public function deleteFunc(Func $func){
            $sql = "DELETE FROM FUNCIONARIO WHERE CPF = :CPF ";

            try {
                //code...
                $stmt = $this->connectionDB()->prepare($sql);
                $stmt->bindValue(":CPF",$func->getCpf());
                $stmt->execute();
                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if(count($row) == 1){
                    echo "Excluido com sucesso";
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        public function login(Func $func){
            session_start();
            $sql = "SELECT * FROM FUNCIONARIO WHERE NOME = :NOME and SENHA = :SENHA";

            try {
                //code...
                $stmt = $this->connectionDB()->prepare($sql);

                $stmt->bindValue(":NOME",$func->getNome());
                $stmt->bindValue(":SENHA",$func->getSenha());

                $stmt->execute();
                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                if(count($row) == 1){
                    $_SESSION['NOME'] = $func->getNome();
                    header("Location: ../dashboard.php");
                }

            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }
        }

        public function Teste(){
            echo "Ola Eu sou o GOku";
        }
    }
?>
