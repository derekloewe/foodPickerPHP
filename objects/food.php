<?php
class Food{
    //db connection and tabler name
    private $conn;
    private $table_name = "food";
    private $db_name="darklion_foodPicker";

    //object props
    public $idfood;
    public $name;
    public $type;
    public $side;

   // constructor with $db as database connection
   public function __construct($db){
    $this->conn = $db;
}

    function read(){
        $query = "SELECT * FROM " . $this->table_name;

        //prepare query
        $stmt = $this->conn->prepare($query);

        //exuecute
        $stmt->execute();

        return $stmt;
    }

    function readRandom(){
        $query = "SELECT * FROM " . $this->table_name ." ORDER BY RAND() LIMIT 1";

        //prepare query
        $stmt = $this->conn->prepare($query);

        //exuecute
        $stmt->execute();

        return $stmt;
    }
}
?>