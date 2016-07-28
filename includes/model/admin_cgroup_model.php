<?php

function create_new_group($name, $uid) {
  return sql_query("
    INSERT INTO `Groups` SET
    `Name`='" . sql_escape($name) . "',
    `UID`='" . sql_escape($uid) . "'");
}

function inserts_into_group_privileges($uid, $priv) {
 return sql_query("INSERT INTO `GroupPrivileges` SET `group_id`='" . sql_escape($uid) . "', `privilege_id`='" . sql_escape($priv) . "'");
}

?>
