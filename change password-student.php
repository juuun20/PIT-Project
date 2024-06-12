<?php
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
if(!empty($_POST['save'])) {
    $p1 = $_POST['password1'];
    $p2 = $_POST['password2'];
    $p3 = $_POST['password3'];
    
    if($p2 == $p3) {
        // Use a prepared statement to prevent SQL injection
        $stmt = $con->prepare("SELECT * FROM student WHERE password=?");
        $stmt->bind_param("s", $p1);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->num_rows;

        if($count > 0) {
            // Update the password using a prepared statement
            $stmt = $con->prepare("UPDATE student SET password=? WHERE password=?");
            $stmt->bind_param("ss", $p2, $p1);
            $stmt->execute();

            if($stmt->affected_rows > 0) {
                echo "Success: Your Password has been successfully updated.";
            } else {
                echo "Error: Unable to update the password.";
            }
        } else {
            echo "Error: Current password is incorrect.";
        }
    } else {
        echo "New Password & Confirm New Password do not match";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="STYLES/change password-student.css">
  <title>Change Password</title>
  
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
        <li><a href="notification-student.php"><i class="fa-solid fa-bell"></i> NOTIFICATIONS</a></li>
        <li><a href="home-student.php"><i class="fa-solid fa-house"></i> HOME</a></li>
        <li><a href="clearance-student.php"><i class="fa-solid fa-folder"></i> CLEARANCE</a></li>
        <li>
          <a href="#"><i class="fa-solid fa-user"></i> USERS ˅</a>
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
    <img src="img/protection.png" class="update">
    <h1>CHANGE PASSWORD</h1>

    <form method="post" action="">
      <img src="img/key.png" class="KEY1">
      <div class="current">
        <input type="password" id="password1" name="password1" minlength="0" maxlength="11" placeholder="Enter Current Password">
        <img src="img/hideIcon.png" id="eyeIcon1"><br><br>
      </div>
      
      <script>
        let eyeIcon1 = document.getElementById("eyeIcon1");
        let password1 = document.getElementById("password1");

        eyeIcon1.onclick = function() {
          if (password1.type == "password") {
            password1.type = "text";
            eyeIcon1.src = "img/showIcon.png";
          } else {
            password1.type = "password";
            eyeIcon1.src = "img/hideIcon.png";
          }
        }
      </script>

      <img src="img/key.png" class="KEY2">
      <div class="new">
        <input type="password" id="password2" name="password2" minlength="0" maxlength="11" placeholder="Enter New Password">
        <img src="img/hideIcon.png" id="eyeIcon2"><br><br>
      </div>
      
      <script>
        let eyeIcon2 = document.getElementById("eyeIcon2");
        let password2 = document.getElementById("password2");

        eyeIcon2.onclick = function() {
          if (password2.type == "password") {
            password2.type = "text";
            eyeIcon2.src = "img/showIcon.png";
          } else {
            password2.type = "password";
            eyeIcon2.src = "img/hideIcon.png";
          }
        }
      </script>

      <img src="img/key.png" class="KEY3">
      <div class="re-new">
        <input type="password" id="password3" name="password3" minlength="0" maxlength="11" placeholder="Re-Enter New Password">
        <img src="img/hideIcon.png" id="eyeIcon3"><br><br>
      </div>
      
      <script>
        let eyeIcon3 = document.getElementById("eyeIcon3");
        let password3 = document.getElementById("password3");

        eyeIcon3.onclick = function() {
          if (password3.type == "password") {
            password3.type = "text";
            eyeIcon3.src = "img/showIcon.png";
          } else {
            password3.type = "password";
            eyeIcon3.src = "img/hideIcon.png";
          }
        }
      </script>

      <div class="changed">
        <button value="submit" type="submit" name="save" class="changed1">CHANGE PASSWORD</button>
      </div>
    </form>
  </div>

  <div class="Develop">
    <p>
      Developed by: <span class="MACC">MACC</span>
    </p>
  </div>
</body>
</html>

<?php
// Close the database connection
$con->close();
?>