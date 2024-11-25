<?php
class AttachmentsPlugin extends MantisPlugin {

	function register() {
		$this->name        = 'Attachments';
		$this->description = plugin_lang_get( 'title' );
		$this->version     = '2.25';
		$this->requires    = array('MantisCore'       => '2.0.0',);
		$this->author      = 'Cas Nuy';
		$this->contact     = 'Cas-at-nuy.info';
		$this->url         = 'http://www.nuy.info';
		$this->page		   = 'config';
	}

	function config() {
		return array(
			'customized'		=> OFF,
			);
	}


 	function init() {
		event_declare('EVENT_VIEW_BUG_FILES');
		if ( OFF === plugin_config_get( 'customized' )  ) {
		 	plugin_event_hook( 'EVENT_VIEW_BUG_EXTRA', 'attachment_form' );		
		} else {
			plugin_event_hook( 'EVENT_VIEW_BUG_FILES', 'attachment_form' );
		}

	}
	


 	function attachment_form() {
		 include 'plugins/Attachments/pages/attachments_form.php';
	}

 
}