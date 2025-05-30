<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }
?>
<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<style>
  body {
    background: linear-gradient(135deg,rgb(232, 234, 244),rgb(14, 33, 64));
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .login-container {
    max-width: 400px;
    margin: 80px auto;
    background: #fff;
    padding: 30px 25px;
    border-radius: 10px;
    box-shadow: 0 12px 28px rgba(0, 0, 0, 0.2);
  }

  .login-container h3 {
    text-align: center;
    margin-bottom: 25px;
    color: #333;
  }

  .btn-login {
    background: linear-gradient(to right,rgb(24, 34, 103), #9face6);
    color: #fff;
    border: none;
    border-radius: 6px;
    width: 100%;
    transition: background 0.3s ease;
  }

  .btn-login:hover {
    background: linear-gradient(to right,rgb(54, 69, 125),rgb(181, 185, 208));
  }

  .alert {
    border-radius: 6px;
    padding: 12px;
  }

  .footer-links {
    margin-top: 20px;
    text-align: center;
  }

  .footer-links a {
    color: #555;
    text-decoration: none;
  }

  .footer-links a:hover {
    text-decoration: underline;
  }
</style>

<div class="container">
  <div class="login-container">
    <h3><i class="glyphicon glyphicon-log-in"></i> Welcome Back</h3>

    <?php
      if(isset($_SESSION['error'])){
        echo "<div class='alert alert-danger text-center'>".$_SESSION['error']."</div>";
        unset($_SESSION['error']);
      }
      if(isset($_SESSION['success'])){
        echo "<div class='alert alert-success text-center'>".$_SESSION['success']."</div>";
        unset($_SESSION['success']);
      }
    ?>

    <form action="verify.php" method="POST">
      <div class="form-group">
        <label>Email Address</label>
        <input type="email" class="form-control" name="email" placeholder="Enter email" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Enter password" required>
      </div>

      <button type="submit" class="btn btn-login" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
    </form>

    <div class="footer-links">
      <hr>
      <a href="password_forgot.php">Forgot your password?</a><br>
      <a href="signup.php">Register a new membership</a><br>
      <a href="index.php"><i class="glyphicon glyphicon-home"></i> Home</a>
    </div>
  </div>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>
