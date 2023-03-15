<?php

require_api( 'access_api.php' );
require_api( 'bug_api.php' );
require_api( 'collapse_api.php' );
require_api( 'config_api.php' );
require_api( 'constant_inc.php' );
require_api( 'event_api.php' );
require_api( 'form_api.php' );
require_api( 'helper_api.php' );
require_api( 'html_api.php' );
require_api( 'lang_api.php' );


$f_issue_id			= gpc_get_int( 'id' );
$t_allow_file_upload = file_allow_bug_upload( $f_issue_id );
?>
<div class="col-md-12 col-xs-12">
<div class="space-10"></div>
<div class="form-container" > 
<td class="center" colspan="6">
<?php
$t_collapse_block = is_collapsed( 'attachments' );
$t_block_css = $t_collapse_block ? 'collapsed' : '';
$t_block_icon = $t_collapse_block ? 'fa-chevron-down' : 'fa-chevron-up'; 
?>
<div id="attachments" class="widget-box widget-color-blue2 <?php echo $t_block_css ?>">
<div class="widget-header widget-header-small">
<h4 class="widget-title lighter">
<i class="ace-icon fa fa-users"></i>
<?php echo lang_get( 'attached_files'  ) ?>
</h4>
<div class="widget-toolbar">
<a data-action="collapse" href="#">
<i class="1 ace-icon fa <?php echo $t_block_icon ?> bigger-125"></i>
</a>
</div>
</div>
<div class="widget-body">
<div class="widget-main no-padding">
<div class="table-responsive">
<table class="table table-bordered table-condensed table-striped">
<tr><td>
<?php
print_bug_attachments_list( $f_issue_id, null);
?>
</td>
</tr>
</table>
</div>
</div>
</div>


<?php

if( $t_allow_file_upload ) {
?>
	<table class="table table-bordered table-condensed table-striped">
	<? php echo form_security_field( 'attachments_add' ) ?>

	<form id="add_attachment"method="post" action="plugins/Attachments/pages/upload_attachments.php" enctype="multipart/form-data">
	<input type="hidden" name="bug_id" value="<?php echo $f_issue_id ?>" />
<?php
	$t_file_upload_max_num = max( 1, config_get( 'file_upload_max_num' ) );

	$t_max_file_size = file_get_max_file_size();
?>
		<tr id="attach-files">
			<th class="category">
				<?php echo lang_get( $t_file_upload_max_num == 1 ? 'upload_file' : 'upload_file' ) ?>
				<br />
				<?php print_max_filesize( $t_max_file_size ); ?>
			</th>
			<td>
				<div>
					<input id="ufile1[]" name="ufile1[]" type="file" size="150" />
				</div>
			</td>
			<td>
				<input type="submit" class="btn btn-primary btn-white btn-round" value="<?php echo lang_get( 'add_file_button' ) ?>" />
			</td>
		</tr>
	</table>
	</form>
	</div>
<?php
}
?>
</div>
</div>




