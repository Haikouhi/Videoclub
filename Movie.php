<?php

//Movie.php

class Movie {
    protected $id; 
    protected $title;
    protected $release_date;
    protected $plot; 
    protected $id_category;


     public function id(){
        return $this->id;
    }

    public function title(){
        return $this->title;
    }

    public function release_date(){
        return $this->release_date;
    }

    public function plot(){
        return $this->plot;
    }

    public function id_category(){
        return $this->id_category;
    }



    // setting

    public function setTitle($title) {
        $this->title = $title;
        return $this;

    }

    public function setRelease_date($release_date) {
        $this->release_date = $release_date;
        return $this;

    }

    public function setPlot($plot) {
        $this->plot = $plot;
        return $this;

    }

    public function setCategory(Category $category) {
        $this->category = $category;
        return $this;

    }

}
