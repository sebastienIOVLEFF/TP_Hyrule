<?php

function getGroups()
{
    $groups = shell_exec("less /etc/group");
    if (empty($groups)) {
        return [];
    } else {
        $groups = explode("\n", $groups);
        return $groups;
    }
}
