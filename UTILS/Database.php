<?php

  class Database {
    private $host;
    private $username;
    private $password;
    private $dbname;
    private $db;
    public function __construct ($host, $username, $password, $dbname) {
      $this->host = $host;
      $this->username = $username;
      $this->password = $password;
      $this->dbname = $dbname;
      $this->db = NULL;
    }
    public function connect () {
      $charset = 'utf8';
      $collate = 'utf8_unicode_ci';
      $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=$charset";
      $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => false,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $charset COLLATE $collate"
      ];
      $this->db = new PDO($dsn, $this->username, $this->password, $options);
    }

    public function readAll($req) {
      if ($this->db === NULL) {die('Base de données non initialisée');}
      return $this->db->query($req)->fetchAll();
    }

    public function readOne($req) {
      if ($this->db === NULL) {die('Base de données non initialisée');}
      return $this->db->query($req)->fetch();
    }
    
    public function insert($req) {
      if ($this->db === NULL) {die('Base de données non initialisée');}
      echo "<br/><br/>Element ajouté<br/><br/>";
      return $this->db->exec($req);
    }
  }




  