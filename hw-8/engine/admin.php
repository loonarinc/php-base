<?php

function getOrders() {
    $sql = "SELECT `orders`.id as 'order_id', `orders`.name as 'name', `orders`.`phone` as 'phone', `goods`.`name` as 'goodname', `goods`.id as 'goods_id', `basket`.`quantity` as 'quantity' FROM orders, goods, basket WHERE `orders`.`session_id` = `basket`.`session_id` AND `basket`.`goods_id` = `goods`.id";
    $basket = getAssocResult($sql);
    return $basket;
}