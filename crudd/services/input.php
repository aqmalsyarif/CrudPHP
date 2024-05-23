<?php

include "./koneksi.php";

if(isset($_POST['btnipt'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];

    $conn->query("INSERT INTO etalase VALUES('$id', '$nama', '$harga')");
}

header("location:../index.php") ;