<?php

function admin_cgroups_title() {
  return _("Create Groups");
}

function admin_create_groups() {

  global $user;

  $name = "";
  $uid = "";

  if (isset($_REQUEST['submit'])) {
    $ok = true;

    if (isset($_REQUEST['Name']) && strlen(strip_request_item('Name')) > 0){
      $name = strip_request_item('Name');
    }
    else {
      $ok = false;
      $msg .= error(_("Please enter your Group Name."), true);
    }

   if (isset($_REQUEST['UID']))
      $uid = strip_request_item('UID');
    else {
      $ok = false;
      $msg .= error(_("Please enter your Group UID."), true);
    }

  }

  if ($ok) {
    create_new_group($name, $uid);
    success(_("New Group Created."));
    redirect(page_link_to('admin_cgroups'));
  }

  return page_with_title(admin_cgroups_title(), array(
      msg(),
      form(array(
          form_text('Name', _("Group Name"), $name),
          form_text('UID', _("User ID"), $uid),
          form_submit('submit', _("Save"))
      ))
  ));

}

?>
