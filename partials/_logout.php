<?php

    session_start();
    session_unset();
    session_destroy();

    header("location: /myForum/index.php");
?>