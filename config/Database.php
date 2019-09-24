<?php 
  include_once '../sec.php';

  class Database {
    // DB params
    private $host = $hostsec;
    private $db_name = $db_namesec;
    private $username = $usernamesec;
    private $password = $passwordsec;
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