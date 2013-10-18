this isn't a complete module. It has some functionality to check path access, but requires several other things to work properly including...

1. roles for each content type with content type names
2. fields for user profiles based on content type names
3. logic in page.tpl.php to hide the action menus.

See dev.tech.purdue.edu & www3.tech.purdue.edu site for reference.

The module only removes the task menu when users don't have a matching path. It does not remove permissions.