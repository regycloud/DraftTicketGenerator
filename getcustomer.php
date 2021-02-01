<html>
<head>
<style>
table {
    width: 100%;
}
.titikdua {
    width: 10px;
}

</style>
</head>

<body>

<?php
$mysqli = new mysqli("localhost", "root", "", "pgascom");
if($mysqli->connect_error) {
  exit('Could not connect');
}

// $query = $_GET['q'];
// if (fnmatch("*&*", $query)){
//   $sql = "SELECT id, status, name, prod, service, capacity, cid, sname, nama
//   FROM cust WHERE id = ?"; 
// }
// else {
//   $sql = "SELECT id, status, name, prod, service, capacity, cid, sname, nama
//   FROM cust WHERE id = ?" ;
// }
// return $sql;

$sql = "SELECT id, status, name, prod, service, capacity, cid, sname, nama
FROM cust WHERE id = ?";


$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $status, $name, $prod, $service, $capacity, $cid, $sname, $nama);
$stmt->fetch();
$stmt->close();

echo "Dear " .$nama . " team,";
echo "<br />";
echo "<br />";
echo "Herewith, PGAS Telecommunications International Pte. Ltd. (PGASINT) would like to inform you that we have acknowledged your report regarding an issue on your link/service.";
echo "<br />";
echo "our ticket for this case has been created as below:";
echo "<br />";
echo "<table border=1>";
echo "<tr>";
echo "<th>Ticket Number</th>";
echo "<td> : </td>";
echo "<td>" . abs($timestamp = strtotime(time('now'))*2) . "  </td><tr>";
echo "<th>Customer Name</th>";
echo "<td> : </td>";
echo "<td id = 'tititkuda'>" . $name . "  </td><tr>";
echo "<th>Customer ID</th>";
echo "<td> : </td>";
echo "<td>" . $id . "  </td><tr>";
echo "<th>Capacity & Capacity</th>";
echo "<td> : </td>";
echo "<td>" . $service ." " . $capacity ."Mbps</td><tr>";
echo "<th>Service Name</th>";
echo "<td> : </td>";
echo "<td>" . $sname . "  </td><tr>";
echo "</tr>";
echo "</table>";
echo "<br />";
echo " We will check and investigated this reported issue. We will revert back to you as soon as we get result.
PGASINT greatly appreciate your attention, cooperation, and understanding on this matter. Should you have any questions, please do not hesitate to contact us by emailing us at cs@pgas-international.com; or by simply contacting me.
Thank you for your trust in PGASINT."
?>

</body>
</html>


