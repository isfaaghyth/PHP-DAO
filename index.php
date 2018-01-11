<?php
   include_once 'top.php';
   include_once 'db/mahasiswa.php';
?>

<?php $mhs = new Mahasiswa(); ?>

<div class="container">
   <div class="row">
      <h1><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
         Welcome to STT-NF</h1>
         <br>
      <button
         type="button"
         name="button"
         onclick="window.location.href='insert.php'"
         class="btn btn-primary">
            Tambah Data
      </button>
   </div>
   <br>
   <div class="row">
      <table class="table table-bordered">
         <thead>
            <tr>
               <th>Nama Lengkap</th>
               <th>Nim</th>
               <th>Jurusan</th>
               <th>action</th>
            </tr>
         </thead>
         <tbody>
            <?php
               foreach ($mhs->getAll() as $row) {
                  echo "<tr>";
                  echo "<td>" . $row['name'] . "</td>";
                  echo "<td>" . $row['nim'] . "</td>";
                  echo "<td>" . $row['study'] . "</td>";
                  echo "<td>";
                  echo "<a href='detail.php?id=" . $row['id'] . "'>Detail</a>";
                  echo "</td>";
               }
            ?>
         </tbody>
      </table>
   </div>
</div>

<?php include_once 'bottom.php'; ?>
