<?php
 include 'header.php';
if($_SESSION["isLogIn"]==TRUE):
 ?>

<form class="add" action="add.php" method="POST">
  <label>Tytuł <input type="text" name="add[title]" required></label>
  <label for="desc">Opis</label>
  <textarea name="add[desc]" id="desc" rows="8" cols="80"></textarea>
  <label>Data wydarzenia (wygaśniecia) <input type="date" name="add[date]" required></label>
  <label>Priorytet <input type="number" name="add[prio]" max="3" min="0" value="1"></label>

  <div class="users" style="display:grid;grid-template-columns:25%,25%,25%,25%">
    <label ><input type="checkbox"  checked name="add[users][]" value="<?php echo $_SESSION["userId"];?>"><?php echo $_SESSION["userName"]; ?> </label>
    <?php
    if($_SESSION["isAdmin"]==1){
      $conn = dataBaseLogIn();

      $sql = "Select `id`,`user_name`,`isAdmin` from de_users where not `id` = \"".$_SESSION["userId"]."\"";

      $result = $conn -> query($sql);
      if ($result) {
        while ($row=$result -> fetch_assoc()) {
          $admin=($row["isAdmin"]==1)?"(administrator)":"";
          echo '<label ><input type="checkbox" name="add[users][]" value="'.$row["id"].'">'. $row["user_name"].$admin.'</label>';
        }
      }
    }
    ?>
  </div>

  <button type="submit" name="add[add]" value="true">Dodaj</button>
</form>

<?php
endif;
include 'footer.php';
?>
