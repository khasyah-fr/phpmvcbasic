<?php 

class User_model {
    private $nama= 'Laura';

    public function getUser() 
    {
        return $this->nama;
    }

    public function setUser($name) 
    {
        $this->nama = $name;
    }
}