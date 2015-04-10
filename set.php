<?php

// function setImg($id, $url) {
  // return true;
// }


include('db_util.php');

$ids = $_POST['id'];
$url = $_POST['url'];

foreach ($ids as $id) {
  setImg($id, $url);
}

echo json_encode(['ids' => $ids, 'url' => $url, 'success' => true]);