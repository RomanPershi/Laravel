<?php
function getBaskedName($id, $cookie,$true_return,$false_return)
{
    if ($cookie == NULL)
        return $false_return;
    return (in_array($id, $cookie)) ? $true_return : $false_return;
}

