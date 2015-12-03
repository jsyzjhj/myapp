<?php
function dump($data)
{
    if (is_array($data)) {
        echo '<pre>';
        var_dump($data);
    }
}

