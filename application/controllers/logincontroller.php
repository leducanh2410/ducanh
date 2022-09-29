<?php

class LoginController extends Controller {

function view() {
    $this->set('title', 'Login');
    $this->set('description', 'Login to system');

    /** Initialize value to pass to views **/
    if (isset($_POST["username"])) {
        $username = $_POST['username'];
	    $password = md5($_POST['password']);

        if (!$username || !$password) {
            echo "<script>alert('Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.')</script>";
            exit;
        }

        if ($this->Login->checkLogin($username, $password)) {
            $user_id = $this->Login->getUserID($username);

            $_SESSION["user_id"] = $user_id;
            $_SESSION["user_type"] = $this->Login->getTypeUser($user_id);
    
            // Check to see what page user first visited
            if(isset($_SESSION['url'])) {
                $url = $_SESSION['url'];
            } else {
                $url = "./";
            }
            
            // Redirect user to page they initially visited
            header("Location: $url");
        }
        else {
            echo "<script>alert('Woops! Username or Password is Wrong.')</script>";
        }
        
    }
    
	

    /** Pass value to views **/
   
}
}