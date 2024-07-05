<?php

namespace Model;
use PDO;
require_once('DataBase.php'); 
use Model\DataBase;
use PDOException;

class Member 
{
    private $db;
    private $table = "members";
    public function __construct()
    {
        $this->db = DataBase::getInstance();
    }
    protected function index (string $search = '') : Array | Object
    {
        $sql = "SELECT * FROM $this->table WHERE (name LIKE :condition OR email LIKE :condition) AND (name != '' OR email != '')";
        $condition = $search ? "%$search%" : '%'. '' . '%';

        $statement = $this->db->pdo->prepare($sql);
        $statement->bindParam(":condition", $condition);
        $statement->execute();
        $members = $statement->fetchAll(PDO::FETCH_OBJ);
        return $members;
    }

    protected function show (string $id) : object
    {
        $statement = $this->db->pdo->prepare("SELECT * FROM $this->table WHERE id = :id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        $data = $statement->fetch(PDO::FETCH_OBJ);
        return $data;
    }

    protected function store (bool $isScriber, bool $isAdmin = false) : object
    {
        $subscription = $isScriber ? 1 : 0;
        $role = $isAdmin ? 1 : 0;
        $id = $this->generateSMCID();
        $statement = $this->db->pdo->prepare("INSERT INTO $this->table (id, name, email, password, city, subscription, role) values (:id, :name, :email, :password, :city, :subscription, :role)");
        $statement->bindParam(":id", $id);
        $statement->bindParam(":name", $_POST['name']);
        $statement->bindParam(":email", $_POST['email']);
        $statement->bindParam(":password", $_POST['password']);
        $statement->bindParam(":city", $_POST['city']);
        $statement->bindParam(":subscription", $subscription);
        $statement->bindParam(":role", $role);
        $statement->execute();

        $statement = $this->db->pdo->prepare("SELECT * FROM $this->table WHERE id = :id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    protected function update (string $id, bool $isScriber, bool $isAdmin) : object
    {   
        $subscription = $isScriber ? 1 : 0;
        $role = $isAdmin ? 1 : 0;

        $statement = $this->db->pdo->prepare("UPDATE $this->table SET name = :name, email = :email, password = :password, city = :city, subscription = :subscription, role = :role WHERE id = :id");
        $statement->bindParam(":name", $_POST['name']);
        $statement->bindParam(":email", $_POST['email']);
        $statement->bindParam(":password" , $_POST['password']);
        $statement->bindParam(":city", $_POST['city']);
        $statement->bindParam(":subscription", $subscription);
        $statement->bindParam(":role", $role);
        $statement->bindParam(":id", $id);
        $statement->execute();

        $stmt = $this->db->pdo->prepare("SELECT * FROM $this->table WHERE id=$id");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        return $data;

    }

    protected function destroy (string $id) : void 
    {
        if(!isset($id)) return;
        $statement = $this->db->pdo->prepare("DELETE FROM $this->table WHERE id = :id");
        $statement->bindParam(":id", $id);
        $statement->execute();
    }


    protected function showWithEmail () : object
    {
        try {
            $stmt = $this->db->pdo->prepare("
                SELECT * FROM $this->table WHERE email = :email
            ");
            $stmt->bindParam(":email", $_POST['email']);
            $stmt->execute();
            if($stmt->rowCount() === 0) throw new PDOException("Invalid credentials");
            return $stmt->fetchObject();
        } catch (PDOException $err) {
            throw new PDOException("Invalid credentials");
        }
    }

    private function generateSMCID() : string
    {
        $sql = "SELECT MAX(id) as id FROM $this->table";
        $stmt = $this->db->pdo->query($sql);
        // $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $lastSMCID = $result['id'];

        if (empty($lastSMCID)) {
            $formattedID = 'smc00001';
        } else {
            $lastSMCINum = intval(substr($lastSMCID, 3)); // Extract numeric part
            $lastSMCINum++; // Increment the number

            $formattedID = 'smc' . str_pad($lastSMCINum, 5, '0', STR_PAD_LEFT); // Pad with zeros
        }

        return $formattedID;
    }
}