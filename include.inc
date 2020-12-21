<?php

function errorPage($e){
  header("location:error.php?error=".$e);
  return false;
}


function dataBaseLogIn(){
  $user = "root";
  $password = "";
  $db = "app";
  $host = "localhost";

  $conn = new mysqli($host,$user,$password,$db);

  if($conn -> connect_error){
    errorPage($conn-> connect_error);
  }

  return $conn;
}


//set session

if(isset($_POST['login'])){
  $conn = dataBaseLogIn();

  $sql = "SELECT * FROM `de_users` WHERE `user_name`=\"".$_POST["login"]["name"]."\" AND `user_pass`=\"".$_POST["login"]["pass"]."\" and `isActive`='1'";
  $result=$conn->query($sql);

  if(0<$result->num_rows){
    $r=$result->fetch_assoc();
    $_SESSION['userName']=$r["user_name"];
    $_SESSION['userId']=$r["id"];

    $_SESSION['isAdmin']=($r["isAdmin"]==1)?TRUE:FALSE;
    $_SESSION['isLogIn']=TRUE;
  }else{
    $_SESSION['isLogIn'] = FALSE;
  }
  $conn->close();
}

//logout

if(isset($_REQUEST['logout'])){
  session_unset();
  session_destroy();
}

//add event to calendar (multi users)

if(isset($_POST["add"]["add"])){
  $conn = dataBaseLogIn();
  $sql = "";
  for($i=0,$l=count($_POST["add"]["users"]);$i<$l;$i++){
    $sql .= 'INSERT INTO `de_event`(`id`, `title`, `desciption`, `date`, `priority`, `isDeleted`, `id_user`) VALUES (NULL,"'.$_POST['add']['title'].'","'.$_POST['add']["desc"].'","'.$_POST['add']["date"].'","'.$_POST['add']["prio"].'","0","'.$_POST["add"]["users"][$i].'");';
  }
  if ($conn->multi_query($sql) !== TRUE) {
      errorPage( $conn->error);
  }
  $conn->close();
}

//deleting event (not permanently)

if(isset($_POST["del"]["del"])){
  $conn = dataBaseLogIn();
  $sql='UPDATE `de_event` SET `isDeleted` = \'1\' WHERE `de_event`.`id` ='.$_POST["del"]["del"].';';
  $conn->query($sql);
}

//modyfying event

if(isset($_POST["mod"]["mod"])){
  $conn = dataBaseLogIn();
  $sql = 'UPDATE `de_event` SET `title`="'.$_POST["mod"]["title"].'",`desciption`="'.$_POST["mod"]["desc"].'",`date`="'.$_POST["mod"]["date"].'",`priority`="'.$_POST["mod"]["prio"].'" WHERE `id`="'.$_POST["mod"]["mod"].'"';
  $conn->query($sql);
}


//creating and modyfying user
if(isset($_POST["use"]['d'])){
  $conn = dataBaseLogIn();

  if(isset($_POST["use"]["admin"]) && $_POST["use"]["admin"]=="1"){$x="1";}else{$x="0";};
  if($_POST["use"]['d']=="dodaj"){
    $sql='INSERT INTO `de_users`(`id`, `user_name`, `user_pass`, `isAdmin`, `isActive`) VALUES (NULL,"'.$_POST["use"]['name'].'","'.$_POST["use"]['pass'].'","'.$x.'","'.$_POST["use"]['a'].'")';
  }else {
    $sql="UPDATE `de_users` SET `user_name`='".$_POST["use"]['name']."',`user_pass`='".$_POST["use"]['pass']."',`isAdmin`='".$x."',`isActive`='".$_POST["use"]['a']."' WHERE  `id`='".$_POST["use"]['d']."'";
  }
    $conn->query($sql);
}
\\


