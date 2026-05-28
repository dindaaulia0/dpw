<?php

class Database {
    private $host     = "localhost";
    private $user     = "root";
    private $password = "";
    private $dbname   = "db_praktikum";
    private $con;

    public function __construct() {
        $this->con = new mysqli($this->host, $this->user, $this->password, $this->dbname);

        if ($this->con->connect_error) {
            die("Koneksi dengan database gagal: " . $this->con->connect_error);
        }
    }

    public function getConnection() {
        return $this->con;
    }


}
?>