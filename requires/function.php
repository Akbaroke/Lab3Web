<?php
require "conection.php";
function Rupiah($angka)
{
	$result = "Rp " . number_format($angka, 0, ',', '.');
	return $result;
}
