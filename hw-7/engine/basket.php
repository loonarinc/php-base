<?php
function getBasket()
{
    $ses_id = session_id();
    $sql = "SELECT `basket`.id, `goods`.id as `goods_id`, `basket`.id_good as `basket_id`, `goods`.price, `basket`.quantity, `goods`.name, `goods`.image, `goods`.description FROM `basket`, `goods` WHERE `id_session` = '{$ses_id}' AND basket.id_good=goods.id;";
    $result = getAssocResult($sql);
    return $result;
}

function addToBasket($good_id)
{
    $ses_id = session_id();
    $good_id = (int)$good_id;
    $sql = "SELECT * FROM `basket` WHERE id_good = '{$good_id}' AND  `id_session` = '{$ses_id}';";
    $result = getAssocResult($sql)[0];
    if (!$result) {
        $sql = "INSERT INTO `basket`(`id_good`, `id_session`, `quantity`) VALUES ('{$good_id}','{$ses_id}', '1');";
        $result = executeQuery($sql);
        if (mysqli_affected_rows(getDb()) != 1) return false;
        return $result;
    } else {
        $sql = "UPDATE `basket` SET `quantity`=`quantity` + 1 WHERE `id_good` = {$good_id} AND `id_session` = '{$ses_id}'";
        $result = executeQuery($sql);
        if (mysqli_affected_rows(getDb()) != 1) return false;
        return $result;
    }
}

function delFromBasket($id)
{
    $id = (int)$id;
    $sql = "SELECT quantity FROM `basket` WHERE id = '{$id}';";
    $result = getAssocResult($sql)[0];
    if (((int)$result[quantity]) > 1) {
        $sql = "UPDATE `basket` SET `quantity`=`quantity` - 1 WHERE `id` = {$id};";
        $result = executeQuery($sql);
        if (mysqli_affected_rows(getDb()) != 1) return false;
        return $result;
    } else {
        $sql = "DELETE FROM `basket` WHERE `basket`.`id` = {$id};";
        $result = executeQuery($sql);
        if (mysqli_affected_rows(getDb()) != 1) return false;
        return $result;
    }
}

function doBasketAction(&$params, $action, $id)
{
    $params['error'] = ERR_CODE[$_GET['status']];
    //значения по умолчанию
    $params['action'] = "add";
    //$params['buttonText'] = "Добавить";
    //$params['name'] = "";
    //$params['feedtext'] = "";
    if ($action == "add") {
        $error = addToBasket($id);
        if ($error)
            header("Location: /catalog/?status=OK");
        else
            header("Location: /catalog/?status=ERROR_ADD");

    }
    if ($action == "del") {
        $error = delFromBasket($id);
        if ($error)
            header("Location: /basket/?status=UPDATED");
        else
            header("Location: /basket/?status=ERROR_DEL");
    }
}
function getCountBasket(){
    $ses_id = session_id();
    $sql = "SELECT SUM(`quantity`) as quantity FROM `basket` WHERE id_session = '{$ses_id}';";
    $result = getAssocResult($sql)[0];
    return ((int)$result[quantity]);

}