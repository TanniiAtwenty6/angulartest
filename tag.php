<?php 
 $link = new mysqli("122.155.9.36", "news", "MeaNoOniHph", "db_news");

if ($link->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$result = $link->query("SELECT tag_id,tag_name FROM tag WHERE tag_name LIKE '%".$_GET['q']."%' LIMIT 10");

$data = [];
$i = 0;
while($row = $result->fetch_object()){
    $data[$i]["id"] = $row->tag_id;
    $data[$i]["name"] = $row->tag_name;
    $i++;
}
echo json_encode($data);

mysqli_close($link);
 ?>