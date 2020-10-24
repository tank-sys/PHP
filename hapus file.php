<table border=0>

<?php
$dir = "./lokasi/";
$ngelist = scandir($dir,1);
print_r($b);
$kec = array(".", "..");
$no = 1;

function human_filesize($bytes, $decimals = 2) {
    $sz = 'BKMGTP';
    $factor = floor((strlen($bytes) - 1) / 3);
    $d = (empty($factor))?0:$decimals;
    return sprintf("%.{$d}f", $bytes / pow(1024, $factor)) . " ". ((!empty($factor))?@$sz[(int)$factor]:"")."o";
}

foreach ($ngelist as $v):
$fileSizeBytes = filesize($dir.$v);
$fileSizeKB = round($fileSizeBytes / 1024);

if(in_array($v,$kec)=== false) :
#$file_size = $_FILES['image']['size'];
echo "<tr>
";
echo "<td>".$no.". </td><td>".$v;
echo "</td>
<td> &nbsp;".number_format($fileSizeKB, 0, ',', '.')."</td>
<td>kb 
<a href='?hapus=".$v."'>&reg;</a> | <a href='".$dir.$v."'>&copy;</a>";
echo "</td></tr>";

endif;
$no++;
endforeach;
?>

</table>

<?php
if(isset($_GET['hapus'])){
    $delurl=$_GET['hapus'];
	if(file_exists($dir.$delurl)) {
unlink($dir.$delurl);
echo $dir.$delurl."  sudah dihapus";

header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
}	   
?>
