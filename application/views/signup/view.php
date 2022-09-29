<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"/>
<link rel="stylesheet" href="./public/css/account.css" type="text/css">

<div class="signup-box">
  <h1>Sign Up</h1>
    <h4>It's free and only takes a minute</h4>
    <form method="post" action="" class="signup">
      <label for="username">Username</label>
      <input id="username" name="username" type="text" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" required/>
      <label for="name">Full Name</label>
      <input id="name" name="name" type="text" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>" required/>
      <label for="email">Email</label>
      <input id="email" name="email" type="email"  value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" required/>
      <label for="phone_number">Phone Number</label>
      <input id="phone_number" name="phone_number" type="text" value="<?php echo isset($_POST['phone_number']) ? $_POST['phone_number'] : '' ?>" required/>
      <label for="password">Password</label>
      <input id="password" name="password" type="password" placeholder=""  value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" required/>
      <label for="cpassword">Confirm Password</label>
      <input id="cpassword" name="cpassword" type="password" placeholder=""  value="<?php echo isset($_POST['cpassword']) ? $_POST['cpassword'] : '' ?>" required />
      <input type="submit" value="Submit" />
    </form>
</div>
<p class="para-2">
  Already have an account? <a href="./login">Login here</a>
</p>
