<?php
   include_once 'top.php';
   include_once 'db/mahasiswa.php';
   $mhsById = new Mahasiswa();
?>

<div class="container">
   <div class="row">
      <h1>Insert Data</h1>
      <form action="<?php $_PHP_SELF ?>" method="post">
            <p>Nama Lengkap:</p>
            <input type="text" name="txtNama" class="form-control">
            <p>Nim:</p>
            <input type="text" name="txtNim" class="form-control">
            <p>Program Studi:</p>
            <input type="text" name="txtProdi" class="form-control">
            <br>
            <input type="submit" name="insertData" value="TAMBAHKAN" class="btn btn-warning">
      </form>
   </div>
</div>

<?php
   if (isset($_POST['insertData'])) {
      $nama = $_POST['txtNama'];
      $nim = $_POST['txtNim'];
      $prodi = $_POST['txtProdi'];
      $tambahData = $mhsById->insert($nama, $nim, $prodi);
      if ($tambahData) { //kalau true, maka..
         header("location:index.php");
      } else {
         echo "maaf, data gagal di tambahkan";
      }
   }
?>

<?php include_once 'bottom.php'; ?>
