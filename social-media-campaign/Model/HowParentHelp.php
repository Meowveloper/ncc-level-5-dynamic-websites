<?php
namespace Model;
require_once("DataBase.php");
use Model\DataBase;
use PDO;

class HowParentHelp
{
    private $db;
    private $table = "how_parent_helps";

    public function __construct()
    {
        $this->db = DataBase::getInstance();
    }

    protected function index (string $search = '') : array 
    {   
        $condition = "%" . $search . "%";
        $stmt = $this->db->pdo->prepare("SELECT * FROM $this->table WHERE (description LIKE :condition) AND (description != '')");
        $stmt->bindParam(":condition", $condition);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    protected function show (int $id) : object
    {
        $stmt = $this->db->pdo->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    protected function store () : object
    {
        if(isset($_FILES['image_1']) and $_FILES['image_1']['error'] == 0) $image1Name = $this->image_1Upload();
        else $image1Name = '';

        if(isset($_FILES['image_2']) and $_FILES['image_2']['error'] == 0) $image2Name = $this->image_2Upload();
        else $image2Name = '';

        $stmt = $this->db->pdo->prepare("
            INSERT INTO $this->table (description, image_1, image_2) VALUES (:description, :image_1, :image_2)
        ");
        $stmt->bindParam(":description", $_POST['description']);
        $stmt->bindParam(":image_1", $image1Name);
        $stmt->bindParam(":image_2", $image2Name);
        $stmt->execute();

        $stmt = $this->db->pdo->prepare("SELECT * FROM $this->table WHERE id = LAST_INSERT_ID()");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    protected function update(int $id) : object
    {
        if(isset($_FILES['image_1']) and $_FILES['image_1']['error'] == 0) {
            $this->image1Delete($id);
            $image1Name = $this->image_1Upload();
        } else {
            $image1Name = '';
        }
        if(isset($_FILES['image_2']) and $_FILES['image_2']['error'] == 0) {
            $this->image2Delete($id);
            $image2Name = $this->image_2Upload();
        } else {
            $image2Name = '';
        }

        $stmt = $this->db->pdo->prepare("
            UPDATE $this->table SET description = :description, image_1 = :image_1, image_2 = :image_2 WHERE id = :id
        ");
        $stmt->bindParam(":description", $_POST['description']);
        $stmt->bindParam(":image_1", $image1Name);
        $stmt->bindParam(":image_2", $image2Name);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $this->show($id);
    }

    protected function destroy (int $id) : void
    {
        $this->image1Delete($id);
        $this->image2Delete($id);
        $stmt = $this->db->pdo->prepare("DELETE FROM $this->table WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();

    }


    private function image_1Upload () : string
    {
        $uniqueId = uniqid("how_parent_help_", true);
        $fileName = $uniqueId . '_' . $_FILES['image_1']['name'];
        $fileTmt = $_FILES['image_1']['tmp_name'];
        move_uploaded_file($fileTmt, "images/$fileName");
        return $fileName;
    }
    private function image_2Upload () : string
    {
        $uniqueId = uniqid("how_parent_help_", true);
        $fileName = $uniqueId . '_' . $_FILES['image_2']['name'];
        $fileTmt = $_FILES['image_2']['tmp_name'];
        move_uploaded_file($fileTmt, "images/$fileName");
        return $fileName;
    }

    private function image1Delete(int $id) : void
    {   
        $data = $this->show($id);
        if($data->image_1 != '' or !isset($data->image_1)) {
            $imagePath = "images/" . $data->image_1;
            unlink($imagePath);
        } else {
            return;
        }
    }
    private function image2Delete(int $id) : void
    {   
        $data = $this->show($id);
        if($data->image_2 != '' or !isset($data->image_2)) {
            $imagePath = "images/" . $data->image_2;
            unlink($imagePath);
        } else {
            return;
        }
    }
}