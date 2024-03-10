  
     
  <?php
  include_once "../DB/db.php";
  include("../MasterPages/AdminHeader.php");
  ?>
  
  <h1>Users List</h1>
        
  <form id="frm" name="frm" method="post" action="">
  <table id="minitable">
  
  <tr>
            <td>State</td>
            <td>
    			 <select name="cmbState" onChange="check1()">
        		    <option value="0">Select</option>
      			
                    <?php
					   	$sql = "SELECT distinct(name) FROM tbl_states";
    	   				$query_result = execute($sql);
					   	while($result = mysqli_fetch_assoc($query_result))
        				{
	  			       		?>
				            <option <?php echo (isset($_REQUEST['cmbState']) ? (($_REQUEST['cmbState']== $result['name']) ? "Selected" : "") : "")  ?> value = "<?php echo $result['name']?>"><?php echo $result['name'] ?></option>
                                                        
        				<?php
        		
							}
					
						?>

                        </select>
                        </td>
            </tr>

			<?php
			if(isset($_REQUEST['cmbState']))
	{
		if($_REQUEST['cmbState']!='0')
		{

            $sql = "SELECT distinct(id) FROM tbl_states where name='". $_REQUEST['cmbState']."'";
    	   	$result = execute($sql);
               if($row = $result->fetch_assoc())
               {
                   $ID=$row['id'];
               }
		?>

            <tr>
            <td>City</td>
            <td>
           
    			 <select name="cmbCity" onChange="check1()">
        		    <option value="0">Select</option>
      				<?php
					   	$sql = "SELECT distinct(name) FROM tbl_cities where state_id = '$ID'";
    	   				$query_result = execute($sql);
					   	while($result = mysqli_fetch_assoc($query_result))
        				{
	  			       		?>
				            <option <?php echo (isset($_REQUEST['cmbCity']) ? (($_REQUEST['cmbCity']== $result['name']) ? "Selected" : "") : "")  ?> value = "<?php echo $result['name']?>"><?php echo $result['name'] ?></option>
                                                        
        				<?php
        		
							}
					
						?>
                        </select>
                          
                        </td>
            </tr>

            <?php
	 }
}
	?>

</table>

</form>


<?php
 if(isset($_REQUEST['cmbCity']))
	{
		if($_REQUEST['cmbCity']!='0' && $_REQUEST['cmbState']!='0')
		{
            $City=$_REQUEST['cmbCity'];
			$State=$_REQUEST['cmbState'];
      ?>

   
<?php

$sql = "SELECT * FROM tblusers where City='$City' and State='$State'";

$result=execute($sql);	

if ($result->num_rows > 0) 
{

?>

	 <table id="fulltable">
     
     <tr><th>Name</th>
	    <th>City</th>
     <th>Mobile</th>
      <th>View</th>
     </tr>
     
     <?php
while($row = $result->fetch_assoc()) 
  { ?>
     <tr>
      <td> <?php echo $row['Name']; ?></td>
	 <td> <?php echo $row['City']; ?></td>
       <td> <?php echo $row['Mobile']; ?></td>
   <td><center><a class="btn" href="AdminUsersView.php?ID=<?php echo $row['ID']; ?>">View</a></center></td>
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
	 }
}
	?>
  
     <?php
  include("../MasterPages/Footer.php");
  ?>
  
  <script type="text/javascript">
function check1() {
     document.frm.submit()
}
</script>
  
  