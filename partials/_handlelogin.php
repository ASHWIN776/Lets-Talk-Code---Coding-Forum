<?php
    require '../lib/function.php';
    $conn = db_connect();

    if(!$conn)
    {
        die("Connection Failed :(");
    }

    $invalid = true;

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `users` WHERE user_name='$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);


        if($num == 1)
        {   
            $row = mysqli_fetch_assoc($result);
            $hash = $row['user_password'];

            if(password_verify($password, $hash))
            {   
                $invalid = false;
                session_start();
                $_SESSION['loggedIn'] = true;
                $_SESSION['username'] = $username;
            }
        }
        
        header("location: /myForum/index.php?invalid=$invalid");
        exit();
    }

?>