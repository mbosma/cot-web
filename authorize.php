
Drupal 7.23, 2013-08-07
-----------------------
- Fixed a fatal error on PostgreSQL databases when updating the Taxonomy module
  from Drupal 6 to Drupal 7.
- Fixed the default ordering of CSS files for sites using right-to-left
  languages, to consistently place the right-to-left override file immediately
  after the CSS it is overriding (API change: https://drupal.org/node/2058463).
- Added a drupal_check_memory_limit() API function to allow the memory limit to
  be checked consistently (API addition).
- Changed the default web.config file for IIS servers to allow favicon.ico
  files which are present in the filesystem to be accessed.
- Fixed inconsistent support for the 'tel' protocol in Drupal's URL filtering
  functions.
- Performance improvement: Allowed all hooks to be included in the
  module_implements() cache, even those that are only invoked on HTTP POST
  requests.
- Made the database system replace truncate queries with delete queries when
  inside a transaction, to fix issues with PostgreSQL and other databases.
- Fixed a bug which caused nested contextual links to display improperly.
- Fixed a bug which prevented cached image derivatives from being flushed for
  private files and other non-default file schemes.
- Fixed drupal_render() to always return an empty string when there is no
  output, rather than sometimes returning NULL (minor API change).
- Added protection to cache_clear_all() to ensure that non-cache tables cannot
  be truncated (API addition: a new isValidBin() method has been added to the
  default database cache implementation).
- Changed the default .htaccess file to support HTTP authorization in CGI
  environments.
- Changed the password reset form to pre-fill the username when requested via a
  URL query parameter, and used this in the error message that appears after a
  failed login attempt (minor data structure and behavior change).
- Fixed broken support for foreign keys in the field API.
- Fixed "No active batch" error when a user cancels their own account.
- Added a description to the "access content overview" permission on the
  permissions page (string change).
- Added a drupal_array_diff_assoc_recursive() function to allow associative
  arrays to be compared recursively (API addition).
- Added human-readable labels to image styles, in addition to the existing
  machine-readable name (API change: https://drupal.org/node/2058503).
- Moved the drupal_get_hash_salt() function to bootstrap.inc and used it in
  additional places in the code, for added security in the case where there is
  no hash salt in settings.php.
- Fixed a regression in Drupal 7.22 that caused internal server errors for
  sites running on very old Apache 1.x web servers.
- Numerous small bug fixes.
- Numerous API documentation improvements.
- Additional automated test coverage.

Drupal 7.22, 2013-04-03
-----------------------
- Allowed the drupal_http_request() function to be overridden so that
  additional HTTP request capabilities can be added by contributed modules.
- Changed the Simpletest module to allow PSR-0 test classes to be used in
  Drupal 7.
- Removed an unnecessary "Content-Disposition" header from private file
  downloads; it prevented many private files from being viewed inline in a web
  browser.
- Changed various field API functions to allow them to optionally act on a
  single field within an entity (API addition: http://drupal.org/node/1825844).
- Fixed a bug which prevented Drupal's file transfer functionality from working
  on some PHP 5.4 systems.
- Fixed incorrect log message when theme() is called for a theme hook that does
  not exist (minor string change).
- Fixed Drupal's token-replacement system to allow spaces in the token value.
- Changed the default behavior after a user creates a node they do not have
  access to view. The user will now be redirected to the front page rather than
  an access denied page.
- Fixed a bug which prevented empty HTTP headers (such as "0") from being set.
  (Minor behavior change: Callers of drupal_add_http_header() must now set
  FALSE explicitly to prevent a header from being sent at all; this was already
  indicated in the function's documentation.)
- Fixed OpenID errors when more than one module implements hook_openid(). The
  behavior is now changed so that if more than one module tries to set the same
  parameter, the last module's change takes effect.
- Fixed a serious documentation bug: The $name variable in the
  taxonomy-term.tpl.php theme template was incorrectly documented as being
  sanitized when in fact it is not.
- Fixed a bug which prevented Drupal 6 to Drupal 7 upgrades on sites which had
  duplicate permission names in the User module's database tables.
- Added an empty "datatype" attribute to taxonomy term and username links to
  make the RDFa markup upward compatible with RDFa 1.1 (minor markup addition).
- Fixed a bug which caused the denial-of-service protection added in Drupal
  7.20 to break certain valid image URLs that had an extra slash in them.
- Fixed a bug with update queries in the SQLite database driver that prevented
  Drupal from being installed with SQLite on PHP 5.4.
- Fixed enforced dependencies errors updating to recent versions of Drupal 7 on
  certain non-MySQL databases.
- Refactored the Field module's caching behavior to obtain large improvements
  in memory usage for sites with many fields and instances (API addition:
  http://drupal.org/node/1915646).
- Fixed entity argument not being passed to implementations of
  hook_file_download_access_alter(). The fix adds an additional context
  parameter that can be passed when calling drupal_alter() for any hook (API
  change: http://drupal.org/node/1882722).
- Fixed broken support for translatable comment fields (API change:
  http://drupal.org/node/1874724).
- Added an assertThemeOutput() method to Simpletest to allow tests to check
  that themed output matches an expected HTML string (API addition).
- Added a link to "Install another module" after a module has been successfully
  downloaded via the Update Manager (UI change).
- Added an optional "exclusive" flag to installation profile .info files which
  allows Drupal distributions to force a profile to be selected during
  installation (API addition: http://drupal.org/node/1961012).
- Fixed a bug which caused the database API to not properly close database
  connections.
- Added a link to the URL for running cron from outside the site to the Cron
  settings page (UI change).
- Fixed a bug which prevented image styles from being reverted on PHP 5.4.
- Made the default .htaccess rules protocol sensitive to improve security for
  sites which use HTTPS and redirect between "www" and non-"www" versions of
  the page.
- Numerous small bug fixes.
- Numerous API documentation improvements.
- Additional automated test coverage.

Drupal 7.21, 2013-03-06
-----------------------
- Allowed sites using the 'image_allow_insecure_derivatives' variable to still
  have partial protection from the security issues fixed in Drupal 7.20.

Drupal 7.20, 2013-02-20
-----------------------
- Fixed security issues (denial of service). See SA-CORE-2013-002.

Drupal 7.19, 2013-01-16
-----------------------
- Fixed security issues (multiple vulnerabilities). See SA-CORE-2013-001.

Drupal 7.18, 2012-12-19
-----------------------
- Fixed security issues (multiple vulnerabilities). See SA-CORE-2012-004.

Drupal 7.17, 2012-11-07
-----------------------
- Changed the default value of the '404_fast_html' variable to have a DOCTYPE
  declaration.
- Made it possible to use associative arrays for the 'items' variable in
  theme_item_list().
- Fixed a bug which prevented required form elements without a title from being
  given an "error" class when the form fails validation.
- Prevented duplicate HTML IDs from appearing when two forms are displayed on
  the same page and one of them is submitted with invalid data (minor markup
  change).
- Fixed a bug which prevented Drupal 6 to Drupal 7 upgrades on sites which had
  stale data in the Upload module's database tables.
- Fixed a bug in the States API which prevented certain types of form elements
  from being disabled when requested.
- Allowed aggregator feed items with author names longer than 255 characters to
  have a truncated version saved to the database (rather than causing a fatal
  error).
- Allowed aggregator feed items to have URLs longer than 255 characters
  (schema change which results in several columns in the Aggregator module's
  database tables changing from VARCHAR to TEXT fields).
- Added hook_taxonomy_term_view() and standardized the process for rendering
  taxonomy terms to invoke hook_entity_view() and otherwise make it consistent
  with other entities (API change: http://drupal.org/node/1808870).
- Added hook_entity_view_mode_alter() to allow modules to change entity view
  modes on display (API addition: http://drupal.org/node/1833086).
- Fixed a bug which made database queries running a "LIKE" query on blob fields
  fail on PostgreSQL databases. This caused errors during the Drupal 6 to
  Drupal 7 upgrade.
- Changed the hook_menu() entry for Drupal's rss.xml page to prevent extra path
  components from being accidentally passed to the page callback function (data
  structure change).
- Removed a non-standard "name" attribute from Drupal's default Content-Type
  header for file downloads.
- Fixed the theme settings form to properly clean up submitted values in
  $form_state['values'] when the form is submitted (data structure change).
- Fixed an inconsistency by removing the colon from the end of the label on
  multi-valued form fields (minor string change).
- Added support for 'weight' in hook_field_widget_info() to allow modules to
  control the order in which widgets are displayed in the Field UI.
- Updated various tables in the OpenID and Book modules to use the default
  "empty table" text pattern (string change).
- Added proxy server support to drupal_http_request().
- Added "lang" attributes to language links, to better support screen readers.
- Fixed double occurrence of a "ul" HTML tag on secondary local tasks in the
  Seven theme (markup change).
- Fixed bugs which caused taxonomy vocabulary and shortcut set titles to be
  double-escaped. The fix replaces the taxonomy vocabulary overview page and
  "Edit shortcuts" menu items' title callback entries in hook_menu() with new
  functions that do not escape HTML characters (data structure change).
- Modified the Update manager module to allow drupal.org to collect usage
  statistics for individual modules and themes, rather than only for entire
  projects.
- Modified the node listing database query on Drupal's default front page to
  add table aliases for better query altering (this is a data structure change
  affecting code which implements hook_query_alter() on this query).
- Improved the translatability of the "Field type(s) in use" message on the
  modules page (admin-facing string change).
- Fixed a regression which caused a "call to undefined function
  drupal_find_base_themes()" fatal error under rare circumstances.
- Numerous API documentation improvements.
- Additional automated test coverage.

Drupal 7.16, 2012-10-17
-----------------------
- Fixed security issues (Arbitrary PHP code execution and information
  disclosure). See SA-CORE-2012-003.

Drupal 7.15, 2012-08-01
-----------------------
- Introduced a 'user_password_reset_timeout' variable to allow the 24-hour
  expiration for user password reset links to be adjusted (API addition).
- Fixed database errors due to ambiguous column names that occurred when
  EntityFieldQuery was used in certain situations.
- Changed the drupal_array_get_nested_value() function to return a reference
  (API addition).
- Changed the System module's hook_block_info() implementation to assign the
  "Main page content" and "System help" blocks to appropriate regions by
  default and prevent error messages on the block administration page (data
  structure change).
- Fixed regression: Non-node entities couldn't be accessed with
  EntityFieldQuery.
- Fixed regression: Optional radio buttons with an empty, non-NULL default
  value led to an illegal choice error when none were selected.
- Reorganized the testing framework to split setUp() into specific sub-methods
  and fix several regressions in the process.
- Fixed bug which made it impossible to search for strings that have not been
  translated into a particular language.
- Renamed the "Field" column on the Manage Fields screen to "Field type", since
  the former was confusing and inaccurate (UI change).
- Performance improvement: Removed needless call to system_rebuild_module_data()
  in field_sync_field_status(), greatly speeding up bulk module enable/disable.
- Fixed bug which prevented notifications from being sent when core, module, and
  theme updates are available.
- Fixed bug which prevented sub-themes from inheriting the default values of
  theme settings defined by the base theme.
- Fixed bug which prevented the jQuery UI Datepicker from being localized.
- Made Ajax alert dialogs respect error reporting settings.
- Fixed bug which prevented image styles from being deleted on PHP 5.4.
- Fixed bug: Language detection by domain only worked on port 80.
- Fixed regression: The first plural index on a page was not calculated
  correctly.
- Introduced generic entity language support. Entities may now declare their
  language property in hook_entity_info(), and modules working with entities
  may access the language using entity_language() (API change:
  http://drupal.org/node/1626346).
- Added EntityFieldQuery support for taxonomy bundles.
- Fixed issue where field form structure was incomplete if field_access()
  returned FALSE. Instead of being incomplete, the form structure now has
  #access set to FALSE and field form validation is skipped (data structure
  change: http://drupal.org/node/1663020).
- Fixed data loss issue due to field_has_data() returning inconsistent results.
  The fix adds an optional DANGEROUS_ACCESS_CHECK_OPT_OUT tag to entity field
  queries which field storage engines can respond to (API addition:
  http://drupal.org/node/1597378).
- Fixed notice: Undefined index: default_image in image_field_prepare_view()
- Numerous API documentation improvements.
- Additional automated test coverage.

Drupal 7.14 2012-05-02
----------------------
- Fixed "integrity constraint" fatal errors when rebuilding registry.
- Fixed custom logo and favicon functionality referencing incorrect paths.
- Fixed DB Case Sensitivity: Allow BINARY attribute in MySQL.
- Split field_bundle_settings out per bundle.
- Improve UX for machine names for fields (UI change).
- Fixed User pictures are not removed properly.
- Fixed HTTPS sessions not working in all cases.
- Fixed Regression: Required radios throw illegal choice error when none
  selected.
- Fixed allow autocompletion requests to include slashes.
- Eliminate $user->cache and {session}.cache in favor of
  $_SESSION['cache_expiration'][$bin] (Performance).
- Fixed focus jumps to tab when pressing enter on a form element within tab.
- Fixed race condition in locale() - duplicates in {locales_source}.
- Fixed Missing "Default image" per field instance.
- Quit clobbering people's work when they click the filter tips link
- Form API #states: Fix conditionals to allow OR and XOR constructions.
- Fixed Focus jumps to tab when pressing enter on a form element within tab.
  (Accessibility)
- Improved performance of node_access queries.
- Fixed Fieldsets inside vertical tabs have no title and can't be collapsed.
- Reduce size of cache_menu table (Performance).
- Fixed unnecessary aggregation of CSS/JS (Performance).
- Fixed taxonomy_autocomplete() produces SQL error for nonexistent field.
- Fixed HTML filter is not run first by default, despite default weight.
- Fixed Overlay does not work with prefixed URL paths.
- Better debug info for field errors (string change).
- Fixed Data corruption in comment IDs (results in broken threading on
  PostgreSQL).
- Fixed machine name not editable if every character is replaced.
- Fixed user picture not appearing in comment preview (Markup change).
- Added optional vid argument for taxonomy_get_term_by_name().
- Fixed Invalid Unicode code range in PREG_CLASS_UNICODE_WORD_BOUNDARY fails
  with PCRE 8.30.
- Fixed {trigger_assignments()}.hook has only 32 characters, is too short.
- Numerous fixes to run-tests.sh.
- Fixed Tests in profiles/[name]/modules cannot be run and cannot use a
  different profile for running tests.
- Numerous JavaScript performance fixes.
- Numerous documentation fixes.
- Fixed All pager links have an 'active' CSS class.
- Numerous upgrade path fixes; notably:
  - system_update_7061() fails on inserting files with same name but different
    case.
  - system_update_7061() converts filepaths too aggressively.
  - Trigger upgrade path: Node triggers removed when upgrading to 7-x from 6.25.

Drupal 7.13 2012-05-02
----------------------
- Fixed security issues (Multiple vulnerabilities), see SA-CORE-2012-002.

Drupal 7.12, 2012-02-01
----------------------
- Fixed bug preventing custom menus from receiving an active trail.
- Fixed hook_field_delete() no longer invoked during field_purge_data().
- Fixed bug causing entity info cache to not be cleared with the rest of caches.
- Fixed file_unmanaged_copy() fails with Drupal 7.7+ and safe_mode() or
  open_basedir().
- Fixed Nested transactions throw exceptions when they got out of scope.
- Fixed bugs with the Return-Path when sending mail on both Windows and
  non-Windows systems.
- Fixed bug with DrupalCacheArray property visibility preventing others from
  extending it (API change: http://drupal.org/node/1422264).
- Fixed bug with handling of non-ASCII characters in file names (API change:
  http://drupal.org/node/1424840).
- Reconciled field maximum length with database column size in image and
  aggregator modules.
- Fixes to various core JavaScript files to allow for minification and
  aggregation.
- Fixed Prevent tests from deleting main installation's tables when
  parent::setUp() is not called.
- Fixed several Poll module bugs.
- Fixed several Shortcut module bugs.
- Added new hook_system_theme_info() to provide ability for contributed modules
  to test theme functionality.
- Added ability to cancel mail sending from hook_mail_alter().
- Added support for configurable PDO connection options, enabling master-master
  database replication.
- Numerous improvements to tests and test runner to pave the way for faster test
  runs.
- Expanded test coverage.
- Numerous API documentation improvements.
- Numerous performance improvements, including token replacement and render
  cache.

Drupal 7.11, 2012-02-01
----------------------
- Fixed security issues (Multiple vulnerabilities), see SA-CORE-2012-001.

Drupal 7.10, 2011-12-05
----------------------
- Fixed Content-Language HTTP header to not cause issues with Drush 5.x.
- Reduce memory usage of theme registry (performance).
- Fixed PECL upload progress bar for FileField
- Fixed running update.php doesn't always clear the cache.
- Fixed PDO exceptions on long titles.
- Fixed Overlay redirect does not include query string.
- Fixed D6 modules satisfy D7 module dependencies.
- Fixed the ordering of module hooks when using module_implements_alter().
- Fixed "floating" submit buttons during AJAX requests.
- Fixed timezone selected on install not propogating to admin account.
- Added msgctx context to JS translation functions, for feature parity with t().
- Profiles' .install files now available during hook_install_tasks().
- Added test coverage of 7.0 -> 7.x upgrade path.
- Numerous notice fixes.
- Numerous documentation improvements.
- Additional automated test coverage.

Drupal 7.9, 2011-10-26
----------------------
- Critical fixes to OpenID to spec violations that could allow for
  impersonation in certain scenarios. Existing OpenID users should see
  http://drupal.org/node/1120290#comment-5092796 for more information on
  transitioning.
- Fixed files getting lost when adding multiple files to multiple file fields
  at the same time.
- Improved usability of the clean URL test screens.
- Restored height/width attributes on images run through the theme system.
- Fixed usability bug with first password field being pre-filled by certain
  browser plugins.
- Fixed file_usage_list() so that it can return more than one result.
- Fixed bug preventing preview of private images on node form.
- Fixed PDO error when inserting an aggregator title longer than 255 characters.
- Spelled out what TRADITIONAL means in MySQL sql_mode.
- Deprecated "!=" operator for DBTNG; should be "<>".
- Added two new API functions (menu_tree_set_path()/menu_tree_get_path()) were
  added in order to enable setting the active menu trail for dynamically
  generated menu paths.
- Added new "fast 404" capability in settings.php to bypass Drupal bootstrap
  when serving 404 pages for certain file types.
- Added format_string() function which can perform string munging ala the t()
  function without the overhead of the translation system.
- Numerous #states system fixes.
- Numerous EntityFieldQuery, DBTNG, and SQLite fixes.
- Numerous Shortcut module fixes.
- Numerous language system fixes.
- Numerous token fixes.
- Numerous CSS fixes.
- Numerous upgrade path fixes.
- Numerous minor string fixes.
- Numerous notice fixes.

Drupal 7.8, 2011-08-31
----------------------
- Fixed critical upgrade path issue with multilingual sites, leading to lost
  content.
- Numerous fixes to upgrade path, preventing fatal errors due to incorrect
  dependencies.
- Fixed issue with saving files on hosts with open_basedir restrictions.
- Fixed Update manger error when used with Overlay.
- Fixed RTL support in Seven administration theme and Overlay.
- Fixes to nested transaction support.
- Introduced performance pattern to reduce Drupal core's RAM usage.
- Added support for HTML 5 tags to filter_xss_admin().
- Added exception handling to cron.
- Added new hook hook_field_widget_form_alter() for contribtued modules.
- element_validate_*() functions now available to contrib.
- Added new maintainers for several subsystems.
- Numerous testing system improvements.
- Numerous markup and CSS fixes.
- Numerous poll module fixes.
- Numerous notice/warning fixes.
- Numerous documentation fixes.
- Numerous token fixes.

Drupal 7.7, 2011-07-27
----------------------
- Fixed VERSION string.

Drupal 7.6, 2011-07-27
----------------------
- Fixed support for remote streamwrappers.
- AJAX now binds to 'click' instead of 'mousedown'.
- 'Translatable' flag on fields created in UI now defaults to FALSE, to match those created via the API.
- Performance enhancement to permissions page on large numbers of permissions.
- More secure password generation.
- Fix for temporary directory on Windows servers.
- run-tests.sh now uses proc_open() instead of pcntl_fork() for better Windows support.
- Numerous upgrade path fixes.
- Numerous documentation fixes.
- Numerous notice fixes.
- Numerous fixes to improve PHP 5.4 support.
- Numerous RTL improvements.

Drupal 7.5, 2011-07-27
----------------------
- Fixed security issue (Access bypass), see SA-CORE-2011-003.

Drupal 7.4, 2011-06-29
----------------------
- Rolled back patch that caused fatal errors in CTools, Feeds, and other modules using the class registry.
- Fixed critical bug with saving default images.
- Fixed fatal errors when uninstalling some modules.
- Added workaround for MySQL transaction support breaking on DDL statments.
- Improved page caching with external caching systems.
- Fix to Batch API, which was terminating too early.
- Numerous upgrade path fixes.
- Performance fixes.
- Additional test coverage.
- Numerous documentation fixes.

Drupal 7.3, 2011-06-29
----------------------
- Fixed security issue (Access bypass), see SA-CORE-2011-002.

Drupal 7.2, 2011-05-25
----------------------
- Added a default .gitignore file.
- Improved PostgreSQL and SQLite support.
- Numerous critical performance improvements.
- Numerous critical fixes to the upgrade path.
- Numerous fixes to language and translation systems.
- Numerous fixes to AJAX and #states systems.
- Improvements to the locking system.
- Numerous documentation fixes.
- Numerous styling and theme system fixes.
- Numerous fixes for schema mis-matches between Drupal 6 and 7.
- Minor internal API clean-ups.

Drupal 7.1, 2011-05-25
----------------------
- Fixed security issues (Cross site scripting, File access bypass), see SA-CORE-2011-001.

Drupal 7.0, 2011-01-05 
----------------------
- Database:
    * Fully rewritten database layer utilizing PHP 5's PDO abstraction layer.
    * Drupal now requires MySQL >= 5.0.15 or PostgreSQL >= 8.3.
    * Added query builders for INSERT, UPDATE, DELETE, MERGE, and SELECT queries.
    * Support for master/slave replication, transactions, multi-insert queries,
      and other features.
    * Added support for the SQLite database engine.
    * Default to InnoDB engine, rather than MyISAM, on MySQL when available.
      This offers increased scalability and data integrity.
- Security:
    * Protected cron.php -- cron will only run if the proper key is provided.
    * Implemented a pluggable password system and much stronger password hashes
      that are compatible with the Portable PHP password hashing framework.
    * Rate limited login attempts to prevent brute-force password guessing, and
      improved the flood control API to allow variable time windows and
      identifiers for limiting user access to resources.
    * Transformed the "Update status" module into the "Update manager" which
      can securely install or update modules and themes via a web interface.
- Usability:
    * Added contextual links (a.k.a. local tasks) to page elements, such as
      blocks, nodes, or comments, which allows to perform the most common tasks
      with a single click only.
    * Improved installer requirements check.
    * Improved support for integration of WYSIWYG editors.
    * Implemented drag-and-drop positioning for input format listings.
    * Implemented drag-and-drop positioning for language listing.
    * Implemented drag-and-drop positioning for poll options.
    * Provided descriptions and human-readable names for user permissions.
    * Removed comment controls for users.
    * Removed display order settings for comment module. Comment display
      order can now be customized using the Views module.
    * Removed the 'related terms' feature from taxonomy module since this can
      now be achieved with Field API.
    * Added additional features to the default installation profile, and
      implemented a "slimmed down" profile designed for developers.
    * Added a built-in, automated cron run feature, which is triggered by site
      visitors.
    * Added an administrator role which is assigned all permissions for
      installed modules automatically.
    * Image toolkits are now provided by modules (rather than requiring a
      manual file copy to the includes directory).
    * Added an edit tab to taxonomy term pages.
    * Redesigned password strength validator.
    * Redesigned the add content type screen.
    * Highlight duplicate URL aliases.
    * Renamed "input formats" to "text formats".
    * Moved text format permissions to the main permissions page.
    * Added configurable ability for users to cancel their own accounts.
    * Added "vertical tabs", a reusable interface component that features
      automatic summaries and increases usability.
    * Replaced fieldsets on node edit and add pages with vertical tabs.
- Performance:
    * Improved performance on uncached page views by loading multiple core
      objects in a single database query.
    * Improved performance for logged-in users by reducing queries for path
      alias lookups.
    * Improved support for HTTP proxies (including reverse proxies), allowing
      anonymous page views to be served entirely from the proxy.
- Documentation:
    * Hook API documentation now included in Drupal core.
- News aggregator:
    * Added OPML import functionality for RSS feeds.
    * Optionally, RSS feeds may be configured to not automatically generate feed blocks.
- Search:
    * Added support for language-aware searches.
- Aggregator:
    * Introduced architecture that allows pluggable parsers and processors for
      syndicating RSS and Atom feeds.
    * Added options to suspend updating specific feeds and never discard feeds
      items.
- Testing:
    * Added test framework and tests.
- Improved time zone support:
    * Drupal now uses PHP's time zone database when rendering dates in local
      time. Site-wide and user-configured time zone offsets have been converted
      to time zone names, e.g. Africa/Abidjan.
    * In some cases the upgrade and install scripts do not choose the preferred
      site default time zone. The automatically-selected time zone can be
      corrected at admin/config/regional/settings.
    * If your site is being upgraded from Drupal 6 and you do not have the
      contributed date or event modules installed, user time zone settings will
      fallback to the system time zone and will have to be reconfigured by each user.
    * User-configured time zones now serve as the default time zone for PHP
      date/time functions.
- Filter system:
    * Revamped the filter API and text format storage.
    * Added support for default text formats to be assigned on a per-role basis.
    * Refactored the HTML corrector to take advantage of PHP 5 features.
- User system:
    * Added clean API functions for creating, loading, updating, and deleting
      user roles and permissions.
    * Refactored the "access rules" component of user module: The user module
      now provides a simple interface for blocking single IP addresses. The
      previous functionality in the user module for restricting certain e-mail
      addresses and usernames is now available as a contributed module. Further,
      IP address range blocking is no longer supported and should be implemented
      at the operating system level.
    * Removed per-user themes: Contributed modules with similar functionality
      are available.
- OpenID:
    * Added support for Gmail and Google Apps for Domain identifiers. Users can
      now login with their user@example.com identifier when example.com is powered
      by Google.
    * Made the OpenID module more pluggable.
- Added code registry:
    * Using the registry, modules declare their includable files via their .info file,
      allowing Drupal to lazy-load classes and interfaces as needed.
- Theme system:
    * Removed the Bluemarine, Chameleon and Pushbutton themes. These themes live
      on as contributed themes (http://drupal.org/project/bluemarine,
      http://drupal.org/project/chameleon and http://drupal.org/project/pushbutton).
    * Added Stark theme to make analyzing Drupal's default HTML and CSS easier.
    * Added Seven as the default administration theme.
    * Variable preprocessing of theme hooks prior to template rendering now goes
      through two phases: a 'preprocess' phase and a new 'process' phase. See
      http://api.drupal.org/api/function/theme/7 for details.
    * Theme hooks implemented as functions (rather than as templates) can now
      also have preprocess (and process) functions. See
      http://api.drupal.org/api/function/theme/7 for details.
    * Added Bartik as the default theme.
- File handling:
    * Files are now first class Drupal objects with file_load(), file_save(),
      and file_validate() functions and corresponding hooks.
    * The file_move(), file_copy() and file_delete() functions now operate on
      file objects and invoke file hooks so that modules are notified and can
      respond to changes.
    * For the occasions when only basic file manipulation are needed--such as
      uploading a site logo--that don't require the overhead of databases and
      hooks, the current unmanaged copy, move and delete operations have been
      preserved but renamed to file_unmanaged_*().
    * Rewrote file handling to use PHP stream wrappers to enable support for
      both public and private files and to support pluggable storage mechanisms
      and access to remote resources (e.g. S3 storage or Flickr photos).
    * The mime_extension_mapping variable has been removed. Modules that need to
      alter the default MIME type extension mappings should implement
      hook_file_mimetype_mapping_alter().
    * Added the hook_file_url_alter() hook, which makes it possible to serve
      files from a CDN.
    * Added a field specifically for uploading files, previously provided by
      the contributed module FileField.
- Image handling:
    * Improved image handling, including better support for add-on image
      libraries.
    * Added API and interface for creating advanced image thumbnails.
    * Inclusion of additional effects such as rotate and desaturate.
    * Added a field specifically for uploading images, previously provided by
      the contributed module ImageField.
- Added aliased multi-site support:
    * Added support for mapping domain names to sites directories.
- Added RDF support:
    * Modules can declare RDF namespaces which are serialized in the <html> tag
      for RDFa support.
    * Modules can specify how their data structure maps to RDF.
    * Added support for RDFa export of nodes, comments, terms, users, etc. and
      their fields.
- Search engine optimization and web linking:
    * Added a rel="canonical" link on node and comment pages to prevent
      duplicate content indexing by search engines.
    * Added a default rel="shortlink" link on node and comment pages that
      advertises a short link as an alternative URL to third-party services.
    * Meta information is now alterable by all modules before rendering.
- Field API:
    * Custom data fields may be attached to nodes, users, comments and taxonomy
      terms.
    * Node bodies and teasers are now Field API fields instead of
      being a hard-coded property of node objects.
    * In addition, any other object type may register with Field API
      and allow custom data fields to be attached to itself.
    * Provides most of the features of the former Content Construction
      Kit (CCK) module.
    * Taxonomy terms are now Field API fields that can be added to any fieldable
      object.
- Installer:
    * Refactored the installer into an API that allows Drupal to be installed
      via a command line script.
- Page organization
    * Made the help text area a full featured region with blocks.
    * Site mission is replaced with the highlighted content block region and
      separate RSS feed description settings.
    * The footer message setting was removed in favor of custom blocks.
    * Made the main page content a block which can be moved and ordered
      with other blocks in the same region.
    * Blocks can now return structured arrays for later rendering just
      like page callbacks.
- Translation system
    * The translation system now supports message context (msgctxt).
    * Added support for translatable fields to Field API.
- JavaScript changes
    * Upgraded the core JavaScript library to jQuery version 1.4.4.
    * Upgraded the jQuery Forms library to 2.52.
    * Added jQuery UI 1.8.7, which allows improvements to Drupal's user
      experience.
- Better module version support
    * Modules now can specify which version of another module they depend on.
- Removed modules from core
    * The following modules have been removed from core, because contributed
      modules with similar functionality are available:
      * Blog API module
      * Ping module
      * Throttle module
- Improved node access control system.
    * All modules may now influence the access to a node at runtime, not just
      the module that defined a node.
    * Users may now be allowed to bypass node access restrictions without giving
      them complete access to the site.
    * Access control affects both published and unpublished nodes.
    * Numerous other improvements to the node access system.
- Actions system
    * Simplified definitions of actions and triggers.
    * Removed dependency on the combination of hooks and operations. Triggers
      now directly map to module hooks.
- Task handling
    * Added a queue API to process many or long-running tasks.
    * Added queue API support to cron API.
    * Added a locking framework to coordinate long-running operations across
      requests.

Drupal 6.23-dev, xxxx-xx-xx (development release)
-----------------------

Drupal 6.22, 2011-05-25
-----------------------
- Made Drupal 6 work better with IIS and Internet Explorer.
- Fixed .po file imports to work better with custom textgroups.
- Improved code documentation at various places.
- Fixed a variety of other bugs.

Drupal 6.21, 2011-05-25
----------------------
- Fixed security issues (Cross site scripting), see SA-CORE-2011-001.

Drupal 6.20, 2010-12-15
----------------------
- Fixed a variety of small bugs, improved code documentation.

Drupal 6.19, 2010-08-11
----------------------
- Fixed a variety of small bugs, improved code documentation.

Drupal 6.18, 2010-08-11
----------------------
- Fixed security issues (OpenID authentication bypass, File download access
  bypass, Comment unpublishing bypass, Actions cross site scripting),
  see SA-CORE-2010-002.

Drupal 6.17, 2010-06-02
----------------------
- Improved PostgreSQL compatibility
- Better PHP 5.3 and PHP 4 compatibility
- Better browser compatibility of CSS and JS aggregation
- Improved logging for login failures
- Fixed an incompatibility with some contributed modules and the locking system
- Fixed a variety of other bugs.

Drupal 6.16, 2010-03-03
----------------------
- Fixed security issues (Installation cross site scripting, Open redirection,
  Locale module cross site scripting, Blocked user session regeneration),
  see SA-CORE-2010-001.
- Better support for updated jQuery versions.
- Reduced resource usage of update.module.
- Fixed several issues relating to support of installation profiles and
  distributions.
- Added a locking framework to avoid data corruption on long operations.
- Fixed a variety of other bugs.

Drupal 6.15, 2009-12-16
----------------------
- Fixed security issues (Cross site scripting), see SA-CORE-2009-009.
- Fixed a variety of other bugs.

Drupal 6.14, 2009-09-16
----------------------
- Fixed security issues (OpenID association cross site request forgeries,
  OpenID impersonation and File upload), see SA-CORE-2009-008.
- Changed the system modules page to not run all cache rebuilds; use the
  button on the performance settings page to achieve the same effect.
- Added support for PHP 5.3.0 out of the box.
- Fixed a variety of small bugs.

Drupal 6.13, 2009-07-01
----------------------
- Fixed security issues (Cross site scripting, Input format access bypass and
  Password leakage in URL), see SA-CORE-2009-007.
- Fixed a variety of small bugs.

Drupal 6.12, 2009-05-13
----------------------
- Fixed security issues (Cross site scripting), see SA-CORE-2009-006.
- Fixed a variety of small bugs.

Drupal 6.11, 2009-04-29
----------------------
- Fixed security issues (Cross site scripting and limited information
  disclosure), see SA-CORE-2009-005
- Fixed performance issues with the menu router cache, the update
  status cache and improved cache invalidation
- Fixed a variety of small bugs.

Drupal 6.10, 2009-02-25
----------------------
- Fixed a security issue, (Local file inclusion on Windows),
  see SA-CORE-2009-003
- Fixed node_feed() so custom fields can show up in RSS feeds.
- Improved PostgreSQL compatibility.
- Fixed a variety of small bugs.

Drupal 6.9, 2009-01-14
----------------------
- Fixed security issues, (Access Bypass, Validation Bypass and Hardening
  against SQL injection), see SA-CORE-2009-001
- Made HTTP request checking more robust and informative.
- Fixed HTTP_HOST checking to work again with HTTP 1.0 clients and
  basic shell scripts.
- Removed t() calls from all schema documentation. Suggested best practice
  changed for contributed modules, see http://drupal.org/node/322731.
- Fixed a variety of small bugs.

Drupal 6.8, 2008-12-11
----------------------
- Removed a previous change incompatible with PHP 5.1.x and lower.

Drupal 6.7, 2008-12-10
----------------------
- Fixed security issues, (Cross site request forgery and Cross site scripting), see SA-2008-073
- Updated robots.txt and .htaccess to match current file use.
- Fixed a variety of small bugs.

Drupal 6.6, 2008-10-22
----------------------
- Fixed security issues, (File inclusion, Cross site scripting), see SA-2008-067
- Fixed a variety of small bugs.

Drupal 6.5, 2008-10-08
----------------------
- Fixed security issues, (File upload access bypass, Access rules bypass,
  BlogAPI access bypass), see SA-2008-060.
- Fixed a variety of small bugs.

Drupal 6.4, 2008-08-13
----------------------
- Fixed a security issue (Cross site scripting, Arbitrary file uploads via
  BlogAPI, Cross site request forgeries and Various Upload module
  vulnerabilities), see SA-2008-047.
- Improved error messages during installation.
- Fixed a bug that prevented AHAH handlers to be attached to radios widgets.
- Fixed a variety of small bugs.

Drupal 6.3, 2008-07-09
----------------------
- Fixed security issues, (Cross site scripting, cross site request forgery,
  session fixation and SQL injection), see SA-2008-044.
- Slightly modified installation process to prevent file ownership issues on
  shared hosts.
- Improved PostgreSQL compatibility (rewritten queries; custom blocks).
- Upgraded to jQuery 1.2.6.
- Performance improvements to search, menu handling and form API caches.
- Fixed Views compatibility issues (Views for Drupal 6 requires Drupal 6.3+).
- Fixed a variety of small bugs.

Drupal 6.2, 2008-04-09
----------------------
- Fixed a variety of small bugs.
- Fixed a security issue (Access bypasses), see SA-2008-026.

Drupal 6.1, 2008-02-27
----------------------
- Fixed a variety of small bugs.
- Fixed a security issue (Cross site scripting), see SA-2008-018.

Drupal 6.0, 2008-02-13
----------------------
- New, faster and better menu system.
- New watchdog as a hook functionality.
   * New hook_watchdog that can be implemented by any module to route log
     messages to various destinations.
   * Expands the severity levels from 3 (Error, Warning, Notice) to the 8
     levels defined in RFC 3164.
   * The watchdog module is now called dblog, and is optional, but enabled by
     default in the default installation profile.
   * Extended the database log module so log messages can be filtered.
   * Added syslog module: useful for monitoring large Drupal installations.
- Added optional e-mail notifications when users are approved, blocked, or
  deleted.
- Drupal works with error reporting set to E_ALL.
- Added scripts/drupal.sh to execute Drupal code from the command line. Useful
  to use Drupal as a framework to build command-line tools.
- Made signature support optional and made it possible to theme signatures.
- Made it possible to filter the URL aliases on the URL alias administration
  screen.
- Language system improvements:
    * Support for right to left languages.
    * Language detection based on parts of the URL.
    * Browser based language detection.
    * Made it possible to specify a node's language.
    * Support for translating posts on the site to different languages.
    * Language dependent path aliases.
    * Automatically import translations when adding a new language.
    * JavaScript interface translation.
    * Automatically import a module's translation upon enabling that module.
- Moved "PHP input filter" to a standalone module so it can be deleted for
  security reasons.
- Usability:
    * Improved handling of teasers in posts.
    * Added sticky table headers.
    * Check for clean URL support automatically with JavaScript.
    * Removed default/settings.php. Instead the installer will create it from
      default.settings.php.
    * Made it possible to configure your own date formats.
    * Remember anonymous comment posters.
    * Only allow modules and themes to be enabled that have explicitly been
      ported to the correct core API version.
    * Can now specify the minimum PHP version required for a module within the
      .info file.
    * Drupal core no longer requires CREATE TEMPORARY TABLES or LOCK TABLES
      database rights.
    * Dynamically check password strength and confirmation.
    * Refactored poll administration.
    * Implemented drag-and-drop positioning for blocks, menu items, taxonomy
      vocabularies and terms, forums, profile fields, and input format filters.
- Theme system:
    * Added .info files to themes and made it easier to specify regions and
      features.
    * Added theme registry: modules can directly provide .tpl.php files for
      their themes without having to create theme_ functions.
    * Used the Garland theme for the installation and maintenance pages.
    * Added theme preprocess functions for themes that are templates.
    * Added support for themeable functions in JavaScript.
- Refactored update.php to a generic batch API to be able to run time-consuming
  operations in multiple subsequent HTTP requests.
- Installer:
    * Themed the installer with the Garland theme.
    * Added form to provide initial site information during installation.
    * Added ability to provide extra installation steps programmatically.
    * Made it possible to import interface translations during installation.
- Added the HTML corrector filter:
    * Fixes faulty and chopped off HTML in postings.
    * Tags are now automatically closed at the end of the teaser.
- Performance:
    * Made it easier to conditionally load .include files and split up many core
      modules.
    * Added a JavaScript aggregator.
    * Added block-level caching, improving performance for both authenticated
      and anonymous users.
    * Made Drupal work correctly when running behind a reverse proxy like
      Squid or Pound.
- File handling improvements:
    * Entries in the files table are now keyed to a user instead of a node.
    * Added reusable validation functions to check for uploaded file sizes,
      extensions, and image resolution.
    * Added ability to create and remove temporary files during a cron job.
- Forum improvements:
    * Any node type may now be posted in a forum.
- Taxonomy improvements:
    * Descriptions for terms are now shown on taxonomy/term pages as well
      as RSS feeds.
    * Added versioning support to categories by associating them with node
      revisions.
- Added support for OpenID.
- Added support for triggering configurable actions.
- Added the Update status module to automatically check for available updates
  and warn sites if they are missing security updates or newer versions.
  Sites deploying from CVS should use http://drupal.org/project/cvs_deploy.
  Advanced settings provided by http://drupal.org/project/update_advanced.
- Upgraded the core JavaScript library to jQuery version 1.2.3.
- Added a new Schema API, which provides built-in support for core and
  contributed modules to work with databases other than MySQL.
- Removed drupal.module. The functionality lives on as the Site network
  contributed module (http://drupal.org/project/site_network).
- Removed old system updates. Updates from Drupal versions prior to 5.x will
  require upgrading to 5.x before upgrading to 6.x.

Drupal 5.23, 2010-08-11
-----------------------
- Fixed security issues (File download access bypass, Comment unpublishing
  bypass), see SA-CORE-2010-002.

Drupal 5.22, 2010-03-03
-----------------------
- Fixed security issues (Open redirection, Locale module cross site scripting,
  Blocked user session regeneration), see SA-CORE-2010-001.

Drupal 5.21, 2009-12-16
-----------------------
- Fixed a security issue (Cross site scripting), see SA-CORE-2009-009.
- Fixed a variety of small bugs.

Drupal 5.20, 2009-09-16
-----------------------
- Avoid security problems resulting from writing Drupal 6-style menu
  declarations.
- Fixed security issues (session fixation), see SA-CORE-2009-008.
- Fixed a variety of small bugs.

Drupal 5.19, 2009-07-01
-----------------------
- Fixed security issues (Cross site scripting and Password leakage in URL), see
  SA-CORE-2009-007.          
- Fixed a variety of small bugs.

Drupal 5.18, 2009-05-13
-----------------------
- Fixed security issues (Cross site scripting), see SA-CORE-2009-006.
- Fixed a variety of small bugs.

Drupal 5.17, 2009-04-29
-----------------------
- Fixed security issues (Cross site scripting and limited information
  disclosure) see SA-CORE-2009-005.
- Fixed a variety of small bugs.

Drupal 5.16, 2009-02-25
-----------------------
- Fixed a security issue, (Local file inclusion on Windows), see SA-CORE-2009-004.
- Fixed a variety of small bugs.

Drupal 5.15, 2009-01-14
-----------------------
- Fixed security issues, (Hardening against SQL injection), see
  SA-CORE-2009-001
- Fixed HTTP_HOST checking to work again with HTTP 1.0 clients and basic shell
  scripts.
- Fixed a variety of small bugs.

Drupal 5.14, 2008-12-11
-----------------------
- removed a previous change incompatible with PHP 5.1.x and lower.

Drupal 5.13, 2008-12-10
-----------------------
- fixed a variety of small bugs.
- fixed security issues, (Cross site request forgery and Cross site scripting), see SA-2008-073
- updated robots.txt and .htaccess to match current file use.

Drupal 5.12, 2008-10-22
-----------------------
- fixed security issues, (File inclusion), see SA-2008-067

Drupal 5.11, 2008-10-08
-----------------------
- fixed a variety of small bugs.
- fixed security issues, (File upload access bypass, Access rules bypass,
  BlogAPI access bypass, Node validation bypass), see SA-2008-060

Drupal 5.10, 2008-08-13
-----------------------
- fixed a variety of small bugs.
- fixed security issues, (Cross site scripting, Arbitrary file uploads via
  BlogAPI and Cross site request forgery), see SA-2008-047

Drupal 5.9, 2008-07-23
----------------------
- fixed a variety of small bugs.
- fixed security issues, (Session fixation), see SA-2008-046

Drupal 5.8, 2008-07-09
----------------------
- fixed a variety of small bugs.
- fixed security issues, (Cross site scripting, cross site request forgery, and
  session fixation), see SA-2008-044

Drupal 5.7, 2008-01-28
----------------------
- fixed the input format configuration page.
- fixed a variety of small bugs.

Drupal 5.6, 2008-01-10
----------------------
- fixed a variety of small bugs.
- fixed a security issue (Cross site request forgery), see SA-2008-005
- fixed a security issue (Cross site scripting, UTF8), see SA-2008-006
- fixed a security issue (Cross site scripting, register_globals), see SA-2008-007

Drupal 5.5, 2007-12-06
----------------------
- fixed missing missing brackets in a query in the user module.
- fixed taxonomy feed bug introduced by SA-2007-031

Drupal 5.4, 2007-12-05
----------------------
- fixed a variety of small bugs.
- fixed a security issue (SQL injection), see SA-2007-031

Drupal 5.3, 2007-10-17
----------------------
- fixed a variety of small bugs.
- fixed a security issue (HTTP response splitting), see SA-2007-024
- fixed a security issue (Arbitrary code execution via installer), see SA-2007-025
- fixed a security issue (Cross site scripting via uploads), see SA-2007-026
- fixed a security issue (User deletion cross site request forgery), see SA-2007-029
- fixed a security issue (API handling of unpublished comment), see SA-2007-030

Drupal 5.2, 2007-07-26
----------------------
- changed hook_link() $teaser argument to match documentation.
- fixed a variety of small bugs.
- fixed a security issue (cross-site request forgery), see SA-2007-017
- fixed a security issue (cross-site scripting), see SA-2007-018

Drupal 5.1, 2007-01-29
----------------------
- fixed security issue (code execution), see SA-2007-005
- fixed a variety of small bugs.

Drupal 5.0, 2007-01-15
----------------------
- Completely retooled the administration page
    * /Admin now contains an administration page which may be themed
    * Reorganised administration menu items by task and by module
    * Added a status report page with detailed PHP/MySQL/Drupal information
- Added web-based installer which can:
    * Check installation and run-time requirements
    * Automatically generate the database configuration file
    * Install pre-made installation profiles or distributions
    * Import the database structure with automatic table prefixing
    * Be localized
- Added new default Garland theme
- Added color module to change some themes' color schemes
- Included the jQuery JavaScript library 1.0.4 and converted all core JavaScript to use it
- Introduced the ability to alter mail sent from system
- Module system:
    * Added .info files for module meta-data
    * Added support for module dependencies
    * Improved module installation screen
    * Moved core modules to their own directories
    * Added support for module uninstalling
- Added support for different cache backends
- Added support for a generic "sites/all" directory.
- Usability:
    * Added support for auto-complete forms (AJAX) to user profiles.
    * Made it possible to instantly assign roles to newly created user accounts.
    * Improved configurability of the contact forms.
    * Reorganized the settings pages.
    * Made it easy to investigate popular search terms.
    * Added a 'select all' checkbox and a range select feature to administration tables.
    * Simplified the 'break' tag to split teasers from body.
    * Use proper capitalization for titles, menu items and operations.
- Integrated urlfilter.module into filter.module
- Block system:
    * Extended the block visibility settings with a role specific setting.
    * Made it possible to customize all block titles.
- Poll module:
    * Optionally allow people to inspect all votes.
    * Optionally allow people to cancel their vote.
- Distributed authentication:
    * Added default server option.
- Added default robots.txt to control crawlers.
- Database API:
    * Added db_table_exists().
- Blogapi module:
    * 'Blogapi new' and 'blogapi edit' nodeapi operations.
- User module:
    * Added hook_profile_alter().
    * E-mail verification is made optional.
    * Added mass editing and filtering on admin/user/user.
- PHP Template engine:
    * Add the ability to look for a series of suggested templates.
    * Look for page templates based upon the path.
    * Look for block templates based upon the region, module, and delta.
- Content system:
    * Made it easier for node access modules to work well with each other.
    * Added configurable content types.
    * Changed node rendering to work with structured arrays.
- Performance:
    * Improved session handling: reduces database overhead.
    * Improved access checking: reduces database overhead.
    * Made it possible to do memcached based session management.
    * Omit sidebars when serving a '404 - Page not found': saves CPU cycles and bandwidth.
    * Added an 'aggressive' caching policy.
    * Added a CSS aggregator and compressor (up to 40% faster page loads).
- Removed the archive module.
- Upgrade system:
    * Created space for update branches.
- Form API:
    * Made it possible to programmatically submit forms.
    * Improved api for multistep forms.
- Theme system:
    * Split up and removed drupal.css.
    * Added nested lists generation.
    * Added a self-clearing block class.

Drupal 4.7.11, 2008-01-10
-------------------------
- fixed a security issue (Cross site request forgery), see SA-2008-005
- fixed a security issue (Cross site scripting, UTF8), see SA-2008-006
- fixed a security issue (Cross site scripting, register_globals), see SA-2008-007

Drupal 4.7.10, 2007-12-06
-------------------------
- fixed taxonomy feed bug introduced by SA-2007-031

Drupal 4.7.9, 2007-12-05
------------------------
- fixed a security issue (SQL injection), see SA-2007-031

Drupal 4.7.8, 2007-10-17
----------------------
- fixed a security issue (HTTP response splitting), see SA-2007-024
- fixed a security issue (Cross site scripting via uploads), see SA-2007-026
- fixed a security issue (API handling of unpublished comment), see SA-2007-030

Drupal 4.7.7, 2007-07-26
------------------------
- fixed security issue (XSS), see SA-2007-018

Drupal 4.7.6, 2007-01-29
------------------------
- fixed security issue (code execution), see SA-2007-005

Drupal 4.7.5, 2007-01-05
------------------------
- Fixed security issue (XSS), see SA-2007-001
- Fixed security issue (DoS), see SA-2007-002

Drupal 4.7.4, 2006-10-18
------------------------
- Fixed security issue (XSS), see SA-2006-024
- Fixed security issue (CSRF), see SA-2006-025
- Fixed security issue (Form action attribute injection), see SA-2006-026

Drupal 4.7.3, 2006-08-02
------------------------
- Fixed security issue (XSS), see SA-2006-011

Drupal 4.7.2, 2006-06-01
------------------------
- Fixed critical upload issue, see SA-2006-007
- Fixed taxonomy XSS issue, see SA-2006-008
- Fixed a variety of small bugs.

Drupal 4.7.1, 2006-05-24
------------------------
- Fixed critical SQL issue, see SA-2006-005
- Fixed a serious upgrade related bug.
- Fixed a variety of small bugs.

Drupal 4.7.0, 2006-05-01
------------------------
- Added free tagging support.
- Added a site-wide contact form.
- Theme system:
    * Added the PHPTemplate theme engine and removed the Xtemplate engine.
    * Converted the bluemarine theme from XTemplate to PHPTemplate.
    * Converted the pushbutton theme from XTemplate to PHPTemplate.
- Usability:
    * Reworked the 'request new password' functionality.
    * Reworked the node and comment edit forms.
    * Made it easy to add nodes to the navigation menu.
    * Added site 'offline for maintenance' feature.
    * Added support for auto-complete forms (AJAX).
    * Added support for collapsible page sections (JS).
    * Added support for resizable text fields (JS).
    * Improved file upload functionality (AJAX).
    * Reorganized some settings pages.
    * Added friendly database error screens.
    * Improved styling of update.php.
- Refactored the forms API.
    * Made it possible to alter, extend or theme forms.
- Comment system:
    * Added support for "mass comment operations" to ease repetitive tasks.
    * Comment moderation has been removed.
- Node system:
    * Reworked the revision functionality.
    * Removed the bookmarklet code. Third-party modules can now handle
      This.
- Upgrade system:
    * Allows contributed modules to plug into the upgrade system.
- Profiles:
    * Added a block to display author information along with posts.
    * Added support for private profile fields.
- Statistics module:
    * Added the ability to track page generation times.
    * Made it possible to block certain IPs/hostnames.
- Block system:
    * Added support for theme-specific block regions.
- Syndication:
    * Made the aggregator module parse Atom feeds.
    * Made the aggregator generate RSS feeds.
    * Added RSS feed settings.
- XML-RPC:
    * Replaced the XML-RPC library by a better one.
- Performance:
    * Added 'loose caching' option for high-traffic sites.
    * Improved performance of path aliasing.
    * Added the ability to track page generation times.
- Internationalization:
    * Improved Unicode string handling API.
    * Added support for PHP's multibyte string module.
- Added support for PHP5's 'mysqli' extension.
- Search module:
    * Made indexer smarter and more robust.
    * Added advanced search operators (e.g. phrase, node type, ...).
    * Added customizable result ranking.
- PostgreSQL support:
    * Removed dependency on PL/pgSQL procedural language.
- Menu system:
    * Added support for external URLs.
- Queue module:
    * Removed from core.
- HTTP handling:
    * Added support for a tolerant Base URL.
    * Output URIs relative to the root, without a base tag.

Drupal 4.6.11, 2007-01-05
-------------------------
- Fixed security issue (XSS), see SA-2007-001
- Fixed security issue (DoS), see SA-2007-002

Drupal 4.6.10, 2006-10-18
------------------------
- Fixed security issue (XSS), see SA-2006-024
- Fixed security issue (CSRF), see SA-2006-025
- Fixed security issue (Form action attribute injection), see SA-2006-026

Drupal 4.6.9, 2006-08-02
------------------------
- Fixed security issue (XSS), see SA-2006-011

Drupal 4.6.8, 2006-06-01
------------------------
- Fixed critical upload issue, see SA-2006-007
- Fixed taxonomy XSS issue, see SA-2006-008

Drupal 4.6.7, 2006-05-24
------------------------
- Fixed critical SQL issue, see SA-2006-005

Drupal 4.6.6, 2006-03-13
------------------------
- Fixed bugs, including 4 security vulnerabilities.

Drupal 4.6.5, 2005-12-12
------------------------
- Fixed bugs: no critical bugs were identified.

Drupal 4.6.4, 2005-11-30
------------------------
- Fixed bugs, including 3 security vulnerabilities.

Drupal 4.6.3, 2005-08-15
------------------------
- Fixed bugs, including a critical "arbitrary PHP code execution" bug.

Drupal 4.6.2, 2005-06-29
------------------------
- Fixed bugs, including two critical "arbitrary PHP code execution" bugs.

Drupal 4.6.1, 2005-06-01
------------------------
- Fixed bugs, including a critical input validation bug.

Drupal 4.6.0, 2005-04-15
------------------------
- PHP5 compliance
- Search:
    * Added UTF-8 support to make it work with all languages.
    * Improved search indexing algorithm.
    * Improved search output.
    * Impose a throttle on indexing of large sites.
    * Added search block.
- Syndication:
    * Made the ping module ping pingomatic.com which, in turn, will ping all the major ping services.
    * Made Drupal generate RSS 2.0 feeds.
    * Made RSS feeds extensible.
    * Added categories to RSS feeds.
    * Added enclosures to RSS feeds.
- Flood control mechanism:
    * Added a mechanism to throttle certain operations.
- Usability:
    * Refactored the block configuration pages.
    * Refactored the statistics pages.
    * Refactored the watchdog pages.
    * Refactored the throttle module configuration.
    * Refactored the access rules page.
    * Refactored the content administration page.
    * Introduced forum configuration pages.
    * Added a 'add child page' link to book pages.
- Contact module:
    * Added a simple contact module that allows users to contact each other using e-mail.
- Multi-site configuration:
    * Made it possible to run multiple sites from a single code base.
- Added an image API: enables better image handling.
- Block system:
    * Extended the block visibility settings.
- Theme system:
    * Added new theme functions.
- Database backend:
    * The PEAR database backend is no longer supported.
- Performance:
    * Improved performance of the forum topics block.
    * Improved performance of the tracker module.
    * Improved performance of the node pages.
- Documentation:
    * Improved and extended PHPDoc/Doxygen comments.

Drupal 4.5.8, 2006-03-13
------------------------
- Fixed bugs, including 3 security vulnerabilities.

Drupal 4.5.7, 2005-12-12
------------------------
- Fixed bugs: no critical bugs were identified.

Drupal 4.5.6, 2005-11-30
------------------------
- Fixed bugs, including 3 security vulnerabilities.

Drupal 4.5.5, 2005-08-15
------------------------
- Fixed bugs, including a critical "arbitrary PHP code execution" bug.

Drupal 4.5.4, 2005-06-29
------------------------
- Fixed bugs, including two critical "arbitrary PHP code execution" bugs.

Drupal 4.5.3, 2005-06-01
------------------------
- Fixed bugs, including a critical input validation bug.

Drupal 4.5.2, 2005-01-15
------------------------
- Fixed bugs: a cross-site scripting (XSS) vulnerability has been fixed.

Drupal 4.5.1, 2004-12-01
------------------------
- Fixed bugs: no critical bugs were identified.

Drupal 4.5.0, 2004-10-18
------------------------
- Navigation:
    * Made it possible to add, delete, rename and move menu items.
    * Introduced tabs and subtabs for local tasks.
    * Reorganized the navigation menus.
- User management:
    * Added support for multiple roles per user.
    * Made it possible to add custom profile fields.
    * Made it possible to browse user profiles by field.
- Node system:
    * Added support for node-level permissions.
- Comment module:
    * Made it possible to leave contact information without having to register.
- Upload module:
    * Added support for uploading documents (includes images).
- Forum module:
    * Added support for sticky forum topics.
    * Made it possible to track forum topics.
- Syndication:
    * Added support for RSS ping-notifications of http://technorati.com/.
    * Refactored the categorization of syndicated news items.
    * Added an URL alias for 'rss.xml'.
    * Improved date parsing.
- Database backend:
    * Added support for multiple database connections.
    * The PostgreSQL backend does no longer require PEAR.
- Theme system:
    * Changed all GIFs to PNGs.
    * Reorganised the handling of themes, template engines, templates and styles.
    * Unified and extended the available theme settings.
    * Added theme screenshots.
- Blocks:
    * Added 'recent comments' block.
    * Added 'categories' block.
- Blogger API:
    * Added support for auto-discovery of blogger API via RSD.
- Performance:
    * Added support for sending gzip compressed pages.
    * Improved performance of the forum module.
- Accessibility:
    * Improved the accessibility of the archive module's calendar.
    * Improved form handling and error reporting.
    * Added HTTP redirects to prevent submitting twice when refreshing right after a form submission.
- Refactored 403 (forbidden) handling and added support for custom 403 pages.
- Documentation:
    * Added PHPDoc/Doxygen comments.
- Filter system:
    * Added support for using multiple input formats on the site
    * Expanded the embedded PHP-code feature so it can be used everywhere
    * Added support for role-dependent filtering, through input formats
- UI translation:
    * Managing translations is now completely done through the administration interface
    * Added support for importing/exporting gettext .po files

Drupal 4.4.3, 2005-06-01
------------------------
- Fixed bugs, including a critical input validation bug.

Drupal 4.4.2, 2004-07-04
------------------------
- Fixed bugs: no critical bugs were identified.

Drupal 4.4.1, 2004-05-01
------------------------
- Fixed bugs: no critical bugs were identified.

Drupal 4.4.0, 2004-04-01
------------------------
- Added support for the MetaWeblog API and MovableType extensions.
- Added a file API: enables better document management.
- Improved the watchdog and search module to log search keys.
- News aggregator:
    * Added support for conditional GET.
    * Added OPML feed subscription list.
    * Added support for <image>, <pubDate>, <dc:date>, <dcterms:created>, <dcterms:issued> and <dcterms:modified>.
- Comment module:
    * Made it possible to disable the "comment viewing controls".
- Performance:
    * Improved module loading when serving cached pages.
    * Made it possible to automatically disable modules when under heavy load.
    * Made it possible to automatically disable blocks when under heavy load.
    * Improved performance and memory footprint of the locale module.
- Theme system:
    * Made all theme functions start with 'theme_'.
    * Made all theme functions return their output.
    * Migrated away from using the BaseTheme class.
    * Added many new theme functions and refactored existing theme functions.
    * Added avatar support to 'Xtemplate'.
    * Replaced theme 'UnConeD' by 'Chameleon'.
    * Replaced theme 'Marvin' by 'Pushbutton'.
- Usability:
    * Added breadcrumb navigation to all pages.
    * Made it possible to add context-sensitive help to all pages.
    * Replaced drop-down menus by radio buttons where appropriate.
    * Removed the 'magic_quotes_gpc = 0' requirement.
    * Added a 'book navigation' block.
- Accessibility:
    * Made themes degrade gracefully in absence of CSS.
    * Grouped form elements using '<fieldset>' and '<legend>' tags.
    * Added '<label>' tags to form elements.
- Refactored 404 (file not found) handling and added support for custom 404 pages.
- Improved the filter system to prevent conflicts between filters:
    * Made it possible to change the order in which filters are applied.
- Documentation:
    * Added PHPDoc/Doxygen comments.

Drupal 4.3.2, 2004-01-01
------------------------
- Fixed bugs: no critical bugs were identified.

Drupal 4.3.1, 2003-12-01
------------------------
- Fixed bugs: no critical bugs were identified.

Drupal 4.3.0, 2003-11-01
------------------------
- Added support for configurable URLs.
- Added support for sortable table columns.
- Database backend:
    * Added support for selective database table prefixing.
- Performance:
    * Optimized many SQL queries for speed by converting left joins to inner joins.
- Comment module:
    * Rewrote the comment housekeeping code to be much more efficient and scalable.
    * Changed the comment module to use the standard pager.
- User module:
    * Added support for multiple sessions per user.
    * Added support for anonymous user sessions.
- Forum module:
    * Improved the forum views and the themability thereof.
- Book module:
    * Improved integration of non-book nodes in the book outline.
- Usability:
    * Added support for "mass node operations" to ease repetitive tasks.
    * Added support for breadcrumb navigation to several modules' user pages.
    * Integrated the administration pages with the normal user pages.

Drupal 4.2.0, 2003-08-01
------------------------
- Added support for clean URLs.
- Added textarea hook and support for onload attributes: enables integration of WYSIWYG editors.
- Rewrote the RSS/RDF parser:
    * It will now use PHP's built-in XML parser to parse news feeds.
- Rewrote the administration pages:
    * Improved the navigational elements and added breadcrumb navigation.
    * Improved the look and feel.
    * Added context-sensitive help.
- Database backend:
    * Fixed numerous SQL queries to make Drupal ANSI compliant.
    * Added MSSQL database scheme.
- Search module:
    * Changed the search module to use implicit AND'ing instead of implicit OR'ing.
- Node system:
    * Replaced the "post content" permission by more fine-grained permissions.
    * Improved content submission:
        + Improved teasers: teasers are now optional, teaser length can be configured, teaser and body are edited in a single textarea, users will no longer be bothered with teasers when the post is too short for one.
        + Added the ability to preview both the short and the full version of your posts.
    * Extended the node API which allows for better integration.
    * Added default node settings to control the behavior for promotion, moderation and other options.
- Themes:
    * Replaced theme "Goofy" by "Xtemplate", a template driven theme.
- Removed the 'register_globals = on' requirement.
- Added better installation instructions.

Drupal 4.1.0, 2003-02-01
------------------------
- Collaboratively revised and expanded the Drupal documentation.
- Rewrote comment.module:
    * Reintroduced comment rating/moderation.
    * Added support for comment paging.
    * Performance improvements: improved comment caching, faster SQL queries, etc.
- Rewrote block.module:
    * Performance improvements: blocks are no longer rendered when not displayed.
- Rewrote forum.module:
    * Added a lot of features one can find in stand-alone forum software including but not limited to support for topic paging, added support for icons, rewrote the statistics module, etc.
- Rewrote statistics.module:
    * Collects access counts for each node, referrer logs, number of users/guests.
    * Export blocks displaying top viewed nodes over last 24 hour period, top viewed nodes over all time, last nodes viewed, how many users/guest online.
- Added throttle.module:
    * Auto-throttle congestion control mechanism: Drupal can adapt itself based on the server load.
- Added profile.module:
    * Enables to extend the user and registration page.
- Added pager support to the main page.
- Replaced weblogs.module by ping.module:
    * Added support for normal and RSS notifications of http://blo.gs/.
    * Added support for RSS ping-notifications of http://weblogs.com/.
- Removed the rating module
- Themes:
    * Removed a significant portion of hard-coded mark-up.

Drupal 4.0.0, 2002-06-15
------------------------
- Added tracker.module:
    * Replaces the previous "your [site]" links (recent comments and nodes).
- Added weblogs.module:
    * This will ping weblogs.com when new content is promoted.
- Added taxonomy module which replaces the meta module.
    * Supports relations, hierarchies and synonyms.
- Added a caching system:
    * Speeds up pages for anonymous users and reduces system load.
- Added support for external SMTP libraries.
- Added an archive extension to the calendar.
- Added support for the Blogger API.
- Themes:
    * Cleaned up the theme system.
    * Moved themes that are not maintained to contributions CVS repository.
- Database backend:
    * Changed to PEAR database abstraction layer.
    * Using ANSI SQL queries to be more portable.
- Rewrote the user system:
    * Added support for Drupal authentication through XML-RPC and through a Jabber server.
    * Added support for modules to add more user data.
    * Users may delete their own account.
    * Added who's new and who's online blocks.
- Changed block system:
    * Various hard coded blocks are now dynamic.
    * Blocks can now be enabled and/or be set by the user.
    * Blocks can be set to only show up on some pages.
    * Merged box module with block module.
- Node system:
    * Blogs can be updated.
    * Teasers (abstracts) on all node types.
    * Improved error checking.
    * Content versioning support.
    * Usability improvements.
- Improved book module to support text, HTML and PHP pages.
- Improved comment module to mark new comments.
- Added a general outliner which will let any node type be linked to a book.
- Added an update script that lets you upgrade from previous releases or on a day to day basis when using the development tree.
- Search module:
    * Improved the search system by making it context sensitive.
    * Added indexing.
- Various updates:
    * Changed output to valid XHTML.
    * Improved multiple sites using the same Drupal database support.
    * Added support for session IDs in URLs instead of cookies.
    * Made the type of content on the front page configurable.
    * Made each cloud site have its own settings.
    * Modules and themes can now be enabled/disabled using the administration pages.
    * Added URL abstraction for links.
    * Usability changes (renamed links, better UI, etc).
- Collaboratively revised and expanded the Drupal documentation.

Drupal 3.0.1, 2001-10-15
------------------------
- Various updates:
    * Added missing translations
    * Updated the themes: tidied up some HTML code and added new Drupal logos.

Drupal 3.0.0, 2001-09-15
------------------------
- Major overhaul of the entire underlying design:
    * Everything is based on nodes: nodes are a conceptual "black box" to couple and manage different types of content and that promotes reusing existing code, thus reducing the complexity and size of Drupal as well as improving long-term stability.
- Rewrote submission/moderation queue and renamed it to queue.module.
- Removed FAQ and documentation module and merged them into a "book module".
- Removed ban module and integrated it into account.module as "access control":
    * Access control is based on much more powerful regular expressions (regex) now rather than on MySQL pattern matching.
- Rewrote watchdog and submission throttle:
    * Improved watchdog messages and added watchdog filter.
- Rewrote headline code and renamed it to import.module and export.module:
    * Added various improvements, including a better parser, bundles and better control over individual feeds.
- Rewrote section code and renamed it to meta.module:
    * Supports unlimited amount of nested topics. Topics can be nested to create a multi-level hierarchy.
- Rewrote configuration file resolving:
    * Drupal tries to locate a configuration file that matches your domain name or uses conf.php if the former failed. Note also that the configuration files got renamed from .conf to .php for security's sake on mal-configured Drupal sites.
- Added caching support which makes Drupal extremely scalable.
- Added access.module:
    * Allows you to set up 'roles' (groups) and to bind a set of permissions to each group.
- Added blog.module.
- Added poll.module.
- Added system.module:
    * Moved most of the configuration options from hostname.conf to the new administration section.
    * Added support for custom "filters".
- Added statistics.module
- Added moderate.module:
    * Allows to assign users editorial/moderator rights to certain nodes or topics.
- Added page.module:
    * Allows creation of static (and dynamic) pages through the administration interface.
- Added help.module:
    * Groups all available module documentation on a single page.
- Added forum.module:
    * Added an integrated forum.
- Added cvs.module and cvs-to-sql.pl:
    * Allows to display and mail CVS log messages as daily digests.
- Added book.module:
    * Allows collaborative handbook writing: primary used for Drupal documentation.
- Removed cron.module and integrated it into conf.module.
- Removed module.module as it was no longer needed.
- Various updates:
    * Added "auto-post new submissions" feature versus "moderate new submissions".
    * Introduced links/Drupal tags: [[link]]
    * Added preview functionality when submitting new content (such as a story) from the administration pages.
    * Made the administration section only show those links a user has access to.
    * Made all modules use specific form_* functions to guarantee a rock-solid forms and more consistent layout.
    * Improved scheduler:
        + Content can be scheduled to be 'posted', 'queued' and 'hidden'.
    * Improved account module:
        + Added "access control" to allow/deny certain usernames/e-mail addresses/hostnames.
    * Improved locale module:
        + Added new overview to easy the translation process.
    * Improved comment module:
        + Made it possible to permanently delete comments.
    * Improved rating module
    * Improved story module:
        + Added preview functionality for administrators.
        + Made it possible to permanently delete stories.
    * Improved themes:
        + W3C validation on a best effort basis.
        + Removed $theme->control() from themes.
        + Added theme "goofy".
- Collaboratively revised and expanded the Drupal documentation.

Drupal 2.0.0, 2001-03-15
------------------------
- Rewrote the comment/discussion code:
    * Comment navigation should be less confusing now.
    * Additional/alternative display and order methods have been added.
    * Modules can be extended with a "comment system": modules can embed the existing comment system without having to write their own, duplicate comment system.
- Added sections and section manager:
    * Story sections can be maintained from the administration pages.
    * Story sections make the open submission more adaptive in that you can set individual post, dump and expiration thresholds for each section according to the story type and urgency level: stories in certain sections do not "expire" and might stay interesting and active as time passes by, whereas news-related stories are only considered "hot" over a short period of time.
- Multiple vhosts + multiple directories:
    * You can set up multiple Drupal sites on top of the same physical source tree either by using vhosts or sub-directories.
- Added "user ratings" similar to SlashCode's Karma or Scoop's Mojo:
    * All rating logic is packed into a module to ease experimenting with different rating heuristics/algorithms.
- Added "search infrastructure":
    * Improved search page and integrated search functionality in the administration pages.
- Added translation / localization / internationalization support:
    * Because many people would love to see their website showing a lot less of English, and far more of their own language, Drupal provides a framework to set up a multi-lingual website or to overwrite the default English text in English.
- Added fine-grained user permission (or group) system:
    * Users can be granted access to specific administration sections. Example: a FAQ maintainer can be given access to maintain the FAQ and translators can be given access to the translation pages.
- Added FAQ module
- Changed the "open submission queue" into a (optional) module.
- Various updates:
    * Improved account module:
        + User accounts can be deleted.
        + Added fine-grained permission support.
    * Improved block module
    * Improved diary module:
        + Diary entries can be deleted
    * Improved headline module:
        + Improved parser to support more "generic" RDF/RSS/XML backend.
    * Improved module module
    * Improved watchdog module
    * Improved database abstraction layer
    * Improved themes:
        + W3C validation on a best effort basis
        + Added theme "example" (alias "Stone Age")
    * Added new scripts to directory "scripts"
    * Added directory "misc"
    * Added CREDITS file
- Revised documentation

Drupal 1.0.0, 2001-01-15
------------------------
- Initial release
