

<?php
$allowedMethods = array(
    'POST'
);

$con = mysqli_connect('localhost','root','4607692481665Qq','laba2');

if (!$con) {
  // die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$email = $_POST['email'];  
$password= $_POST['password'];
$message_theme = $_POST['message_theme'];
$message_text = $_POST['message_text'];

$sql="INSERT INTO massages(email, password, message_text, massage_theme) VALUES( '$email', '$password', '$message_text', '$message_theme')";

$query = mysqli_query($con, $sql);

if($query){
  print json_encode("Data Inserted Successfully");
    }
else {
    print json_encode('problem');
    }
mysqli_close($con);

?>


