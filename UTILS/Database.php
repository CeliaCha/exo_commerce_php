<?php

  class Database {
    public static $db;
    public static function connect () {
      $host = '127.0.0.1';
      $dbname = 'E_COMMERCE';
      $username = 'root';
      $password = 'rajvena';
      $charset = 'utf8';
      $collate = 'utf8_unicode_ci';
      $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
      $options = [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_PERSISTENT => false,
          PDO::ATTR_EMULATE_PREPARES => false,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $charset COLLATE $collate"
      ];
      self::$db = new PDO($dsn, $username, $password, $options);
    }
    public static function getId($table, $column, $value) {
      //getId('clients', 'nom', 'Gaborit')
      self::handleError();
      return self::$db->query("SELECT id FROM $table WHERE $column = '$value'")->fetch();
    } 
    public static function getLastId($table) {
      self::handleError();
      return self::$db->query("SELECT MAX(id) FROM $table")->fetch()["MAX(id)"];
    } 
    public static function read($table, $column, $id) {
      self::handleError();
      return self::$db->query("SELECT $column FROM $table WHERE id = '$id'")->fetch();
    }
    public static function readAll($table, $column) {
      self::handleError();
      return self::$db->query("SELECT $column FROM $table")->fetchAll();
    }
    protected function handleError () {
      if (self::$db === NULL) {die('Base de données non initialisée');}
    }
  }

  class Client extends Database {
    private $id;
    private $prenom;
    private $nom;
    public function __construct($prenom, $nom) {
      $this->prenom = $prenom;
      $this->nom = $nom;
    }
    public function create() {
      parent::handleError();
      parent::$db->exec("INSERT INTO clients (nom, prenom) VALUES ('$this->nom', '$this->prenom')");
      $this->id = $db->query("SELECT MAX(id) FROM clients")->fetch()["MAX(id)"];
    }
  }

  class Vendeur extends Database {
    private $id;
    private $prenom;
    private $nom;
    public function __construct($prenom, $nom) {
      $this->prenom = $prenom;
      $this->nom = $nom;
    }
    public function create() {
      parent::handleError();
      parent::$db->exec("INSERT INTO vendeurs (nom, prenom) VALUES ('$this->nom', '$this->prenom')");
      $this->id = parent::$db->query("SELECT MAX(id) FROM vendeurs")->fetch()["MAX(id)"];
    }
  }

  class Article extends Database {
    private $id;
    private $nom;
    private $prix;
    private $id_vendeur;
    public function __construct($nom, $prix, $id_vendeur) {
      $this->nom = $nom;
      $this->prix = $prix;
      $this->id_vendeur = $id_vendeur;
    }
    public function create() {
      parent::handleError();
      parent::$db->exec("INSERT INTO articles (nom, prix, id_vendeur) VALUES ('$this->nom', '$this->prix', '$this->id_vendeur')");
      $this->id = parent::$db->query("SELECT MAX(id) FROM articles")->fetch()["MAX(id)"];
    }
  }

  class Commande extends Database {
    private $id;
    private $date;
    private $id_client;
    public function __construct($date, $id_client) {
      $this->date = $date;
      $this->id_client = $id_client;
    }
    public function create() {
      parent::handleError();
      parent::$db->exec("INSERT INTO commandes (_date, id_client) VALUES ('$this->date', '$this->id_client')");
      $this->id = parent::$db->query("SELECT MAX(id) FROM commandes")->fetch()["MAX(id)"];
    }
  }

  class CommandeArticle extends Database {
    private $id;
    private $quantite;
    private $id_art;
    private $id_com;
    public function __construct($quantite, $id_art, $id_com) {
      $this->quantite = $quantite;
      $this->id_art = $id_art;
      $this->id_com = $id_com;
    }
    public function create() {
      parent::handleError();
      parent::$db->exec("INSERT INTO commandes_articles (quantite, id_com, id_art) VALUES ('$this->quantite', '$this->id_art', '$this->id_com')");
      $this->id = parent::$db->query("SELECT MAX(id) FROM commandes_articles")->fetch()["MAX(id)"];
    }
  }

  