<?php
	require_once('dbconfig.php');
	$connect = mysqli_connect( HOST, USER, PASS, DB )
		or die("Can not connect");	
        session_start();
	
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



    <div class="container">
    <br>
                <a href="memberprofile.php" class="btn btn-success"  >Back To Profile</a><br>
                <h2>Update Profile</h2>
           
                   <?php
                   if (isset($_POST['name']) &&  !empty($_POST['name']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){
                    $name=$_POST['name'];	        	   
                    $email=$_POST['email'];
                    $password=md5($_POST['password']);
                    $username=$_SESSION['username'];
                        $updateuser = mysqli_query( $connect, "UPDATE tbl_member SET name='$name', email='$email',password='$password' WHERE username='$username'")
                        or die("Can not execute query");
                         if($updateuser)
                         {
                            echo "<span class='success'>User Updated Successfully </span>";
                         }
                         else
                         {
                            echo "<span class='error'>Not Updated</span>";
                         }

                       
                   }
                   ?>
                 <form class='form' action="" method="post">
                     <?php
                        $username=$_SESSION['username'];
                        $query ="SELECT * FROM tbl_member WHERE username = '$username'";
                        $show_data=mysqli_query( $connect,$query);
                        $arr=mysqli_fetch_array($show_data);
                     ?>
                    <table  class="form-control">
                    <tr>
                            <td><label>Name</label></td>
                            <td>
                                <input class='form-control' type="text" name="name" value="<?php echo $arr['name']; ?>"  />
                            </td>
                        </tr>					
                        <tr>
                            <td><label>Email</label></td>
                            <td>
                                <input class='form-control' type="email" name="email" value="<?php echo $arr['email']; ?>"  />
                            </td>
                        </tr>
                        <tr>
                            <td><label>Password</label></td>
                            <td>
                                <input class='form-control' type="password" name="password" value="<?php echo $arr['password']; ?>"/>
                            </td>
                        </tr>
                        

						<tr> 
                            <td></td>
                            <td>
                                <input class='btn btn-danger' type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
            
</body>
</html>

