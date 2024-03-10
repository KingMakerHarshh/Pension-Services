  
  <?php
  $ServiceID=$_GET['SID'];
  include("../MasterPages/CoordinatorsHeader.php");
  ?>


<h1>Add Document Type</h1>
 
 <form id="frm" name="frm" method="post" action="">
           	<table id="minitable">
            	<tr>
                	<td>Document Type</td>
					<td><input type="text" name="txtDocumentTypes" maxlength="100"/></td>
                </tr>
       		
                <tr>
                	<td colspan="2" style="text-align:center;">
                    <input type="submit" name="btnsave" onClick="return check(frm)" value="Add">
                    <button type="button" name="btncancel" onClick="window.location.href='CoordinatorsDocumentsList.php?ID=<?php echo $ServiceID; ?>'">Cancel</button>
   	
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

$insert="INSERT INTO `tbldocumenttypes`(`DocumentTypes`,`ServiceID`) VALUES 
					  ('".$_REQUEST['txtDocumentTypes']."','".$ServiceID."')";
$res=execute($insert);

if($res)
{
echo "<script type='text/javascript'> alert('Successfully Inserted');</script>";
echo "<meta http-equiv='refresh' content='0;url=CoordinatorsDocumentsList.php?ID=$ServiceID'>";
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
  if(f.txtDocumentTypes.value=="")
   {
        alert("Document Type cannot be empty");
        f.txtDocumentTypes.focus();
		return false ;
    }
	else
		return true;

}
</script>
