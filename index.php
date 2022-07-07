<?php include "upload.php"; ?>

<style>
<?php include "styles.css"; ?>
</style>

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
    
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <div class="drop__zone">
            <span class="drop__zone--prompt">Drop file here or click to upload</span>
            <input type="file" name="file" class="drop__zone--input" multiple>
        </div>
        <input type="submit" name="submit" value="Submit" class="submit">
    </form>

    <script src="main.js"></script>
</body>
</html>