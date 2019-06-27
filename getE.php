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

  if(!$conn){
    errorPage(mysqli_connect_error());
  }

  return $conn;
}
   $id = $_GET["id"];

	$conn = dataBaseLogIn();
  if (isset($_GET["see"])) {

  	$sql = "Select * from de_event where `id`=$id";
  	$result =$conn->query($sql);
  	if ($result) {
  		$row = $result->fetch_assoc();
      echo "<form action=\"calendar.php\" method=\"POST\">";
      echo '<label>Tytuł <input type="text" name="mod[title]" required value="'.$row["title"].'"></label>';
      echo'<label for="desc">Opis</label>';
      echo'<textarea name="mod[desc]" id="desc" rows="8" cols="80">'.$row["desciption"].'</textarea>';
      echo'<label>Data wydarzenia (wygaśniecia) <input type="date" name="mod[date]" required value="'.$row["date"].'"></label>';
      echo'<label>Priorytet <input type="number" name="mod[prio]" max="3" min="0" value="'.$row["priority"].'"></label>';
      echo'<button type="submit" class="modbtn" name="mod[mod]" value="'.$row["id"].'">Modyfikuj</button>';
      echo "</form>";
      echo'<form action="calendar.php" method="POST"> <button type="submit" name="del[del]" class="delbtn" value="'.$row["id"].'">usun</button></form><br><br>';
  	}
  }

	mysqli_close($conn);




?>
