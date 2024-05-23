<?php

include "./koneksi.php";

if(isset ($_GET["id"])) {
    $id = $_GET["id"];
    $result = $conn->query("SELECT * FROM etalase WHERE id = $id")->fetch_assoc();
}

if(isset($_POST["btnedt"])) {
    $id = $_GET["id"];
    $nama = $_POST["nama"];
    $harga = $_POST["harga"];

    $conn->query("UPDATE etalase SET id = '$id', nama = '$nama', harga = '$harga' WHERE id = $id");
    header("location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <form class="card-body" method="POST" action="">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">ID Barang</span>
                </label>
                <input type="text" placeholder="id barang" name="id" value="<?php echo $result["id"]; ?>" class="input input-bordered" required />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Nama Barang</span>
                </label>
                <input type="text" placeholder="nama barang" name="nama" value="<?php echo $result["nama"]; ?>" class="input input-bordered" required />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Harga Barang</span>
                </label>
                <input type="text" placeholder="harga barang" name="harga" value="<?php echo $result["harga"]; ?>" class="input input-bordered" required />
            </div>
            <div class="form-control mt-6">
                <button class="btn btn-primary" name="btnedt">Edit</button>
            </div>
        </form>
    </div>
</body>

</html>