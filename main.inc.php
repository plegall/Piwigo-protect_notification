<?php
/*
Plugin Name: Protect Notification
Version: 2.3.a
Description: Replace the webmaster email address by a fake address in notification emails
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=
Author: plg
Author URI: http://piwigo.wordpress.com
*/

if (!defined('PHPWG_ROOT_PATH'))
{
  die('Hacking attempt!');
}

add_event_handler('get_webmaster_mail_address', 'protect_switch_webmaster_email');
function protect_switch_webmaster_email($email)
{
  return 'no-reply@'.$_SERVER['HTTP_HOST'];
}

add_event_handler('loc_end_page_tail', 'protect_remove_contact_link_footer');
function protect_remove_contact_link_footer()
{
  global $template;
  
  $template->assign('CONTACT_MAIL', null);
}
?>
