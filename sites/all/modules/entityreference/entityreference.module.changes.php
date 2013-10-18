File changes:
834 - changed $label to $key + path to include node ID & path in select label output

old: $matches[$prefix . $key] = '<div class="reference-autocomplete">' . $label . '</div>';
new: $matches[$prefix . $key] = '<div class="reference-autocomplete">' . $key . '<label style="font-size:.7em;padding-left:15px;margin-top:-5px;font-weight:200;">> ' . drupal_lookup_path('alias',"node/".$entity_id) . '</label></div>';
