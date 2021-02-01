<?php
$conn = mysqli_connect('localhost','root', '', 'testdb');
if(isset($_GET['q'])){
    $q = $_GET['q'];
    $stmt = $conn->prepare("select * from students where first_name lIKE ? OR last_name LIKE ?");
    $param = "%$q%";
    $stmt->bind_param("ss", $param, $param);
    $data = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $id = $row['id'];
                $student = $row['first_name'].''.$row['last_name'];
                $data[] = array('id'=>$id, 'text'=>$student);
            }
            $stmt ->close();
        } else {
            $data[] = array('id' =>  0, 'text' => 'No CID found');
        }
        echo json_encode($data);
    }
}


?>