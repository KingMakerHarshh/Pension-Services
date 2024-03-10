  <?php
   include_once "../DB/db.php";
   ?>
   
  <?php
  include("../MasterPages/AdminHeader.php");
  ?>

1`12
<h1>Add Category</h1>
 
 <form id="frm" name="frm" method="post" action="">
           	<table id="minitable">
            	<tr>
                	<td>Coordinator</td>
					<td><input type="text" name="txtCoordinator" maxlength="100"/></td>
                </tr>

                <tr>
                	<td>Qualification</td>
					<td><input type="text" name="txtQualification" onfocus="disp1();" maxlength="50"/></td>
                </tr>

                <tr>
                	<td>Designation</td>
					<td><input type="text" name="txtDesignation" onfocus="disp2();" maxlength="50"/></td>
                </tr>

                <tr>
                	<td>Mobile</td>
					<td><input type="text" name="txtMobile" onfocus="disp3();" maxlength="10" onKeyPress="return numbersonly(event, false)"/></td>
                </tr>
				
				<tr>
                	<td>Email ID</td>
					<td><input type="text" name="txtEmailID" onfocus="disp4();" maxlength="100" /></td>
                </tr>
       		
                <tr>
            <td>Category</td>
            <td>
    			 <select name="cmbCategory">
        		    <option value="0">Select</option>
      			
                    <?php
					   	$sql = "SELECT distinct(Category) FROM tblcategories";
    	   				$query_result = execute($sql);
					   	while($result = mysqli_fetch_assoc($query_result))
        				{
	  			       		?>
				            <option <?php echo (isset($_REQUEST['cmbCategory']) ? (($_REQUEST['cmbCategory']== $result['Category']) ? "Selected" : "") : "")  ?> value = "<?php echo $result['Category']?>"><?php echo $result['Category'] ?></option>
                                                        
        				<?php
        		
							}
					
						?>

                        </select>
                        </td>
            </tr>



                <tr>
                	<td colspan="2" style="text-align:center;">
                    <input type="submit" name="btnsave" onClick="return check(frm)" value="Add">
                    <button type="button" name="btncancel" onClick="window.location.href='AdminCategoriesList.php'">Cancel</button>
   	
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

    $Coordinator=$_POST['txtCoordinator'];
	$Qualification=$_POST['txtQualification'];
    $Designation=$_POST['txtDesignation'];
	$Mobile=$_POST['txtMobile'];
    $EmailID=$_POST['txtEmailID'];
    $Category=$_POST['cmbCategory'];
    
   

    $insert="INSERT INTO `tblcoordinators`(`Coordinator`, `Qualification`, 
`Designation`, `Mobile`, `EmailID`, `Category`) VALUES ('$Coordinator','$Qualification',
'$Designation','$Mobile','$EmailID','$Category')";
$res=execute($insert);

$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$VerificationCode = substr(str_shuffle( $chars ), 0, 5);

$mobileno=$Mobile;
$str="Dear User, Your have registered successfully. Your User ID is ".$Mobile." and Password is ".$VerificationCode;

$sql="INSERT INTO `tbllogin`(`UserID`, `Password`, `UserType`) VALUES ('$Mobile','$VerificationCode','Coordinators')";

$res=execute($sql);	

if($res)
{
echo "<script type='text/javascript'> alert('Successfully Inserted');</script>";
echo "<meta http-equiv='refresh' content='0;url=AdminCoordinatorsList.php'>";
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
function disp1()
    {
        a=frm.txtCoordinator.value;
        if(a.length<1)
        {
            alert("This Coordinator Field can not be Empty");
            frm.txtCoordinator.focus();
        }
    }

    function disp2()
    {
        a=frm.txtQualification.value;
        if(a.length<1)
        {
            alert("This qualification Field can not be Empty");
            frm.txtQualification.focus();
        }
    }

    function disp3()
    {
        a=frm.txtDesignation.value;
        if(a.length<1)
        {
            alert("This Designation Field can not be Empty");
            frm.txtDesignation.focus();
        }
    }

    function disp4()
    {
        a=frm.txtMobile.value;
        if(a.length<1)
        {
            alert("This Mobno Field can not be Empty");
            frm.txtMobile.focus();
        }
    }
</script>
