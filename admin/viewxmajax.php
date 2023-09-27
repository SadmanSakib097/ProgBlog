

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
    <a href="examlist.php"><input class="btn btn-success"id="home" type="button" name="" value="Exam List"></a> <br> <br>
		<div><button class="btn-warning" id="btnChange">View Question Details</button></div>
        <br>
    <p class="form-control" id="p1"> Exam ID:</p>
		<p class="form-control" id="p2">Exam Title:</p>
		<p class="form-control" id="p4">Question:</p>
    <p class="form-control" id="p5">Solution:</p>
    <p class="form-control" id="p6">Point:</p>
                </div>

                <script>

        let btnChange = document.querySelector("#btnChange");

        btnChange.addEventListener('click', () => {
        let exam_id = prompt("Please enter the exam id:");
        fetch('http://localhost/ProgBlog/admin/view_exam_backend.php?exam_id='+exam_id )
            .then(response => response.json())
            .then(json => {
                let p1 = document.querySelector("#p1");
                let p2 = document.querySelector("#p2");
        let p4 = document.querySelector("#p4");
        let p5 = document.querySelector("#p5");
        let p6 = document.querySelector("#p6");

                p1.innerHTML ="Exam ID: " +json['content'][0]['exam_id'];
                p2.innerHTML ="Exam Title: " +json['content'][0]['exam_title'];
        p4.innerHTML ="Question: " +json['content'][0]['question'];
        p5.innerHTML ="Solution:" +json['content'][0]['solution'];
        p6.innerHTML ="Point: " +json['content'][0]['point'];


            })
        });

        </script>

    </body>
</html>