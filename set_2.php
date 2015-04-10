<?php

// function setImg($id, $url) {
  // return true;
// }


include('db_util.php');

$ids = $_GET['id'];
$url = $_GET['url'];

// foreach ($ids as $id) {
  // setImg($id, $url);
// }

echo json_encode(['ids' => $ids, 'url' => $url, 'success' => true]);