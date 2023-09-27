<?php
session_start();
require_once('dbconfig.php');
$connect = mysqli_connect( HOST, USER, PASS, DB )
    or die("Can not connect");	

?>
<?php
if (!isset($_GET['questionid'])|| $_GET['questionid'] == NULL) {
    echo "<script>window.location = 'question_list.php';</script>"; 
}else {
    $postid = $_GET['questionid'];
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
    <h2>Question</h2>
    <?php
    $getpost = mysqli_query( $connect, "SELECT * from exam_table where exam_id='$postid' order by exam_id DESC")
            or die("Can not execute query");
             while($postresult= $getpost->fetch_assoc()){
            ?>              
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
                                <input id="solution" cols="30" rows="2" class="form-control" type="hidden" value="<?php echo $postresult['solution']; ?>" readonly ></input>
                </div>


                <div class="col-12">
                                <label for="point" class="form-label">Points </label>
                                <input name="point"  cols="30" rows="2" class="form-control"  value="<?php echo $postresult['point']; ?>" readonly ></input>
                </div>
                <?php
                $uname= $_SESSION['username'];
                $pointQuery = mysqli_query( $connect, "SELECT total_points from tbl_member where username='$uname'")
                or die("Can not execute query");

                $recevied_points= $pointQuery->fetch_assoc();
                $total_points = $recevied_points['total_points']

                ?>


                <?php
               if (isset($_POST['solution']) && !empty($_POST['solution'])){
		        	   $solution=$_POST['solution'];

                       if (empty($solution))
                       {
                           echo "<span class='error'>Field must not be empty! </span>";
                       }else
                       {
                        $actual_sol= $postresult['solution'];
                        if($actual_sol==$solution){
                            $total_points=$total_points+$postresult['point'];
                            $updated_row = mysqli_query( $connect, "UPDATE tbl_member SET total_points='$total_points' where username= '$uname'")
                            or die("Can not execute query");
                       
                              if ($updated_row) {
                                  echo "<span class='text-center text-success' >congratulations you solved it successfully! </span>";
                              }else{
                               echo "<span class='text-center text-success'>congratulations you solved it successfully! but got no point!</span>";
                              }
                            
                        }else{
                            echo "<span class='text-center text-danger'>Sorry, The answer did not match. Try again</span>";

                        }

                       }
                 }
                
                ?>


                <form action="" method="post">
                    <div class="col-12">
                    <label for="point" class="form-label">Solution</label>
                        <input name="solution"  cols="30" rows="2" class="form-control"  type="text">
                    </div>
                    <br>
                    <div class="col-12">
                        <button type="submit" href="home.php" class="btn btn-primary">Okay</button>
                    </div>
                </form>
            </table>
            
            <?php } ?>

         </div>


                    </body>
</html>
