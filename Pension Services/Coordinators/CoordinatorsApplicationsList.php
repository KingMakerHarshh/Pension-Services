<?php
$ID=$_GET['ID'];
?>

  <?php
  include_once "../DB/db.php";
  include("../MasterPages/CoordinatorsHeader.php");
  ?>
  
  <h1>Applicant List</h1>
   
<?php

$sql = "SELECT r.ID,u.Name,u.Mobile FROM tblrequest r,tblUsers u where r.ServiceID='$ID' and r.UserID=u.Mobile and r.Status='New'";

$result=execute($sql);	

if ($result->num_rows > 0) 
{

?>

	 <table id="fulltable">
     
     <tr><th>Name</th>
      <th>Mobile</th>
      <th>View</th>
     </tr>
     
     <?php
while($row = $result->fetch_assoc()) 
  { ?>
     <tr>
      <td> <?php echo $row['Name']; ?></td>
      <td> <?php echo $row['Mobile']; ?></td>
   <td><center><a class="btn" href="CoordinatorsApplicationsDetails.php?ID=<?php echo $row['ID']; ?>">View Details</a></center></td>
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
  
