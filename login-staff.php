<?php
	session_start();
	include('php/connect.php');

	if(isset($_POST['submit'])){
		$staff_id = $_POST['staff_id'];
		$password = $_POST['password'];
		
		$result = mysqli_query($con, "SELECT * FROM staff WHERE staff_id='$staff_id' AND
								password ='$password'");
		if(mysqli_num_rows($result)!=0){
			$userdata = mysqli_fetch_object($result);
			$_SESSION['userID'] = $userdata->userID;
			header('Location: home-staff.php');
		}else{
			die('account not found');
		}
	}else{
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="STYLES/login-staff.css">
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>	

<center>
	<img src="img/background1.jpg" class="background">
	
	<div class="d1">
		<img src="img/logo1.png">
	</div>

	<h1 class="p1">UNIVERSITY OF SCIENCE AND TECHNOLOGY OF SOUTHERN PHILIPPINES</h1>
	<h1 class="p2">E-CLEARANCE SYSTEM</h1>
	<h1 class="p3">OROQUIETA CAMPUS</h1>

	<div class="container">
        <img src="img/user.png" class="user1">
		<h2>LOG-IN ACCOUNT</h2>
		<h6>STAFF</h6>

		<form placeholder="Select" action = "" method = "post">

			<div class="user-box">
				<img src="img/user.png" class="user">
			</div>
			<div class="input1">
				<input type="text" id="userID" name="staff_id" placeholder="Staff ID" required>
			</div>

			<div class="key-box">
				<img src="img/key.png" class="key">
			</div>
			<div class="input-box">
				<input type="password" id="password" name = "password" placeholder="Password" required>
        <img src="img/hideIcon.png" id="eyeIcon">
			</div>
			
            <script>
                let eyeIcon = document.getElementById("eyeIcon");
                let password = document.getElementById("password");

                eyeIcon.onclick = function(){
                    if(password.type == "password"){
                        password.type = "text";
                        eyeIcon.src = "img/showIcon.png";
                    }else{
                        password.type = "password";
                        eyeIcon.src = "img/hideIcon.png";
                    }
                }
            </script>
           
                <button value = "submit" type="submit" name = "submit" >LOG-IN</button>
          
		</form>
	</div>
	</center>
	<?php } ?>
</body>
</html>