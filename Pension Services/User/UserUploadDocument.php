  
   <?php
   session_start();
   $Mobile=$_SESSION['UserID'];
   $ID=$_GET['ID'];
   ?>

<?php
  include_once "../DB/db.php";
    include("../MasterPages/UserHeader.php");
    ?>
   

     <h3>Upload Document</h3>
   <form name="frm" method="post" action="" enctype="multipart/form-data">
                 <table id="minitable">
                  
                <tr>
              <td>Document Type</td>
              <td>
                   <select name="cmbDocumentTypes">
                      <option value="0">Select</option>
                        <?php
                             $sql = "SELECT distinct(DocumentTypes) FROM tbldocumenttypes where ServiceID=$ID";
                             $query_result = execute($sql);
                             while($result = mysqli_fetch_assoc($query_result))
                          {
                                   ?>
                              <option <?php echo (isset($_REQUEST['cmbDocumentTypes']) ? (($_REQUEST['cmbDocumentTypes']== $result['DocumentTypes']) ? "Selected" : "") : "")  ?> value = "<?php echo $result['DocumentTypes']?>"><?php echo $result['DocumentTypes'] ?></option>
                                                          
                          <?php
                  
                              }
                      
                          ?>
                          </select>
                          </td>
              </tr>
              
                   
               <tr>
                  <td>Document</td>
                  <td><input name="MAX_FILE_SIZE" value="100024000000" type="hidden"> <input name="fluploadPic" type="file" /></td>
                  </tr>     
                  
                        
                            
                  <tr>
                      <td colspan="4" style="text-align:center;">
                      <input type="submit" name="btnsave" onclick="return check(frm)" onfocus="disp1();" value="Save">
                      <button type="button" name="btncancel" onClick="window.location.href='UserRequestList.php'">Cancel</button>
         
                      </td>
                  </tr>
             </table>
             </form>


             <?php
	$sql = "SELECT * FROM tbldocuments where ServiceID=$ID and UserID='$Mobile'";
	$result = execute($sql);
?>

	<table id="minitable">
     
     <tr><th>ID</th>
	 <th>Document Types</th>
     <th>Document</th>
     </tr>
     
     <?php
while($row = mysqli_fetch_array($result))
  { ?>
     <tr>
      <td> <?php echo $row['ID']; ?></td>
	 <td> <?php echo $row['DocumentType']; ?></td>
   <td> <img src="<?php echo $row['Document']; ?>" class="previewimg" />
	</tr>
<?php
  }
?>
   </table>
    
    
    
         <?php
    include("../MasterPages/Footer.php");
    ?>
    
  
    
     <?php
  if(isset($_REQUEST['btnsave']))
  {
    $DocumentTypes=$_POST['cmbDocumentTypes'];
  
        $Pic=$_FILES['fluploadPic']['name'];
        $PicPath = "../UploadedDocuments/$Pic";
        $file_tmp_name=$_FILES['fluploadPic']['tmp_name'];
        move_uploaded_file($file_tmp_name, $PicPath);
        
        $insert="INSERT INTO `tbldocuments`(`ServiceID`, `UserID`, 
        `DocumentType`, `Document`) VALUES ($ID,'$Mobile','$DocumentTypes',
        '$PicPath')";
        
        $res=execute($insert);
  
        if($res)
        {
            echo "<script type='text/javascript'> alert('Successfully Uploaded');</script>";
            echo "<meta http-equiv='refresh' content='0;url=UserUploadDocument.php?ID=$ID'>";
        }
        else
        {
            echo "<script type='text/javascript'> alert('Query is not executed');</script>";
        }
            
    }
  
  ?>

<script language="javascript">
  function check(f)
{
  if (f.cmbDocumentTypes.value.trim()=="0")
{
alert("This DocumentTypes field can not be empty");
f.cmbDocumentTypes.focus();
return false ;
}
else
return true;
}
function disp1()
{
  a=frm.fluploadPic.value;
    if(a.length<1)
    {
        alert("Please select the Document");
        frm.fluploadPic.focus();
    }
}
  </script>