<?php
   include_once 'koneksi.php';

   class Mahasiswa {
      private $tableName = 'mahasiswa';
      private $koneksi = null;

      public function __construct(){
         $db = new Koneksi();
         $this->koneksi = $db->getKoneksi();
      }

      public function getAll() {
         $sql = "SELECT * FROM " . $this->tableName;
         $con = $this->koneksi->prepare($sql);
         $con->execute();
         return $con->fetchAll();
      }

      public function getById($id) {
         $sql = "SELECT * FROM " . $this->tableName . " WHERE id=" . $id;
         $con = $this->koneksi->prepare($sql);
         $con->execute();
         return $con->fetchAll();
      }

      public function deleteById($id) {
         $sql = "DELETE FROM " . $this->tableName . " WHERE id=" . $id;
         return $this->koneksi->exec($sql);
      }

      public function updateById($id, $name, $nim, $study) {
         $sql = "UPDATE " . $this->tableName
                          . " SET name='" . $name
                          . "' && nim=" . $nim
                          . " && study='" . $study
                          . "' WHERE id=" . $id;
         return $this->koneksi->query($sql);
      }
   }
?>
