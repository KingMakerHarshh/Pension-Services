<?php
session_start();
$User=$_SESSION['UserID'];

include_once "../DB/db.php";
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


  <?php
  include_once "../DB/db.php";
  include("../MasterPages/UserHeader.php");
  ?>
  
  <h1>Services List</h1>

<?php

$sql = "SELECT s.Service,r.Status,s.ID FROM tblrequest r,tblservices s where r.UserID='$User' and r.ServiceID=s.ID and r.Status='New'";

$result=execute($sql);	

if ($result->num_rows > 0) 
{

?>

	 <table id="fulltable">
     
     <tr><th>Scheemes</th>
	 <th>Status</th>
     <th>Documents</th>
      <th>View</th>
     </tr>
     
     <?php
while($row = $result->fetch_assoc()) 
  { ?>
     <tr>
      <td> <?php echo $row['Service']; ?></td>
	 <td> <?php echo $row['Status']; ?></td>
     <td><center><a class="btn" href="UserUploadDocument.php?ID=<?php echo $row['ID']; ?>">Upload</a></center></td>
   <td><center><a class="btn" href="UserRequestDetails.php?ID=<?php echo $row['ID']; ?>">View</a></center></td>
	</tr>
<?php
  }
?>
   </table>
   
    <?php
	}
	else
	{
	   echo "No Records Found";
	}
 

  ?>
  
     <?php
  include("../MasterPages/Footer.php");
  ?>
  
