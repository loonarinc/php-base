<?php

function getOrders() {
    $sql = "SELECT * FROM `orders`;";
    $basket = getAssocResult($sql);
    return $basket;
}

function orderComplete($id) {
    $id=(int)$id;
    $sql = "UPDATE `orders` SET status = 'complete' WHERE id={$id};";
    return executeQuery($sql);

}

function orderDelete($id) {
    $id=(int)$id;
    $sql = "DELETE FROM `orders` WHERE `id`={$id};";
    return executeQuery($sql);

}