<?php

class User
{
    private $id;
    private $name;
    private $email;
    private $username;
    private $password;

    public function __construct($name, $email, $username, $password)
    {
        $this->id = uniqid();
        $this->name = $name;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    // Setters
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}