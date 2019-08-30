<?php

function prepareVariables($page)
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
                'newscontent' => getNewsContent($_GET['id'])
            ];
            break;
        case 'gallery':
            $params = [
                'images' => getImages()
            ];
            break;
        case 'viewimg':
            $params = [
                'viewimg' => getFullImg($_GET['id'])
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
    }
    return $params;
}

function getNews()
{
    $news = getAssocResult("SELECT * FROM news");
    return $news;
}

function getImages()
{
    $images = getAssocResult("SELECT * FROM images ORDER BY views DESC");
    return $images;
}

function getFullImg($id)
{
    $id = (int)$id;
    $sql = "UPDATE images SET views = views + 1 WHERE id = {$id}";
    setImgViews($sql);
    $sql = "SELECT `url`, `name`, `views` FROM images WHERE id = {$id}";
    $images = getAssocResult($sql);

    //В случае если новости нет, вернем пустое значение
    $result = [];
    if (isset($images[0]))
        $result = $images[0];
    return $result;
}

function getNewsContent($id)
{
    $id = (int)$id;
    $sql = "SELECT text FROM news WHERE id = {$id}";
    $news = getAssocResult($sql);

    //В случае если новости нет, вернем пустое значение
    $result = [];
    if (isset($news[0]))
        $result = $news[0];
    return $result;
}

function render($page, $params = [])
{
    return renderTempate("layout", ['content' => renderTempate($page, $params)]);
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
