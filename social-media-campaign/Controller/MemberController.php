<?php

namespace Controller;

require_once('Model/Member.php');

use Exception;
use Model\Member;
use PDOException;

class MemberController extends Member
{

    public function searchOrGetAllMembers(string $search = ''): array
    {
        $data = $this->index($search);
        return $data;
    }

    public function findOrFail(string $id): object
    {
        return $this->show($id);
    }
    public function register(bool $isScriber = false, bool $isAdmin = false, bool $isOwner = false): void
    {
        try {
            $member = $this->store($isScriber, $isAdmin, $isOwner);
            $member->password = '********';
            $_SESSION['user'] = $member;
            header("location:index.php");
        } catch (PDOException $err) {
            $message = $err->getMessage();
            header("location:register.php?registerError=1&message=$message");
        }
    }

    public function changeRoleFromContactList (string $id, bool $isAdmin) : void 
    {
        $this->changeRole($id, $isAdmin);
        header("location:member-list.php");
        exit();
    }

    public function changeSubscriptionFromNewsLetter (string $id, bool $isSubscriber) : void {
        $this->changeSubscription($id, $isSubscriber);
        $_SESSION['user']->subscription = $isSubscriber ? 1 : 0;
        header("location:newsletter.php");
        exit();
    }

    public function delete (string $id) : void 
    {
        $this->destroy($id);
        header("location:member-list.php");
        exit();
    }

    public function login(): void
    {
        if (isset($_SESSION['login_attempt_time'])) {
            $loginAttemptTime = $_SESSION['login_attempt_time'];
        } else {
            $loginAttemptTime = 0;
        }
        try {
            $member = $this->showWithEmail();
            if ($member->password == $_POST['password']) {
                $member->password = '********';
                $_SESSION['user'] = $member;
                header("location:home.php");
            } else {
                $message = "Wrong Password";
                header("location:login.php?error=1&errorMessage=$message");
                $_SESSION['login_attempt_time'] = $loginAttemptTime + 1;
                $_SESSION['login_attempt_time_expires'] = time() + (60 * 5);
            }
        } catch (PDOException $err) {
            $message = $err->getMessage();
            header("location:login.php?error=1&errorMessage=$message");
            $_SESSION['login_attempt_time'] = $loginAttemptTime + 1;
            $_SESSION['login_attempt_time_expires'] = time() + (60 * 5);
        }
    }

    public function checkLogInAttemptTimes () : bool 
    {
        if(isset($_SESSION['login_attempt_time']) and isset($_SESSION['login_attempt_time_expires'])) : 
            if($_SESSION['login_attempt_time_expires'] < time()) {
                unset($_SESSION['login_attempt_time']);
                unset($_SESSION['login_attempt_time_expires']);
                return true;
            } else {
                if($_SESSION['login_attempt_time'] >= 5) {
                    return false;
                } else {
                    return true;
                };
            }
            

        else : return true;
        endif;
    }


}
