<?php
// Chech whether we are indeed included by Piwigo.
if (!defined('PROTECT_NOTIFICATION_PATH'))
{
  die('Hacking attempt!');
}

// Check access and exit when user status is not ok
check_status(ACCESS_ADMINISTRATOR);

// save config
if (isset($_POST['save_config']))
{
  $conf['ProtectNotification'] = array(
    'replacementEmail' => $_POST['replacementEmail'],
    'hideContactFooter' => isset($_POST['hideContactFooter']),
  );

  conf_update_param('ProtectNotification', $conf['ProtectNotification']);
}

// Fetch the template.
global $template;

// Assign current config to the template
$template->assign(array(
  'ProtectNotification' => $conf['ProtectNotification'],
));

// Add our template to the global template
$template->set_filename('protectNotification_content', dirname(__FILE__).'/admin.tpl');
// Assign the template contents to ADMIN_CONTENT
$template->assign_var_from_handle('ADMIN_CONTENT', 'protectNotification_content');

?>
