<?php
session_start();

// Ensure userID is stored in the session
if (!isset($_SESSION['userID'])) {
    // Redirect to login or another appropriate page if the userID is not set
    header("Location: index.php");
    exit();
}

// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eclearance";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Check if the form is submitted
if (!empty($_POST['save'])) {
    $email = $_POST['email'];
    $mobile_number = $_POST['mobile_number'];
    $fb_profile_link = $_POST['fb_profile_link'];
    $userID = $_SESSION['userID'];  // Use userID from session

    // Use a prepared statement to prevent SQL injection
    $stmt = $con->prepare("UPDATE student SET email=?, mobile_number=?, fb_profile_link=? WHERE userID=?");
    $stmt->bind_param("sssi", $email, $mobile_number, $fb_profile_link, $userID);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Success: Your contact information has been successfully updated.";
    } 
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="STYLES/update contact info-student.css">
  <title>Update Contact Info</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

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
                     <span class="role">STUDENT</span>
                </div>
            </div>
            <ul>
                <li><a href="notification-student.php"> <i class="fa-solid fa-bell"></i> NOTIFICATIONS</a></li>
                <li><a href="home-student.php"> <i class="fa-solid fa-house"></i> HOME</a></li>
                <li><a href="clearance-student.php"> <i class="fa-solid fa-folder"></i> CLEARANCE</a></li>
                <li>
                    <a href="#"> <i class="fa-solid fa-user"></i> USERS ˅ </a>
                    <ul class="dropdown">
                        <li><a href="update contact info-student.php">UPDATE CONTACT INFO</a></li>
                        <li><a href="change password-student.php">CHANGE PASSWORD</a></li>
                        <li><a href="index.php">LOGOUT</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

<div class="container">
    <img src="img/profile.png" class="update">
    <h1>UPDATE CONTACT INFO</h1>

    <form method="post" action="">
        <input type="hidden" name="userID" value="<?php echo $_SESSION['userID']; ?>" /> <!-- Assuming session stores userID -->

        <div class="EmailAddress">
            <h6>Email Address</h6>
        </div>
        <div class="EmailAddress1">
            <input type="email" id="email" name="email" class="EmailAddress2" placeholder="Enter New Email" required>
        </div><br><br>

        <div class="phonenumber">
            <h6>Phone Number</h6>
        </div>
        <div class="phonenumber1">
            <input type="text" id="mobile_number" name="mobile_number" class="phonenumber2" placeholder="Enter New Mobile Number" required>
        </div><br><br>

        <div class="fblink">
            <h6>Fb Profile Link</h6>
        </div>
        <div class="fblink1">
            <input type="text" id="fb_profile_link" name="fb_profile_link" class="fblink2" placeholder="Enter New FB Profile Link" required>
        </div>

        <div class="new-clearance">
            <button value="submit" type="submit" name="save" class="new-clearance1">UPDATE</button>
        </div>
    </form>
</div>

<div class="Develop">
    <p>
         Developed by:<span class="MACC"> MACC</span>
    </p>
</div>

</body>
</html>

<?php
// Close the database connection
$con->close();
?>