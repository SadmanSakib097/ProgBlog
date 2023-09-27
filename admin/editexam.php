<?php
require_once('dbconfig.php');
$connect = mysqli_connect( HOST, USER, PASS, DB )
    or die("Can not connect");	

?>
<?php
if (!isset($_GET['editexamid'])|| $_GET['editexamid'] == NULL) {
    echo "<script>window.location = 'examlist.php';</script>"; 
}else {
    $postid = $_GET['editexamid'];
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
				<?php //if(Session::get('userRole')=='1'){ ?>
                    <a class="nav-link" href="adduser.php">Add User</a>
					<?php //} ?>
				
				</li>
                <li class="nav-item">
                    <a class="nav-link" href="userlist.php">Member List</a>
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
    
if (isset($_POST['exam_title']) && !empty($_POST['exam_datatime']) && !empty($_POST['question'])&&isset($_POST['solution'])&&isset($_POST['point'])){
    $exam_title=$_POST['exam_title'];
    $exam_datatime=$_POST['exam_datatime'];
    $question=$_POST['question'];
    $solution=$_POST['solution'];
    $point=$_POST['point'];

    if (empty($exam_title)||empty($exam_datatime)||empty($question)||empty($solution)||empty($point)){
            echo "<span class='error'>Field must not be empty ! </span>";//3
    }else{
        $updated_row = mysqli_query( $connect, "UPDATE exam_table SET exam_title ='$exam_title',exam_datatime ='$exam_datatime',question ='$question',solution ='$solution',point ='$point' where exam_id= '$postid'")
        or die("Can not execute query");
   
          if ($updated_row) {
              echo "<span class='error' >Update Sucessfull! </span>";//2
          }else{
           echo "<span class='success'>Post Not Updated. </span>";
          }
        }

    }
    
    ?>
    <?php
    $getpost = mysqli_query( $connect, "SELECT * from exam_table where exam_id='$postid' order by exam_id DESC")
            or die("Can not execute query");
             while($postresult= $getpost->fetch_assoc()){
            ?>              
        <form class="form-group"action="" method="post">
            <table class="form-control">
            
       
                <div class="col-12">
                                <label for="point" class="form-label">Exam Title </label>
                                <input name="exam_title"  cols="30" rows="2" class="form-control"  value="<?php echo $postresult['exam_title']; ?>"  ></input>
                </div>

                <div class="col-12">
                                <label for="point" class="form-label">Exam Creation Time </label>
                                <input name="exam_datatime"  cols="30" rows="2" class="form-control"  value="<?php echo $postresult['exam_datatime']; ?>"  ></input>
                </div>


                <div class="col-12">
                                <label for="point" class="form-label">Question </label>
                                <input name="question"  cols="30" rows="2" class="form-control"  value="<?php echo $postresult['question']; ?>"  ></input>
                </div>

                <div class="col-12">
                                <label for="point" class="form-label">Solution </label>
                                <input name="solution"  cols="30" rows="2" class="form-control"  value="<?php echo $postresult['solution']; ?>"  ></input>
                </div>

                <div class="col-12">
                                <label for="point" class="form-label">Points </label>
                                <input name="point"  cols="30" rows="2" class="form-control"  value="<?php echo $postresult['point']; ?>"  ></input>
                </div>


                <div class="col-12">
                        <button type="submit" href="home.php" class="btn btn-primary">Okay</button>
                    </div>
                
            </table>
            </form>
            <?php } ?>

         </div>
</html>



