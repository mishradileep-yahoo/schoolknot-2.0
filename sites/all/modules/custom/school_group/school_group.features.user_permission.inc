<?php
/**
 * @file
 * school_group.features.user_permission.inc
 */

/**
 * Implements hook_user_default_permissions().
 */
function school_group_user_default_permissions() {
  $permissions = array();

  // Exported permission: create school_group content.
  $permissions['create school_group content'] = array(
    'name' => 'create school_group content',
    'roles' => array(
      0 => 'School Administrator',
      1 => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: edit own school_group content.
  $permissions['edit own school_group content'] = array(
    'name' => 'edit own school_group content',
    'roles' => array(
      0 => 'School Administrator',
      1 => 'administrator',
    ),
    'module' => 'node',
  );

  return $permissions;
}
