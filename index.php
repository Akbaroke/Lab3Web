<?php
// Define base path
$path = '/lab3web/';

// Include header file
include_once "includes/header.php";

// Include required function file
require_once 'requires/function.php';

// Get requested URL path
$request = $_SERVER['REQUEST_URI'];
$parsed_url = parse_url($request);
$url = $parsed_url['path'];

// Check requested URL path and set page
switch (strtolower($url)) {
  case $path:
    $page = 'index';
    break;
  case $path . 'create':
    $page = 'create';
    break;
  case $path . 'update':
    $page = isset($_GET['id']) ? isValidId($_GET['id']) ? 'update' : '404' : '404';
    break;
  case $path . 'delete':
    $page = isValidId($_GET['id']) ? 'delete' : '404';
    break;
  default:
    $page = '404';
    break;
}

// Set HTTP response code to 404 if page is not found
if ($page === '404') {
  http_response_code(404);
}
?>

<!-- Include view file -->
<div class="container">
  <?php
  require __DIR__ . '/views/' . $page . '.php';
  ?>
</div>


<?php
// Include footer file
include_once "includes/footer.php";
?>