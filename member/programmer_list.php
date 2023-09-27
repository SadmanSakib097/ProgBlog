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

    
            <div class="card-body">
            <div class="table-responsive">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="panel-title text-center text-warning" >Top Programmers List</h3>
                    </div>
                </div>
            </div>
                    <table id="exam_data_table" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                
                                <th>Email</th>
                                <th>Points</th>
                            </tr>
                        </thead>
                        <tbody>



                       
<?php
$query = "SELECT * FROM tbl_member WHERE total_points>0 ORDER BY total_points DESC;";
$post = mysqli_query( $connect, $query )
		or die("Can not execute query");
$i=1;        
if($post){
while($result=$post->fetch_assoc()){
?>

<tr >
    
<td><?php echo $i; ?></td>
<td><?php echo $result['name']; ?></td>
<td><?php echo $result['email']; ?></td>
<td><?php echo $result['total_points']; ?></td>
</tr>


<?php  $i++ ;  }
}
?>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
          </div>
    </div>




</body>
</html>