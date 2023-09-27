<?php
require_once('dbconfig.php');
$connect = mysqli_connect( HOST, USER, PASS, DB )
    or die("Can not connect");	
$i=1;
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
                  <img src="../images/pro_logo.png" width="50" height="50" alt="">
                </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="home.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adduser.php">Add User</a>				
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

    <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <a class="nav-link  " href="home.php">Post list</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="catlist.php">Category List</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link " href="userlist.php">Member List</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="adminlist.php">User List</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="examlist.php">Exam List</a>
                    </li>
                    
                  </ul>
            </div>
            <div class="card-body">
            <div class="table-responsive">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="panel-title" >Exam List</h3>
                        <a href="add_exam.php" class="btn btn-success"  >Add Question</a>
                        <a href="viewxmajax.php" class="btn btn-success"  >View Question</a>
                        <a href="delete_exam.php" class="btn btn-success" >Delete Question</a>
                    </div>
                </div>
            </div>
                    <table id="exam_data_table" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Exam Id</th>
                                <th>Exam Title</th>
                             
                            </tr>
                        </thead>
                        <tbody>


<?php
$query = "SELECT * from exam_table ORDER By exam_datatime DESC;";

$post = mysqli_query( $connect, $query)
or die("Can not execute query");
if($post){   
    $i=0;
    while ($row = $post->fetch_assoc()) {
    $i++;
?>
<tr >
    
<td><?php echo $i; ?></td>
<td><?php echo $row['exam_id']; ?></td>
<td><?php echo $row['exam_title']; ?></td>

</td> 
</tr>

<?php } } ?>


        </tbody>
    </table>
</div>
</div>
    </div>
    </div>
</div>




</body>
</html>