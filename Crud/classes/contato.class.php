<?php

class Contato
{
    private $pdo;

    public function __construct()
    {
        try {
            $db = new stdClass;
            $db->driver = 'mysql';
            $db->host = 'localhost';
            $db->port = 3306;
            $db->database = 'db_aula_crud';
            $db->username = 'root';
            $db->password = '';
            $db->unixSocket = '';
            $db->charset = 'utf8';
            $db->options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_PERSISTENT => true
            ];
            $db->dns = "mysql:dbname={$db->database};port={$db->port};host={$db->host}";

            $this->pdo = new PDO($db->dns, $db->username, $db->password, $db->options);


        } catch (PDOException $e) {
            echo "ERRO: " . $e->getMessage();
        }
    }


    public function adicionar($email, $nome = '', $id = 0)
    {

        if ($this->existeUsuario($id , $email) == false) {

            $sql = "INSERT INTO contatos (nome , email) VALUES (:nome,:email)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->execute();
            return true;
        } else {
            return false;
        }

    }

    public function getAll()
    {
        $sql = "Select * FROM contatos order by id asc";

        $sql = $this->pdo->prepare($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return [];
        }
    }

    public function getInfo($id)
    {
        $sql = "SELECT * FROM contatos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return $sql->fetch();
        } else {
            return [];
        }
    }


    public function getNome($email)
    {
        $sql = "SELECT nome FROM contatos WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $info = $sql->fetch();
            return $info->nome;
        } else {
            return '';
        }

    }

    private function existeUsuario($id,$email)
    {
        $sql = "SELECT * FROM contatos where id = :id and email = :email ";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->bindValue(':email', $email);

        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function formatarData($data)
    {
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        $data = strftime('%d de %B de %Y', strtotime($data));


        return $data;
    }

    public function editar($id, $nome, $email)
    {
        if ($this->existeUsuario($id,$email)) {
            $sql = "UPDATE contatos SET  nome = :nome, email = :email where id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->execute();

            return true;
        } else {
            return false;
        }

    }

    public function excluir($id)
    {
        //if($this->existeEmail($id)) {
        $sql = "DELETE FROM contatos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        return true;
    }


}