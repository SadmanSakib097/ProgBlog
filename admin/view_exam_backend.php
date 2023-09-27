<?php

$exam_id = $_GET['exam_id'];

error_reporting(0);
$link = mysqli_connect("localhost", "root", "", "tbl_blog");
$status = 'OK';
$content = [];
if (mysqli_connect_errno()) {
    $status = 'ERROR';
    $content = mysqli_connect_error();
    }
$query = "SELECT * FROM exam_table where exam_id = '$exam_id'";
if ($result = mysqli_query($link, $query)) {

while ($row = mysqli_fetch_assoc($result)) {
$content[] = $row;
}
}
$data = ["status" => $status, "content" => $content];
header('Content-type: application/json');
echo json_encode($data);
?>
