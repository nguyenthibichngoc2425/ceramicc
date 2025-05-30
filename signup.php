<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }

  if(isset($_SESSION['captcha'])){
    $now = time();
    if($now >= $_SESSION['captcha']){
      unset($_SESSION['captcha']);
    }
  }
?>
<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<style>
  body {
    background: linear-gradient(135deg,rgb(255, 255, 255) 0%,rgb(6, 17, 98) 100%);
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
  }
  .register-container {
    max-width: 500px;
    margin: 50px auto;
    background: #ffffff;
    padding: 30px 25px;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  }
  .register-container h3 {
    text-align: center;
    margin-bottom: 25px;
    color: #4A4A4A;
  }
  .form-control {
    border-radius: 6px;
  }
  .btn-register {
    background: linear-gradient(to right, #667eea, #764ba2);
    color: white;
    border: none;
    border-radius: 6px;
    width: 100%;
    transition: background 0.3s ease;
  }
  .btn-register:hover {
    background: linear-gradient(to right, #5563c1, #6a4095);
  }
  .alert {
    margin-bottom: 20px;
    border-radius: 6px;
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
  <div class="register-container">
    <h3><i class="glyphicon glyphicon-user"></i> Create Your Account</h3>

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

    <form action="register.php" method="POST">
      <div class="form-group">
        <label>First Name</label>
        <input type="text" class="form-control" name="firstname" placeholder="Enter first name" value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required>
      </div>

      <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control" name="lastname" placeholder="Enter last name" value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>" required>
      </div>

      <div class="form-group">
        <label>Email address</label>
        <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
      </div>

      <div class="form-group">
        <label>Re-type Password</label>
        <input type="password" class="form-control" name="repassword" placeholder="Re-type Password" required>
      </div>

      

      <button type="submit" class="btn btn-register" name="signup"><i class="glyphicon glyphicon-pencil"></i> Sign Up</button>
    </form>

    <div class="footer-links">
      <hr>
      <a href="login.php">Already have an account?</a> |
      <a href="index.php"><i class="glyphicon glyphicon-home"></i> Home</a>
    </div>
  </div>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>
