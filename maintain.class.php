<?php
// Chech whether we are indeed included by Piwigo.
if (!defined('PHPWG_ROOT_PATH'))
{
  die('Hacking attempt!');
}

class protect_notification_maintain extends PluginMaintain
{
  private $default_conf = array(
    'replacementEmail' => 'no-reply@[HTTP_HOST]',
    'hideContactFooter' => true,
  );

  function __construct()
  {
    $this->default_conf['replacementEmail'] = str_replace(
      '[HTTP_HOST]', $_SERVER['HTTP_HOST'], $this->default_conf['replacementEmail']);
  }

  function install($plugin_version, &$errors=array())
  {
    global $conf;

    if (empty($conf['ProtectNotification']))
    {
      conf_update_param('ProtectNotification', $this->default_conf, true);
    }
  }

  function update($old_version, $new_version, &$errors=array())
  {
    $this->install($new_version, $errors);
  }

  function uninstall()
  {
    conf_delete_param('ProtectNotification');
  }
}
?>
