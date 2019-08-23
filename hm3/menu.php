<?php

echo "<ul>";
    foreach ($menu as $count => $i) {
    if (is_array($i)) {
    echo "<li>" . $count . "<ul>";
            foreach ($i as $j) {
            echo "<li>" . $j . "</li>";
            }
            echo "</ul>";
        } else echo "<li>" . $i . "</li>";
    }