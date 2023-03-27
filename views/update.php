<?php
$id = $_GET['id'];
$sql = "SELECT * FROM data_barang WHERE id_barang = '{$id}'";
$result = mysqli_query($conn, $sql);
if (!$result) die('Error: Data tidak tersedia');
$data = mysqli_fetch_array($result);

?>

<div class="form">
  <div class="head">
    <h1 onclick="window.location.href='home'">Update Product</h1>
  </div>
  <div class="breadcrumb">
    <span onclick="window.history.go(-1)" class="active"><i class="ti ti-home-2"></i> Home</span>
    <i class="ti ti-chevron-right"></i>
    <span>Update Product</span>
  </div>
  <div class="body">
    <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $data['id_barang'] ?>" />
      <div>
        <label for="nama">Name</label>
        <input type="text" name="nama" placeholder="name product" maxlength="20" value="<?= $data['nama'] ?>" required>
      </div>
      <div>
        <label for="kategori">Category</label>
        <select name="kategori" required>
          <option value="">- choose -</option>
          <option <?= isSelected('Komputer', $data['kategori']) ?> value="Komputer">Komputer</option>
          <option <?= isSelected('Elektronik', $data['kategori']) ?> value="Elektronik">Elektronik</option>
          <option <?= isSelected('Handphone', $data['kategori']) ?> value="Handphone">Handphone</option>
        </select>
      </div>
      <div>
        <label for="harga_beli">Price Buy</label>
        <input type="number" name="harga_beli" placeholder="5000" value="<?= $data['harga_beli'] ?>" required>
      </div>
      <div>
        <label for="harga_jual">Price Sell</label>
        <input type="number" name="harga_jual" placeholder="10000" value="<?= $data['harga_jual'] ?>" required>
      </div>
      <div>
        <label for="stok">Stock</label>
        <input type="number" name="stok" placeholder="1" value="<?= $data['stok'] ?>" required>
      </div>
      <div class="image">
        <label for="image">File Image</label>
        <label for="image">
          <div>
            <i class="ti ti-cloud-upload"></i>
            <p>- select image -</p>
          </div>
        </label>
        <input type="file" id="image" name="image">
        <div id="selectedBanner" style="z-index: 10;">
          <img src="assets/images/<?= $data['gambar'] ?>" alt="">
        </div>
      </div>
      <button type="submit" name="update">save</button>
    </form>
  </div>
</div>