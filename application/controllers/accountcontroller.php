<?php

class AccountController extends Controller {

    function view() {
        $user_id = $_SESSION["user_id"];
        $username = $this->Account->selectUsernameByUserID($user_id);

        $this->set("username", $username);
    }

    function edit() {

        $user_id = $_SESSION["user_id"];

        $username = $this->Account->selectUsernameByUserID($user_id);        
        $name = $this->Account->selectName();
        $email = $this->Account->selectEmailAddress();
        $phone_number = $this->Account->selectPhoneNumber();

        if (isset($_POST["name"])) {
            $this->Account->editInfo($_POST["name"], $_POST["email"], $_POST["phone_number"]);
        }

        $this->set("username", $username);
        $this->set("name", $name);
        $this->set("email", $email);
        $this->set("phone_number", $phone_number);
    }

    function signout() {
        $_SESSION["user_id"] = null;

        header("Location: ./../home");
    }
}