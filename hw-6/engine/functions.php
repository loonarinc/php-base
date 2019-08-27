<?php
function prepareVariables($page, $action, $id)
{
    $params = [];
    switch ($page) {
        case 'main':
            $params = ['name' => 'Alex'];
            break;
        case 'catalog':
            $params = ['catalog' => [
                "Спички",
                "Метла",
                "Ведро"
            ]
            ];
            _log($params, "params");
            break;
        case 'news':
            $params = [
                'news' => getNews()
            ];
            break;
        case 'newscontent':
            $params = [
                'newscontent' => getNewsContent($id)
            ];

            break;
        case 'apicatalog':
            $params = ['catalog' => [
                "Спички",
                "Метла",
                "Ведро"
            ]
            ];
            echo json_encode($params, JSON_UNESCAPED_UNICODE);
            die();
            break;
        case 'feedback':
            $params['action'] = 'add';
            doFeedbackAction($params, $action, $id);
            $params['feedback'] = getAllFeedback();
            if ($action == 'edit') {
                $params['row'] = getAssocResult("SELECT * FROM `feedback` WHERE id = {$id}")[0];
                $params['action'] = 'save';
                $params['id'] = $id;
            }
            break;
    }
    return $params;
}

function doFeedbackAction($params, $action, $id)
{
    if ($_GET['status'] == 1) {
        $params['error'] = "Отзыв добавлен!";
    }
    if ($_GET['status'] == 2) {
        $params['error'] = "Отзыв удален!";
    }

    if ($action == "delete") {
        //пока настоящее удаление из таблицы
        $sql = "DELETE FROM `feedback` where id={$id};";
        executeQuery($sql);
        header("Location: /feedback");
    }
    if ($action == "add") {
        $name = strip_tags(htmlspecialchars($_POST['name']));
        $feedback = strip_tags(htmlspecialchars($_POST['message']));
        $sql = "INSERT INTO `feedback` (`name`, `feedback`) VALUES ('{$name}', '{$feedback}');";
        executeQuery($sql);
    }
    if ($action == "save") {
        $name = strip_tags(htmlspecialchars($_POST['name']));
        $feedback = strip_tags(htmlspecialchars($_POST['message']));
        $sql = "UPDATE `feedback` SET `name` = '{$name}', `feedback` = '{$feedback}' WHERE id = {$id};";
        executeQuery($sql);
        header("Location: /feedback");

    }
    var_dump($params);
}

function getAllFeedback()
{
    $sql = "SELECT * FROM `feedback` ORDER BY id DESC;";
    return getAssocResult($sql);
}

function getNews()
{
    $news = getAssocResult("SELECT * FROM news;");
    return $news;
}

function getNewsContent($id)
{
    $id = (int)$id;
    $sql = "SELECT text FROM news WHERE id = {$id};";
    $news = getAssocResult($sql);

    //В случае если новости нет, вернем пустое значение
    $result = [];
    if (isset($news[0]))
        $result = $news[0];
    return $result;
}

function render($page, $params = [])
{
    return renderTempate(LAYOUTS_DIR . "layout", ['content' => renderTempate($page, $params)]);
}

function renderTempate($page, $params = [])
{
    ob_start();
    extract($params);
    $filename = TEMPLATES_DIR . $page . ".php";
    if (file_exists($filename)) {
        include $filename;
    } else {
        echo "Страницы не существует 404";
    }
    return ob_get_clean();
}
