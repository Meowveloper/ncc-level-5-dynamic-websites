<?php
namespace Controllers;

require_once ('Model/Member.php');
use Model\Member;
use PDOException;

class MemberController extends Member
{
    public function register(bool $isScriber): void
    {
        try {
            session_start();
            $member = $this->store($isScriber);
            $_SESSION['user'] = $member;
            header("location:index.php");
        } catch(PDOException $err) {
            $message = $err->getMessage();
            header("location:register.php?registerError=1&message=$message");
        }
    }
}