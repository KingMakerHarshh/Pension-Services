<?php
$ID=$_GET['ID'];

include_once "../DB/db.php";
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$sql = "SELECT * FROM tblrequest where ID=$ID";
$result=execute($sql);	

if($row = $result->fetch_assoc())
 {
    $ServiceID=$row['ServiceID'];
    $UserID=$row['UserID'];
    $Status=$row['Status'];
}
?>

<?php
if(isset($_REQUEST['btnaccept']))
{
	$sql="UPDATE tblrequest SET Status='Accepted' where ID= '$ID'";
	$ress=execute($sql);	

    echo "<script type='text/javascript'> alert('Updated Successfully');</script>";
	echo "<meta http-equiv='refresh' content='0;url=CoordinatorsApplicationsList.php?ID=$ServiceID'>";
}
if(isset($_REQUEST['btnreject']))
{

    $sql="UPDATE tblrequest SET Status='Rejected' where ID= '$ID'";
	$ress=execute($sql);	

    echo "<script type='text/javascript'> alert('Updated Successfully');</script>";
	echo "<meta http-equiv='refresh' content='0;url=CoordinatorsApplicationsList.php?ID=$ServiceID'>";

}
?>

<?php


	$sql = "SELECT * FROM tblservices where ID=$ServiceID";
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


    $sql = "SELECT * FROM tblusers where Mobile=$UserID";
	$result=execute($sql);	
	
	if($row = $result->fetch_assoc())
 	{
		$Name=$row['Name'];
		$Aadhaar=$row['Aadhaar'];
		$Address=$row['Address'];
		$State=$row['State'];
        $City=$row['City'];
		$Mobile=$row['Mobile'];
		$EmailID=$row['EmailID'];
		$Category=$row['Category'];
	}


    
?>

  <?php
  include("../MasterPages/CoordinatorsHeader.php");
  ?>
  
  <h1>Application Details Page</h1>
  
            
<form id="frm" name="frm" method="post" action="" enctype="multipart/form-data">
           	<table id="fulltable">
            	<tr>
<th colspan="2">
    Service Details
</th>
</tr>
				<tr>
                	<td style="width:20%;">Service</td>
                    <td style="width:30%;"><?php echo $Service; ?></td>
</tr>
<tr>
                	<td style="width:20%;">Category</td>
                    <td style="width:30%;">
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
                	<td>Status</td>
                    <td><?php echo $Status; ?>
					</td>
</tr>
<tr>
                 <td colspan="2">
				 <center>    <input type="submit" name="btnaccept" onclick="return check(frm)" value="Accept"> 
			   <input type="submit" name="btnreject" onclick="return check(frm)" value="Reject">  </center> 
</td>
</tr>

                <tr>
<th colspan="4">
    User Details
</th>
</tr>

                <tr>
                	<td>Name</td>
                    <td>
                        <?php echo $Name; ?>
					</td>
</tr>
<tr>
                	<td>Aadhaar </td>
                    <td><?php echo $Aadhaar; ?>
					</td>
                </tr>
				
                	
				<tr>
                	<td>Address </td>
                    <td>
                        <?php echo $Address; ?>
					</td>
</tr>
<tr>
                	<td>City</td>
					<td><?php echo $City; ?>		
					</td>
                </tr>
				
				  <tr>
                	<td>State</td>
					<td> <?php echo $State; ?>
					</td>
</tr>
<tr> 
                    <td>Mobile</td>
					<td><?php echo $Mobile; ?></td>
                </tr>
				
				  <tr>
                	<td>Email ID</td>
					<td>
                        <?php echo $EmailID; ?>
					</td>
</tr>
<tr>
                	<td>Category</td>
					<td><?php echo $Category; ?></td>
                </tr>			
           </table>


           <?php
	$sql = "SELECT * FROM tbldocuments where ServiceID=$ServiceID and UserID='$UserID'";
	$result = execute($sql);
?>

	<table id="minitable">
     
     <tr><th>ID</th>
	 <th>Document Types</th>
     <th>Document</th>
     </tr>
     
     <?php
while($row = mysqli_fetch_array($result))
  { ?>
     <tr>
      <td> <?php echo $row['ID']; ?></td>
	 <td> <?php echo $row['DocumentType']; ?></td>
   <td> <img src="<?php echo $row['Document']; ?>" class="previewimg" />
	</tr>
<?php
  }
?>
   </table>

           </form>


        
         
  
  
    <?php
  include("../MasterPages/Footer.php");
  ?>
  