<?php
session_start();
include('connect.php');

if(isset($_POST['click_view_btn'])){
    $id = $_POST['user_id'];

    // echo $id;
    $sql = "SELECT *
        FROM `users`
        WHERE `id` = '$id'";

$res = mysqli_query($conn, $sql);

if($res){
    $num = mysqli_num_rows($res);

    if($num>0){
        while($row = mysqli_fetch_assoc($res)){
            echo '
            <h4>'.$row["id"].'</h4>
            <h4>'.$row["pass"].'</h4>
            <h4>'.$row["email"].'</h4>
            <h4>'.$row["username"].'</h4>
            ';
}
    }else{
        echo '<h4>No Record Found</h4>';
    }}
}