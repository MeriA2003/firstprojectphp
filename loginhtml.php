<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="bigdiv">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password">
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
