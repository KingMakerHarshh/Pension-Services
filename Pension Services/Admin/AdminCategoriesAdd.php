  
  <?php
  include("../MasterPages/AdminHeader.php");
  ?>


<h1>Add Category</h1>
 
 <form id="frm" name="frm" method="post" action="">
           	<table id="minitable">
            	<tr>
                	<td>Category</td>
					<td><input type="text" name="txtCategory" maxlength="100"/></td>
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

include_once "../DB/db.php";

$insert="INSERT INTO `tblcategories`(`Category`) VALUES 
					  ('".$_REQUEST['txtCategory']."')";
$res=execute($insert);

if($res)
{
echo "<script type='text/javascript'> alert('Successfully Inserted');</script>";
echo "<meta http-equiv='refresh' content='0;url=AdminCategoriesList.php'>";
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
  if(f.txtCategory.value=="")
   {
        alert("Category cannot be empty");
        f.txtCategory.focus();
		return false ;
    }
	else
		return true;

}
</script>
