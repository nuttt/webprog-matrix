<?php

// function setImg($id, $url) {
  // return true;
// }


include('db_util.php');

$id = $_GET['id'];
$url = $_GET['url'];

$success = insertImg($id, $url);
echo json_encode(['id' => $id, 'url' => $url, 'success' => $success]);