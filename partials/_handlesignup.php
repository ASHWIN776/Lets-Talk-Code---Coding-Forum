<?php
    require '../lib/function.php';
    $conn = db_connect();

    if(!$conn)
    {
        die("Connection Failed :(");
    }

    $password_error = false;
    $user_exists = false;
    $signed_up = false;
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['signup']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confPassword = $_POST['confPassword'];

        // check if the username is distinct and confpass == pass
        $user_exists = exist_user($conn, $username);

        if($confPassword != $password)
        {
            $password_error = true;
        }

        if(!$user_exists && !$password_error)
        {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_name`, `user_password`, `user_created`) VALUES ('$username', '$hash', current_timestamp());";
            $result = mysqli_query($conn, $sql);

            if($result)
            {
                $signed_up = true;
            }
        }
        header("location: /myForum/index.php?signed_up=$signed_up&user_exists=$user_exists&password_error=$password_error");
        exit();
    }

?>