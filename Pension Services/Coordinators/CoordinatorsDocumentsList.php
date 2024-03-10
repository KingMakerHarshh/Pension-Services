<?php
$ServiceID=$_GET['ID'];
include_once "../DB/db.php";
?>

<?php
if(isset($_GET['Mode'] ))
{
	if($_GET['Mode'] =="Delete") 
	{
		$sqldel="Delete from tbldocumenttypes where ID='".$_REQUEST['ID']."' ";
		$ress=execute($sqldel);	
	
		if($ress)
		{
			echo "<script type='text/javascript'> alert('Deleted Successfully');</script>";
			echo "<meta http-equiv='refresh' content='0;url=CoordinatorsDocumentsList.php?ID=$ServiceID'>";
		}
		else
		{
			echo "<script type='text/javascript'> alert('Action not processed');</script>";
		}
	}
}

?>



<?php
  include("../MasterPages/CoordinatorsHeader.php");
  ?>


<h1>Document Types List</h1>

<button type="button" name="btnadd" onClick="window.location.href='CoordinatorsDocumentsAdd.php?SID=<?php echo $ServiceID; ?>'">Add Type</button>

<button type="button" name="btnback" onClick="window.location.href='CoordinatorsServicesList.php'">Back</button>


<?php
	$sql = "SELECT * FROM tbldocumenttypes where ServiceID=$ServiceID";
	$result = execute($sql);
?>

	<table id="minitable">
     
     <tr><th>ID</th>
	 <th>Document Types</th>
     <th>Delete</th>
     </tr>
     
     <?php
while($row = mysqli_fetch_array($result))
  { ?>
     <tr>
      <td> <?php echo $row['ID']; ?></td>
	 <td> <?php echo $row['DocumentTypes']; ?></td>
   <td><center><a href="CoordinatorsDocumentsList.php?ID=<?php echo $row['ID']; ?>&Mode=Delete" onClick="return confirm(' Are You Sure To Delete? ');" >
  Delete</a>	 </td>
	</tr>
<?php
  }
?>
   </table>




<?php
  include("../MasterPages/Footer.php");
?>