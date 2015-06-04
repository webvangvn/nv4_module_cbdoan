<?php

/**
 * @Project NUKEVIET 4.x
 * @Author hongoctrien (01692777913@yahoo.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @Copyright (C) 2012 2mit.org. All rights reserved
 * @Createdate 19-07-2012 14:43
 */

if( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$page_title = $lang_module['add_donvi'];

$xtpl = new XTemplate( "donvi_add.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'GLANG', $lang_global );

$url = NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=" . $op . "";
$xtpl->assign( 'ACTION', $url );

$donvi = array();
$error = "";

if ( $nv_Request->get_int( 'save', 'post' ) == 1 )
{
    $donvi['tendvi'] = $nv_Request->get_string ('tendvi', 'post','');
    $donvi['gt_dv'] = $nv_Request->get_string ('gt_dv', 'post','');
    
    //Xu ly cac ky tu xuong dong trong textarea
    $donvi['gt_dv'] = nv_nl2br( $donvi['gt_dv'], "<br />" );

    if (empty($donvi['tendvi']))
    {
        $error = $lang_module['error_tdv'];
    }
    else
    {
        $sql = 'INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_donvi
				( tendonvi,gt_dv) VALUES (
				 :tendonvi,
				 :gt_dv)';
			$data_insert = array();
			$data_insert['tendonvi'] = $donvi['tendvi'];
			$data_insert['gt_dv'] = $donvi['gt_dv'];
			
			$kq = $db->insert_id( $sql, 'madvi', $data_insert );
            if($kq)
            {
               Header("Location:" . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=donvi");
            }
            else
            {
                $error = $lang_module['error_csdl']; 
            }
    }
    $xtpl->assign( 'DONVI', $donvi );
}

$xtpl->assign( 'ERROR', $error );

$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_admin_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

?>