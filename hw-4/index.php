<?php
define("PUBLIC_DIR", $_SERVER['DOCUMENT_ROOT'] . "/");
define("IMG_SMALL_DIR", "gallery_img/small/");
define("IMG_BIG_DIR", "gallery_img/big/");
function getImgArray()
{
    $imgArray = array_slice(scandir(IMG_SMALL_DIR), 2);
    return $imgArray;
}

function showGallery()
{
    $imgArray = getImgArray();
    if (count($imgArray) > 0) {
        foreach ($imgArray as $imgArrayEl) {
            echo '<a rel="gallery" class="photo" href="' .IMG_BIG_DIR . $imgArrayEl . '"><img src="' . IMG_SMALL_DIR . $imgArrayEl . '" width="150" height="100" /></a>';
        }
    } else {
        echo 'Empty dir';
    }
}

?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Моя галерея</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script type="text/javascript" src="./scripts/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="./scripts/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="./scripts/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="./scripts/fancybox/jquery.fancybox-1.3.4.css" media="screen"/>
    <script type="text/javascript">
        $(document).ready(function () {
            $("a.photo").fancybox({
                transitionIn: 'elastic',
                transitionOut: 'elastic',
                speedIn: 500,
                speedOut: 500,
                hideOnOverlayClick: false,
                titlePosition: 'over'
            });
        }); </script>

</head>

<body>
<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
    <div class="gallery">
        <?php
        showGallery();
        ?>
    </div>
</div>

</body>
</html>
