<?php

/**
 * @Project NUKEVIET 4.x
 * @Author hongoctrien (01692777913@yahoo.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @Copyright (C) 2012 2mit.org. All rights reserved
 * @Createdate 19-07-2012 14:43
 */

if( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$page_title = $lang_module['dsdonvi'];

$xtpl = new XTemplate( "donvi.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'GLANG', $lang_global );

$url_add = NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=donvi_add";

$sql = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_donvi";
$result = $db->query($sql);
$numrow = $result->rowCount();

if($numrow != 0)
{
    $donvi = getDonvi();
    foreach ($donvi AS $dv)
    {
        $xtpl->assign( 'DV', $dv);
        $xtpl->assign( 'EDIT', NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=donvi_edit&ac=edit&madvi=" .$dv['madvi']);
        $xtpl->assign( 'DEL', NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=donvi_edit&ac=del&madvi=" .$dv['madvi']);
        $xtpl->assign( 'KHAC', NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&madvi=" .$dv['madvi']);
        $xtpl->parse('main.loop');
    }
    
    $xtpl->assign( 'DV_ADD', $url_add);
    
    $xtpl->parse( 'main' );
    $contents = $xtpl->text( 'main' );
    
    include ( NV_ROOTDIR . "/includes/header.php" );
    echo nv_admin_theme( $contents );
    include ( NV_ROOTDIR . "/includes/footer.php" );
}
else
{
    Header("Location: $url_add");    
}
