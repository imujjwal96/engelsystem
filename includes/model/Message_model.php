<?php

/**
 * Returns Message id array
 */
function Message_ids() {
  return sql_select("SELECT `id` FROM `Messages`");
}

/**
 * Returns message by id.
 *
 * @param $id message
 *          ID
 */
function Message($id) {
  $message_source = sql_select("SELECT * FROM `Messages` WHERE `id`='" . sql_escape($id) . "' LIMIT 1");
  if ($message_source === false)
    return false;
  if (count($message_source) > 0)
    return $message_source[0];
  return null;
}

/**
 * TODO: use validation functions, return new message id
 * TODO: global $user con not be used in model!
 * send message
 *
 * @param $id User
 *          ID of Reciever
 * @param $text Text
 *          of Message
 */
function Message_send($id, $text) {
  global $user;

  $text = preg_replace("/([^\p{L}\p{P}\p{Z}\p{N}\n]{1,})/ui", '', strip_tags($text));
  $to = preg_replace("/([^0-9]{1,})/ui", '', strip_tags($id));

  if (($text != "" && is_numeric($to)) && (sql_num_query("SELECT * FROM `User` WHERE `UID`='" . sql_escape($to) . "' AND NOT `UID`='" . sql_escape($user['UID']) . "' LIMIT 1") > 0)) {
    sql_query("INSERT INTO `Messages` SET `Datum`='" . sql_escape(time()) . "', `SUID`='" . sql_escape($user['UID']) . "', `RUID`='" . sql_escape($to) . "', `Text`='" . sql_escape($text) . "'");
    return true;
  } else {
    return false;
  }
}

function message_unread($uid) {
  return sql_num_query("SELECT * FROM `Messages` WHERE isRead='N' AND `RUID`='" . sql_escape($uid) . "'");
}

function user_by_nick($uid) {
  return sql_select("SELECT * FROM `User` WHERE NOT `UID`='" . sql_escape($uid) . "' ORDER BY `Nick`");
}

function select_group() {
  return sql_select("SELECT * FROM `Groups` ORDER BY `Name`");
}

function select_angeltypes() {
  return sql_select("SELECT * FROM `AngelTypes` ORDER BY  `name`");
}

function select_messages($uid) {
  return sql_select("SELECT * FROM `Messages` WHERE `SUID`='" . sql_escape($uid) . "' OR `RUID`='" . sql_escape($uid) . "' ORDER BY `isRead`,`Datum` DESC");
}

function messages_by_id($id) {
  return sql_select("SELECT * FROM `Messages` WHERE `id`='" . sql_escape($id) . "' LIMIT 1");
}

function messages_read_by_id($id) {
  return sql_query("UPDATE `Messages` SET `isRead`='Y' WHERE `id`='" . sql_escape($id) . "' LIMIT 1");
}

function messages_delete($id) {
  return sql_query("DELETE FROM `Messages` WHERE `id`='" . sql_escape($id) . "' LIMIT 1");
}

function user_count() {
  return sql_num_query("SELECT * FROM `User`");
}

function select_usergroups($to) {
  return sql_select("SELECT * FROM `UserGroups` WHERE `group_id`='" . sql_escape($to) . "'");
}

function select_userangeltypes($id) {
  return sql_select("SELECT * FROM `UserAngelTypes` WHERE `angeltype_id`='" . sql_escape($id) . "'");
}

function delete_needed_angeltype_by_ids($shift_id) {
  return sql_query("DELETE FROM `NeededAngelTypes` WHERE `shift_id`='" . sql_escape($shift_id) . "'");
}

function inserts_needed_angeltypes($shift_id, $type_id, $count) {
  return sql_query("INSERT INTO `NeededAngelTypes` SET `shift_id`='" . sql_escape($shift_id) . "', `angel_type_id`='" . sql_escape($type_id) . "', `count`='" . sql_escape($count) . "'");
}
?>
