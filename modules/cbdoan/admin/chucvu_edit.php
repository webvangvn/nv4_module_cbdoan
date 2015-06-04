<?php

/**
 * @Project NUKEVIET 4.x
 * @Author hongoctrien (01692777913@yahoo.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @Copyright (C) 2012 2mit.org. All rights reserved
 * @Createdate 19-07-2012 14:43
 */

if( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$page_title = $lang_module['edit_cv'];

$xtpl = new XTemplate( "chucvu_edit.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file );
$xtpl->assign( 'LANG', $lang_module );

$macvu = $nv_Request->get_int ('macvu', 'get','');

   $chucvu = array();
   $result = $db->query( "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_chucvu WHERE macvu = '" . $macvu . "'");
   while ( $row = $result->fetch() )
   {
      $chucvu[] = array (
         "macvu" => $row['macvu'],
         "tenchucvu" => $row['tenchucvu'],
         "gt_cv" => $row['gt_cv']
      );
   }

if ( $nv_Request->get_int( 'save', 'post' ) == 1 )
{
    $macvu = $nv_Request->get_int ('macvu1', 'post','');
    $tenchucvu = $nv_Request->get_string ('tenchucvu1', 'post','');
    $gt_cv = $nv_Request->get_string ('gt_cv1', 'post','');
    
    if($macvu != 0)
    {
        if(empty($tenchucvu))
        {
            $error = $lang_module['error_tcv'];    
        }
        else
        {
			$stmt = $db->prepare( 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_chucvu SET tenchucvu= :tenchucvu, gt_cv= :gt_cv WHERE macvu =' . $macvu );
			$stmt->bindParam( ':tenchucvu', $tenchucvu, PDO::PARAM_STR );
			$stmt->bindParam( ':gt_cv', $gt_cv, PDO::PARAM_STR );
			$stmt->execute();
                                      
            if($stmt->rowCount())
            {
                Header("Location:" . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=chucvu");
            }
            else
            {
                $error = $lang_module['error_csdl'] . mysql_error();   
            }
        }
    $xtpl->assign( 'ERROR', $error );
    }
}

$macvu = $nv_Request->get_int ('macvu', 'get','');
$ac = $nv_Request->get_string ('ac', 'get','');
if($ac == 'del')
{
    $check = "SELECT id FROM " . NV_PREFIXLANG . "_" . $module_data . " WHERE macvu1 = " . $macvu . " OR macvu2 = " . $macvu . " OR macvu3 = " . $macvu;
    $result = $db->query($check);
    $num = $result->rowCount();
    
    if($num != 0)
    { 
        Header("Location:" . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name);
    }
    else
    {
    $result = $db->query("DELETE FROM " . NV_PREFIXLANG . "_" . $module_data . "_chucvu WHERE macvu = ".$macvu." ");
    Header("Location:" . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=chucvu");
    }
}

$url = NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=" . $op . "&macvu=" . $macvu;
$xtpl->assign( 'ACTION', $url );

foreach ($chucvu AS $cv)
{
    $xtpl->assign( 'CV', $cv);
}

$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_admin_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

