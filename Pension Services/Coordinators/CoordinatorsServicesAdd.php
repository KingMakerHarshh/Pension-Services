<?php
   include_once "../DB/db.php";

    session_start();
    $Coordinator=$_SESSION['UserID'];
   ?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

	$sql = "SELECT * FROM tblcoordinators where Mobile='$Coordinator'";

	$result=execute($sql);	
	
	if($row = $result->fetch_assoc())
 	{
		$Category=$row['Category'];
	}
?>


   
  <?php
  include("../MasterPages/CoordinatorsHeader.php");
  ?>


<h1>Add Service</h1>
 
 <form id="frm" name="frm" method="post" action="">
           	<table id="minitable">
            	<tr>
                	<td>Service</td>
					<td><input type="text" name="txtService" maxlength="100"/></td>
                </tr>

                <tr>
            <td>Category</td>
            <td>
                <?php echo $Category; ?>
    	    </td>
            </tr>


            <tr>
            	<td>Eligibility</td>
                <td><textarea type="text" name="txtEligibility" style="height:200px; width:500px;"></textarea></td>
           		 </tr>

                    <tr>
            	<td>Reservation</td>
                <td><textarea type="text" name="txtReservation" style="height:200px; width:500px;"></textarea></td>
           		 </tr>

                    <tr>
            	<td>Subsidy</td>
                <td><textarea type="text" name="txtSubsidy" style="height:200px; width:500px;"></textarea></td>
           		 </tr>

                    <tr>
            	<td>About Service</td>
                <td><textarea type="text" name="txtAboutService" style="height:200px; width:500px;"></textarea></td>
           		 </tr>
       	

                <tr>
                	<td colspan="2" style="text-align:center;">
                    <input type="submit" name="btnsave" onClick="return check(frm)" value="Add">
                    <button type="button" name="btncancel" onClick="window.location.href='CoordinatorsServicesList.php'">Cancel</button>
   	
                    </td>
                </tr>
           </table>
           </form>
  



<?php
  include("../MasterPages/Footer.php");
?>
  
   <?php
if(isset($_REQUEST['btnsave']))
{

    $Service=$_POST['txtService'];
    $Eligibility=$_POST['txtEligibility'];
	$Reservation=$_POST['txtReservation'];
    $Subsidy=$_POST['txtSubsidy'];
    $AboutService=$_POST['txtAboutService'];
    
   

    $insert="INSERT INTO `tblservices`(`Service`, `Category`, 
`Eligibility`, `Reservation`, `Subsidy`, `AboutService`, `Coordinator`) 
VALUES ('$Service','$Category','$Eligibility','$Reservation','$Subsidy',
'$AboutService','$Coordinator')";
$res=execute($insert);

if($res)
{
echo "<script type='text/javascript'> alert('Successfully Inserted');</script>";
echo "<meta http-equiv='refresh' content='0;url=CoordinatorsServicesList.php'>";
}
else
{
echo "<script type='text/javascript'> alert('Query not executed');</script>";
}	
}
?>



<script language="javascript">
function check(f)
{
  if(f.txtService.value=="")
   {
        alert("Service cannot be empty");
        f.txtService.focus();
		return false ;
    }
    else if (f.txtEligibility.value.trim()=="")
    {
        alert("This Eligibility field can not be empty");
        f.txtEligibility.focus();
        return false ;
    }
    else if (f.txtReservation.value.trim()=="")
    {
        alert("This Reservation field can not be empty");
        f.txtReservation.focus();
        return false ;
    }
    else if (f.txtSubsidy.value.trim()=="")
    {
        alert("This Subsidy field can not be empty");
        f.txtSubsidy.focus();
        return false ;
    }
	else
		return true;

}
</script>
