<?php

/*
 * Edit status posts
 */
function classbellsu_edit_post($nid) {
	$post_node = node_load($nid);
	$status_post_type = $post_node->field_post_type[$post_node->language][0]['value'];
	switch($status_post_type) {
		case 'text' :
			return drupal_get_form('classbellsu_status_update_form', $post_node);
			break;
		case 'image' :
		case 'album' :
			return drupal_get_form('classbellsu_image_update_form', $post_node);
			break;
		case 'youtube_video' :
			return drupal_get_form('classbellsu_image_update_form', $post_node);
			break;
	}
	return 'Something wrong';
}

function classbellsu_delete_post($form, &$form_state, $nid) {
	if($nid != '') $node = node_load($nid);
	$form['#node'] = $node;
  // Always provide entity id in the same form key as in the entity edit form.
  $form['nid'] = array('#type' => 'value', '#value' => $node->nid);
  return confirm_form($form,
    t('Are you sure you want to delete %title?', array('%title' => $node->title)),
    'node/' . $node->nid,
    t('This action cannot be undone.'),
    t('Delete'),
    t('Cancel')
  );
}

function classbellsu_delete_post_submit($form, &$form_state) {
	if ($form_state['values']['confirm']) {
    $node = node_load($form_state['values']['nid']);
    node_delete($form_state['values']['nid']);
    drupal_set_message(t('%title has been deleted.', array('%title' => $node->title)));
  }

  $form_state['redirect'] = '<front>';
}