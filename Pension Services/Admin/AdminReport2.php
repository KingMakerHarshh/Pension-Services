<?php
$ID=$_GET['ID'];
$rcnt=0;
$acnt=0;
$ncnt=0;
?>

  <?php
  include_once "../DB/db.php";
  include("../MasterPages/AdminHeader.php");
  ?>
  
  <h1>Report</h1>
   
<?php

$sql = "SELECT r.ID,u.Name,u.Mobile FROM tblrequest r,tblUsers u where r.ServiceID='$ID' and r.UserID=u.Mobile and r.Status='New'";

$result=execute($sql);	

if ($result->num_rows > 0) 
{
$ncnt=0;
?>

	 <table id="fulltable">
     
     <tr><th colspan="3">New Applicant</th>
     </tr>

     <tr>
      <th>Name</th>
      <th>Mobile</th>
     </tr>
     
     <?php
while($row = $result->fetch_assoc()) 
  { 
      $ncnt=$ncnt+1;
      ?>
     <tr>
      <td> <?php echo $row['Name']; ?></td>
      <td> <?php echo $row['Mobile']; ?></td>
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

$sql = "SELECT r.ID,u.Name,u.Mobile FROM tblrequest r,tblUsers u where r.ServiceID='$ID' and r.UserID=u.Mobile and r.Status='Accepted'";

$result=execute($sql);	

if ($result->num_rows > 0) 
{
    $acnt=0;
?>

	 <table id="fulltable">
     
     <tr><th colspan="3">Accepeted Applicant</th>
     </tr>

     <tr>
      <th>Name</th>
      <th>Mobile</th>
     </tr>
     
     <?php
while($row = $result->fetch_assoc()) 
  { $acnt=$acnt+1;?>
     <tr>
      <td> <?php echo $row['Name']; ?></td>
      <td> <?php echo $row['Mobile']; ?></td>
	</tr>
<?php
  }
?>
   </table>
   
    <?php
	}
	else
	{
	   echo "No Accepted Applicant Records Found";
	}
 

  ?>
  


<br>


  
<?php

$sql = "SELECT r.ID,u.Name,u.Mobile FROM tblrequest r,tblUsers u where r.ServiceID='$ID' and r.UserID=u.Mobile and r.Status='Rejected'";

$result=execute($sql);	

if ($result->num_rows > 0) 
{

?>

	 <table id="fulltable">
     
     <tr><th colspan="3">New Applicant</th>
     </tr>

     <tr><th>Name</th>
      <th>Mobile</th>
     </tr>
     
     <?php
while($row = $result->fetch_assoc()) 
  { $rcnt=$rcnt+1;
  ?>
     <tr>
      <td> <?php echo $row['Name']; ?></td>
      <td> <?php echo $row['Mobile']; ?></td>
    </tr>
<?php
  }
?>
   </table>
   
    <?php
	}
	else
	{
	   echo "No rejected Applicant Records Found";
	}
 

  ?>
  

  <table id="minitable">
<tr>
<td>New Applications</td>
<td> <?php echo $ncnt; ?></td>
</tr>

<tr>
<td>Accepted Applications</td>
<td> <?php echo $acnt; ?></td>
</tr>

<tr>
<td>Rejected Applications</td>
<td> <?php echo $rcnt; ?></td>
</tr>
</table>
     <?php
  include("../MasterPages/Footer.php");
  ?>
  
