<?php
    session_start();
    include('php/connect.php');

    if(!isset($_SESSION['userID'])){
        header('Location: login-admin.php');
    }else{
        $userID = $_SESSION['userID'];
        $result = mysqli_query($con, "SELECT * FROM admin WHERE userID='$userID'");
        $userdata = mysqli_fetch_object($result);
    
        $fullName = $userdata->fullName;
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="STYLES/home-admin.css">
	<title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

</head>
<body>
    <nav class="navbar">
        <div class="navdiv">
            <div class="logo">
                <span class="ustp">USTP</span>
                <div class="role-box">
                     <span class="role">ADMINISTRATOR</span>
                </div>
            </div>
            <ul>
                <li><a href="notification-admin.php"> <i class="fa-solid fa-bell"></i> NOTIFICATIONS</a></li>
                <li><a href="home-admin.php"> <i class="fa-solid fa-house"></i> HOME</a></li>
                <li><a href="clearance-admin.php"> <i class="fa-solid fa-folder"></i> CLEARANCE</a></li>
                <li>
                    <a href="#"> <i class="fa-solid fa-user"></i> USERS ˅ </a>
                    <ul class="dropdown">
                        <li><a href = "update contact info-admin.php"> UPDATE CONTACT INFO </a></li>
                        <li><a href = "change password-admin.php"> CHANGE PASSWORD </a></li>
                        <li><a href = "index.php"> LOGOUT </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
			<div >
            <p class="Welcome">Welcome <span class="welcome"><?php echo $fullName ?></span> </p>
			</div>
			<div class="Develop">
				<p>
					Develop by:<span class="MACC"> MACC</span>
				</p>
			</div>
		</div>
        <?php } ?>
</body>
</html>