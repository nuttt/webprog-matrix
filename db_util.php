<?php
$db = null;
function dbUtil_connect(){
	global $db;
	$db = mysqli_connect("ap-cdbr-azure-southeast-a.cloudapp.net","b9ae5684a85f25","b1e6a1a9","nutttwebprog");
	if(mysqli_connect_errno($db)){
  		$db = null;
	}
	return $db;
}
function dbUtil_table_exists(&$qh){
	global $db;
	if(!isset($db)) return false;
	$q = 'SHOW TABLES LIKE "image"';
	$qh[] = $q;
	$r = mysqli_query($db,$q);
	return mysqli_num_rows($r) > 0;
}
function dbUtil_create_table(&$qh){
	global $db;
	if(!isset($db)) return false;
	$q = 'CREATE TABLE  IF NOT EXISTS image (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
				url VARCHAR(100) NOT NULL
	)';
	$qh[] = $q;
	return mysqli_query($db,$q);
}
function dbUtil_drop_table(&$qh){
	global $db;
	if(!isset($db)) return false;
	$q = 'DROP TABLE image';
	$qh[] = $q;
	return mysqli_query($db,$q);
}
function dbUtil_get_items(&$qh){
	global $db;
	if(!isset($db)) return false;
	$q = 'SELECT * FROM image';
	$qh[] = $q;
	return mysqli_query($db,$q);
}
function getImg($id){
	$db = dbUtil_connect();
	
	if(!isset($db)) return "DB not found";
	$q = 'SELECT url FROM image WHERE id = '.$id;
	$result = mysqli_query($db,$q);
	$row = mysqli_fetch_array($result);
	return $row["url"];
}

function setImg($id,$url){
	$db = dbUtil_connect();
	
	if(!isset($db)) return false;
	$q = 'UPDATE image SET url = "'.$url.'" WHERE id = '.$id;
	return mysqli_query($db,$q);
}
function dbUtil_insert_an_item_from_post(&$qh){
	global $db;
	if(!isset($db)) return false;
	$q = 'INSERT INTO image (url) 
			VALUES ("'.$_POST['url'].'")';
	$qh[] = $q;
	return mysqli_query($db,$q);
}

function dbUtil_formatResult(&$qh){
		if(dbUtil_table_exists()){
			$ct = '<table class="table table-striped">'."\n";
			$ct .= '  <thead><th>id</th><th>First Name</th><th>Last Name</th><thead>'."\n";
			$ct .= '  <tbody>'."\n";
			$r = dbUtil_get_items($qh);
			
			while($row = mysqli_fetch_array($r)){
				$ct .= '    <tr>'."\n";
				$ct .= '      <td>'.$row['id'].'</td>'."\n";
				$ct .= '      <td>'.$row['firstname'].'</td>'."\n";
				$ct .= '      <td>'.$row['lastname'].'</td>'."\n";
				$ct .= '    </tr>'."\n";
			}
			$ct .= '  </tbody>'."\n";
			$ct .= '</table>'."\n";
		}else{
			$ct = '<div class="alert alert-danger">Table does not exist</div>'."\n";
		}
		return $ct;
	}
?>