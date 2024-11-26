<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="bigdiv">
        <h2>User registeration</h2>
        <div class="form">
            <form action="request.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name"><br><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"><br><br>
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone"><br><br>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address"><br><br>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
 
</body>
</html>
