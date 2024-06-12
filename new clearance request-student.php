<?php
session_start();
include('php/connect.php');

if(isset($_POST['submit'])){
  $school_year = $_POST['schoolyear']; 
  $last_semester = $_POST['lastsemester']; 
  $purpose_of_application = $_POST['purpose_of_application']; 
  $course = $_POST['course'];
  $year = $_POST['year'];
  $section = $_POST['section'];
  $user_id = $_SESSION['userID'];

  $result = mysqli_query($con, "INSERT INTO new_clearance_request VALUES(
    null,
    '$user_id',
    '$school_year',
    '$last_semester',
    '$purpose_of_application',
    '$course',
    '$year',
    '$section',
    'pending'
  )");
  echo "
    <script>
      alert('Request sent!');
    </script>
  ";
}
?>
<!DOCTYPE html>
<html>
<head>=
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="STYLES/new clearance request-student.css">
  <title>New Clearance Request</title>
  <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
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
            <li><a href="update contact info-student.php"> UPDATE CONTACT INFO </a></li>
            <li><a href="change password-student.php"> CHANGE PASSWORD </a></li>
            <li><a href="index.php"> LOGOUT </a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  <div class="newcontainer">
    <h1 class="new">NEW CLEARANCE</h1>
    <h3 class="sy">SY Attended - Last Semester:</h3>
    <div class="newcontainer1">
      <form method="post" action="">
        <label for="schoolyear"></label>
        <select class="schoolyear" name="schoolyear" required>
          <option value="" disabled selected>School Year</option>
          <option value="2024-2025">2024-2025</option>
          <option value="2025-2026">2025-2026</option>
          <option value="2026-2027">2026-2027</option>
          <option value="2027-2028">2027-2028</option>
          <option value="2028-2029">2028-2029</option>
        </select>
        <label for="lastsemester"></label>
        <select class="lastsemester" name="lastsemester" required>
          <option value="" disabled selected>Last Semester</option>
          <option value="1st Semester">1st Semester</option>
          <option value="2nd Semester">2nd Semester</option>
        </select>
    </div>
    <h3 class="purpose">Purpose of Application:</h3>
    <div class="newcontainer1">
        <label for="select"></label>
        <select class="select" name="purpose_of_application" required>
          <option value="" disabled selected>Select an option</option>
          <option value="Enrollment clearance">Enrollment clearance</option>
          <option value="Graduate clearance">Graduate clearance</option>
          <option value="Transfer clearance">Transfer clearance</option>
        </select>
    </div>
    <h3 class="info">Identity Info:</h3>
    <div class="newcontainer1">
        <label for="course"></label>
        <select class="course" name="course" required>
          <option value="" disabled selected>Course</option>
          <option value="BSIT">BSIT</option>
          <option value="BFPT">BFPT</option>
          <option value="BTLED">BTLED</option>
        </select>
        <label for="Year"></label>
        <select class="Year" name="year" required>
          <option value="" disabled selected>Year</option>
          <option value="1st">1st</option>
          <option value="2nd">2nd</option>
          <option value="3rd">3rd</option>
          <option value="4th">4th</option>
        </select>
        <label for="Section"></label>
        <select class="Section" name="section" required>
          <option value="" disabled selected>Section</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="G">G</option>
          <option value="H">H</option>
        </select>
    </div>
    <button name="submit" type="submit" class="submit">Submit</button>
  </form>
</div>
<div class="Develop">
  <p>
    Developed by:<span class="MACC"> MACC</span>
  </p>
</div>
</body>
</html>