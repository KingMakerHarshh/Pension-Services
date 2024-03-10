  
     
  <?php
  include_once "../DB/db.php";
  include("../MasterPages/AdminHeader.php");
  ?>
  
  <h1>Coordinators List</h1>
   
  
<button type="button" name="btnadd" onClick="window.location.href='AdminCoordinatorsAdd.php'">Add Coordinator</button>


<?php

$sql = "SELECT * FROM tblcoordinators";

$result=execute($sql);	

if ($result->num_rows > 0) 
{

?>

	 <table id="fulltable">
     
     <tr><th>Coordinator</th>
	 <th>Designation</th>
     <th>Mobile</th>
      <th>View</th>
     </tr>
     
     <?php
while($row = $result->fetch_assoc()) 
  { ?>
     <tr>
      <td> <?php echo $row['Coordinator']; ?></td>
	 <td> <?php echo $row['Designation']; ?></td>
       <td> <?php echo $row['Mobile']; ?></td>
   <td><center><a class="btn" href="AdminCoordinatorsDetails.php?ID=<?php echo $row['ID']; ?>">View</a></center></td>
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
  
