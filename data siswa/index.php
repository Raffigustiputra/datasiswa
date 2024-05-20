<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="text-align: center" >
    <h1 style="text-align: center"> MASUKAN DATA </h1>
    <form method="POST" action="">
        <table border ='1' cellpading = '5' align="center">
            <tr>
                <td><label for="nama">Nama :</label></td>
                <td><input type="text" placeholder="Namanya siapa?" name="nama" id="nis"/></td>
        </tr>
        <tr>
            <td><label for="nama">NIS :</label></td>
            <td><input type="text" placeholder="Coba Nisnya" name="nis" id="nis"/></td>
        </tr>
        <tr>
            <td><label for="nama">Rayon :</label></td>
            <td><input type="text" placeholder="Sombong, Rayon sekalian" name="rayon" id="rayon"/></td>
        </tr>
        <tr>
            <td><button colspan="2" type="submit" name="kirim">Kirim</button></td>
            <td><button colspan="2" type="submit" name="reset">Reset</button></td>
        </tr>
</table>
    </form>
<!-- pembuka php -->
<?php
// start session
session_start();

// jika belum ada array, maka kita harus buat
if(isset($_POST['reset'])) {
    session_unset();
}
if(!isset($_SESSION['datasiswa'])) {
    $_SESSION['datasiswa'] = array();
}
// proses menghapus button pada table
if(isset($_GET['hapus'])) {
    $index = $_GET['hapus'];
    unset ($_SESSION['datasiswa'] [$index]);
}

// jika ada maka buat array dari data yang di masukkan
if(isset($_POST['kirim'])) {
if(@$_POST['nama'] && @$_POST['nama'] && @$_POST['nama']) {
    $data = [
        'nama' => $_POST['nama'],
        'nis' => $_POST['nis'],
        'rayon' => $_POST['rayon'],
    ];
    array_push($_SESSION['datasiswa'], $data);
}else {
    echo "<p>Lengkapi Data</p>";
}
}

// var_dump($_SESSION);
if(!empty($_SESSION['datasiswa'])) {
echo '<table>';
echo '<tr>';
echo '<td>Nama</td>';
echo '<td>Nis</td>';
echo '<td>Rayon</td>';
echo '<td>Aksi</td>';
echo '</tr>';

// menampilkan data memakai table
foreach($_SESSION['datasiswa'] as $index => $value) {
    echo '<tr>';
    echo '<td>' . $value['nama'] . '</td>';
    echo '<td>' . $value['nis'] . '</td>';
    echo '<td>' . $value['rayon'] . '</td>';
    echo '<td><a href="?hapus='. $index.'    ">Hapus</a></td>';
    echo '</tr>';
}
echo '</table>';
} else {
    echo "Gaadaan dataa!";
}
?>
</body>
</html>