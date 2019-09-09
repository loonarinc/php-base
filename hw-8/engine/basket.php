<?php

function deleteFromBasket($id) {
    $id=(int)$id;
    $session_id = session_id();
    $sql = "DELETE FROM `basket` WHERE `basket`.`id` = {$id} AND `session_id`='$session_id'";
    return executeQuery($sql);
    //поправить измение количества
//    $sql = "SELECT quantity FROM `basket` WHERE id = '{$id}' AND `session_id`={$session_id};";
//    $result = getAssocResult($sql)[0];
//    if (((int)$result[quantity]) > 1) {
//        $sql = "UPDATE `basket` SET `quantity`=`quantity` - 1 WHERE `id` = {$id} AND `session_id`={$session_id};";
//        $result = executeQuery($sql);
//        if (mysqli_affected_rows(getDb()) != 1) return false;
//        return $result;
//    } else {
//        $sql = "DELETE FROM `basket` WHERE `basket`.`id` = {$id} AND `session_id`={$session_id};";
//        $result = executeQuery($sql);
//        if (mysqli_affected_rows(getDb()) != 1) return false;
//        return $result;
//    }
}

function getBasket() {
    $session_id = session_id();
    $sql = "SELECT basket.id as basket_id, goods.id as good_id, goods.name as name, goods.price as price, goods.image as image, quantity FROM `basket`, `goods` WHERE basket.goods_id=goods.id AND `session_id`='{$session_id}'";
    $basket = getAssocResult($sql);
    return $basket;
}

function summFromBasket() {
    $session_id = session_id();
    $sql = "SELECT SUM(goods.price) as summ FROM `basket`, `goods` WHERE basket.goods_id=goods.id AND `session_id` ='$session_id'";
    return getAssocResult($sql)[0]['summ'];
}

function addToBasket($id) {
    $id = (int)$id;
    $session_id = session_id();
    $sql = "SELECT * FROM `basket` WHERE goods_id = '{$id}' AND  `session_id` = '{$session_id}';";
    $result = getAssocResult($sql)[0];
    if (!$result) {
        $sql = "INSERT INTO `basket`(`goods_id`, `session_id`, `quantity`) VALUES ('{$id}','{$session_id}', '1');";
        $result = executeQuery($sql);
        if (mysqli_affected_rows(getDb()) != 1) return false;
        return $result;
    } else {
        $sql = "UPDATE `basket` SET `quantity`=`quantity` + 1 WHERE `goods_id` = {$id} AND `session_id` = '{$session_id}'";
        $result = executeQuery($sql);
        if (mysqli_affected_rows(getDb()) != 1) return false;
        return $result;
    }
}

function getBasketCount() {
    $session_id = session_id();
    $sql = "SELECT COUNT(id) as count FROM `basket` WHERE `session_id`='$session_id'";
    $result = getAssocResult($sql);
    $count = [];
    if (isset($result[0]))
        $count = $result[0];
    return $count['count'];
}