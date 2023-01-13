<?php


namespace portalove;

use PDO;
use PDOException;

class DB
{
    private $host, $dbName, $username, $password, $port, $connection;

    /**
     * @param $host
     * @param $dbName
     * @param $username
     * @param $password
     * @param $port
     */
    public function __construct($host, $dbName, $username, $password, $port = 3306)
    {

        $this->host = $host;
        $this->dbName = $dbName;
        $this->username = $username;
        $this->password = $password;
        $this->port = $port;


        try {
            /*  $host = "localhost";
              $dbName = "portalove-riesenia";
              $username = "root";
              $password = "";
              $dbh = null;*/
            $this->connection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName, $this->username, $this->password);


            //die();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }



    /**
     * @return mixed
     */




    public function deleteNote($author)
    {
        $sql = 'DELETE FROM notes WHERE author=' . '"' . $author . '"';
        $this->connection->query($sql);
    }

    public function insertItem($text, $author, $position)
    {
        $currentDateTime = date("Y-m-d H:i:s", time());

        $sql = "INSERT INTO notes (text, author, position, created_at, updated_at) VALUE('" . $text . "','" . $author . "','" . $position . "','" . $currentDateTime . "','" . $currentDateTime . "')";
        //die($sql);
        try {
            $this->connection->exec($sql);
            return true;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            return false;
        }


    }

    public function deleteItemById($id)
    {

        $sql = "DELETE FROM notes WHERE id=" . $id;
        //die($sql);
        try {
            $this->connection->exec($sql);
            return true;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            return false;
        }


    }

    public function getItem()
    {

        $notes = [];

        $sql = "SELECT * FROM notes";
        $query = $this->connection->query($sql);

        while ($row = $query->fetch()) {
            $notes[] = [
                "id" => $row['id'],
                "text" => $row['text'],
                "author" => $row['author'],
                "position" => $row['position']
            ];

        }

        return $notes;
    }



    public function updateItem($id, $text, $author, $position)
    {
        $currentDateTime = date("Y-m-d H:i:s", time());

        $sql = "UPDATE notes SET text=". "'" . $text . " ', author='" . $author . "', position='" . $position . "', created_at='" . $currentDateTime . "', updated_at='" . $currentDateTime . "' WHERE id='". $id ."'";
        //die($sql);

        try {
            $this->connection->exec($sql);
            return true;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            return false;
        }


    }
}

