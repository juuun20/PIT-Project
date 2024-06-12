<?php
    session_start();
    include('php/connect.php');
    $sql = "SELECT * FROM student_info";
    $result = $con->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="STYLES/clearance-student.css">
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
                  <li><a href = "update contact info-student.php"> UPDATE CONTACT INFO </a></li>
                  <li><a href = "change password-student.php"> CHANGE PASSWORD </a></li>
                  <li><a href = "logout.php"> LOGOUT </a></li>
              </ul>
          </li>
      </ul>
    </div>
</nav>

<h1>Clearance</h1>
<a href = "new clearance request-student.php"><button class="new-clearance">NEW CLEARANCE</button></a>
    <table>
        <tr>
            <th><center>Date & Time Requested</center></th>
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
                            <a href="view clearance-student.php? student_id=<?php echo $row['student_id']; ?>">
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