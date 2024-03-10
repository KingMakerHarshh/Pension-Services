<?php
session_start();
$Mobile=$_SESSION['UserID'];

include_once "../DB/db.php";
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

	$sql = "SELECT * FROM tblcoordinators where Mobile='$Mobile'";

	$result=execute($sql);	
	
	if($row = $result->fetch_assoc())
 	{
 		$ID=$row['ID'];
		$Coordinator=$row['Coordinator'];
		$Qualification=$row['Qualification'];
		$Designation=$row['Designation'];
		$Mobile=$row['Mobile'];
		$EmailID=$row['EmailID'];
		$Category=$row['Category'];
	}
?>

  <?php
  include("../MasterPages/CoordinatorsHeader.php");
  ?>
  
  <h3>Coordinators Details Page</h3>
  
            
<form id="frminfo" name="frminfo" method="post" action="" enctype="multipart/form-data">
           	<table id="minitable">
            
					
				<tr>
                	<td>Coordinator</td>
                    <td>
                        <?php echo $Coordinator; ?>	
                    </td>
                </tr>
				
                <tr>
                	<td>Qualification</td>
                    <td>
                        <?php echo $Qualification; ?>	
                    </td>
                </tr>

                <tr>
                	<td>Designation</td>
                    <td>
                        <?php echo $Designation; ?>	
                    </td>
                </tr>
				
				  <tr>
                	<td>Mobile</td>
					<td><?php echo $Mobile; ?></td>
                </tr>
				
                <tr>
                	<td>EmailID</td>
					<td><?php echo $EmailID; ?></td>
                </tr>
				
				<tr>
                	<td>Category</td>
					<td><?php echo $Category; ?></td>
                </tr>
           </table>
           </form>
         
  
  
    <?php
  include("../MasterPages/Footer.php");
  ?>
  