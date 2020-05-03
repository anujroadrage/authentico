

<?php




include 'Utility.php';



//echo($_FILES["fileToUpload"]["name"]);

$target_dir = "uploads/";
$target_file= $target_dir.basename($_FILES["fileToUpload"]["name"]);

$uploadOK=1;
$imageFileType= pathinfo($target_file,PATHINFO_EXTENSION);

echo("<br><br>");

echo("imageFileType => ".$imageFileType);

echo("<br><br>");

if(isset($_POST["submit"]))
{
	$check=getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	
	if($check !== false)
	{
		echo "FILE is an image" . $check["mime"] . ".";
		
		$uploadOK = 1;
	}
	else
	{
		echo "file is not an image.";
		$uploadOK=0;
	}
}

echo("<br>");echo("<br>");

if(file_exists($target_file))
{
	echo "file has been already uploaded";
	$uploadOK=0;
}

echo("<br>");echo("<br>");

if($_FILES["fileToUpload"]["size"]>1000000)
{
	echo "size exceeding";
	$uploadOK=0;
}

echo("<br>");echo("<br>");

if(	$imageFileType != "jpg"
	&&$imageFileType != "png"
	&&$imageFileType != "jpeg"
	&&$imageFileType != "gif")
{
	echo "sorry only GIf, PNG, Jpeg, GIF are allowed";
	$uploadOK=0;
}

echo("<br>");echo("<br>");

if($uploadOK==0)
{
	echo "unable to upload";
}
else
{
	if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file))
	{
		
		echo "the file" . basename($_FILES["fileToUpload"]["name"]). " has been uploaded";
	}
	else
	{
		echo " sorry there was an error in uploading file";
	}
}	

	
	
	

 ?>