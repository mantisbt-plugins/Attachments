########################################################
# 	Mantis Bugtracker Add-On
# 	Attachments version 2.10
#	2021 - 2024 plugin by Cas Nuy www.NUY.info
########################################################
To be used only with Mantis 2.x
This plugin allows to re-instate the attachments section and to upload attachments without a note.
Attachments are shown in the activities section though, this can be handled but would require more changes in core files.
Now we still need to add four(4) lines to bug_view_inc.php:
#
# Bug attachment Event Signal
#
event_signal( 'EVENT_VIEW_BUG_FILES', array( $f_issue_id ) );

Place these lines just before :
# User list sponsoring the bug
assign tasks to other authorised handlers within the current project.

Simply load & install this plugin as any other.
Without the lines added to bug_view_inc.php this plugin ahs no effect whatsoever.

With future updates of Mantis , you will need make this change again.


Alternative, making use of existing Mantis Event:
open Attachments/Attachments.php with an editor
change the following lines :
		event_declare('EVENT_VIEW_BUG_FILES');
	 	plugin_event_hook( 'EVENT_VIEW_BUG_FILES', 'attachment_form' );
//	 	plugin_event_hook( 'EVENT_VIEW_BUG_EXTRA', 'attachment_form' );

to:
//		event_declare('EVENT_VIEW_BUG_FILES');
//	 	plugin_event_hook( 'EVENT_VIEW_BUG_FILES', 'attachment_form' );
	 	plugin_event_hook( 'EVENT_VIEW_BUG_EXTRA', 'attachment_form' );
		
Save the file and then load the plugin to your Mantis/plugin directory

########################################################
# 	Attachments version 2.02
########################################################
Changes made:
- adjusted the lay-out of the Attachments block slightly
- Included an option to exclude the top-level attachments from the activity list
	- This however does require a change of another core file
For this, add the following lines in bugnote_view_inc.php:
		# ATTACHMENTS-Plugin
		if ( $t_activity['type'] == "attachment" ){
			continue;
		}
		# ATTACHMENTS-Plugin


These lines need to be inserted after the following code:
	for( $i=0; $i < $t_activities_count; $i++ ) {
		$t_activity = $t_activities[$i];

########################################################
# 	Attachments version 2.03
########################################################
Fixed not showing the top-level attachment in the activity section

########################################################
# 	Attachments version 2.04
########################################################
Fixed impact on alignment op following blocks

########################################################
# 	Attachments version 2.10
########################################################
Added removed mantis function "function print_bug_attachments_list"
