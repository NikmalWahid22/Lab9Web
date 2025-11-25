<div class="login-wrapper">
    <div class="login-card">
        <h2>Login</h2>

        <form method="post">
            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit" name="login">Masuk</button>
        </form>

        <p>Masukkan username & password dengan benar</p>
    </div>
</div>


<?php
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // contoh user login hardcode (bisa pakai tabel users kalau ada)
    if ($username === "admin" && $password === "admin") {
        $_SESSION['login'] = true;
        echo "<script>alert('Login berhasil'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Username/Password salah');</script>";
    }
}
?>
