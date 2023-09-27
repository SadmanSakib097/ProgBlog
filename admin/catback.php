<?php
    $name = $_GET['catname'];
    error_reporting(0);
    $link = mysqli_connect("localhost", "root", "", "tbl_blog");
    $status = 'OK';
    $content = [];
    if (mysqli_connect_errno()) {
        $status = 'ERROR';
        $content = mysqli_connect_error();
        }
    $query="INSERT INTO tbl_category(name)  VALUES ('$name')";
    if ($result = mysqli_query($link, $query)) {

        $content="Inserted successfully";
        }else{
            $content="Cannot insert the cat";
        }
    $data = ["status" => $status, "content" => $content];
    header('Content-type: application/json');
    echo json_encode($data); 
?>
