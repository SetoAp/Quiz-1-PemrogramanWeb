<?php
session_start();

//cek apakah session sudah ada atau belum
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){
  header("location: data_mahasiswa.php");
  exit;
}

//menangkap request input user untuk login
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = $_POST['username'];
  $password = $_POST['password'];

  //memastikan username dan password betul
  if($username == "admin" && $password == "admin"){
    $_SESSION['logged_in'] = true;
    header("location: data_mahasiswa.php");
    exit;
  }
  //menampilkan pesan error jika salah input username atau password 
  else {
    $error = "username atau password salah";
  }
}
?>

<!-- Membut tampilan form untuk login-->
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
  <h2>Login</h2>
  <?php if(isset($error)): ?>
    <div><?php echo $error; ?></div>
  <?php endif; ?>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label>Username:</label><input type="text" name="username"><br><br>
    <label>Password:</label><input type="password" name="password"><br><br>
    <input type="submit" value="Login">
  </form>
</body>
</html>