<?php
    session_start();
    // get form data
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user_details = [
                'username'=> $username,
                'email' => $email,
                'password' => $password
        ];
        
        // save to the database file
        $db = file_get_contents('database.json');
        $db_data = json_decode($db, true);
        $db_data[$username] = $user_details;
        file_put_contents('database.json', json_encode($db_data));
        
     header('Location: login.php');

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Authentication</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>User Registration</h1>
        <form action="" method="post">
            <p>Username</p>
            <input type="text" name="username" placeholder="Username"><br><br>
            <p>Email</p>
            <input type="email" name="email" placeholder="example@yahoo.com"><br><br>
            <p>Password</p>
            <input type="password" name="password" placeholder="Password"><br><br>
            <button type="submit" name="submit">Register</button>
            <p>Already Registered? | <a href="login.php">Login</a></p>
        </form>
    </div>
</body>
</html>