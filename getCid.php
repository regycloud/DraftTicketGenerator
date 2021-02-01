<?php
$conn = mysqli_connect('localhost','root', '', 'pgascom');
if(isset($_GET['q'])){
    $q = $_GET['q'];
    $stmt = $conn->prepare("select * from cust where id LIKE ? OR name LIKE ?");
    $param = "%$q%";
    $stmt->bind_param("ss", $param, $param);
    $data = array();
    if($stmt->execute()){
        $result = $stmt -> get_result();
        if($result->num_rows>0){
            while($row = $result -> fetch_assoc()){
                $id = $row['id'];
                $name = $row['name'];
                $group = $row['nama'];
                $data[] = array('id' => $id, 'text' => $name, 'group' => $group );
            }
            $stmt ->close();
        } else {
            $data[] = array('id' =>  0, 'text' => 'No CID found');
        }
        echo json_encode($data);
    }
}
?>