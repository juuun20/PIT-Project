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
$sql = "SELECT * FROM university_designee_info";

// Execute the query
$result = $con->query($sql);

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="STYLES/university clearance-admin.css">
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

    <a href="clearance-admin.php">
      <button><img src="img/arrowback.png" class="arrowback">BACK</button>
    </a><br><br>

    <a href="university clearance-admin.php">
      <button value = "submit" type="submit" class="uni">UNIVERSITY CLEARANCE</button>
    </a>

    <a href="usg clearance-admin.php">
      <button value = "submit" type="submit" class="usg">USG CLEARANCE</button>
    </a>

        <table>
        <tr>
        <th><center>DESIGNEE</center></th>
        <th><center>DESIGNATION</center></th>
        <th><center>STATUS</center></th>
        <th><center>ACTION</center></th>
        </tr>
        <?php  
        $i=1;  
        if (isset($result) && $result->num_rows > 0) {  
            while ($row = $result->fetch_assoc()) { ?>  
                <tr>  
                    <td><center>
                        <?php
                        if ($row['Designee'] == 'Dr. Glorimer L. Clarin') {  
                            echo "Dr. Glorimer L. Clarin";  
                        } else if ($row['Designee'] == 'Mr. Pelmar M. Acosta, MSciEd') {  
                            echo "Mr. Pelmar M. Acosta, MSciEd";  
                        } else if ($row['Designee'] == 'Ms. Linda Grace S. Baz') {  
                            echo "Ms. Linda Grace S. Baz";  
                        } else if ($row['Designee'] == 'Engr. Joniko Angelo L. Medina') {  
                            echo "Engr. Joniko Angelo L. Medina";  
                        } else if ($row['Designee'] == 'Mrs. Jubilee S. Daga-ang') {  
                            echo "Mrs. Jubilee S. Daga-ang";  
                        } else if ($row['Designee'] == 'Mr. Bernardo T. Crisologo, MTTE') {  
                            echo "Mr. Bernardo T. Crisologo, MTTE";  
                        } else if ($row['Designee'] == 'Engr. Mitchie Roa') {  
                            echo "Engr. Mitchie Roa";  
                        } else if ($row['Designee'] == 'Mrs. Liberty B. Doncillo, MTTE') {  
                            echo "Mrs. Liberty B. Doncillo, MTTE";  
                        } else if ($row['Designee'] == 'Ms. Mary Jane C. Pacatan, MLIS, RL') {  
                            echo "Ms. Mary Jane C. Pacatan, MLIS, RL";  
                        } 
                        ?> 
                        </center>
                    </td>
                    <td><center>
                        <?php
                        if ($row['Designation'] == 'Acting Campus Director') {  
                            echo "Acting Campus Director";  
                        } else if ($row['Designation'] == 'Head, Administration') {  
                            echo "Head, Administration";  
                        } else if ($row['Designation'] == 'Campus Registrar, Designate') {  
                            echo "Campus Registrar, Designate";  
                        } else if ($row['Designation'] == 'Head, Student Affairs and Services Offices') {  
                            echo "Head, Student Affairs and Services Offices";  
                        } else if ($row['Designation'] == 'Chairperson, Department of Information Technology') {  
                            echo "Chairperson, Department of Information Technology";  
                        } else if ($row['Designation'] == 'Chairperson, Department of Technology and Livelihood Education') {  
                            echo "Chairperson, Department of Technology and Livelihood Education";  
                        } else if ($row['Designation'] == 'Chairperson, Department of Food Processing and Technology') {  
                            echo "Chairperson, Department of Food Processing and Technology";  
                        } else if ($row['Designation'] == 'Head, Academic Affairs') {  
                            echo "Head, Academic Affairs";  
                        } else if ($row['Designation'] == 'Campus Librarian') {  
                            echo "Campus Librarian";  
                        } 
                        ?> 
                        </center>
                    </td>    
                    <td><center>
                        <?php
                        if ($row['status'] == 'Pending') {  
                            echo "Pending";  
                        } else if ($row['status'] == 'Cleared') {  
                            echo "Cleared";  
                        } else if ($row['status'] == 'Not Cleared') {  
                            echo "Not Cleared";  
                        } else if ($row['status'] == 'N/A') {  
                            echo "N/A";  
                        }
                        ?> 
                        </center>
                    </td>  
                    <td><center>
                        <?php
                        if ($row['status'] == 'Not Cleared') {  
                            echo $row['action'];  
                        } 
                        ?> 
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