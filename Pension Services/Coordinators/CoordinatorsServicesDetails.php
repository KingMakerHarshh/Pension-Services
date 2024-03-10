<?php
$ID=$_GET['ID'];

include_once "../DB/db.php";
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

	$sql = "SELECT * FROM tblservices where ID=$ID";
	$result=execute($sql);	
	
	if($row = $result->fetch_assoc())
 	{
 		$ID=$row['ID'];
		$Service=$row['Service'];
		$Category=$row['Category'];
		$Eligibility=$row['Eligibility'];
		$Reservation=$row['Reservation'];
		$Subsidy=$row['Subsidy'];
		$AboutService=$row['AboutService'];
	}
?>

<?php

if(isset($_REQUEST['btnupdate']))
{
    $Service=$_POST['txtService'];
	$Eligibility=$_POST['txtEligibility'];
	$Reservation=$_POST['txtReservation'];
    $Subsidy=$_POST['txtSubsidy'];
	$AboutService=$_POST['txtAboutService'];

    $sql="UPDATE tblservices SET Service='$Service',
    Eligibility='$Eligibility',Reservation='$Reservation',
    Subsidy='$Subsidy',AboutService='$AboutService' where ID=$ID";
	    	
	$res=execute($sql);	

    if($res)
    {
      echo "<script type='text/javascript'> alert('Successfully Updated');</script>";
      echo "<meta http-equiv='refresh' content='0;url=CoordinatorsServicesList.php'>";
    }
    else
    {
      echo "<script type='text/javascript'> alert('Query not executed');</script>";
    }	
}


		if (isset($_POST['btndelete']))
		{
			 $sql="DELETE FROM tblservices where ID=$ID";
			 $result=execute($sql);	
			 
             $sql="DELETE FROM tbldocumenttypes where ServiceID=$ID";
			 $result=execute($sql);	

			 if($result)
			 {
			 	echo "<script type='text/javascript'> alert('Deleted Successfully');</script>";
			 	echo "<meta http-equiv='refresh' content='0;url=CoordinatorsServicesList.php'>";
			 }
			 else
			 {
				 echo "<script type='text/javascript'> alert('Action Not Processed');</script>";
			 	 echo "<meta http-equiv='refresh' content='0;url=CoordinatorsServicesList.php'>";
			 }
        }
        

        ?>

  <?php
  include("../MasterPages/CoordinatorsHeader.php");
  ?>
  
  <h1>Service Details Page</h1>
  
            
<form id="frm" name="frm" method="post" action="" enctype="multipart/form-data">
           	<table id="minitable">
            	
				<tr>
                	<td>Service</td>
                    <td><label id="l2"><?php echo $Service; ?></label>
					 <input type="text" name="txtService" maxlength="100" class="hide" value="<?php echo $Service; ?>"/>
					</td>
                </tr>
				
				<tr>
                	<td>Category</td>
                    <td>
                    <label id="l2"><?php echo $Category; ?>
					</td>
                </tr>

                <tr>
                	<td>Eligibility</td>
                    <td><label id="l2"><?php echo $Eligibility; ?></label>
                    <textarea type="text" name="txtEligibility" style="height:200px; width:500px;" class="hide"><?php echo $Eligibility; ?></textarea>
					</td>
                </tr>
				
                <tr>
                	<td>Reservation</td>
                    <td><label id="l2"><?php echo $Reservation; ?></label>
                    <textarea type="text" name="txtReservation" style="height:200px; width:500px;" class="hide"><?php echo $Reservation; ?></textarea>
					</td>
                </tr>

                <tr>
                	<td>Subsidy</td>
                    <td><label id="l2"><?php echo $Subsidy; ?></label>
                    <textarea type="text" name="txtSubsidy" style="height:200px; width:500px;" class="hide"><?php echo $Subsidy; ?></textarea>
					</td>
                </tr>
				
                <tr>
                	<td>AboutService</td>
                    <td><label id="l2"><?php echo $AboutService; ?></label>
                    <textarea type="text" name="txtAboutService" style="height:200px; width:500px;" class="hide"><?php echo $AboutService; ?></textarea>
					</td>
                </tr>
				
                <tr>
                <td>
                <Input type="submit" name="btndelete" value="Delete" onclick="return confirmSubmit()" id="button"/>
                <button type="button" class="hide" name="btncancel" onclick="reloadPage()" id="button" >Cancel</button>
                 <td>
               <button type="button" name="btnedit" onclick="addInput(this.form);" id="button">Edit</button>
               <Input type="submit" class="hide" name="btnupdate" value="Update" onclick="return check(frm)" id="button"/></td>
             
                </td>
                </tr>
			
           </table>
           </form>
         
  
  
    <?php
  include("../MasterPages/Footer.php");
  ?>
  
  <style type="text/css">
input {display:block;}
.hide {display:none;} 

textarea {display:block;}
</style>




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
