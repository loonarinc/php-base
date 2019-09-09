<?php

//Файл с функциями нашего движка

/*
 * Функция подготовки переменных для передачи их в шаблон
 */
function prepareVariables($page, $action, $id)
{
//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
    $params = [];
    $params['allow'] = false;
    if (is_auth()) {
        $params['allow'] = true;
        $params['user'] = get_user();
    }

    $params['count'] = getCountBasket();
    switch ($page) {
        case 'login':
            $login = $_POST['login'];
            $pass = $_POST['pass'];
            if(auth($login, $pass)){
                if (isset($_GET['save'])) {
                    $hash = uniqid(rand(), true);
                    $db = getDB();
                    $id = strip_tags(stripslashes($_SESSION['id']));
                    $sql = "UPDATE `users` SET `hash` = '{$hash}' WHERE `users`.`id` = {$id}";
                    $result = mysqli_query($db, $sql);
                    setcookie("hash", $hash, time() + 3600);

                }
                $allow = true;
                $user = get_user();
                header("Location: /");
            }
            else{
                die('Не верный логин пароль');
            }
            break;
        case 'logout':
            session_destroy();
            setcookie("hash");
            header("Location: /");
            break;
        case 'news':
            $params["news"] = getNews();
            break;
        case 'newspage':
            //пример асинхронного обработчика лайков к новостям
            if ($action=="addlike") {
                //обращаемся к модели и ставим лайк
                $result = addNewsLike($id);
                echo json_encode(["result" => $result]);
            }
            $content = getNewsContent($id);
            $params['prev'] = $content['prev'];
            $params['text'] = $content['text'];
            break;

        case 'feedback':
            doFeedbackAction($params, $action, $id);
            $params['feedback'] = getAllFeedback();
            break;
        case 'catalog':
            $params['goods'] = getAllGoods();
            break;
        case 'item':
            $params['good'] = getOneGood($id);
            break;
        case 'basket':
            doBasketAction($params, $action, $id);
            $params['basket'] = getBasket();
            break;
        case 'order':
            doOrderAction($params, $action, $id);
            break;

    }
    return $params;
}





