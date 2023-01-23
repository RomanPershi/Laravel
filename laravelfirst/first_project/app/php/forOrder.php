<?php
function verifyUser($user)
{
    if ($user == NULL)
        return NULL;
    return $user->email;
}

