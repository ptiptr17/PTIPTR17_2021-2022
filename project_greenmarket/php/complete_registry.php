<?php
include "openconn.php";
session_start();

$username = $_SESSION['username'];
echo $_POST['cname'];
$name = $_POST['cname'];
$dob = $_POST['cdate'];
$gender = $_POST['cgenero'];
$phone_number = $_POST['phoneN'];
$user_type = $_POST['type_user'];

//user addressable handle

$postal_code = $_POST['c_pc'];
echo "<br>".$postal_code;
$province = $_POST['provincia'];
$city = $_POST['cidade'];
$district = $_POST['distrito'];
$address = $_POST['morada'];
$coordinates = $_POST['coordenadas'];

$select_user = "SELECT * FROM user_info WHERE username='$username'";
$update_user = "UPDATE user_info SET name = '$name',  birthday = '$dob', gender = '$gender', phone = '$phone_number' WHERE username = '$username'";


$user_info= mysqli_query ($conn, $select_user);

if ($user_info->num_rows == 1) {

    while($row = mysqli_fetch_array($user_info)) {
        echo $row['username'];
        echo "user_id".$row['user_id'];
        $userid = $row['user_id'];
    }
}else{
  echo("erro na query");
  header( "refresh:20; url=../php/completeRegister.php" );
}
$updates= mysqli_query ($conn, $update_user);
if($updates){
    echo "<br>update sucessfull";
}else{
    echo "<br>update failed";
    header( "refresh:20; url=../php/completeRegister.php" );
}

$insert_useraddress = "insert into user_address(user_id, postal_code, province, city, district, address, coordinates) values('$userid', '$postal_code', '$province', '$city', '$district', '$address', '$coordinates')";

$res = mysqli_query($conn, $insert_useraddress);
if($res){
    echo "<br>insert sucessfull";
    header( "refresh:20; url=../php/homepage.php" );
}else{
    echo "<br>update failed";
    header( "refresh:20; url=../php/completeRegister.php" );
}
?>