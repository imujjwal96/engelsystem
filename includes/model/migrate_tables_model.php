<?php

// migrating install.sql file
function migrate_install() {
  return sql_query("source db/install.sql");
}

// migrating update.sql file
function migrate_update() {
  return sql_query("source db/update.sql");
}
?>
