<?php
class SignupController extends Controller {
    function view() {
        $this->set('title', 'signup');
        $this->set('description', 'List of book');

        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone_number = $_POST['phone_number'];
            $password = md5($_POST['password']);
            $cpassword = md5($_POST['cpassword']);
        
            if ($password == $cpassword) {
                if ($this->Signup->checkUsername($username)) {
                    echo "<script>alert('Woops! Username Already Exists.')</script>";
                    exit();
                } 
                else {
                    $user_id = $this->Signup->addUser($username);
                    $this->Signup->addName($user_id, $name);
                    $this->Signup->addEmail($user_id, $email);
                    $this->Signup->addPhoneNumber($user_id, $phone_number);
                    $this->Signup->addPassword($user_id, $password);

                    $this->Signup->addBooklist($user_id);

                    echo "<script>alert('Wow! User Registration Completed.')</script>";

                    // Check to see what page user first visited
                    if(isset($_SESSION['url'])) {
                        $url = $_SESSION['url'];
                    } else {
                        $url = "./";
                    }
                    
                    // Redirect user to page they initially visited
                    header("Location: $url");

                    echo "<script>alert('Wow! User Registration Completed.')</script>";                    
                }
                
            } 
            else {
                echo "<script>alert('Password Not Matched.')</script>";
            }
        }
}

}