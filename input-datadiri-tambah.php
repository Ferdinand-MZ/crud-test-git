<div class="container">
<h1>Tambah Data</h1>
<form action="input-datadiri-tambah.php" method="POST">
<label for="nis">Nomor Induk Siswa :</label>
<input class="form-control" type="number" name="nis" placeholder="Ex. 12003102" /><br>

<label for="namalengkap">Nama Lengkap :</label>
<input class="form-control" type="text" name="namalengkap" placeholder="Ex. Maulana" /><br>

<label for="tanggal_lahir">Tanggal Lahir :</label>
<input class="form-control" type="date" name="tanggal_lahir" /><br>

<label for="nilai">Nilai : </label><br>
<input class="form-control" type="number" name="nilai" placeholer="Ex. 80.56" />

<input  class='btn btn-success btn-sm' type="submit" name="simpan" value="Simpan Data" />
<a  class='btn btn-primary btn-sm' href="input-datadiri.php">Kembali</a>
</form>

<?php
include ('./input-config.php');
if ($_SESSION["login"] != TRUE) {
    header('location:login.php');

}
if ($_SESSION["role"] != "admin") {
    echo "
    <script>
         alert('Kamu bukan admin !!!');
         window.location='input-datadiri.php';
         </script>
    ";
    }

 if(isset($_POST["simpan"])){
     $nis = $_POST["nis"];
     $namalengkap = $_POST["namalengkap"];
     $tanggal_lahir = $_POST["tanggal_lahir"];
     $nilai = $_POST["nilai"];

    echo $nis . "<br>";
    echo $namalengkap . "<br>";
    echo $tanggal_lahir . "<br>";
    echo $nilai . "<br>";

    // CREATE - Menambahkan Data ke Database
    $query = "
        INSERT INTO datadiri VALUES
        ('$nis', '$nama', '$tanggal_lahir', '$nilai');
    ";
    echo $query;
    $insert = mysqli_query($mysqli, $query);

    if ($insert){
        echo "
        <script>
         alert('Data berhasil ditambahkan');
         window.location='input-datadiri.php';
         </script>
        ";
    }
}
?>