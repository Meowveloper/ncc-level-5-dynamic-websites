<?php
namespace Model;
require_once("DataBase.php");
use Model\DataBase;
use PDO;

class SocialMediaApp
{
    private $db;
    private $table = "social_media_apps";

    public function __construct()
    {
        $this->db = DataBase::getInstance();
    }

    protected function index (string $search = '') : array
    {   
        $condition = "%". $search ."%";
        $stmt = $this->db->pdo->prepare("
            SELECT * FROM $this->table WHERE (link LIKE :condition OR name LIKE :condition) AND (link != '' AND name != '')
        ");
        $stmt->bindParam(":condition", $condition);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    protected function show(int $id) : object
    {
        $stmt = $this->db->pdo->prepare("
            SELECT * FROM $this->table WHERE id = :id
        ");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    protected function store() : object
    {
        if(
            isset($_FILES['logo']) and
            $_FILES['logo']['error'] == 0 
        ) $fileName = $this->uploadLogo();
        else $fileName = '';
        $stmt = $this->db->pdo->prepare("
            INSERT INTO $this->table (name, logo, link, privacy_link) VALUES (:name, :logo, :link , :privacy_link)
        ");
        $stmt->bindParam(":name", $_POST['name']);
        $stmt->bindParam(":logo", $fileName);
        $stmt->bindParam(":link", $_POST['link']);
        $stmt->bindParam(":privacy_link", $_POST['privacy_link']);
        $stmt->execute();

        $stmt = $this->db->pdo->prepare("
            SELECT * FROM $this->table WHERE id = LAST_INSERT_ID()
        ");
        $stmt->execute();
        return $stmt->fetchObject();

    }

    protected function update (int $id) : object
    {
        if(isset($_FILES['logo']) and $_FILES['logo']['error'] == 0) {
            $this->deleteOldLogo($id);
            $fileName = $this->uploadLogo();
        } else $fileName = '';

        $stmt = $this->db->pdo->prepare("
            UPDATE $this->table SET name = :name, logo = :logo, link = :link, privacy_link = :privacy_link WHERE id = :id
        ");
        $stmt->bindParam(":name", $_POST['name']);
        $stmt->bindParam(":logo", $fileName);
        $stmt->bindParam(":link", $_POST['link']);
        $stmt->bindParam(":privacy_link", $_POST['privacy_link']);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $this->show($id);

    }

    protected function destroy (int $id) : void
    {
        if(!isset($id) or $id < 1) return;
        $this->deleteOldLogo($id);
        $stmt = $this->db->pdo->prepare("
            DELETE FROM $this->table WHERE id = :id
        ");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    private function uploadLogo () : string
    {
        $uniqueId = uniqid("social_media_apps_", true);
        $fileName = $uniqueId . '_' . $_FILES['logo']['name'];
        $tmp = $_FILES['logo']['tmp_name'];
        move_uploaded_file($tmp, "images/". $fileName);
        return $fileName;
    }

    private function deleteOldLogo (int $id) : void
    {
        $oldImagePath = $this->show($id);
        $oldImagePath = ($oldImagePath->logo != '' or isset($oldImagePath->logo)) ? "images/" . $oldImagePath->logo : '';
        if (isset($oldImagePath) or $oldImagePath != '') unlink($oldImagePath);
        else return;
    }
}