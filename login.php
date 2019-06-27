<div class ="login-content">
  <form class="login-form" action="index.php" method="POST">
    <label>Login <input type="text" name="login[name]"></label>
    <label>Hasło <input type="password" name="login[pass]"></label>
    <button type="submit" name="login[submit]" value="true">Zaloguj</button>
    <?php if ($_SESSION['isLogIn']===FALSE):
      session_unset(); ?>
      <div class="error-login">
        <p><strong>Login</strong> lub <strong>hasło</strong> jest nieprawidłowe</p>
      </div>
    <?php endif; ?>
    <p>admin<br>admin</p>
  </form>
</div>
