<?php

// Category.php

class Customer extends Db {

    /**
     * Attributs
     */
    protected $id;
    protected $firstname;
    protected $lastname;
    protected $status;

    /**
     * Constantes
     */

    const TABLE_NAME = "Customer";

    /**
     * Méthodes magiques
     */
    public function __construct($firstname, $lastname, $status, $id = null) {
        $this->setFirstname($firstname);
        $this->setLastname($lastname);
        $this->setStatus($status);

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

    public function status() {
        return $this->status;
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


    public function setStatus($status){

       $statusAcceptee = ['regular', 'vip', 'premium'];

       if( !in_array( $status, $statusAcceptee) ) {
           echo "this status is not correct.";
       }
       else {
           $this->status = $status;
       }
       return $this;
    }
    
    /**
     * Methods
     */

    public function save() {


        $data = [
            "firstname"         => $this->firstname(),
            "lastname"          => $this->lastname(),
            "status"          => $this->status()
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

        $cat = new Customer($element['firstname'], $element['lastname'], $element['status'], $element['id']);

        return $cat;
    }

}
