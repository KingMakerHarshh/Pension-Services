<?php
$ID=$_GET['ID'];

include_once "../DB/db.php";
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

	$sql = "SELECT * FROM tblcoordinators where ID=$ID";
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

if(isset($_REQUEST['btnupdate']))
{
    $Coordinator=$_POST['txtCoordinator'];
	$Qualification=$_POST['txtQualification'];
	$Designation=$_POST['txtDesignation'];
    $Mobile=$_POST['txtMobile'];
	$EmailID=$_POST['txtEmailID'];

    $sql="UPDATE tblcoordinators SET Coordinator='$Coordinator',
    Qualification='$Qualification',Designation='$Designation',
    Mobile='$Mobile',EmailID='$EmailID'
    ,Category='$Category' where ID=$ID";
	    	
	$res=execute($sql);	

    if($res)
    {
      echo "<script type='text/javascript'> alert('Successfully Updated');</script>";
      echo "<meta http-equiv='refresh' content='0;url=AdminCoordinatorsList.php'>";
    }
    else
    {
      echo "<script type='text/javascript'> alert('Query not executed');</script>";
    }	
}


		if (isset($_POST['btndelete']))
		{
			 $sql="DELETE FROM tblcoordinators where ID=$ID";
			 $result=execute($sql);	
			 
             $sql="DELETE FROM tbllogin where UserID='$Mobile'";
             $result=execute($sql);	

			 if($result)
			 {
			 	echo "<script type='text/javascript'> alert('Deleted Successfully');</script>";
			 	echo "<meta http-equiv='refresh' content='0;url=AdminCoordinatorsList.php'>";
			 }
			 else
			 {
				 echo "<script type='text/javascript'> alert('Action Not Processed');</script>";
			 	 echo "<meta http-equiv='refresh' content='0;url=AdminCoordinatorsList.php'>";
			 }
        }
        

        ?>

  <?php
  include("../MasterPages/AdminHeader.php");
  ?>
  
  <h1>Coordinator Details Page</h1>
  
            
<form id="frm" name="frm" method="post" action="" enctype="multipart/form-data">
           	<table id="minitable">
            	
				<tr>
                	<td>Coordinator</td>
                    <td><label id="l2"><?php echo $Coordinator; ?></label>
					 <input type="text" name="txtCoordinator" maxlength="100" class="hide" value="<?php echo $Coordinator; ?>"/>
					</td>
                </tr>
				
				<tr>
                	<td>Qualification</td>
                    <td><label id="l2"><?php echo $Qualification; ?></label>
					 <input type="text" name="txtQualification" maxlength="100" class="hide" value="<?php echo $Qualification; ?>"/>
					</td>
                </tr>

                <tr>
                	<td>Designation</td>
                    <td><label id="l2"><?php echo $Designation; ?></label>
					 <input type="text" name="txtDesignation" maxlength="100" class="hide"  value="<?php echo $Designation; ?>"/>
					</td>
                </tr>
				
                <tr>
                	<td>Mobile</td>
                    <td><label id="l2"><?php echo $Mobile; ?></label>
					 <input type="text" name="txtMobile" maxlength="100" class="hide"  value="<?php echo $Mobile; ?>"/>
					</td>
                </tr>
                	
				<tr>
                	<td>EmailID </td>
                    <td><label id="l4"><?php echo $EmailID; ?></label>
					 <input type="text" name="txtEmailID" maxlength="5" class="hide" value="<?php echo $EmailID; ?>"/>
					</td>
                </tr>
				
			    <td>Category</td>
                  <td>
                  <?php echo $Category; ?>
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
  if(f.txtCoordinator.value=="")
   {
        alert("Coordinator cannot be empty");
        f.txtCoordinator.focus();
		return false ;
    }
    else if (f.txtQualification.value.trim()=="")
    {
        alert("This Qualification field can not be empty");
        f.txtQualification.focus();
        return false ;
    }
    else if (f.txtDesignation.value.trim()=="")
    {
        alert("This Designation field can not be empty");
        f.txtDesignation.focus();
        return false ;
    }
    else if (f.txtMobile.value.trim()=="" || checkmobile(f.txtMobile)==false)
    {
        alert("This Mobile field can not be empty");
        f.txtMobile.focus();
        return false ;
    }

    else if (f.txtEmailID.value.trim()=="" || checkemail(f.txtEmailID)==false)
    {
        alert("This Email ID field can not be empty");
        f.txtEmailID.focus();
        return false ;
    }
	else
		return true;

}
 
</script>