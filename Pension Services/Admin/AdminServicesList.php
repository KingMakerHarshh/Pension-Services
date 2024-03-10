<?php
include_once "../DB/db.php";
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


  <?php
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
	 <th>Category</th>
      <th>View</th>
     </tr>
     
     <?php
while($row = $result->fetch_assoc()) 
  { ?>
     <tr>
      <td> <?php echo $row['Service']; ?></td>
	 <td> <?php echo $row['Category']; ?></td>
   <td><a class="btn" href="AdminServicesDetails.php?ID=<?php echo $row['ID']; ?>">View</a></td>
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
  
