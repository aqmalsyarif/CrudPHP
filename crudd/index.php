<?php
include "./services/koneksi.php";

$sql = "SELECT * FROM etalase";
$result = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);


if (isset($_POST['btn-delete'])) {
    $id = $_POST['id']; // Ambil kode barang yang akan dihapus dari form
    $conn->query("DELETE FROM etalase WHERE id = '$id'");
    // Setelah menghapus data, Anda mungkin ingin me-refresh halaman agar data terbaru ditampilkan
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
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
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div class="text-center lg:text-left">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga Barang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $row): ?>
                                <tr>
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["nama"]; ?></td>
                                    <td><?php echo $row["harga"]; ?></td>
                                    <td>
                                        <a href="services/edit.php?id=<?php echo $row["id"]; ?>" <button class="btn btn-xs">edit</button>
                                        </a>
                                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="display: inline;">
                                            <!-- Input hidden untuk menyimpan kode barang -->
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" class="btn btn-xs" name="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                <form class="card-body" method="POST" action="services/input.php">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">ID Barang</span>
                        </label>
                        <input type="text" placeholder="id barang" name="id" class="input input-bordered" required />
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nama Barang</span>
                        </label>
                        <input type="text" placeholder="nama barang" name="nama" class="input input-bordered"
                            required />
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Harga Barang</span>
                        </label>
                        <input type="text" placeholder="harga barang" name="harga" class="input input-bordered"
                            required />
                    </div>
                    <div class="form-control mt-6">
                        <button class="btn btn-primary" name="btnipt">Input Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>