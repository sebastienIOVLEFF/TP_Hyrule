<?php
/**
 * fetch the groups from the /etc/group file
 *
 * @return array|bool an array containing all the groups registered
 */
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

/**
 * fetch the users from the /etc/group file
 *
 * @return array|bool an array containing all the users registered
 */
function getUsers()
{
    $users = shell_exec("awk -F':' '{ print $1}' /etc/passwd");
    if (empty($users)) {
        return [];
    } else {
        $users = explode("\n", $users);
        return $users;
    }
}
