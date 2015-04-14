<?php
include 'db_util.php';

$id = $_GET['id'];
$imgUrl = getImg($id);
echo json_encode([
  'id' => $id,
  'url' => $imgUrl,
]);
