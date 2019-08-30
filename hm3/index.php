<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'main';
}

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
        break;
    case 'apicatalog':
        $params = ['catalog' => [
            "Спички1",
            "Метла",
            "Ведро"
        ]
        ];
        echo json_encode($params, JSON_UNESCAPED_UNICODE);
        die();
        break;
        case 'menu';
        $params=['menu' => [
            "Меню1",
            "Меню2" => [
                "Подменю2-1",
                "Подменю2-2",
                "Подменю2-3"
            ],
            "Меню3",
            "Меню4"]];
}
echo render($page, $params);

function render($page, $params = [])
{
    return renderTemplate("layout", ['content' => renderTemplate($page, $params)]);
}

function renderTemplate($page, $params = [])
{
    ob_start();
    extract($params);
    $filename = $page . ".php";
    if (file_exists($filename)) {
        include $filename;
    } else {
        echo "Страницы не существует 404";
    }
    return ob_get_clean();
}
