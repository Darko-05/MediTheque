<?php

    session_start();

    $_SESSION = [];

    session_destroy();

    if (isset($_COOKIE["email"])) {
        setcookie(
            "email",
            "",
            [
                "expires" => time() - 3600,
                "secure" => false,
                "httponly" => true
            ]
        );
    }

    header("Location: index.php");
    exit();