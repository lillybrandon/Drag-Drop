<?php
// Include the database configuration file
include 'config/database.php';
?>

<style>
<?php include 'styles.css'; ?>
</style>

<?php 

$statusMsg = '';

// File upload path
$targetDir = "/Applications/MAMP/htdocs/Drag&Drop/folder/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = ("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
            if($insert){

                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag&Drop Application</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
    <form action="" method="GET" enctype="multipart/form-data">
        <input type="button" name="submit" onclick="changeImg()" value="Generate NFT" id="myButton" class="nft__gen-btn">
    </form>

    <script>
    document.getElementById("myButton").onclick = function () {
        location.href = "folder/index.html";
    };
    </script>

    <script src="generator.js"></script>
</body>
</html>