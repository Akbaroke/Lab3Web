<?php
error_reporting(E_ALL);
require "connection.php";

function formatRupiah($angka)
{
	return "Rp " . number_format($angka, 0, ',', '.');
}

function isSelected($var, $val)
{
	return ($var == $val) ? 'selected="selected"' : '';
}

function isValidId($id)
{
	return isset($id) && !empty(trim($id));
}

// Create new product
if (isset($_POST['create'])) {
	$nama = $_POST['nama'];
	$kategori = $_POST['kategori'];
	$harga_jual = $_POST['harga_jual'];
	$harga_beli = $_POST['harga_beli'];
	$stok = $_POST['stok'];
	$file_gambar = $_FILES['image'];
	$gambar = null;
	if ($file_gambar['error'] == 0) {
		$filename = str_replace(' ', '_', $file_gambar['name']);
		$destination = 'assets/images/' . $filename;
		if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
			$gambar = $filename;
		}
	}
	$sql = "INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stok, gambar) 
            VALUES ('{$nama}', '{$kategori}', '{$harga_jual}', '{$harga_beli}', '{$stok}', '{$gambar}')";
	$result = mysqli_query($conn, $sql);
	header('Location: home');
}

// Update product
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$kategori = $_POST['kategori'];
	$harga_jual = $_POST['harga_jual'];
	$harga_beli = $_POST['harga_beli'];
	$stok = $_POST['stok'];
	$file_gambar = $_FILES['image'];
	$gambar = null;
	if ($file_gambar['error'] == 0) {
		$filename = str_replace(' ', '_', $file_gambar['name']);
		$destination = 'assets/images/' . $filename;
		if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
			$gambar = $filename;
		}
	}
	$sql = "UPDATE data_barang SET 
            nama = '{$nama}', 
            kategori = '{$kategori}', 
            harga_jual = '{$harga_jual}', 
            harga_beli = '{$harga_beli}',
            stok = '{$stok}'";
	if (!empty($gambar)) {
		$sql .= ", gambar = '{$gambar}'";
	}
	$sql .= " WHERE id_barang = '{$id}'";
	$result = mysqli_query($conn, $sql);
	header('Location: home');
}
