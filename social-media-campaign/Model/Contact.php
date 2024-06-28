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

    public function index(): array
    {
        $sql = "SELECT * FROM $this->table";
        $statement = $this->db->pdo->query($sql);
        $data = $statement->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }


    public function store(): object
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


    public function update(int $id): object
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

    public function destroy(int $id): void
    {
        if (isset($id) && $id > 0) {
            $statement = $this->db->pdo->prepare("DELETE FROM $this->table WHERE id = :id");
            $statement->bindParam(":id", $id);
            $statement->execute();
        }
    }
}
