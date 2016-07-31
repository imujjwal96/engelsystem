<?php

function create_temporary_table() {
  return sql_query("CREATE TEMPORARY TABLE `temp_tb` SELECT * FROM `User`");
}

function alter_table($col) {
  return sql_query("ALTER TABLE `temp_tb` DROP $col");
}

function select_column() {
  return sql_select("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'User' ");

}

function select_temp_tb() {
  return sql_select("SELECT * FROM `temp_tb`");
}

?>
