<?php
   $post_id = $_GET['post_id'];
 ?>
<?php
	require_once('dbconfig.php');
	$connect = mysqli_connect( HOST, USER, PASS, DB )
		or die("Can not connect");	


        if(isset($_POST['name']) && isset($_POST['message'])  && !empty($_POST['name'])  && !empty($_POST['message'])){
			 $name=$_POST['name'];
             $message=$_POST['message'];
            

            $result = mysqli_query( $connect, "INSERT INTO comments(post_id,name,message) VALUES (' $post_id','$name','$message')")
            or die("Can not execute query");
			if($result)
                     {
                        echo "<span>Comment Add Successfully </span>";

                    }
                     else
                    {
                            echo "<span>cannot add comment</span>";
                    }
        }
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
                  <img src="../images/pro_logo.png" width="50px" height="50px" alt="">
                </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="memberhome.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="memberprofile.php">User Profile</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="addpost.php">Add New Post</a>
                </li>

				<li class="nav-item">
                    <a class="nav-link" href="question_list.php">Problems</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="programmer_list.php">Top Coders</a>
                </li>
               

				<li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!--Navigation part ends-->

    <form class="form-group" action="" method="post" >

<h1 >Commentbox</h1>
            <div class="">
			    <input class="form-control" type="text" placeholder="name" required="" name="name"/>
			</div>
			<div>
          
				<textarea class="form-control"  name="message" id="" cols="5" rows="5" placeholder="Enter your comment" ></textarea>
			</div>
            <br>
			<div>
				<input class="btn btn-primary" type="submit" value="Post Comment" /><br>
                
                
			</div>

    </form>
    
</body>

