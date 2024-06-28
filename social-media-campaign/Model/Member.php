<?php

namespace Model;
use PDO;
require_once('DataBase.php'); 
class Member 
{
    protected $db;
    protected $table = "members";
    public function __construct()
    {
        $this->db = DataBase::getInstance();
    }
    public function index () : Array
    {
        $sql = "SELECT * FROM $this->table";
        $statement = $this->db->pdo->query($sql);
        $members = $statement->fetchAll(PDO::FETCH_OBJ);
        return $members;
    }

    protected function store (bool $isScriber) : object
    {
        $subscription = $isScriber ? "1" : "0";
        $id = $this->generateSMCID();
        $statement = $this->db->pdo->prepare("INSERT INTO $this->table (id, name, email, password, subscription) values (:id, :name, :email, :password, :subscription)");
        $statement->bindParam(":id", $id);
        $statement->bindParam(":name", $_POST['name']);
        $statement->bindParam(":email", $_POST['email']);
        $statement->bindParam(":password", $_POST['password']);
        $statement->bindParam(":subscription", $subscription);
        $statement->execute();

        $statement = $this->db->pdo->prepare("SELECT * FROM $this->table WHERE id = :id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_OBJ);
        return $result;
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