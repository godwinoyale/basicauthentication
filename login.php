<?php
    session_start();
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = file_get_contents('database.json');
        $db_data = json_decode($db, true);

        // check if user exists
        if(array_key_exists($username, $db_data)){
            // check user password
            if($db_data[$username]['password']=== $password){
                $_SESSION['username'] = $db_data[$username]['username'];
                $_SESSION['email'] = $db_data[$username]['email'];
                $response = '';
            }else{
                $response = 'Incorrect password';
            }
        }else{
            $response = 'User does not exist';
        }
        echo($response);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="container">
       <h1>User Login</h1>
       <?php
        if(!isset($_SESSION['username'])) {
            // session isn't started
    ?>
       <form action="" method="post">
        <p>Username</p>
        <input type="text" name="username" placeholder="Username"><br><br>
        <p>Password</p>
        <input type="password" name="password" placeholder="Password"><br><br>
        <button type="login" name="login">Login</button>
        <p>Not Registered? | <a href="index.php">Register</a></p>
        <a href="pass_reset.php">Reset Password</a>
       </form>
       <?php  
        }else{
            echo ('Welcome '.$_SESSION['username']);
    ?>
            <p>You are logged in.. </p>
            <li><a href="pass_reset.php">Reset Password</a></li>
            <li><a href="logout.php">Logout</a></li>
    <?php
        }
    ?>
   </div> 

</body>
</html>