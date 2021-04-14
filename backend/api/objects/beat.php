<?php

class Beat
{

    private $conn;
    private $table_name = "beatsdata";

    public $id;
    public $title;
    public $path;
    public $producer;
    public $beatkey;
    public $bpm;
    public $price;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read()
    {

        $query = "SELECT 
                    p.title, p.id, p.path, p.link, p.producer, p.beatkey, p.bpm, p.price
                 FROM
                    " . $this->table_name . " p
                    ";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    function create()
    {
        $query = "INSERT INTO
                " . $this->table_name . "
                SET
                    title=:title, path=:path, producer=:producer, beatkey=:beatkey, bpm=:bpm, price=:price";

        $stmt = $this->conn->prepare($query);

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->path = htmlspecialchars(strip_tags($this->path));
        $this->producer = htmlspecialchars(strip_tags($this->producer));
        $this->beatkey = htmlspecialchars(strip_tags($this->beatkey));
        $this->bpm = htmlspecialchars(strip_tags($this->bpm));

        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":path", $this->path);
        $stmt->bindParam(":producer", $this->producer);
        $stmt->bindParam(":beatkey", $this->beatkey);
        $stmt->bindParam(":bpm", $this->bpm);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function delete($id)
    {
        $column = "ID";

        $query = "DELETE
                 FROM
                    " . $this->table_name . "
                 WHERE 
                    ". $column . "='". $id ."'  
                 ";

        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function update($title, $id) {
        $query="UPDATE beatsdata
               SET title='$title' where id='$id'";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

    function search($where, $parameter) {
        $query = "SELECT 
                    `link`
                 FROM
                    ". $this->table_name ."
                 WHERE 
                    ". $where . "='". $parameter ."'  
                 ";
        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }
}

