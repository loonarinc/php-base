<?php
function addOrder()
{
    $name = strip_tags(htmlspecialchars($_POST['name']));
    $phone = strip_tags(htmlspecialchars($_POST['phone']));
    $address = strip_tags(htmlspecialchars($_POST['adres']));
    $session_id = session_id();
    $sql = "INSERT INTO `orders`(`name`, `phone`, `adres`, `session_id`, `status`) VALUES ('{$name}','{$phone}','{$address}','{$session_id}','active');";
    $result = executeQuery($sql);
    if (mysqli_affected_rows(getDb()) != 1) return false;
    return $result;
}

function doOrderAction(&$params, $action, $id)
{
    $params['orderstatus'] = ERR_CODE[$_GET['orderstatus']];
    $params['action'] = "add";

    if ($action == "add") {
        if (addOrder()){
            session_destroy();
            setcookie("PHPSESSID", "", time() - 3600, "/");
            header("Location: /order/?orderstatus=ORDER_OK");
        }
        else
            header("Location: /order/?orderstatus=ORDER_ERR");

    }
}