<?php
$servername = "localhost";
$username = "root";
$pass = "eko";
$DB = "iShopping";

$conn = new mysqli($servername, $username, $pass, $DB);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$description = $_POST['description'];
$price = $_POST['price'];
$insert = "('$description','$price')";

$sql = "INSERT INTO inventory(description, price) VALUES $insert";

$conn->query($sql);

echo '
<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="admin.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$("#addInventory").show();
    $("#deleteInventory").hide();
    $.ajax({
            url: "get_inventory.php",
            success: function(resultOfAjaxCall) 
            {
                $("#rightcolumn").html(resultOfAjaxCall);
            }
            });

     $("#inventory").click(function(){
        $("#addInventory").toggle();
        $("#deleteInventory").hide();
    });

    $("#delete_inventory").click(function(){
        $("#deleteInventory").toggle();
          $("#addInventory").hide();
    });

});
</script>
</head>

<h1>Administrate up in this bitch!</h1>
<div id="wrapper">
    <div id="leftcolumn">
        <table>
<tr><td><button id = "inventory">Add Inventory</button></td></tr>
<tr><td><button id = "delete_inventory">Delete Inventory</button></td></tr>
<tr><td><button id = "edit inventory">Edit Inventory</button></td></tr>

</table>

<div id ="addInventory">  
<form method="post" action= "new_inventory.php" enctype="multipart/form-data">
  <span>Description:</span><br>
  <input type="text" name="description"> <br>
  <span>Price:<br></span>
  <input type="text" name="price"> <br>
  <span>Upload Photo:</span><input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Submit">
</form> 
</div>

<div id ="deleteInventory">  
 <form method="post" action= "inventory_delete.php">
  <span>Item ID:</span><br>
  <input type="text" name="id"> <br>
  <input type="submit" value="Submit">
</form> 
</div>
    </div>
    <div id="rightcolumn" class="scrollingDiv">
    </div>
</div>
';

//now get the new item id to correctly name the img
$sql = "SELECT max(item_id) as item_id
		FROM inventory";

$item_id = 0;

$result = $conn->query($sql);
while($row = $result->fetch_assoc()) 
{
	$item_id = $row["item_id"];
}

//echo "<br>" . $item_id;

$fileToUpload = $_POST['fileToUpload'];

$target_dir = "/var/www/html/iShop/";
$target_file = $target_dir . $item_id.'.jpg';
//echo "<br>" . $target_file;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

//check if file exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

 // Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". $item_id . 'jpg' . " has been uploaded.";
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
}

exit();  
?>