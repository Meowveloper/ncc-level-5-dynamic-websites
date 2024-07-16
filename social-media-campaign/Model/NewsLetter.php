<?php
namespace Model;
require_once("DataBase.php");

use Error;
use PDO;
use Model\DataBase;

class NewsLetter
{
    private $db;
    private $table = "newsletters";
    public function __construct()
    {
        $this->db = DataBase::getInstance();
    }

    protected function index (string $search, int | null $limit = null) : array
    {
        $condition = $search ? "%$search%" : "%" . '' . "%";
        if(!!$limit) {
            $stmt = $this->db->pdo->prepare("
                SELECT * FROM $this->table WHERE (title LIKE :condition OR content LIKE :condition) AND (title != '' OR content != '') LIMIT :limit
            ");
            $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
        } else {
            $stmt = $this->db->pdo->prepare("
                SELECT * FROM $this->table WHERE (title LIKE :condition OR content LIKE :condition) AND (title != '' OR content != '')
            ");
        }
        $stmt->bindParam(":condition", $condition);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    protected function show (int $id) : object
    {
        $stmt = $this->db->pdo->prepare("
            SELECT * FROM $this->table WHERE id = :id
        ");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    protected function store () : object
    {
        $filename = $this->uploadNewsLetterImage();
        $stmt = $this->db->pdo->prepare("
            INSERT INTO $this->table (title, content, image) VALUES (:title, :content, :image)
        ");
        $stmt->bindParam(":title", $_POST['title']);
        $stmt->bindParam(":content" , $_POST['content']);
        $stmt->bindParam(":image", $filename);
        $stmt->execute();

        $statement = $this->db->pdo->prepare("SELECT * FROM $this->table WHERE id = LAST_INSERT_ID()");
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    protected function update (int $id) : object
    {
        if(isset($_FILES['image']) and $_FILES['image']['error'] == 0 ) $this->deleteNewsLetterImage($id);
        $filename = $this->uploadNewsLetterImage();

        $stmt = $this->db->pdo->prepare("
            UPDATE $this->table SET title = :title, content = :content, image = :image WHERE id = :id
        ");

        $stmt->bindParam(":title", $_POST['title']);
        $stmt->bindParam(":content", $_POST['content']);
        $stmt->bindParam(":image", $filename);
        $stmt->bindParam(":id" , $id);
        $stmt->execute();

        return $this->show($id);

    } 

    protected function destroy (int $id) : void
    {
        $this->deleteNewsLetterImage($id);
        $stmt = $this->db->pdo->prepare("DELETE FROM $this->table WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    private function deleteNewsLetterImage (int $id) : void
    {
        $stmt = $this->db->pdo->prepare("
            SELECT * FROM $this->table WHERE id = :id
        ");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $oldData = $stmt->fetch(PDO::FETCH_OBJ);
        $oldImage = $oldData->image;
        if(isset($oldImage) and $oldImage != '' and $oldImage != null) {
            $oldFilePath = "images/" . $oldImage;
            try {
                unlink($oldFilePath);
            }catch (Error) {
                throw new Error("Error deleting Image");
            }
        }
    } 

    private function uploadNewsLetterImage () :string 
    {
        $uniqueId = uniqid("newsletter_", true);
        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $filename = $uniqueId. '_'. $_FILES['image']['name'];
            $filepatch = $_FILES['image']['tmp_name'];
            move_uploaded_file($filepatch, "images/" . $filename);
        } else {
            $filename = "";
        }

        return $filename;
    }
}
