<html>

<head><meta charset="UTF-8">
  <title> Адель Ягафарова </title>
  
</head>
<style>
.error{
  border: 1px solid red;
}

body{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  font-size: 20px;

}

input{
  width: 400px;
  height: 30px;
}

</style>
<script type="text/javascript" src="jquery.js"></script>
<body>

  <form action="./main.php" method="post">
<div class="wrap">
  <p> Ваше имя*: <p/>
    <input type="text" placeholder="Имя" id="name">
    <p> Пароль*: <p/>
    <input type="password" id="password" >
    <p> Подтверждение пароля*: <p/>
    <input type="password" id="passwordTest">
    <p> Email*: <p/>
    <input type="email" id="email">
    <p> Тема сообщения: <p/>
    <input type="text" id="theme" >
    <p> Сообщение: <p/>
    <input type="text" id="message">
    
</div>
<input type="button" value="Отправить" id="send">
    <input type="button" value="Очистить" id="clear">
  </form>
</body>
<script>
  let name = $("#name")
  let password = $("#password")
  let passwordTest = $("#passwordTest")
  let email = $("#email")
  let theme = $("#theme")
  let message = $("#message")
  



$("#send").click(function(){
  if(
  isEmpty(name) &&
  checkPassword(password)&&
  checkPasswordTest(passwordTest)&&
  checkEmail(email)&&
  checkMessage(message)
  ){
    console.log( name.val() + " " + email.val() + " " +password.val() + " " +theme.val() + " " +message.val() + " " );
    $.ajax({
            url: "./main.php",
            type: "post",
            data: { name: name.val(), email: email.val(), password: password.val(), message_theme: theme.val(), message_text: message.val()},
            success: function (data) {
              console.log("success" + data);
            }
          });
  }
  
})

$("#clear").click(function(){ 
  name.val('')
  password.val('')
  passwordTest.val('')
  email.val('')
  theme.val('')
  message.val('')
})

function isEmpty(item){
  if(item.val() == ''){
    item.addClass("error")
    return false
  } else {
    item.removeClass("error")
    return true
  }
  
}

function checkPassword(item){
  if(isEmpty(item)){
    if(item.val().length <= 4){
      item.addClass("error")
      return false

    } else {
      item.removeClass("error")
      return true

    }
    
  }
}

function checkPasswordTest(item){
  if(isEmpty(item)){
    if(item.val() != $("#password").val()){
      item.addClass("error")
      return false

    } else {
      item.removeClass("error")
      return true

    }
      
  }
}

function checkEmail(item){
  if(isEmpty(item)){
    if(item.val().indexOf("@") == -1){
      item.addClass("error")
      return false
    } else {
      item.removeClass("error")
      return true
    }
  }
}

function checkMessage(item){
  if(isEmpty(item)){
    if(item.val().length <= 10){
      item.addClass("error")
      return false
    } else {
      item.removeClass("error")
      return true
    }
    
  }
}

</script>

</html>


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


