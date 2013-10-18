File changes:

63 - changed $title output to include aliased path during autocomplete
old: $matches[$title .' ('. $path. ')'] = '<div class="reference-autocomplete">'. check_plain($title) . ')</div>';
new: $matches[$title .' ('. $path. ')'] = '<div class="reference-autocomplete">'. check_plain($title) .' (/'. check_plain(drupal_lookup_path('alias',$path)). ')</div>';


85 - changed $output from (node/nid) format to aliased path - only changes before selecting a node in the drop down.
old: $output = ($result !== FALSE) ? $result .' ('. ckeditor_link_path_prefix_language($path, $langcode) .')' : FALSE;
new: $output = ($result !== FALSE) ? $result .' (/'. drupal_lookup_path('alias',ckeditor_link_path_prefix_language($path, $langcode)) .')' : FALSE;