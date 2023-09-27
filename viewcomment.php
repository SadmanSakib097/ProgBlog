<?php
   $post_id = $_GET['post_id'];
 ?>
<?php
   $post_id = $_GET['post_id'];
 ?>
<?php
	error_reporting(0);

	$link = mysqli_connect("localhost", "root", "", "tbl_blog");
	
	$status = 'OK';
	$content = [];

	if (mysqli_connect_errno()) {
		$status = 'ERROR';
		$content = mysqli_connect_error();
	}

	$query ="SELECT name,message FROM comments WHERE post_id = $post_id";
    echo "<table border> \n";

    echo "<th>name</th> <th>message</th>  \n";

	if ($result = mysqli_query($link, $query)) {
		/* fetch associative array */
		while ($row = mysqli_fetch_assoc($result)) {
    
                extract( $row );
                echo "<tr>";
                echo "<td> $name </td>";
                echo "<td> $message </td>";
                echo "</tr> \n";
            }
        
            echo "</table> \n";
		}
	//$data = ["status" => $status, "content" => $content];

	//header('Content-type: application/json');
	//echo json_encode($data); // get all products in json format.
?>

</body>
</html>