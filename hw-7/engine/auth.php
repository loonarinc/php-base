<?php

function auth($login, $pass)
{
    $db = getDB();
    $login = strip_tags(stripslashes($login));
    $sql = "SELECT * FROM users WHERE login = '{$login}';";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    if (password_verify($pass, $row['pass'])) {
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $row['id'];
        return true;
    }
    return false;
}

function is_auth()
{
    if (isset($_COOKIE["hash"])) {
        $hash = $_COOKIE["hash"];
        $db = getDB();
        $sql = "SELECT * FROM `users` WHERE `hash`='{$hash}';";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        $user = $row['login'];
        if (!empty($user)) {
            $_SESSION['login'] = $user;
        }
    }
    return isset($_SESSION['login']) ? true : false;
}

function get_user()
{
    return is_auth() ? $_SESSION['login'] : false;
}
