<?php
  class DB {
    private $host;
    private $db_user;
    private $db_password;
    private $db_name;
    public function __construct() {
      $this->host = "localhost";
      $this->db_user = "root";
      $this->db_password = "";
      $this->db_name = "aula_virtual";
    }
    public function connection() {
      try {
        $db_connection = new PDO(
          "mysql:host={$this->host};dbname={$this->db_name}",
          $this->db_user,
          $this->db_password
        );
        return $db_connection;
      }
      catch (PDOException $error) {
        return NULL;
      }
    }
    public function __destruct() {}
  }
?>