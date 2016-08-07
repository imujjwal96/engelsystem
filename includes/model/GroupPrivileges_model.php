<?php

function delete_GroupPrivileges($id) {
  return sql_query("DELETE FROM `GroupPrivileges` WHERE `group_id`='" . sql_escape($id) . "'");
}

function insert_GroupPrivilege($id, $priv) {
  return sql_query("INSERT INTO `GroupPrivileges` SET `group_id`='" . sql_escape($id) . "', `privilege_id`='" . sql_escape($priv) . "'");
}

function select_GroupPrivileges($group) {
  return sql_select("SELECT * FROM `GroupPrivileges` JOIN `Privileges` ON (`GroupPrivileges`.`privilege_id` = `Privileges`.`id`) WHERE `group_id`='" . sql_escape($group['UID']) . "'");
}

?>
