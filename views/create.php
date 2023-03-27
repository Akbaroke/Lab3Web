<div class="form">
  <div class="head">
    <h1 onclick="location.reload();">New Product</h1>
  </div>
  <div class="breadcrumb">
    <span onclick="window.location.href='home'" class="active"><i class="ti ti-home-2"></i> Home</span>
    <i class="ti ti-chevron-right"></i>
    <span>New Product</span>
  </div>
  <div class="body">
    <form action="" method="post" enctype="multipart/form-data">
      <div>
        <label for="nama">Name</label>
        <input type="text" name="nama" placeholder="name product" maxlength="20" required>
      </div>
      <div>
        <label for="kategori">Category</label>
        <select name="kategori" required>
          <option value="">- choose -</option>
          <option value="Komputer">Komputer</option>
          <option value="Elektronik">Elektronik</option>
          <option value="Hand Phone">Handphone</option>
        </select>
      </div>
      <div>
        <label for="harga_jual">Price Buy</label>
        <input type="number" name="harga_jual" placeholder="5000" required>
      </div>
      <div>
        <label for="harga_beli">Price Sell</label>
        <input type="number" name="harga_beli" placeholder="10000" required>
      </div>
      <div>
        <label for="stok">Stock</label>
        <input type="number" name="stok" placeholder="1" required>
      </div>
      <div class="image">
        <label for="image">File Image</label>
        <label for="image">
          <div>
            <i class="ti ti-cloud-upload"></i>
            <p>- select image -</p>
          </div>
        </label>
        <input type="file" id="image" name="image" required>
        <div id="selectedBanner"></div>
      </div>
      <button type="submit" name="create">submit</button>
    </form>
  </div>
</div>