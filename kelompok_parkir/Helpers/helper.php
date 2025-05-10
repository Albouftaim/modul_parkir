<?php
function getSafeFormValue($array, $key, $default = '')
{
    return isset($array[$key]) ? htmlspecialchars($array[$key]) : $default;
}
