<?php
include("koneksi.php");
include_once("fungsi.php");

// query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="style.css" rel="stylesheet" type="text/css" />

  <!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Data Barang</title>

</head>

<body>
  <div class="container">
    <div class="head">
      <h1>Data Barang</h1>
      <button ><i class="fa-solid fa-plus"></i></button>
    </div>
    <div class="main">
      <table>
        <tr>
          <th>No.</th>
          <th>Gambar</th>
          <th>Nama Barang</th>
          <th>Katagori</th>
          <th>Harga Jual</th>
          <th>Harga Beli</th>
          <th>Stok</th>
          <th>Aksi</th>
        </tr>
        <?php if ($result) : ?>
          <?php $i = 1;
          while ($row = mysqli_fetch_array($result)) : ?>
            <tr>
              <td><?= $i ?>.</td>
              <td>
                <a href="gambar/<?= $row['gambar']; ?>" target="_blank">
                  <img src="gambar/<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>">
                </a>
              </td>
              <td><?= $row['nama']; ?></td>
              <td><?= $row['kategori']; ?></td>
              <td><?= rupiah($row['harga_beli']) ?></td>
              <td><?= rupiah($row['harga_jual']) ?></td>
              <td><?php if ($row['stok'] == 0) {
                    echo '<p class="habis">habis</p>';
                  } else {
                    echo $row['stok'];
                  } ?></td>
              <td>
                <div class="aksi">
                    <a href="ubah.php?id=<?= $row['id_barang']; ?>">
                    <i class="fa-solid fa-pen"></i>
                  </a>
                  <a href="hapus.php?id=<?= $row['id_barang']; ?>">
                    <i class="fa-solid fa-trash"></i>
                  </a>
                </div>
              </td>
            </tr>
          <?php $i++;
          endwhile;
        else : ?>
          <tr>
            <td colspan="7">Belum ada data</td>
          </tr>
        <?php endif; ?>
      </table>
    </div>
  </div>
</body>

</html>