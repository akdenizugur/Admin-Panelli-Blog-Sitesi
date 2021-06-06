<style>
  .form {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

  }
  .form input {
    width: 400px;
  }
</style>

<form action="includes/form_handler/login.php" method="post" role="form" class="form">
  <h3>Giriş</h3>
  <div class="form-group">
    <label>Email</label>
    <input type="email" name="email" placeholder="E-Mail" class="form-control">
  </div>
  <div class="form-group">
    <label>Şifre</label>
    <input type="password" name="pwd" placeholder="Password" placeholder="Password" class="form-control">
  </div>
  <div class="form-group">
    <input type="submit" name="login_submit" value="Login" class="btn btn-primary">
  </div>
</form>
