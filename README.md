# 	Mantis Plugin Attachments 
	Version 2.20
	2021 - 2024 plugin by Cas Nuy www.NUY.info
	To be used only with Mantis 2.x
	
## Description	
This plugin allows to re-instate the attachments section and to upload attachments without a note.
Attachments are not shown in the activities section though, this can be handled but would require more changes in core files.
This section will appear below the actvities section when viewing the issue.

## Installation
Simply load & install this plugin as any other.
In case customizing is required, do adjust that using the config page of the plugin.

## Customizing
In case one wants to show the Attachments section just below the main section of the issue (as it used to be), a change iss required to a core script.
Be aware that such changes need to be applied after each Mantis version update.

In that case you need to make a change to bug_view_inc.php.
Add the following line:
event_signal( 'EVENT_VIEW_BUG_FILES', array( $f_issue_id ) );
just before the lines:
'# User list sponsoring the bug

If you need the Attachment section in the bug_update_page, add the following line:
event_signal( 'EVENT_VIEW_BUG_FILES', array( $t_bug_id ) ); 
Just above this line:
define( 'BUGNOTE_VIEW_INC_ALLOW', true );

In case you want to exclude the top level attachments from the Activity list:
For this, add the following lines in bugnote_view_inc.php:
		# ATTACHMENTS-Plugin
		if ( $t_activity['type'] == "attachment" ){
			continue;
		}
		# ATTACHMENTS-Plugin
These lines need to be inserted after the following code:
	for( $i=0; $i < $t_activities_count; $i++ ) {
		$t_activity = $t_activities[$i];
		
## Configuration
Customized Setup	default OFF
Only change this setting to ON if you want to customize out of the box behaviour

## Change Log

### 	Attachments version 2.02
- adjusted the lay-out of the Attachments block slightly
- Included an option to exclude the top-level attachments from the activity list

### 	Attachments version 2.03
Fixed not showing the top-level attachment in the activity section

### 	Attachments version 2.04
Fixed impact on alignment op following blocks

### 	Attachments version 2.10
Added removed mantis function "function print_bug_attachments_list"

### 	Attachments version 2.20
Made this section available while editing an issue

### 	Attachments version 2.25
Added config option and improved readme