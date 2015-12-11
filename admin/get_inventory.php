<?php
include 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $pass, $DB);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo ("<style> tr {color:white;} </style><p>");

$sql = "SELECT item_id, description, price 
		FROM inventory";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	   	echo "<table>
	   	<tr>
	   	<th></th>
	   	<th>&nbsp;&nbsp;id&nbsp;&nbsp;</th>
	   	<th>description</th>
	   	<th>price<th>
	   	</tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td><img src = \"".$row["item_id"].".jpg\" width = \"100\"></td><td>&nbsp;&nbsp;&nbsp;".$row["item_id"]. 
        "</td><td class=\"centerText\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $row["description"]."</td><td>&nbsp;&nbsp;" . $row["price"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
echo "</p>";

exit(); 
?>