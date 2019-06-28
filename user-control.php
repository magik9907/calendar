<?php




 include 'header.php';
if($_SESSION["isLogIn"]==TRUE && $_SESSION["isAdmin"]==true):
 ?>
<form class="" action="user-control.php" method="post">


<select class="user" name="">
  <option value="">Tworzenie nowego użytkownika</option>
  <?php
  $conn = dataBaseLogIn();
  $sql = "Select `id`,`user_name`,`isAdmin` from de_users where 1";
  $result = $conn -> query($sql);
  echo var_dump($result);
  if ($result) {
    while ($row=$result -> fetch_assoc()) {
      $admin=($row["isAdmin"]==1)?"(administrator)":"";
      echo '<option name="add[user]" value="'.$row["id"].'">'. $row["user_name"].$admin.'</option>';
    }
  }
  ?>
</select>
<div class="us-form">
  <label>Nazwa Użytkownika <input type="text" name="use[name]" required class="name"> </label><br>
  <label>Hasło <input type="password" name="use[pass]" required class="pass"> </label><br>
  <label>administrator <input type="checkbox" name="use[admin]" value="1" class="a-a"> </label><br>
  <label>Konto aktywne <input type="radio" name="use[a]" value="1"  class="a-a"> </label><br>
  <label>konto nieaktywne <input type="radio" name="use[a]" value="0" class="a-n"> </label><br>
  <button type="submit" name="use[d]" class="dodaj" value="dodaj">Dodaj</button>
</div>
</form>
<script src="script/useradd.js"></script>
<?php
else:
errorPage("Nie masz uprawnień");

endif;
include 'footer.php';
?>
