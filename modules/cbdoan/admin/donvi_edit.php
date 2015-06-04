<?php

/**
 * @Project NUKEVIET 4.x
 * @Author hongoctrien (01692777913@yahoo.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @Copyright (C) 2012 2mit.org. All rights reserved
 * @Createdate 19-07-2012 14:43
 */

if( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$page_title = $lang_module['edit_dv'];

$xtpl = new XTemplate( "donvi_edit.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file );
$xtpl->assign( 'LANG', $lang_module );

$error = "";

$madvi = $nv_Request->get_int ('madvi', 'get','');

   $donvi = array();
   $result = $db->query( "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_donvi WHERE madvi = '" . $madvi . "'");
   while ( $row = $result->fetch() )
   {
      $donvi[] = array (
         "madvi" => $row['madvi'],
         "tendvi" => $row['tendonvi'],
         "gt_dv" => $row['gt_dv']
      );
   }

if ( $nv_Request->get_int( 'save', 'post' ) == 1 )
{
    $madvi = $nv_Request->get_int ('madvi1', 'post','');
    $tendvi = $nv_Request->get_string ('tendvi1', 'post','');
    $gt_dv = $nv_Request->get_string ('gt_dv1', 'post','');
    
    if(isset($madvi))
    {
        if(empty($tendvi))
        {
            $error = $lang_module['error_tdv'];    
        }
        else
        {
            $stmt = $db->prepare( 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_donvi SET tendonvi= :tendonvi, gt_dv= :gt_dv WHERE madvi =' . $madvi );
			$stmt->bindParam( ':tendonvi', $tendvi, PDO::PARAM_STR );
			$stmt->bindParam( ':gt_dv', $gt_dv, PDO::PARAM_STR );
			$stmt->execute();
                                      
            if($stmt->rowCount())
            {
                Header("Location:" . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=donvi");
            }
            else
            {
                $error = $lang_module['error_csdl'] . mysql_error();   
            }
        }
    }
}

$ac = $nv_Request->get_string ('ac', 'get','');
$madvi = $nv_Request->get_int ('madvi', 'get','');

if($ac == 'del')
{
	$check = "SELECT id FROM " . NV_PREFIXLANG . "_" . $module_data . " WHERE madvi = " . $madvi;
    $result = $db->query($check);
    $num = $result->rowCount();
    
    if($num != 0)
    { 
        Header("Location:" . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name);
    }
    else
    {
        $result = $db->query("DELETE FROM " . NV_PREFIXLANG . "_" . $module_data . "_donvi WHERE madvi = ".$madvi."" );
        Header("Location:" . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=donvi");
    }
}

$url = NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=" . $op . "&madvi=" . $madvi;
$xtpl->assign( 'ACTION', $url );

foreach ($donvi AS $dv)
{
    $xtpl->assign( 'DV', $dv);
}

$xtpl->assign( 'ERROR', $error );


$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_admin_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

