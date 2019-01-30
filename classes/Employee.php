<?php

// Category.php

class Employee extends Db {

    /**
     * Attributs
     */
    protected $id;
    protected $firstname;
    protected $lastname;
    protected $position;
    protected $employement_date;

    /**
     * Constantes
     */

    const TABLE_NAME = "Employee";

    /**
     * Méthodes magiques
     */
    public function __construct($firstname, $lastname, $position, $employement_date, $id = null) {
        $this->setFirstname($firstname);
        $this->setLastname($lastname);
        $this->setPosition($position);
        $this->setEmployement_date($employement_date);

        if (isset($id)) {
            $this->id = $id;
        }
    }

    /**
     * Getters
     */
    public function id() {
        return $this->id;
    }

    public function firstname() {
        return $this->firstname;
    }

    public function lastname() {
        return $this->lastname;
    }

    public function position() {
        return $this->position;
    }

    public function employement_date() {
        return $this->employement_date;
    }

    /**
     * Setters
     */
    public function setFirstname($firstname) {
        $this->firstname = $firstname;
        return $this;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
        return $this;
    }

    public function setPosition($position){

       $positionAcceptee = ['accounting', 'seller', 'marketing'];

       if( !in_array( $position, $positionAcceptee) ) {
           echo "This job title is incorrect.";
       }
       else {
           $this->position = $position;
       }
       return $this;
   }

    public function setEmployement_date() {
        $this->employement_date = $employement_date;
        return $this;
    }

    /**
     * Methods
     */

    public function save() {


        $data = [
            "firstname"         => $this->firstname(),
            "lastname"          => $this->lastname(),
            "position"          => $this->position(),
            "employement_date"  => $this->employement_date()
        ];

        if ($this->id > 0) {
            $data["id"] = $this->id();

            $this->dbUpdate(self::TABLE_NAME, $data);
            return $this;
        }

        $this->id = $this->dbCreate(self::TABLE_NAME, $data);

        return $this;
    }

    public function delete() {

        $data = [
            'id' => $this->id(),
        ];
        
        $this->dbDelete(self::TABLE_NAME, $data);

        return;
    }

    public static function findAll() {
        return Db::dbFind(self::TABLE_NAME);
    }

    public static function find(array $request) {
        return Db::dbFind(self::TABLE_NAME, $request);
    }

    public static function findOne(int $id) {

        $element = Db::dbFind(self::TABLE_NAME, [
            ['id', '=', $id]
        ]);

        $cat = new Employee($element['firstname'], $element['lastname'], $element['position'], $element['employement_date'], $element['id']);

        return $cat;
    }

}
