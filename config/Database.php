<?php 
  class Database {
    // DB params
    private $host = 'localhost';
    private $db_name = 'phprestapi';
    private $username = '';
    private $password = '';
    private $conn;
    
    // DB connection
    public function connect() {
      $this->conn = null;

      try {
        $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $ex) {
        echo 'Connection ERROR: '.$ex->getMessage();
      }

      return $this->conn;
    }
  }