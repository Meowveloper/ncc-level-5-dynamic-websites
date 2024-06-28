<?php

namespace Model;

use PDO;

require_once('DataBase.php');

class Contact
{
    protected $db;
    protected $table = "contacts";
    public function __construct()
    {
        $this->db = DataBase::getInstance();
    }

    protected function index(string $search = ''): array
    {
        $condition = $search ? "%$search%" : "%". ''. "%";
        $sql = "SELECT * FROM $this->table WHERE (message LIKE :condition OR email LIKE :condition) AND (message != '' OR email != '')";
        $statement = $this->db->pdo->prepare($sql);
        $statement->bindParam(":condition", $condition);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    protected function show (int $id) : object
    {
        $statement = $this->db->pdo->prepare("SELECT * FROM $this->table WHERE id = $id");
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }


    protected function store(): object
    {
        $statement = $this->db->pdo->prepare("INSERT INTO $this->table (message, email) VALUES (:message, :email)");
        $statement->bindParam(":message", $_POST['message']);
        $statement->bindParam(":email", $_POST['email']);
        $statement->execute();

        $sql = "SELECT * FROM $this->table WHERE id = LAST_INSERT_ID()";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_OBJ);

        return $data;
    }


    protected function update(int $id): object
    {
        $statement = $this->db->pdo->prepare("UPDATE `$this->table` SET `message` = :message WHERE `$this->table`.`id` = :id");

        $statement->bindParam(":message", $_POST['message']);
        $statement->bindParam(":id", $id);
        $statement->execute();

        $stmt = $this->db->pdo->prepare("SELECT * FROM $this->table WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        return $data;
    }

    protected function destroy(int $id): void
    {
        if (isset($id) && $id > 0) {
            $statement = $this->db->pdo->prepare("DELETE FROM $this->table WHERE id = :id");
            $statement->bindParam(":id", $id);
            $statement->execute();
        }
    }
}
