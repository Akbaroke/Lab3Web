<?php
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>

<div class="home">
  <div class="head">
    <h1 onclick="location.reload();">Data Products</h1>
    <a href="create"><i class="ti ti-plus"></i> New Product</a>
  </div>
  <div class="breadcrumb">
    <span><i class="ti ti-home-2"></i> Home</span>
  </div>
  <div class="body">
    <table>
      <thead>
        <tr>
          <th>No.</th>
          <th>Image</th>
          <th>Name</th>
          <th>Price</th>
          <th>Stock</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result) {
          $i = 1;
          while ($row = mysqli_fetch_array($result)) {
        ?>
            <tr>
              <td class="no"><?= $i ?>.</td>
              <td class="image">
                <a href="assets/images/<?= $row['gambar'] ?>" target="_blank">
                  <img src="assets/images/<?= $row['gambar'] ?>" alt="<?= $row['nama'] ?>">
                </a>
              </td>
              <td class="name">
                <div>
                  <p><?= $row['nama'] ?></p>
                  <p><?= $row['kategori'] ?></p>
                </div>
              </td>
              <td class="price">
                <div>
                  <div class="buy">
                    <span>buy</span>
                    <p><?= Rupiah($row['harga_beli']) ?></p>
                  </div>
                  <div class="sell">
                    <span>sell</span>
                    <p><?= Rupiah($row['harga_jual']) ?></p>
                  </div>
                </div>
              </td>
              <td class="stock">
                <?php if ($row['stok'] <= 0) {
                  echo '<span>sold out</span>';
                } else {
                  echo $row['stok'];
                }  ?>
              </td>
              <td class="action">
                <div>
                  <a href="update?id=<?= $row['id_barang'] ?>">
                    <i class="ti ti-ballpen"></i>
                  </a>
                  <a href="delete?id=<?= $row['id_barang'] ?>">
                    <i class="ti ti-trash"></i>
                  </a>
                </div>
              </td>
            </tr>
          <?php $i++;
          }
        } else {
          ?>
          <div>
            <p>Data is Empty.</p>
          </div>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>