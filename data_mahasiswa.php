<?php
// memulai session dan membuat variabel untuk melakukan validasi login
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
  $isLoggedIn = true;
} else {
  $isLoggedIn = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Data Mahasiswa</title>
</head>
<body>
  <header>
    <h2>Data Mahasiswa</h2>
  </header>
  <div class="container">
    <?php
    // Menampilkan status user dan login/logout button
    $statusText = ($isLoggedIn === true) ? 'Admin' : 'Guest';
    $loginButton = ($isLoggedIn === true) ? '<a href="logout.php" class="button">Log Out</a>' : '<a href="login.php" class="button">Log In</a>';
    echo "<h4>Halo, $statusText</h4>";
    echo "$loginButton<br><br>";
    ?>
    <div class="inner">
  <table>
    <tr>
      <th>No</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Program Studi</th>
      <th>Email</th>
      <?php
      // Menampilkan kolom Edit jika user adalah admin
      if ($isLoggedIn === true) {
        echo '<th>Edit</th>';
      }
      ?>
    </tr>

    <?php
    // Menampilkan data tabel
    for ($row = 1; $row <= 10; $row++) {
      echo '<tr class="row">';
      for ($column = 1; $column <= 5; $column++) {
        $data = ($column > 1) ? "Data $row, $column" : $row;
        echo "<td>$data</td>";
      }

      // Menampilkan action buttons jika user adalah admin
      if ($isLoggedIn === true) {
        echo '
          <td>
            <button class="action-btn update">Update</button>
            <button class="action-btn delete">Hapus</button>
          </td>
        ';
      }

      echo '</tr>';
    }
    ?>
  </table>

  <?php
  // Menampilkan edit form jika user adalah admin
  if ($isLoggedIn === true) {
    echo '
      <div class="edit-container" style="display: none">
        <h3>Ubah Data Mahasiswa</h3>
        <span>NIM</span>
        <input type="text" class="textfield" name="nim" id="nim">
        <span>Nama</span>
        <input type="text" class="textfield" name="nama" id="nama">
        <span>Program Studi</span>
        <input type="text" class="textfield" name="prodi" id="prodi">
        <span>Email</span>
        <input type="text" class="textfield" name="email" id="email">
        <div class="confirm-btns">
          <input type="button" class="action-btn" id="update-confirm" value="Ubah">
          <input type="button" class="action-btn" id="cancel-confirm" value="Batal">
        </div>
      </div>
    ';
  }
  ?>
</div>
</div>
  <link rel="stylesheet" href="style.css">
</body>
</html>