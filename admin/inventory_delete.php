<?php
$servername = "localhost";
$username = "root";
$pass = "eko";
$DB = "iShopping";

$conn = new mysqli($servername, $username, $pass, $DB);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = $_POST['id'];

$sql = "delete from inventory where item_id = '".$id."'";

$conn->query($sql);

echo '
<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="admin.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$("#addInventory").hide();
    $("#deleteInventory").show();
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

exit();  
?>