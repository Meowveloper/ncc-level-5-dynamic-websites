<?php
namespace Model;
require_once("DataBase.php");
use PDO;
use Model\DataBase;


class Service
{
    private $db;
    private $table = "services";
    public function __construct()
    {
        $this->db = DataBase::getInstance();
    }

    protected function index(string $search) : array
    {
        $condition = $search ? "%$search%" : "%" . '' . "%";
        $statement = $this->db->pdo->prepare("SELECT * FROM $this->table WHERE (title LIKE :condition OR description LIKE :condition OR info LIKE :condition) AND (title != '')");
        $statement->bindParam(":condition", $condition);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    protected function show(int $id) : object
    {
        $stmt = $this->db->pdo->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    protected function store() : object
    {
        $statement = $this->db->pdo->prepare("
            INSERT INTO $this->table (title, description, info) VALUES (:title, :description, :info)
        ");
        $statement->bindParam(":title", $_POST['title']);
        $statement->bindParam(":description", $_POST['description']);
        $statement->bindParam(":info", $_POST['info']);
        $statement->execute();

        $stmt = $this->db->pdo->prepare("SELECT * FROM $this->table WHERE id = LAST_INSERT_ID()");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    protected function update (int $id) : object
    {
        $stmt = $this->db->pdo->prepare("
            UPDATE $this->table SET title = :title, description = :description, info = :info WHERE id = :id
        ");
        $stmt->bindParam(":title", $_POST['title']);
        $stmt->bindParam(":description", $_POST['description']);
        $stmt->bindParam(":info", $_POST['info']);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $statement = $this->db->pdo->prepare("SELECT * FROM $this->table WHERE id = :id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    protected function destroy (int $id) : void
    {
        if(!isset($id) || $id < 1) throw new \PDOException("Error deleting service. Service not found..");
        $stmt = $this->db->pdo->prepare("
            DELETE FROM $this->table WHERE id = :id
        ");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}
