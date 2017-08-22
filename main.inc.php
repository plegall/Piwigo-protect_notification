<?php
/*
Plugin Name: Protect Notification
Version: 2.9.a
Description: Replace the webmaster email address by a fake address in notification emails
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=735
Author: plg
Author URI: http://piwigo.org/forum/profile.php?id=2
*/

// Check whether we are indeed included by Piwigo.
if (!defined('PHPWG_ROOT_PATH'))
{
  die('Hacking attempt!');
}

// Define the path to our plugin.
define('PROTECT_NOTIFICATION_PATH', PHPWG_PLUGINS_PATH.basename(dirname(__FILE__)).'/');

add_event_handler('init', 'protectnotification_init');
add_event_handler('get_admin_plugin_menu_links', 'protectnotification_admin_menu');
add_event_handler('get_webmaster_mail_address', 'protect_switch_webmaster_email');
add_event_handler('loc_end_page_tail', 'protect_remove_contact_link_footer');

/**
 * Load the configuration
 */
function protectnotification_init()
{
  global $conf;
  $conf['ProtectNotification'] = safe_unserialize($conf['ProtectNotification']);

  load_language('plugin.lang', PROTECT_NOTIFICATION_PATH);
}

/**
 * Add an entry to the 'Plugins' menu
 */
function protectnotification_admin_menu($menu)
{
  array_push(
    $menu,
    array(
      'NAME' => 'Protect Notification',
      'URL'  => get_admin_plugin_menu_link(dirname(__FILE__)).'/admin.php'
    )
  );
  return $menu;
}

/**
 * Replace webmaster email
 */
function protect_switch_webmaster_email($email)
{
  global $conf;

  return $conf['ProtectNotification']['replacementEmail'];
}

/**
 * Remove webmaster contact from web footer
 */
function protect_remove_contact_link_footer()
{
  global $conf, $template;

  if ($conf['ProtectNotification']['hideContactFooter'])
  {
    $template->assign('CONTACT_MAIL', null);
  }
}
?>
