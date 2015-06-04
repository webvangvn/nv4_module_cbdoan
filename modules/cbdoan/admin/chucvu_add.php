<?php

/**
 * @Project NUKEVIET 4.x
 * @Author hongoctrien (01692777913@yahoo.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @Copyright (C) 2012 2mit.org. All rights reserved
 * @Createdate 19-07-2012 14:43
 */

if( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$page_title = $lang_module['add_chucvu'];

$xtpl = new XTemplate( "chucvu_add.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'GLANG', $lang_global );

$url = NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=" . $op . "";
$xtpl->assign( 'ACTION', $url );

$chucvu = array();
$error = "";

if ( $nv_Request->get_int( 'save', 'post' ) == 1 )
{
	$chucvu['tencvu'] = $nv_Request->get_string ('tenchucvu', 'post','');
    $chucvu['gt_cv'] = $nv_Request->get_string ('gt_cv', 'post','');
    
    //Xu ly cac ky tu xuong dong trong textarea
    $chucvu['gt_cv'] = nv_nl2br( $chucvu['gt_cv'], "<br />" );
    if (empty($chucvu['tencvu']))
    {
        $error = $lang_module['error_tcv'];
    }
	else
    {
        $sql = 'INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_chucvu
				( tenchucvu,gt_cv) VALUES (
				 :tenchucvu,
				 :gt_cv)';
			$data_insert = array();
			$data_insert['tenchucvu'] = $chucvu['tencvu'];
			$data_insert['gt_cv'] = $chucvu['gt_cv'];
			
			$kq = $db->insert_id( $sql, 'macvu', $data_insert );
            if($kq)
            {
               Header("Location:" . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=chucvu");
            }
            else
            {
                $error = $lang_module['error_csdl']; 
            }
    }
    $xtpl->assign( 'CHUCVU', $chucvu );
   
}

$xtpl->assign( 'ERROR', $error );

$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_admin_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

