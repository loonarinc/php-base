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
function getMyOrders() {
    $session_id = session_id();
    $sql = "SELECT * FROM `orders` WHERE `session_id` = '{$session_id}';";
    $orders = getAssocResult($sql);
    return $orders;

}

function doOrderAction(&$params, $action, $id)
{
    $params['orderstatus'] = ERR_CODE[$_GET['orderstatus']];
    $params['action'] = "add";

    if ($action == "add") {
        if (addOrder()){
            session_destroy();
            setcookie("hash", "", time() - 3600, "/");
            header("Location: /order/?orderstatus=ORDER_OK");
        }
        else
            header("Location: /order/?orderstatus=ORDER_ERR");

    }
}
function orderCancel($id) {
    $id=(int)$id;
    $sql = "UPDATE `orders` SET status = 'canceled' WHERE id={$id};";
    return executeQuery($sql);

}