<link rel="stylesheet" href="./public/css/account.css" type="text/css">
    
<div class="login-box">
  <h1>Login</h1>
    <form action='./login' class="login" method="post">
      <label>Username</label>
      <input type="text" placeholder="" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" />
      <label>Password</label>
      <input type="password" placeholder="" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" />
      <input type="submit" value="Log in" />
    </form>
</div>
<p class="para-2">
    <a href="forget_password">Forget password?</a> <br>
  Not have an account? <a href="signup">Sign Up Here</a>
</p>

