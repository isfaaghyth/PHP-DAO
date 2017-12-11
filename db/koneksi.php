<?php
   class Koneksi {
      private $SERVER = "localhost";
      private $DATABASE = "latihan";
      private $USERNAME = "root";
      private $PASSWORD = "";

      private $koneksi;

      public function __construct() {
         try {
            $dsn = "mysql:host=" . $this->SERVER . ";dbname=" . $this->DATABASE;
            $this->koneksi = new PDO($dsn, $this->USERNAME, $this->PASSWORD);
         } catch (PDOException $e) {
            echo $e->getMessage();
         }
      }

      function getKoneksi() {
         return $this->koneksi;
      }
   }
?>
