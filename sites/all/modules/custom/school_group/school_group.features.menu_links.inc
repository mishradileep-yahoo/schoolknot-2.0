<?php
/**
 * @file
 * school_group.features.menu_links.inc
 */

/**
 * Implements hook_menu_default_menu_links().
 */
function school_group_menu_default_menu_links() {
  $menu_links = array();

  // Exported menu link: management:admin/structure/menu/manage/menu-school-admin-menu
  $menu_links['management:admin/structure/menu/manage/menu-school-admin-menu'] = array(
    'menu_name' => 'management',
    'link_path' => 'admin/structure/menu/manage/menu-school-admin-menu',
    'router_path' => 'admin/structure/menu/manage/%',
    'link_title' => 'School Admin Menu',
    'options' => array(),
    'module' => 'menu',
    'hidden' => '0',
    'external' => '0',
    'has_children' => '0',
    'expanded' => '0',
    'weight' => '0',
    'parent_path' => 'admin/structure/menu',
  );
  // Translatables
  // Included for use with string extractors like potx.
  t('School Admin Menu');


  return $menu_links;
}
