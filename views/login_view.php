<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="../login.php" method="POST">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required>
        <br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="register_view.php">Register here</a></p>
</body>
</html>
