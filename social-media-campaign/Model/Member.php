<?php

namespace Model;
use PDO;
require_once('DataBase.php'); 
use Error;
use PDOException;
use Model\DataBase;

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

    protected function store (bool $isScriber = false, bool $isAdmin = false, $isOwner = false) : object
    {
        $subscription = $isScriber ? 1 : 0;
        $role = $isAdmin ? 1 : 0;
        $owner = $isOwner ? 1 : 0;
        $fileName = $this->uploadProfileImage();
        $id = $this->generateSMCID();
        $statement = $this->db->pdo->prepare("INSERT INTO $this->table (id, name, profile, email, password, city, subscription, role, owner) values (:id, :name, :profile, :email, :password, :city, :subscription, :role, :owner)");
        $statement->bindParam(":id", $id);
        $statement->bindParam(":name", $_POST['name']);
        $statement->bindParam(":profile", $fileName);
        $statement->bindParam(":email", $_POST['email']);
        $statement->bindParam(":password", $_POST['password']);
        $statement->bindParam(":city", $_POST['city']);
        $statement->bindParam(":subscription", $subscription);
        $statement->bindParam(":role", $role);
        $statement->bindParam(":owner", $owner);
        $statement->execute();
        return $this->show($id);
    }

    protected function update (string $id, bool $isScriber = false, bool $isAdmin = false, bool $isOwner = false) : object
    {   if(isset($_FILES['profile']) and $_FILES['profile']['error'] == 0 ) $this->deleteProfileImage($id);
        $filename = $this->uploadProfileImage();
        $subscription = $isScriber ? 1 : 0;
        $role = $isAdmin ? 1 : 0;
        $owner = $isOwner ? 1 : 0;
        $statement = $this->db->pdo->prepare("UPDATE $this->table SET name = :name, profile = :profile, email = :email, password = :password, city = :city, subscription = :subscription, role = :role, owner = :owner WHERE id = :id");
        $statement->bindParam(":name", $_POST['name']);
        $statement->bindParam(":profile", $filename);
        $statement->bindParam(":email", $_POST['email']);
        $statement->bindParam(":password" , $_POST['password']);
        $statement->bindParam(":city", $_POST['city']);
        $statement->bindParam(":subscription", $subscription);
        $statement->bindParam(":role", $role);
        $statement->bindParam(":owner", $owner);
        $statement->bindParam(":id", $id);
        $statement->execute();

        
        return $this->show($id);

    }

    protected function changeRole (string $id, bool $isAdmin = false) : object 
    {
        $role = $isAdmin ? 1 : 0;
        $stmt = $this->db->pdo->prepare("
            UPDATE $this->table SET role = :role WHERE id = :id 
        ");
        $stmt->bindParam(":role", $role);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $this->show($id);
    }

    protected function changeSubscription (string $id, bool $isScriber) : object 
    {
        $subscription = $isScriber ? 1 : 0;
        $stmt = $this->db->pdo->prepare("
            UPDATE $this->table SET subscription = :subscription WHERE id = :id
        ");
        $stmt->bindParam(":subscription", $subscription);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $this->show($id);
    }

    protected function destroy (string $id) : void 
    {
        if(!isset($id)) return;
        $this->deleteProfileImage($id);
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


    private function uploadProfileImage () :string 
    {
        $uniqueId = uniqid("profile_", true);
        if(isset($_FILES['profile']) && $_FILES['profile']['error'] == 0) {
            $filename = $uniqueId. '_'. $_FILES['profile']['name'];
            $filepatch = $_FILES['profile']['tmp_name'];
            move_uploaded_file($filepatch, "images/" . $filename);
        } else {
            $filename = "";
        }

        return $filename;
    }

    private function deleteProfileImage (string $id) : void
    {
        $oldData = $this->show($id);
        $oldImage = $oldData->profile;
        if(isset($oldImage) and $oldImage != '' and $oldImage != null) {
            $oldFilePath = "images/" . $oldImage;
            try {
                unlink($oldFilePath);
            }catch (Error) {
                throw new Error("Error deleting Image");
            }
        }
    } 
}