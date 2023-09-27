
<?php
 if (!isset($_GET['id']) || $_GET['id'] ==NULL){
	 header("Location:");
 }else{
	 $id = $_GET['id'];
 }
?>
<?php
	require_once('dbconfig.php');
	$connect = mysqli_connect( HOST, USER, PASS, DB )
		or die("Can not connect");	

	$post = mysqli_query( $connect, "SELECT * FROM tbl_post where id= $id")
		or die("Can not execute query");

?>



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
    <div class="card text-center">
    <?php
		if($post){
			while($result=$post->fetch_assoc()){

	?>
	
    <div class="card-header">
            <?php echo $result['title']?>
        </div>
        <div class="card-body">
            <img src="admin/<?php echo $result['image']?>" alt="post image" style="width:300px; height:300px"/>
            <p class="card-text">
            <?php echo $result['body']?>
            </p>

        </div>
        <div class="card-footer text-muted">
        <p class="card-title"><?php echo $result['date'];?>, By <a href="#"><?php echo $result['author'];?></p>
       
        <a href="addcomment.php?post_id=<?php echo $result['id'];?>" class="btn btn-success">Comment</a>
        <a href="viewcomment.php?post_id=<?php echo $result['id'];?>" class="btn btn-success">View Comment</a>

       
            
        </div>
        </div>
	
	
	
	<div class="">
        <br>
        <br>
        <br>
		<h2>Related articles</h2>
        <br>

        
		<?php
			$catid= $result['cat'];
			$relatedpost= mysqli_query( $connect, "SELECT * FROM tbl_post where cat= '$catid' order by rand() limit 6")
            or die("Can not execute query");
			if($relatedpost){
				while($rresult=$relatedpost->fetch_assoc()){

		?>
        <div class="card-deck" style="max-width: 25rem;">
        <div class="card">
        <img class="card-img-top"style="width:150px; height:150px" src="admin/<?php echo $rresult['image'];?>" alt="Card image cap">
        <div class="card-body">
        <a class="btn btn-primary" href="post.php?id=<?php echo $rresult['id'];?>">Read</a>
        </div>
         </div>


		<?php } }else{
			echo "No related post avaiable right now!";
		}?>
	</div>

	<?php  } } else{
			header('Location:');
		}
	?>


      
  
        



</body>

</html>
