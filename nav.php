
<div class="nav-content">
  <a href="index.php" class = "logo">Do&Event</a>

  <nav class = "main-nav">
    <ul class = "menu">
      <li><a href="index.php">Strona główna</a></li>
      <li><a href="add.php">Dodaj wydarzenie</a></li>
      <li><a href="calendar.php">Kalendarz</a></li>
      <?php if ($_SESSION["isAdmin"]===TRUE):?>
      <li><a href="user-control.php">Zarządzaj użytkownikami</a></li>
      <?php endif;?>
      <?php if ($_SESSION["isLogIn"]==TRUE):?>
      <li class="profile has-submenu"><a href="index.php"> <?php echo $_SESSION["userName"]; ?></a>
        <ul class="submenu">
          <li><span class="logout js--logout">Wyloguj</span></li>
        </ul>
      </li>
    <?php endif;?>
    </ul>
  </nav>
</div>
