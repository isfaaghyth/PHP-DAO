<?php
   include_once 'top.php';
   include_once 'db/mahasiswa.php';
   $mhsById = new Mahasiswa();
?>

<div class="container">
   <div class="row">
      <h1>Detail</h1>
      <?php
         $id = isset($_GET['id']) ? $_GET['id'] : 'undefined';
         if ($id !== 'undefined') $mhsById = $mhsById->getById($id);
      ?>
      <form action="<?php $_PHP_SELF ?>" method="post">
         <?php foreach($mhsById as $mhs) {
            $nama    = $mhs['name']; //ini sesuai nama column di database
            $nim     = $mhs['nim']; //ini sesuai nama column di database
            $prodi   = $mhs['study']; //ini sesuai nama column di database
         ?>
            <p>Nama Lengkap:</p>
            <input type="text" name="txtNama" value="<?=$nama?>" class="form-control">
            <p>Nim:</p>
            <input type="text" name="txtNim" value="<?=$nim?>" class="form-control">
            <p>Program Studi:</p>
            <input type="text" name="txtProdi" value="<?=$prodi?>" class="form-control">
            <br>
            <input type="submit" name="update" value="PERBAHARUI" class="btn btn-warning">
            <input type="submit" name="delete" value="HAPUS" class="btn btn-danger">
         <?php } ?> <!-- ini penutup foreach -->
      </form>
   </div>
</div>

<?php
   if (isset($_POST['delete'])) {
      $mhsDelete = new Mahasiswa();
      if ($mhsDelete->deleteById($id) == TRUE) {
         header("location:index.php");
      } else {
         echo "Maaf, data tidak bisa dihapus.";
      }
   } else if (isset($_POST['update'])) {
      $name = $_POST['txtNama'];
      $nim = $_POST['txtNim'];
      $study = $_POST['txtProdi'];
      $mhsUpdate = new Mahasiswa();
      if ($mhsUpdate->updateById($id, $name, $nim, $study)) {
         header("location:index.php");
      } else {
         echo "Maaf, gagal memperbaharui.";
      }
   }
?>

<?php include_once 'bottom.php'; ?>
