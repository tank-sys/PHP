<html>
   <body>
      <form action = "" method = "POST" enctype = "multipart/form-data">
         <input type="file" multiple="multiple" name = "image[]" />
         <input type = "submit"/ value="Upload">
     </form>
<?php
if(isset($_FILES['image'])){
$lokasi = "./coe/";
$errors= array();
$extensions= array("jpeg","jpg","png","doc","docx","pdf","xsl","zip");
$total = count($_FILES['image']['name']);

echo "<table>";
for( $i=0 ; $i < $total ; $i++ ) {
  $tmpFilePath = $_FILES['image']['tmp_name'][$i];
  if ($tmpFilePath != ""){
      $newFilePath = $lokasi . $_FILES['image']['name'][$i];
      $file_name = $_FILES['image']['name'][$i];
      $file_size = $_FILES['image']['size'][$i];
      $file_tmp = $_FILES['image']['tmp_name'][$i];
      $file_type = $_FILES['image']['type'][$i];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'][$i])));
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      if($file_size > 10097152) {
         $errors[]='File size must be excately under 10 MB';
      }
	  
    if(empty($errors)==true) {
		move_uploaded_file($tmpFilePath, $newFilePath);
      //Handle other code here
echo "<tr><td>";
echo $file_name." </td><td>Upload Sukses<br>";
echo "</td></tr>";

    }else{
		print_r($errors);
echo "<tr><td>
         <ul>
            <li>Sent file: ".$file_name."
            <li>File size: ".$file_size."
            <li>File type: ".$file_type."
            <li>File ext: ".$file_ext."
         </ul>
		 </td></tr>
";   
	}

  }
}
echo "</table>";

   }
?>

   </body>
</html>
