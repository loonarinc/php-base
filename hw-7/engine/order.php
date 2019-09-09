<?php
function doOrderAction(&$params, $action, $id)
{
    if ($action == "ordercomplete") {
        $error = session_destroy();
        setcookie("hash");
        if ($error)
            header("Location: /basket/?status=UPDATED");
        else
            header("Location: /basket/?status=ERROR_DEL");
    }

}