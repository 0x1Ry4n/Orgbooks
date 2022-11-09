<?php

    namespace Model;

    use mysqli;

    require_once("config/config.php");

    trait EdicoesCRUD
    {
        public function insertEdicao($nome, $materia, $autor, $validade)
        {
            $stmt = $this->mysqli->prepare("INSERT INTO tb_edicao (nome, materia, autor, validade) VALUES(?, ?, ?, ?)")
            or trigger_error($this->mysqli->error, E_USER_ERROR);
            
            $stmt->bind_param("ssss", $nome, $materia, $autor, $validade);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        }

        public function selectEdicao()
        {
            $stmt = $this->mysqli->prepare("SELECT * FROM tb_edicao")
            or trigger_error($this->mysqli->error, E_USER_ERROR);
            
            $stmt->execute();
            $stmt_result = $stmt->get_result();

            if ($stmt_result->num_rows > 0) {
                while ($row = $stmt_result->fetch_array(MYSQLI_ASSOC)) {
                    $array[] = $row;
                }

                return $array;
            }

            return null;
        }

        public function pesquisaEdicao($id_edicao)
        {
            $stmt = $this->mysqli->prepare("SELECT * FROM tb_edicao WHERE id_edicao = ?")
            or trigger_error($this->mysqli->error, E_USER_ERROR);

            $stmt->bind_param("i", $id_edicao);
            $stmt->execute();
            $stmt_result = $stmt->get_result();

            if ($stmt_result->num_rows > 0) {
                return $stmt_result->fetch_array(MYSQLI_ASSOC);
            }

            return null;
        }

        public function filtrarEdicaoPorData($from_date, $to_date) {
            $stmt = $this->mysqli->prepare("SELECT * FROM tb_edicao WHERE validade BETWEEN ? AND ?")
            or trigger_error($this->mysqli->error, E_USER_ERROR);

            $stmt->bind_param("ss", $from_date, $to_date);
            $stmt->execute();

            $stmt_result = $stmt->get_result();

            if ($stmt_result->num_rows > 0) {
                while ($row = $stmt_result->fetch_array(MYSQLI_ASSOC)) {
                    $array[] = $row;
                }

                return $array;
            }

            return null;
        }

        public function deleteEdicao($id_edicao)
        {
            $stmt = $this->mysqli->prepare("DELETE FROM tb_edicao WHERE id_edicao = ? LIMIT 1")
            or trigger_error($this->mysqli->error, E_USER_ERROR);

            $stmt->bind_param("i", $id_edicao);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        }

        // Join para mostrar a edição de cada livro

        public function selectEdicaoLivro()
        {
            $stmt = $this->mysqli->prepare("SELECT liv.id_livro, edi.validade, edi.nome, edi.materia, edi.autor, liv.descricao, liv.status_livro
                        FROM tb_livro liv
                        JOIN tb_edicao edi
                        ON liv.cod_edicao = edi.id_edicao") 
                        or trigger_error($this->mysqli->error, E_USER_ERROR);

            $stmt->execute();
            $stmt_result = $stmt->get_result();

            if ($stmt_result->num_rows > 0) {
                while ($row = $stmt_result->fetch_array(MYSQLI_ASSOC)) {
                    $array[] = $row;
                }

                return $array;
            }

            return null;
        }

        public function updateEdicao($nome, $autor, $materia, $validade, $id)
        {
            $stmt = $this->mysqli->prepare("UPDATE tb_edicao SET nome = ?, materia = ?, autor = ? , validade = ? WHERE id_edicao = ?") 
            or trigger_error($this->mysqli->error, E_USER_ERROR);
            
            $stmt->bind_param("ssssi", $nome, $materia, $autor, $validade, $id);

            if($stmt->execute()) {
                return true;
            }

            return false;
        }
    }

    trait AlunosCRUD
    {
        public function insertAluno($rm, $nome, $genero, $data_nascimento, $telefone, $email, $endereco, $curso)
        {
            $stmt = $this->mysqli->prepare("INSERT INTO tb_aluno(id_aluno, nome, genero, data_nascimento, telefone, email, endereco, curso) VALUES(?, ?, ?, ?, ?, ?, ?, ?)") 
            or trigger_error($this->mysqli->error, E_USER_ERROR);
            
            $stmt->bind_param("isisssss", $rm, $nome, $genero, $data_nascimento, $telefone, $email, $endereco, $curso);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        }

        public function selectAluno()
        {
            $stmt = $this->mysqli->prepare("SELECT * FROM tb_aluno") 
            or trigger_error($this->mysqli->error, E_USER_ERROR);
            
            $stmt->execute();
            $stmt_result = $stmt->get_result();

            if ($stmt_result->num_rows > 0) {
                while ($row = $stmt_result->fetch_array(MYSQLI_ASSOC)) {
                    $array[] = $row;
                }

                return $array;
            }

            return null;
        }

        public function pesquisaAluno($id_aluno)
        {
            $stmt = $this->mysqli->prepare("SELECT * FROM tb_aluno WHERE id_aluno = ?")
            or trigger_error($this->mysqli->error, E_USER_ERROR);

            $stmt->bind_param("i", $id_aluno);
            $stmt->execute();
            $stmt_result = $stmt->get_result();

            if ($stmt_result->num_rows > 0) {
                return $stmt_result->fetch_array(MYSQLI_ASSOC);
            }

            return null;
        }


        public function checkExistsAluno($rm_aluno)
        { 
            $stmt = $this->mysqli->prepare("SELECT id_aluno FROM tb_aluno WHERE id_aluno = ?")
            or trigger_error($this->mysqli->error, E_USER_ERROR);

            $stmt->bind_param("i", $rm_aluno);
            $stmt->execute();
            $stmt_result = $stmt->get_result();

            if ($stmt_result->num_rows > 0) {
                return true;
            }

            return false;
        }

        public function deleteAluno($id_aluno)
        {
            $stmt = $this->mysqli->prepare("DELETE FROM tb_aluno WHERE id_aluno = ? LIMIT 1")
            or trigger_error($this->mysqli->error, E_USER_ERROR);
            
            $stmt->bind_param("i", $id_aluno);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        }

        public function updateAluno($id, $nome, $genero, $data_nascimento, $telefone, $email, $endereco, $curso)
        {
            $stmt = $this->mysqli->prepare("UPDATE tb_aluno SET nome = ?, genero = ?, data_nascimento = ?, telefone = ?, email = ?, endereco = ?, curso = ? WHERE id_aluno = ?") 
            or trigger_error($this->mysqli->error, E_USER_ERROR);
            
            $stmt->bind_param("sssssssi", $nome, $genero, $data_nascimento, $telefone, $email, $endereco, $curso, $id);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        }

        public function uploadAlunoImage($location, $id_aluno) {
            $stmt = $this->mysqli->prepare("UPDATE tb_aluno SET location = ? WHERE id_aluno = ?") 
            or trigger_error($this->mysqli->error, E_USER_ERROR);
            
            $stmt->bind_param("si", $location, $id_aluno);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        }
    }


    trait LivrosCRUD
    {

        public function insertLivro($qrcode, $edicao, $descricao = NULL)
        {
            $stmt = $this->mysqli->prepare("INSERT INTO tb_livro(id_livro, cod_edicao, status_livro, descricao) VALUES(?, ?, 1, ?)") // 1 indica que o livro está disponível para empréstimo 
            or trigger_error($this->mysqli->error, E_USER_ERROR);
            
            $stmt->bind_param("iis", $qrcode, $edicao, $descricao);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        }

        public function selectLivro()
        {
            $stmt = $this->mysqli->prepare("SELECT * FROM tb_livro") 
            or trigger_error($this->mysqli->error, E_USER_ERROR);
            
            $stmt->execute();
            $stmt_result = $stmt->get_result();

            if ($stmt_result->num_rows > 0) {
                while ($row = $stmt_result->fetch_array(MYSQLI_ASSOC)) {
                    $array[] = $row;
                }

                return $array;
            }

            return null;
        }

        public function pesquisaLivro($id_livro)
        {
            $stmt = $this->mysqli->prepare("SELECT id_livro, cod_edicao, descricao FROM tb_livro WHERE id_livro = ?")
            or trigger_error($this->mysqli->error, E_USER_ERROR);

            $stmt->bind_param("i", $id_livro);
            $stmt->execute();
            $stmt_result = $stmt->get_result();

            if ($stmt_result->num_rows > 0) {
                return $stmt_result->fetch_array(MYSQLI_ASSOC);
            }

            return null;
        }

        public function updateLivro($cod_edicao, $cod_livro, $descricao = NULL)
        {
            $stmt = $this->mysqli->prepare("UPDATE tb_livro SET cod_edicao = ?, descricao = ? WHERE id_livro = ?") 
            or trigger_error($this->mysqli->error, E_USER_ERROR);
            
            $stmt->bind_param("isi", $cod_edicao, $descricao, $cod_livro);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        }

        public function updateStatusLivro($cod, $flag)
        {
            $stmt = $this->mysqli->prepare("CALL sp_atualizar_status_livro(?, ?)")
            or trigger_error($this->mysqli->error, E_USER_ERROR);

            $stmt->bind_param("ii", $cod, $flag);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        }

        public function checkExistsLivro($qrcode)
        {
            $stmt = $this->mysqli->prepare("SELECT id_livro FROM tb_livro WHERE id_livro = ?")
            or trigger_error($this->mysqli->error, E_USER_ERROR);

            $stmt->bind_param("i", $qrcode);
            $stmt->execute();
            $stmt_result = $stmt->get_result();

            if ($stmt_result->num_rows > 0) {
                return true;
            }

            return false;
        }

        public function deleteLivro($id_livro)
        {
            $stmt = $this->mysqli->prepare("DELETE FROM tb_livro WHERE id_livro = ? LIMIT 1")
            or trigger_error($this->mysqli->error, E_USER_ERROR);

            $stmt->bind_param("i", $id_livro);

            if ($stmt->execute()) {
                return true;
            }


            return false;
        }
    }


    trait EmprestimosCRUD
    {

        public function insertEmprestimo($cod_unidade, $cod_aluno, $data_devolucao, $data_retirada)
        {
            $stmt = $this->mysqli->prepare("INSERT INTO tb_emprestimo(cod_unidade, cod_aluno, data_retirada, data_devolucao) VALUES(?, ?, ?, ?)")
            or trigger_error($this->mysqli->error, E_USER_ERROR);

            $stmt->bind_param("iiss", $cod_unidade, $cod_aluno, $data_retirada, $data_devolucao);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        }

        public function selectEmprestimo()
        {
            $stmt = $this->mysqli->prepare("SELECT emp.id_emprestimo, emp.cod_unidade, emp.data_devolucao, emp.data_retirada, edi.nome AS nome_edicao, edi.materia, alu.id_aluno, alu.nome AS nome_aluno, alu.location 
                FROM tb_emprestimo emp
                JOIN tb_livro liv ON emp.cod_unidade = liv.id_livro 
                JOIN tb_edicao edi ON liv.cod_edicao = edi.id_edicao
                JOIN tb_aluno alu ON emp.cod_aluno = alu.id_aluno") or trigger_error($this->mysqli->error, E_USER_ERROR);
            
            $stmt->execute();
            $stmt_result = $stmt->get_result();

            if ($stmt_result->num_rows > 0) {
                while ($row = $stmt_result->fetch_array(MYSQLI_ASSOC)) {
                    $array[] = $row;
                }

                return $array;
            }

            return null;
        }

        public function filtrarEmprestimoPorData($from_date, $to_date) {
            $stmt = $this->mysqli->prepare("SELECT emp.id_emprestimo, emp.cod_unidade, emp.data_devolucao, emp.data_retirada, edi.nome AS nome_edicao, edi.materia, alu.id_aluno, alu.nome AS nome_aluno, alu.location 
                    FROM tb_emprestimo emp
                    JOIN tb_livro liv ON emp.cod_unidade = liv.id_livro 
                    JOIN tb_edicao edi ON liv.cod_edicao = edi.id_edicao
                    JOIN tb_aluno alu ON emp.cod_aluno = alu.id_aluno
                    WHERE emp.data_retirada BETWEEN ? AND ?")
            or trigger_error($this->mysqli->error, E_USER_ERROR);

            $stmt->bind_param("ss", $from_date, $to_date);
            $stmt->execute();

            $stmt_result = $stmt->get_result();

            if ($stmt_result->num_rows > 0) {
                while ($row = $stmt_result->fetch_array(MYSQLI_ASSOC)) {
                    $array[] = $row;
                }

                return $array;
            }

            return null;
        }

        public function selectLivroEmprestimo($id_emprestimo) {
            $stmt = $this->mysqli->prepare("SELECT id_livro FROM tb_livro WHERE id_livro = (SELECT cod_unidade FROM tb_emprestimo WHERE id_emprestimo = ?)")
            or trigger_error($this->mysqli->error, E_USER_ERROR);

            $stmt->bind_param("i", $id_emprestimo);
            $stmt->execute();
            $stmt_result = $stmt->get_result();

            if ($stmt_result->num_rows > 0) {
                return $stmt_result->fetch_array(MYSQLI_ASSOC);
            }

            return null;
        }

        public function deleteEmprestimo($id_emprestimo) {
            $stmt = $this->mysqli->prepare("DELETE FROM tb_emprestimo WHERE id_emprestimo = ?")
            or trigger_error($this->mysqli->error, E_USER_ERROR);

            $stmt->bind_param("i", $id_emprestimo);
            
            if ($stmt->execute()) {
                return true;
            }

            return false;
        }


        public function pesquisaEmprestimo($id_emprestimo)
        {
            $stmt = $this->mysqli->prepare("SELECT * FROM tb_emprestimo WHERE id_emprestimo = ?")
            or trigger_error($this->mysqli->error, E_USER_ERROR);

            $stmt->bind_param("i", $id_emprestimo);
            $stmt->execute();
            $stmt_result = $stmt->get_result();

            if ($stmt_result->num_rows > 0) {
                return $stmt_result->fetch_array(MYSQLI_ASSOC);
            }

            return null;
        }

        public function checkExistsEmprestimo($cod_unidade)
        { 
            $stmt = $this->mysqli->prepare("SELECT cod_unidade FROM tb_emprestimo WHERE cod_unidade = ?") 
            or trigger_error($this->mysqli->error, E_USER_ERROR);
            
            $stmt->bind_param("i", $cod_unidade);
            $stmt->execute();
            $stmt_result = $stmt->get_result();

            if ($stmt_result->num_rows > 0) {
                return true;
            }

            return false;
        }

        public function getEmprestimosEvents()
        {
            $stmt = $this->mysqli->prepare("SELECT emp.id_emprestimo, emp.cod_unidade, emp.data_devolucao, emp.data_retirada, edi.nome AS nome_edicao, edi.materia, alu.id_aluno, alu.nome AS nome_aluno 
                        FROM tb_emprestimo emp
                        JOIN tb_livro liv 
                        ON emp.cod_unidade = liv.id_livro 
                        JOIN tb_edicao edi
                        ON liv.cod_edicao = edi.id_edicao
                        JOIN tb_aluno alu
                ") or trigger_error($this->mysqli->error, E_USER_ERROR);

            $stmt->execute();
            $stmt_result = $stmt->get_result();

            if ($stmt_result->num_rows > 0) {
                while ($row = $stmt_result->fetch_array(MYSQLI_ASSOC)) {
                    $array[] = $row;
                }

                return $array;
            }

            return null;
        }
    }

    trait Admin
    {
        // Autenticação de login

        public function selectAdminLogin($email, $password)
        {
            $stmt = $this->mysqli->prepare("SELECT id_admin FROM tb_admin WHERE email = ? AND senha = ?")
            or trigger_error($this->mysqli->error, E_USER_ERROR);

            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $stmt_result = $stmt->get_result();

            if ($stmt_result->num_rows > 0) {
                while ($row = $stmt_result->fetch_array(MYSQLI_ASSOC)) {
                    $id_admin[] = $row;
                }

                return $id_admin;
            } else {
                return null; // retorna null se o usuário não existir 
            }
        }

        // Atualizar último horário de login do admin ao logar

        public function updateLastLogin($id_admin)
        {
            $stmt = $this->mysqli->prepare("UPDATE tb_admin SET last_login = now() WHERE id_admin = ?") 
            or trigger_error($this->mysqli->error, E_USER_ERROR);
            
            $stmt->bind_param("i", $id_admin);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        }

        // Admin

        public function pesquisaAdmin($id_admin)
        {
            $stmt = $this->mysqli->prepare("SELECT * FROM tb_admin WHERE id_admin = ?")
            or trigger_error($this->mysqli->error, E_USER_ERROR);

            $stmt->bind_param("i", $id_admin);
            $stmt->execute();
            $stmt_result = $stmt->get_result();

            if ($stmt_result->num_rows > 0) {
                return $stmt_result->fetch_array(MYSQLI_ASSOC);
            }

            return null;
        }

        public function updateAdmin($nome, $email, $genero, $endereco, $telefone, $data_nascimento, $id_admin)
        {
            $stmt = $this->mysqli->prepare("UPDATE tb_admin SET nome = ?, email = ?, genero = ? , endereco = ?, telefone = ?, data_nascimento = ? WHERE id_admin = ?") 
            or trigger_error($this->mysqli->error, E_USER_ERROR);
            
            $stmt->bind_param("ssssssi", $nome, $email, $genero, $endereco, $telefone, $data_nascimento, $id_admin);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        }

        public function uploadAdminImage($location, $id_admin) {
            $stmt = $this->mysqli->prepare("UPDATE tb_admin SET location = ? WHERE id_admin = ?") 
            or trigger_error($this->mysqli->error, E_USER_ERROR);
            
            $stmt->bind_param("si", $location, $id_admin);

            if ($stmt->execute()) {
                return true;
            }

            return false;
        }
    }

    class Database
    {
        private $mysqli;

        use EdicoesCRUD;   // CRUD Edicoes trait
        use AlunosCRUD;    // CRUD Alunos trait
        use LivrosCRUD;    // CRUD Livros trait
        use EmprestimosCRUD;  // CRUD Emprestimos trait
        use Admin; // Admin trait 

        public function __construct()
        {
            $this->connection(); 
        }

        private function connection()
        {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $this->mysqli = new mysqli(SERVER, USER, PASSWORD, DATABASE);
            $this->mysqli->set_charset('utf8mb4');
        }
    }

?>