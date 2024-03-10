   
  <?php
include_once "../DB/db.php";

 $ID=$_GET['ID'];
 
 $sql = "SELECT * FROM tblusers where ID= $ID";
 $result=execute($sql);	
 if($row = $result->fetch_assoc())
 {
 	$ID=$row['ID'];
	$Name=$row['Name'];
    $Aadhaar=$row['Aadhaar'];
    $Address=$row['Address'];
    $City=$row['City'];
	$State=$row['State'];
	$Mobile=$row['Mobile'];
    $EmailID=$row['EmailID'];
    $Category=$row['Category'];
 }

 if (isset($_POST['btndelete']))
 {
	$sql="DELETE FROM tblusers where ID=$ID";
	$result=execute($sql);	
			 
	$sql="DELETE FROM tbllogin where UserID='$Mobile'";
	$result=execute($sql);	
	if($result)
	{
		echo "<script type='text/javascript'> alert('Deleted Successfully');</script>";
		echo "<meta http-equiv='refresh' content='0;url=AdminUsersList.php'>";
	}
	else
	{
		echo "<script type='text/javascript'> alert('Action not processed');</script>";
	}
}
		
?>

<?php
  include("../Masterpages/AdminHeader.php");
?>
  
   <h3>User Details</h3>

  

 
 <form id="frm" name="frm" method="post" action="">
           	<table id="minitable">
                 <tr>
                	<td style="width:35%;">ID </td>
                    <td> <?php echo $ID; ?></td>
                </tr>
                
                <tr>
                	<td>Name </td>
                    <td> <?php echo $Name; ?></td>
                </tr>

                <tr>
                	<td>Aadhaar </td>
                    <td> <?php echo $Aadhaar; ?></td>
                </tr>
                
                <tr>
                	<td> Address </td>
                    <td> <?php echo $Address; ?></td>
                </tr>

                <tr>
                	<td> City </td>
                    <td> <?php echo $City; ?></td>
                </tr>

                <tr>
                	<td> State </td>
                    <td> <?php echo $State; ?></td>
                </tr>

                <tr>
                	<td> Mobile </td>
                    <td> <?php echo $Mobile; ?></td>
                </tr>

                <tr>
                	<td> EmailID </td>
                    <td> <?php echo $EmailID; ?></td>
                </tr>

                <tr>
                	<td> Category </td>
                    <td> <?php echo $Category; ?></td>
                </tr>
                
             <tr>
             <td>
              
              <button type="button" name="btnBack" onClick="window.location.href='AdminUsersList.php'">Back</button>
             </td>
                	  <td>               

                <Input type="submit" name="btndelete" value="Delete" onclick="return confirmSubmit()" />
              </td>

               
                </tr>
                
           </table>
           </form>
  
   <?php
  include("../Masterpages/Footer.php");
  ?>