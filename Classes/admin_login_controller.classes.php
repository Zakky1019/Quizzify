<?php
// admin-login-controller.classes.php


class AdminLoginController extends AdminLogin
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function loginAdmin()
    {
        if ($this->emptyInput() !== false) {
            header('Location: ');
            //debug code
            print_r("empty input");
            exit();
        }

        
        $this->getAdmin($this->username, $this->password);
    }
    private function emptyInput()
    {

        if (empty($this->username) || empty($this->password)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

}
