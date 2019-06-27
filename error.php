<?php
include "header.php";
if($_SESSION["isLogIn"]==TRUE):
?>
<h1>ERROR</h1>


<?php
echo $_GET["error"];

endif;
include "footer.php";
?>
