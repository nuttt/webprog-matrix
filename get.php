<?php


# test
// function getImg($id) {
  // return "http://lorempixel.com/1920/1080/";
// }


include('db_util.php');

$id = $_GET['id'];
$imgUrl = getImg($id);
echo json_encode(['id' => $id, 'url' => $imgUrl]);
