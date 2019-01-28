<?php

//Movie.php

class Category {
    protected $id; 
    protected $title;
    protected $description;
    

     public function id(){
        return $this->id;
    }

    public function title(){
        return $this->title;
    }

    public function description(){
        return $this->description;
    }




    // setting

    public function setTitle($title) {
        $this->title = $title;
        return $this;

    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;

    }

}
