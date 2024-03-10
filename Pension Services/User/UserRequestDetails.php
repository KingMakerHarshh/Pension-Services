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


    $sql = "SELECT * FROM tblusers where Mobile=$Mobile";
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
  include("../MasterPages/UserHeader.php");
  ?>
  
  <h1>Service Details Page</h1>
  
            
<form id="frm" name="frm" method="post" action="" enctype="multipart/form-data">
           	<table id="fulltable">
    	<tr>
             <th colspan="2">Service Details</th>
       </tr>
			
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
    <th colspan="2">
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
	$sql = "SELECT * FROM tbldocuments where ServiceID=$ID and UserID='$Mobile'";
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
  