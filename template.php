<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * vanilla theme.
 */
function vanilla_css_alter(&$css) {
  // Remove Drupal core css
  $exclude = array(
    //    'modules/aggregator/aggregator.css' => FALSE,
    //    'modules/block/block.css' => FALSE,
    //    'modules/dblog/dblog.css' => FALSE,
    //    'modules/field/theme/field.css' => FALSE,
    //    'modules/file/file.css' => FALSE,
    //    'modules/filter/filter.css' => FALSE,
    //    'modules/forum/forum.css' => FALSE,
    //    'modules/help/help.css' => FALSE,
    //    'modules/menu/menu.css' => FALSE,
    //    'modules/node/node.css' => FALSE,
    //    'modules/poll/poll.css' => FALSE,
    //    'modules/profile/profile.css' => FALSE,
    //    'modules/search/search.css' => FALSE,
    //    'modules/syslog/syslog.css' => FALSE,
    //    'modules/system/system.admin.css' => FALSE,
    //    'modules/system/maintenance.css' => FALSE,
    //    'modules/system/system.admin.css' => FALSE,
    //    'modules/system/system.base.css' => FALSE,
    'modules/system/system.maintenance.css' => FALSE,
    'modules/system/system.messages.css' => FALSE,
    'modules/system/system.menus.css' => FALSE,
    'sites/all/themes/omega/omega/css/modules/system/system.menus.theme.css' => FALSE,
    'sites/all/modules/islandora_modules/islandora_modules/islandora_solution_pack_collection/css/islandora_basic_collection.base.css' => FALSE,
    'sites/all/modules/islandora_modules/islandora_modules/islandora/css/islandora.theme.css' => FALSE,
    //    'modules/system/system.theme.css' => FALSE,
    //    'modules/taxonomy/taxonomy.css' => FALSE,
    //    'modules/tracker/tracker.css' => FALSE,
    //    'modules/update/update.css' => FALSE,
    //    'modules/user/user.css' => FALSE,
    //    'misc/vertical-tabs.css' => FALSE,
  );

  $css = array_diff_key($css, $exclude);
}

function vanilla_preprocess_islandora_basic_collection_wrapper(&$variables) {
  //$variables['view_links'][0]['title'] = '<i class="fa fa-th" aria-hidden="true"></i>
  //Grid';
  //$variables['view_links'][1]['title'] = 'List';
  //dpm($variables);


}
function vanilla_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'islandora_solr_simple_search_form') {
    $form['simple']['submit']['#value'] = decode_entities('&#xf002;');
  }
}
