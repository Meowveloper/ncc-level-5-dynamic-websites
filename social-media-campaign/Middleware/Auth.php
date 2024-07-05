<?php 
namespace Middleware;

class Auth
{
    public static function isGuest () : bool 
    {
        
        return !isset($_SESSION['user']);
    }

    public static function matchUserType (int $pageType) : void
    {
        /* 0 = guest, 1= admin, 2 = user */
        if(static::isGuest()) $userType = 0;
        else $userType = $_SESSION['user']->role == 1 ? 1 : 2;

        if($pageType == $userType) {
            return;
        } else {
            if($userType == 0) header("location:login.php");
            if($userType == 1) header("location:admin-home.php");
            if($userType == 2) header("location:home.php");
            exit();
        }
        
    }
}