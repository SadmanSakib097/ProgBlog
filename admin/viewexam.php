<?php
require_once('dbconfig.php');
$connect = mysqli_connect( HOST, USER, PASS, DB )
    or die("Can not connect");	

?>
<?php
if (!isset($_GET['viewexamid'])|| $_GET['viewexamid'] == NULL) {
    echo "<script>window.location = 'examlist.php';</script>"; 
}else {
    $postid = $_GET['viewexamid'];
}?>



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
                  <img src="../images/pro_logo.png" width="50" height="50" alt="">
                </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Dashboard</a>
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
                    <a class="nav-link" href="userlist.php">Member List</a>
                </li>
                <li class="nav-item">
                      <a class="nav-link active" href="adminlist.php">User List</a>
                    </li>
				<li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

<div class="container">
    <br>
    <h2>View Exam</h2>
    <?php
    $getpost = mysqli_query( $connect, "SELECT * from exam_table where exam_id='$postid' order by exam_id DESC")
            or die("Can not execute query");
             while($postresult= $getpost->fetch_assoc()){
            ?>              
        <form class="form-group"action="" method="post">
            <table class="form-control">
            
       
                <div class="col-12">
                                <label for="point" class="form-label">Exam Title </label>
                                <input name="point"  cols="30" rows="2" class="form-control"  value="<?php echo $postresult['exam_title']; ?>" readonly ></input>
                </div>

                <div class="col-12">
                                <label for="point" class="form-label">Exam Creation Time </label>
                                <input name="point"  cols="30" rows="2" class="form-control"  value="<?php echo $postresult['exam_datatime']; ?>" readonly ></input>
                </div>


                <div class="col-12">
                                <label for="point" class="form-label">Question </label>
                                <input name="point"  cols="30" rows="2" class="form-control"  value="<?php echo $postresult['question']; ?>" readonly ></input>
                </div>

                <div class="col-12">
                                <label for="point" class="form-label">Solution </label>
                                <input name="point"  cols="30" rows="2" class="form-control"  value="<?php echo $postresult['solution']; ?>" readonly ></input>
                </div>

                <div class="col-12">
                                <label for="point" class="form-label">Points </label>
                                <input name="point"  cols="30" rows="2" class="form-control"  value="<?php echo $postresult['point']; ?>" readonly ></input>
                </div>


                <div class="col-12">
                        <button type="submit" href="home.php" class="btn btn-primary">Okay</button>
                    </div>
                
            </table>
            </form>
            <?php } ?>

         </div>
</html>
