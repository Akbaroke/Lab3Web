<?php
include_once "includes/header.php";
require_once 'requires/function.php';
$request = $_SERVER['REQUEST_URI'];
$path = '/lab3web/';
?>

<div class="container">
  <?php
switch (strtolower($request)) {
    case $path:
      require __DIR__ . '/views/index.php';
      break;
    case $path . 'create':
      require __DIR__ . '/views/create.php';
      break;
    case $path . 'update?id=' . $_GET["id"]:
      require __DIR__ . '/views/update.php';
      break;
    case $path . 'delete?id=' . $_GET["id"]:
      require __DIR__ . '/views/delete.php';
      break;
    default:
      http_response_code(404);
      require __DIR__ . '/views/404.php';
      break;
  }
  ?>
</div>

<?php
include_once "includes/footer.php";
?>