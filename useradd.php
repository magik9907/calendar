<?php


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


$conn = dataBaseLogIn();

$sql = "select * from de_users where `id`='".$_GET["id"]."'";
$result=$conn->query($sql);
if ($result) {
    while($row=$result->fetch_assoc()){
      $x=($row["isActive"]=="0")? "checked":"";
      $y=($row["isActive"]=="0")? "checked":"";
      $a=($row["isAdmin"]=="0")? "checked":"";
      echo '<label>Nazwa Użytkownika <input type="text" name="use[name]" required class="name" value="'.$row["user_name"].'"> </label><br>';
      echo '<label>Hasło <input type="password" name="use[pass]" required class="pass" value="'.$row["user_pass"].'"> </label><br>';
      echo '<label>administrator <input type="checkbox" name="use[admin]" value="1" '.$a.' class="a-a"> </label><br>';
      echo '<label>Konto aktywne <input type="radio" name="use[a]" value="1" checked class="a-a" '.$x.'> </label><br>';
      echo '<label>konto nieaktywne <input type="radio" name="use[a]" value="0" class="a-n" '.$y.'> </label><br>';
      echo '<button type="submit" name="use[d]" class="dodaj" value="'.$row['id'].'">Dodaj</button>';
    }
}

?>
