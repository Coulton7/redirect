<?php
/**
 * @file
 * The primary PHP file for this theme.
 */
function aesinternational_preprocess_page(&$vars) {
    // template files called page--contenttype.tpl.php
    if (isset($vars['node']->type)) {
        $vars['theme_hook_suggestions'][] = 'page__' . $vars['node']->type;
    }

	drupal_add_js(drupal_get_path('theme', 'aesbs337').'/js/logoscroll.js');
	drupal_add_js(drupal_get_path('theme', 'aesbs337').'/js/fade-text.js');
  drupal_add_js(drupal_get_path('theme', 'aesbs337').'/js/jquery.scrolling-tabs.min.js');
  drupal_add_js(drupal_get_path('theme', 'aesbs337').'/js/scrolling-tabs-init.js');
}

function aesinternational_js_alter(&$javascript){
  unset($javascript[drupal_get_path('theme', 'aesbs337').'/js/reg-mark.js']);
  unset($javascript[drupal_get_path('theme', 'aesbs337').'/js/contact-icon.js']);
}

function aesinternational_css_alter(&$css){
  $css['sites/all/themes/aesbs337/css/fonts-style.css']['weight']=13;
  $css['sites/all/themes/aesbs337/css/regions-style.css']['weight']=14;
  $css['sites/all/themes/aesbs337/css/block-style.css']['weight']=15;
  $css['sites/all/themes/aesbs337/css/field-style.css']['weight']=16;
  $css['sites/all/themes/aesbs337/css/jquery.scrolling-tabs.min.css']['weight']=17;
  $css['sites/all/themes/aesinternational/css/int-style.css']['weight']=18;
}

function aesinternational_theme(){
	$items=array();

	$items['user_login']=array(
	'render element' => 'form',
	'path'=> drupal_get_path('theme', 'aesinternational').'/templates',
	'template'=>'user-login',
	'preprocess functions'=>array(
	'aesinternational_preprocess_user_login'
	),
	);
	return $items;
}

function aesinternational_preprocess_user_login(&$vars){
}

function aesinternational_preprocess_node(&$variables) {
  $node = $variables['node'];
  $date = format_date($node->created, 'custom', 'F j, Y');
  $variables['submitted'] = t('Submitted by !username on !datetime', array('!username' => $variables['name'], '!datetime' => $date));
}

function aesinternational_preprocess_maintenance_page(&$variables) {
  if (isset($variables['db_is_active']) && !$variables['db_is_active']) {
// Template suggestion for offline site
    $variables['theme_hook_suggestion'] = 'maintenance_page__offline';
  }
else {
// Template suggestion for live site (in maintenance mode)
    $variables['theme_hook_suggestion'] = 'maintenance_page';
 }
}
