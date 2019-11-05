<?php 

    include 'Conexao.php';
    //include '../Includes/Session.php';
    //include 'Func.php';
    //include 'Aluno.php';

    class Crud extends Conexao {

        // metodo de teste 
        public function Teste(){
            echo "Ola Eu sou o GOku";
        }

        /** Funcções para o funcionario da instituição */
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
            $sql = "DELETE FROM FUNCIONARIO WHERE MAT = :MAT ";

            try {
                //code...
                $stmt = $this->connectionDB()->prepare($sql);
                $stmt->bindValue(":MAT",$func->getMat());
                if($stmt->execute()){
                    header("Location: ../dashboard.php");
                }
                
            } catch (PDOException $ex) {
                //throw $th;
                echo "Erro ".$ex->getMessage();
            }
        }

        public function login(Func $func){ //login Funcionario
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
                    $_SESSION['FUNCIONARIO'] = $func->getNome();
                    header("Location: ../dashboard.php");
                }

            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }
        }

        /**Funcções para o Aluno da instituição */
        public function selectAluno(){
            $row = array();
            $sql = "SELECT * FROM Alunos as Al left join CURSO as C on (Al.MAT = C.Alunos_MAT)";
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

        public function deleteAluno(Aluno $aluno,Curso $curso){
            $query = "DELETE FROM CURSO WHERE ID = :ID";
            $sql = "DELETE FROM Alunos WHERE MAT = :MAT";
            $bool = false;
            try {
                //code...
                $del = $this->connectionDB()->prepare($query);
                $del->bindValue(":ID",$curso->getID());
                if($del->execute()){
                    $bool = true;
                }
                $stmt = $this->connectionDB()->prepare($sql);
                $stmt->bindValue(":MAT",$aluno->getMat());
                if($stmt->execute()){
                    $bool = true;
                }
                if($bool){
                    header("Location: ../dashboard.php");
                }
                
            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }
        }

        public function inserirAluno(Aluno $aluno){
            $sql = "INSERT INTO Alunos VALUES (null,:nome,:cpf,:data_nasc)";
            try {
                //code...
                $stmt = $this->connectionDB()->prepare($sql);
                $stmt->bindValue(":nome",$aluno->getNome());
                $stmt->bindValue(":cpf",$aluno->getCpf());
                $stmt->bindValue(":data_nasc",$aluno->getData_nasc());
                if($stmt->execute()){
                    header("Location: ../dashboard.php");
                }
            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }
        }

        public function inserirCurso(Curso $curso){
            $sql = "INSERT INTO CURSO VALUES (null,:curso,:diciplina,:nota1,:nota2,:situacao,:Alunos_MAT)";
            try {
                //code...
            } catch (PDOException $th) {
                //throw $th;
                echo "Erro ".$th->getMessage();
            }
        }

        
    }
?>
