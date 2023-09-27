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
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">User Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="inbox.php">Inbox</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="postlist.php">Visit Website</a>
                </li>

                <li class="nav-item">
				<?php //if(Session::get('userRole')=='1'){ ?>
                    <a class="nav-link" href="adduser.php">Add User</a>
					<?php //} ?>
				
				</li>
                <li class="nav-item">
                    <a class="nav-link" href="userlist.php">User List</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="{%url 'admin_login'%}">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!--Navigation part ends-->

    <form action="" method="post" >

        <h1>Commentbox</h1>
            <div>
                <label>Name</label>
			    <input type="text" placeholder="name" required="" name="name"/>
			</div>
			<div>
            <label>Comment</label>
				<textarea name="message" id="" cols="30" rows="10"></textarea>
			</div>
			<div>
				<input type="submit" value="Post Comment" /><br>
                
                
			</div>

    </form>
    
</body>

