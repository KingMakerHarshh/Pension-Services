<?php
session_start();
$Coordinator=$_SESSION['UserID'];
?>

  <?php
  include_once "../DB/db.php";
  include("../MasterPages/CoordinatorsHeader.php");
  ?>
  
  <h1>Services List</h1>
   
<button type="button" name="btnadd" onClick="window.location.href='CoordinatorsServicesAdd.php'">Add Service</button>

<?php

$sql = "SELECT * FROM tblservices where Coordinator='$Coordinator'";

$result=execute($sql);	

if ($result->num_rows > 0) 
{

?>

	 <table id="fulltable">
     
     <tr><th>Service</th>
	 <th>Category</th>
    <th>Documents</th>
      <th>View</th>
     </tr>
     
     <?php
while($row = $result->fetch_assoc()) 
  { ?>
     <tr>
      <td> <?php echo $row['Service']; ?></td>
	 <td> <?php echo $row['Category']; ?></td>
    <td><center><a class="btn" href="CoordinatorsDocumentsList.php?ID=<?php echo $row['ID']; ?>">Documents</a></center></td>
   <td><center> <a class="btn" href="CoordinatorsServicesDetails.php?ID=<?php echo $row['ID']; ?>">View</a></center></td>
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
  
