<?php
$servername = "localhost";
$username = "eorndahl1";
$pass = "eorndahl1";
$DB = "eorndahl1";
// Create connection
$conn = new mysqli($servername, $username, $pass, $DB);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo ("<style> tr {color:white;} </style><p>");

$sql = "SELECT id, description, price 
		FROM inventory";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	   	echo "<table>
	   	<tr>
	   	<th>img</th>
	   	<th>item_id</th>
	   	<th>description</th>
	   	<th>price<th>
	   	</tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td><img src = \"".$row["item_id"].".jpg\" width = \"100\"></td><td>".$row["item_id"]. "</td><td>" . $row["description"]."</td><td>" . $row["price"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
echo "</p>";

exit(); 
?>