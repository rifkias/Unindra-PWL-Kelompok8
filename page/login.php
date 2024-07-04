<?php 
 $uri = $route->getUri();

?>

<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?=$uri?>" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" value="<?= @$_POST['username'] ?>" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" value="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
</body>

<?php 
 if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $encPassword = hash("sha256",$password);

    $query = $con->query("SELECT * FROM employe WHERE username='$username' AND password='$encPassword'");
    $data = $query->fetch_assoc();
    $checkRow = $query->num_rows;
    if($checkRow > 0){
      session_start();
      $_SESSION['isLogin']        = true;
      $_SESSION['userId']         = $data['employe_id'];
      $_SESSION['username']       = $data['username'];
      $_SESSION['employe_name']   = $data['employe_name'];
      $_SESSION['role']           = $data['role'];

      header("location:".$uri);
    }else{
      echo "
        <script>alert('Username & Password Salah !!!')</script>
      ";
    }
    // echo json_encode($data);
    // $check = $query->num_rows;
    // if($check)
    // $check = $query->num_rows;

    // echo $check;
    // echo json_encode($_POST);
 }
?>