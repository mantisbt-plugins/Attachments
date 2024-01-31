<?php
class AttachmentsPlugin extends MantisPlugin {

	function register() {
		$this->name        = 'Attachments';
		$this->description = lang_get( 'attachments_plugin_title' );
		$this->version     = '2.10';
		$this->requires    = array('MantisCore'       => '2.0.0',);
		$this->author      = 'Cas Nuy';
		$this->contact     = 'Cas-at-nuy.info';
		$this->url         = 'http://www.nuy.info';
		$this->page		   = '';
	}


 	function init() {
		event_declare('EVENT_VIEW_BUG_FILES');
	 	plugin_event_hook( 'EVENT_VIEW_BUG_FILES', 'attachment_form' );
//	 	plugin_event_hook( 'EVENT_VIEW_BUG_EXTRA', 'attachment_form' );
	}

 	function attachment_form() {
		 include 'plugins/Attachments/pages/attachments_form.php';
	}

 
}
