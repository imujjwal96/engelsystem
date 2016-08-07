<?php

function select_news_treffen($page, $disp_news) {
  return sql_select("SELECT * FROM `News` WHERE `Treffen`=1 ORDER BY `Datum` DESC LIMIT " . sql_escape($page * $disp_news) . ", " . sql_escape($disp_news));
}

function select_news() {
  return sql_num_query("SELECT * FROM `News`");
}

function count_news_by_id($nid) {
  return sql_num_query("SELECT * FROM `News` WHERE `ID`='" . sql_escape($nid) . "' LIMIT 1");
}

function select_news_by_id($nid) {
  return sql_select("SELECT * FROM `News` WHERE `ID`='" . sql_escape($nid) . "' LIMIT 1");
}

function insert_news_val($betreff, $text, $uid, $treffen) {
  return sql_query("INSERT INTO `News` (`Datum`, `Betreff`, `Text`, `UID`, `Treffen`) " . "VALUES ('" . sql_escape(time()) . "', '" . sql_escape($betreff) . "', '" . sql_escape($text) . "', '" . sql_escape($uid) . "', '" . sql_escape($treffen) . "');");
}

function select_news_by_date($page, $DISPLAY_NEWS) {
  return sql_select("SELECT * FROM `News` ORDER BY `Datum` DESC LIMIT " . sql_escape($page * $DISPLAY_NEWS) . ", " . sql_escape($DISPLAY_NEWS));
}

function news_select($disp_news) {
  return sql_select("SELECT * FROM `News` " . (empty($_REQUEST['meetings'])? '' : 'WHERE `Treffen` = 1 ') . "ORDER BY `ID` DESC LIMIT " . sql_escape($disp_news));
}

function News_by_id($id) {
  return sql_select("SELECT * FROM `News` WHERE `ID`='" . sql_escape($id) . "' LIMIT 1");
}

function News_update($eBetreff, $eText, $eTreffen, $id, $user) {
   return sql_query("UPDATE `News` SET
              `Datum`='" . sql_escape(time()) . "',
              `Betreff`='" . sql_escape($eBetreff) . "',
              `Text`='" . sql_escape($eText) . "',
              `UID`='" . sql_escape($user['UID']) . "',
              `Treffen`='" . sql_escape($eTreffen) . "'
              WHERE `ID`='" . sql_escape($id) . "'");
}
function delete_by_id($id) {
  return sql_query("DELETE FROM `News` WHERE `ID`='" . sql_escape($id) . "' LIMIT 1");
}

?>
