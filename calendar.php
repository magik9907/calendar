<?php
 include 'header.php';
if($_SESSION["isLogIn"]==TRUE):
 ?>


 <div class="EventDesc">

 </div>

 <div class="calendar-content">
   <form class="" action="index.html" method="post">
     <select class="month">
       <option value="01">Styczeń</option>
       <option value="02">Luty</option>
       <option value="03">Marzec</option>
       <option value="04">Kwicień</option>
       <option value="05">Maj</option>
       <option value="06">Czerwiec</option>
       <option value="07">Lipiec</option>
       <option value="08">Sierpień</option>
       <option value="09">Wrzesień</option>
       <option value="10">Październik</option>
       <option value="11">Listopad</option>
       <option value="12">Grudzień</option>
     </select>

     <select class="user-list <?php echo($_SESSION["isAdmin"]!==TRUE)? "hidden":""; ?>">
       <option value = "<?php echo $_SESSION["userId"]; ?>" selected><?php echo $_SESSION["userName"]; ?></option>

       <?php $conn = dataBaseLogIn();
       $sql = 'Select `id`, `user_name` from de_users where not `id`='.$_SESSION['userId'];

       $result = $conn -> query($sql);
       if ($result) {
         while($row=$result->fetch_assoc()){
          echo "<option value=".$row['id'].">".$row["user_name"]."</option>";
         }
       }

       ?>
     </select>
     <input type="number" min="2000" class="year" value="" style="width:200px;">
     <label><input type="radio" name="type" class="type" value="list">lista</label>
     <label><input type="radio" name="type" class="type" value="calendar" checked>Kalendarz</label>
   </form>
   <div class="kalendarz">

   </div>
</div>


<script type="text/javascript" src="script/calendar.js"></script>
<script type="text/javascript" src="script/seeEvent.js"></script>
<?php
endif;
include 'footer.php';
?>
