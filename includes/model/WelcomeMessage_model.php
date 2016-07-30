<?php

function update_display_msg($display_message) {
  return sql_query("UPDATE `Welcome_Message` SET `display_msg`='" . sql_escape($display_message) . "'");
}

function welcome_msg() {
  return sql_select("SELECT * FROM `Welcome_Message`");
}

function WelcomeMessage() {
  return sql_select("SELECT * FROM `Welcome_Message`");
}

?>
