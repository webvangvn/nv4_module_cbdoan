<?php

/**
 * @Project NUKEVIET 4.x
 * @Author hongoctrien (01692777913@yahoo.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @Copyright (C) 2012 2mit.org. All rights reserved
 * @Createdate 19-07-2012 14:43
 */

if( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$page_title = $lang_module['dschucvu'];

$xtpl = new XTemplate( "chucvu.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'GLANG', $lang_global );
$url_add = NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=chucvu_add";

$sql = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_chucvu";
$result = $db->query($sql);
$num = $result->rowCount();

if($num != 0)
{
    $chucvu = getChucvu();
    foreach ($chucvu AS $cv)
    {
        $xtpl->assign( 'CV', $cv);
        $xtpl->assign( 'EDIT', NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=chucvu_edit&ac=edit&macvu=" .$cv['macvu']);
        $xtpl->assign( 'DEL', NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=chucvu_edit&ac=del&macvu=" .$cv['macvu']);
        $xtpl->parse('main.loop');
    }
    
    $xtpl->assign( 'CV_ADD', $url_add);
    
    $xtpl->parse( 'main' );
    $contents = $xtpl->text( 'main' );
    
    include ( NV_ROOTDIR . "/includes/header.php" );
    echo nv_admin_theme( $contents );
    include ( NV_ROOTDIR . "/includes/footer.php" );
}
else
{
    header("Location: $url_add");
}
