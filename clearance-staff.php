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

// Your SQL query
$sql = "SELECT * FROM student_info";

// Execute the query
$result = $con->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="STYLES/clearance-staff.css">
	<title></title>
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
                 <span class="role">STAFF</span>
            </div>
        </div>
        <ul>
          <li><a href="notification-staff.php"> <i class="fa-solid fa-bell"></i> NOTIFICATIONS</a></li>
          <li><a href="home-staff.php"> <i class="fa-solid fa-house"></i> HOME</a></li>
          <li><a href="clearance-staff.php"> <i class="fa-solid fa-folder"></i> CLEARANCE</a></li>
          <li>
              <a href="#"> <i class="fa-solid fa-user"></i> USERS ˅ </a>
              <ul class="dropdown">
                  <li><a href = "update contact info-staff.php"> UPDATE CONTACT INFO </a></li>
                  <li><a href = "change password-staff.php"> CHANGE PASSWORD </a></li>
                  <li><a href = "index.php"> LOGOUT </a></li>
              </ul>
          </li>
      </ul>
    </div>
</nav>

<h1>Clearance</h1>
    <table>
        <tr>
            <th><center>Date & Time Requested</center></th>
            <th><center>Student Number</center></th>
            <th><center>Fullname</center></th>
            <th><center>Course_Year_Section</center></th>
            <th><center>Semester - School Year</center></th>
            <th><center>Type</center></th>
            <th><center>Status</center></th>
            <th><center>Action</center></th>
        </tr>
        <?php  
        $i=1;  
        if (isset($result) && $result->num_rows > 0) {  
            while ($row = $result->fetch_assoc()) { ?>  
                <tr>  
                    <!-- Populate your table data -->
                    <td><center><?php echo date('Y-m-d H:i:s', strtotime($row['date_requested'])); ?></center></td>
                    <td><center><?php echo $row['student_id']; ?></center></td>
                    <td><center><?php echo $row['fullName']; ?></center></td>
                    <td><center><?php echo $row['course']." - ".$row['year']."".$row['section']; ?></center></td>
                    <td><center><?php echo $row['semester']." - ".$row['schoolYear']; ?></center></td>
                    <td><center>
                        <?php
                        if ($row['clearance_type'] == 'NON-GRADUATING') {  
                            echo "NON-GRADUATING";  
                        } else if ($row['clearance_type'] == 'GRADUATING') {  
                            echo "GRADUATING";  
                        } 
                        ?> 
                        </center>
                    </td>  
                    <td><center>
                        <?php
                        if ($row['status'] == 'Pending') {  
                            echo "Pending";  
                        } else if ($row['status'] == 'Complete') {  
                            echo "Complete";  
                        } 
                        ?> 
                        </center>
                    </td>  
                    <td><center>
                        <div class="view-clearance-content">
                            <a href="view clearance-staff.php? student_id=<?php echo $row['student_id']; ?>">
                                <button class="view-clearance-content2">VIEW CLEARANCE</button>
                            </a>
                        </div>
                        </center>
                    </td>  
                </tr>       
                <?php 
                $i++;
            }  
        } else {
            echo "<tr><td colspan='8'>No records found</td></tr>";
        }
        ?>  
    </table>  

    <div class="Develop">
        <p>
            Develop by:<span class="MACC"> MACC</span>
        </p>
    </div>
        
</body>
</html>

<?php
// Close the database connection
$con->close();
?>