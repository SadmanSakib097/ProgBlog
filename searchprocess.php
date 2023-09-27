<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

    <!--Navigation part starts-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li>
                <a class="navbar-brand" href="#">
                  <img src="images/pro_logo.png" width="50" height="50" alt="">
                </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="postlist.php">Visit Website</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="login_as.php">Login</a>
                </li>

              
                
                <form action="searchprocess.php" method="get" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-1" type="text" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-5 my-sm-0"  type="submit">Search</button>
                
            </ul>
        </div>
    </nav>



    <br>
    <br>
    <br>

    <div class="container">


<?php
require_once('dbconfig.php');
$connect = mysqli_connect( HOST, USER, PASS, DB )
    or die("Can not connect");	
    session_start();	

?>
<?php
     if(!isset($_GET['search'])|| $_GET['search']==NULL){
         header("Location: 404.php");
     }else{
         $search=$_GET['search'];
     }
?>

<?php
    
    $post = mysqli_query( $connect, "SELECT * FROM tbl_post where title LIKE '%$search%' OR body LIKE '%$search%'")
    or die("Can not execute query");
    ?>
    <div class="container">
	
	<?php
	if($post){
	while($result=$post->fetch_assoc()){
	?>

	<div class=" ">

	<div class="card text-center">
  <div class="card-header">
  <h5 class="card-title"><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h5>
  <p class="card-title">By <?php echo $result['author'];?></a></p>
  </div>
  <div class="card-body">
  <img class="card-img-top" style="width:150px; height:150px"src="admin/<?php echo $result['image']?>" alt="Card image cap">
    <p class="card-text"><?php echo $result['body'];?></p>
    <a href="post.php?id=<?php echo $result['id'];?>" class="btn btn-primary">Read More</a>
  </div>
  <div class="card-footer text-muted">
    <p><?php $result['date'];?></p>
  </div>
</div>
<br>
<br>
	
		<?php } ?> <!--END WHILE LOOP-->

		

		<?php 
}else{
    ?>
        <h1>No Results Found!!</h1>
    <?php
}
		?>
    

	</div>



</body>

</html>