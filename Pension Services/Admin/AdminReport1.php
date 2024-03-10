
  <?php
  include_once "../DB/db.php";
  include("../MasterPages/AdminHeader.php");
  ?>
  
  <h1>Services List</h1>
   
<?php

$sql = "SELECT * FROM tblservices";

$result=execute($sql);	

if ($result->num_rows > 0) 
{

?>

	 <table id="minitable">
     
     <tr><th>Schemes</th>
      <th>View</th>
     </tr>
     
     <?php
while($row = $result->fetch_assoc()) 
  { ?>
     <tr>
      <td> <?php echo $row['Service']; ?></td>
   <td><center><a class="btn" href="AdminReport2.php?ID=<?php echo $row['ID']; ?>">Applications</a></center></td>
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
  
