<?php

//Movie.php

class Actor {
    protected $id; 
    protected $firstname;
    protected $lastname;
    

     public function id(){
        return $this->id;
    }

    public function firstname(){
        return $this->firstname;
    }

    public function lastname(){
        return $this->lastname;
    }




    // setting

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
        return $this;

    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
        return $this;

    }
}
