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
	<h3 class="text-center">View Member Profile</h3>
    <a href="userlist.php" ><input class="btn btn-danger" id="home" type="button" name="" value="Member List"></a> <br><br>
		<button id="btnChange" class="btn btn-warning">View Member</button>

		<br>
		<br>
		<br>
		
        <p id="p1" class="text-info"> ID:</p>
		<p id="p2" class="text-info">User Name:</p>
		<p id="p3" class="text-info">Email:</p>
		<p id="p4" class="text-info">Point:</p>
		</div>

		
	<script>

		let btnChange = document.querySelector("#btnChange");
	
		btnChange.addEventListener('click', () => {
		let id = prompt("Please enter the id:");
		fetch('http://localhost/ProgBlog/admin/viewuser_backend.php?id='+id )
			.then(response => response.json())
			.then(json => {
				let p1 = document.querySelector("#p1");
				let p2 = document.querySelector("#p2");
				let p3 = document.querySelector("#p3");
                let p4 = document.querySelector("#p4");
			
				p1.innerHTML ="ID: " +json['content'][0]['id'];
				p2.innerHTML ="User Name: " +json['content'][0]['username'];
				p3.innerHTML ="Email: " +json['content'][0]['email'];
				p4.innerHTML ="Total Point: " +json['content'][0]['total_points'];	
				

			})
		});

	</script>
	</body>
</html>
