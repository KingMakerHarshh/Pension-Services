<?php
session_start();
$User=$_SESSION['UserID'];

include_once "../DB/db.php";
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

	$sql = "SELECT * FROM tblusers where Mobile='$User'";

	$result=execute($sql);	
	
	if($row = $result->fetch_assoc())
 	{
		$Category=$row['Category'];
	}
?>


  <?php
  include_once "../DB/db.php";
  include("../MasterPages/UserHeader.php");
  ?>
  
  <h1>Services List</h1>

<?php

$sql = "SELECT * FROM tblservices where Category='$Category'";

$result=execute($sql);	

if ($result->num_rows > 0) 
{

?>

	 <table id="minitable">
     
     <tr><th>Service</th>
	 <th>Category</th>
      <th>View</th>
     </tr>
     
     <?php
while($row = $result->fetch_assoc()) 
  { ?>
     <tr>
      <td> <?php echo $row['Service']; ?></td>
	 <td> <?php echo $row['Category']; ?></td>
   <td><center><a class="btn" href="UserServicesDetails.php?ID=<?php echo $row['ID']; ?>">View</a></center></td>
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
  
