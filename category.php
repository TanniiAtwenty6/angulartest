<?php 
$link = new mysqli("122.155.9.36", "news", "MeaNoOniHph", "db_news");

if ($link->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$result = $link->query("SELECT category_id,category_name FROM `tbl_category` ORDER BY `tbl_category`.`category_arrange` ASC");

$data = [];
$i = 0;
while($row = $result->fetch_object()){
    $data[$i]["id"] = $row->category_id;
    $data[$i]["name"] = $row->category_name;
    $i++;
}
echo json_encode($data);
mysqli_close($link);
 ?>