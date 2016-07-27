<?php

function create_new_group($name, $uid) {
  return sql_query("
    INSERT INTO `Groups` SET
    `Name`='" . sql_escape($name) . "',
    `UID`='" . sql_escape($uid) . "'");
}

?>
