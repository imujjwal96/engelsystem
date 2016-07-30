<?php

function Groups_by_id_groups($id, $my_highest_group) {
  return sql_select("SELECT * FROM `Groups` LEFT OUTER JOIN `UserGroups` ON (`UserGroups`.`group_id` = `Groups`.`UID` AND `UserGroups`.`uid` = '" . sql_escape($id) . "') WHERE `Groups`.`UID` >= '" . sql_escape($my_highest_group) . "' ORDER BY `Groups`.`Name`");
}

function Groups_by_name() {
  return sql_select("SELECT * FROM `Groups` ORDER BY `Name`");
}

function Groups_by_id($id) {
  return sql_select("SELECT * FROM `Groups` WHERE `UID`='" . sql_escape($id) . "' LIMIT 1");
}

?>
