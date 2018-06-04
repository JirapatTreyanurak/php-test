<?php

$db = new Database();

class Database {
    
    private $connection;

    function __construct () {
        global $config;
        $this->connection = new PDO(
            "mysql:host={$config["db"]["host"]};dbname={$config["db"]["dbname"]}",
            $config["db"]["username"],
            $config["db"]["password"]
        );
        if ($this->connection->connect_error) {
            die("Failed to connect to the database: " . $this->connection->connect_error);
        }
    }

    function __destruct () {
        $this->connection = null;
    }

    function getMembers () {
        $stmt = $this->connection->prepare(
            "SELECT username FROM member ORDER BY username"
        );
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $result;
    }

    function isAMember ($name) {
        $stmt = $this->connection->prepare(
            "SELECT username FROM member WHERE username = ?"
        );
        $stmt->execute(array($name));
        $result = count($stmt->fetchAll(PDO::FETCH_ASSOC)) > 0;
        $stmt = null;
        return $result;
    }

    function register ($name) {
        $stmt = $this->connection->prepare(
            "INSERT INTO member (username) VALUE (?)"
        );
        $stmt->execute(array($name));
        $stmt = null;
    }

}

?>
