<?php
$ID=$_GET['ID'];

include_once "../DB/db.php";
?>

<?php
session_start();
$Mobile=$_SESSION['UserID'];
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

	$sql = "SELECT * FROM tblservices where ID=$ID";
	$result=execute($sql);	
	
	if($row = $result->fetch_assoc())
 	{
		$Service=$row['Service'];
		$Category=$row['Category'];
		$Eligibility=$row['Eligibility'];
		$Reservation=$row['Reservation'];
		$Subsidy=$row['Subsidy'];
		$AboutService=$row['AboutService'];
	}
?>



<?php

if(isset($_REQUEST['btnApply']))
{

  $sql = "SELECT * FROM tblrequest where ServiceID=$ID and UserID='$Mobile'";
	$result=execute($sql);	
	
	$ress=execute($sql);	
	$res=mysqli_num_rows($ress);
	
	if ($res>0) 
	{
    echo "<script type='text/javascript'> alert('Already applied');</script>";
      echo "<meta http-equiv='refresh' content='0;url=UserServicesList.php'>";

  }
  else
  {

    $insert="INSERT INTO `tblrequest`(`ServiceID`, `UserID`, 
`Status`) VALUES ('$ID','$Mobile',
'New')";
$res=execute($insert);

	    	
	$res=execute($sql);	

    if($res)
    {
      echo "<script type='text/javascript'> alert('Successfully Inserted');</script>";
      echo "<meta http-equiv='refresh' content='0;url=UserServicesList.php'>";
    }
    else
    {
      echo "<script type='text/javascript'> alert('Query not executed');</script>";
    }	
  }
}
?>


  <?php
  include("../MasterPages/UserHeader.php");
  ?>
  
  <h1>Service Details Page</h1>
  
            
<form id="frm" name="frm" method="post" action="" enctype="multipart/form-data">
           	<table id="minitable">
            	
				<tr>
                	<td>Service</td>
                    <td><?php echo $Service; ?></td>
                </tr>
				
				<tr>
                	<td>Category</td>
                    <td>
                        <?php echo $Category; ?>
					</td>
                </tr>

                <tr>
                	<td>Eligibility</td>
                    <td><?php echo $Eligibility; ?>
					</td>
                </tr>
				
                <tr>
                	<td>Reservation</td>
                    <td>
                        <?php echo $Reservation; ?>
					</td>
                </tr>

                <tr>
                	<td>Subsidy</td>
                    <td><?php echo $Subsidy; ?>
					</td>
                </tr>
				
                <tr>
                	<td>AboutService</td>
                    <td><?php echo $AboutService; ?>
					</td>
                </tr>
				
                <tr>
                <td>
                <Input type="submit" name="btnApply" value="Apply" id="button"/>
</td>
<td>
<button type="button" name="btnback" onClick="window.location.href='UserServicesList.php'">Back</button>
  
                </td>
                </tr>
			
           </table>
           </form>


           <?php
	$sql = "SELECT * FROM tbldocumenttypes where ServiceID=$ID";
	$result = execute($sql);
?>

	<table id="minitable">
     
     <tr><th>ID</th>
	 <th>Document Types</th>
     </tr>
     
     <?php
while($row = mysqli_fetch_array($result))
  { ?>
     <tr>
      <td> <?php echo $row['ID']; ?></td>
	 <td> <?php echo $row['DocumentTypes']; ?></td>
   
	</tr>
<?php
  }
?>
   </table>

         
  
  
    <?php
  include("../MasterPages/Footer.php");
  ?>
  