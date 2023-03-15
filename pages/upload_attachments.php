<?php
# MantisBT - A PHP based bugtracking system

# MantisBT is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 2 of the License, or
# (at your option) any later version.
#
# MantisBT is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with MantisBT.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Insert the bugnote into the database then redirect to the bug page
 *
 * @package MantisBT
 * @copyright Copyright 2000 - 2002  Kenzaburo Ito - kenito@300baud.org
 * @copyright Copyright 2002  MantisBT Team - mantisbt-dev@lists.sourceforge.net
 * @link http://www.mantisbt.org
 *
 * @uses core.php
 * @uses file_api.php
 * @uses form_api.php
 * @uses gpc_api.php
 * @uses print_api.php
 */
require_once( '../../../core.php' );
require_api( 'file_api.php' );
require_api( 'form_api.php' );
require_api( 'gpc_api.php' );
require_api( 'print_api.php' );

$f_bug_id = gpc_get_int( 'bug_id' );

$f_files = gpc_get_file( 'ufile1', null );
if( $f_files !== null && !empty( $f_files ) ) {
	$f_files = helper_array_transpose( $f_files );
	# Can reporter attach files, if supplied?
	if( $f_files ) {
		$user = auth_get_current_user_id();
		if( !file_allow_bug_upload( $f_bug_id, $user ) ) {
			throw new ClientException( 'access denied for uploading files', ERROR_ACCESS_DENIED );
		}
	}

	# Handle the file upload
	$t_file_infos = file_attach_files( $f_bug_id, $f_files);

}
print_header_redirect('../../../view.php?id='.$f_bug_id.'' );
