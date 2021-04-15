<?php
function write_log($log_msg)
{
    $log_filename = "logs";
    if (!file_exists($log_filename))
    {
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/debug.log';
  file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
   
}


$uploaddir = getcwd().DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR;
$uploadfile = $uploaddir.basename($_FILES['file']['name']);
move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);


$con = mysqli_connect('localhost','root','4607692481665Qq','laba3');



$name = $_POST['name'];
$comment = $_POST['comment'];  
$email = $_POST['email'];  

write_log(print_r($name,1));


$sql="INSERT INTO user_comments(user_name,user_email, comment, file_path) VALUES( '$name', '$email','$comment', '$uploadfile')";

$query = mysqli_query($con, $sql);

if($query){
    echo json_encode($uploadfile);
    }
else {
  echo json_encode('problem');
    }
mysqli_close($con);

?>