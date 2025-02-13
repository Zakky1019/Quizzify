<?php

// this file is used, if there are any changes to be done in the database

class loginController extends login
{

    private $username;
    private $password;

    public function __construct($username, $password)
    {

        $this->username = $username;
        $this->password = $password;


    }

    // validation handling

    public function loginUser()
    {
        if ($this->emptyInput() !== false) {
            header('Location: ');
            //debug code
            print_r("empty input");
            exit();
        }

        $this->getUser($this->username, $this->password);

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
