<?php
// authenticate
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );
// Read results
$f_customized		= gpc_get_int( 'customized',ON );

// update results
plugin_config_set( 'customized', $f_customized );

// redirect
print_header_redirect( "manage_plugin_page.php" );