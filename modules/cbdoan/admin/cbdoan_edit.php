<?php

/**
 * @Project NUKEVIET 4.x
 * @Author hongoctrien (01692777913@yahoo.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @Copyright (C) 2012 2mit.org. All rights reserved
 * @Createdate 19-07-2012 14:43
 */

if( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$page_title = $lang_module['edit_cb'];


if( defined( 'NV_EDITOR' ) )
{
	require_once ( NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php' );
}

$xtpl = new XTemplate( "cbdoan_edit.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file );
$xtpl->assign( 'LANG', $lang_module );

//$my_head = "<script type=\"text/javascript\" src=\"" . NV_BASE_SITEURL . "js/popcalendar/popcalendar.js\"></script>\n";

$op = $nv_Request->get_string ('op', 'get','');
$id = $nv_Request->get_string ('id', 'get','');
$ac = $nv_Request->get_string ('ac', 'get','');

$url = NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=" . $op . "&amp;id=" . $id;
$xtpl->assign( 'ACTION', $url );


if($ac == 'del')
{
    $result = $db->query("DELETE FROM " . NV_PREFIXLANG . "_" . $module_data . " WHERE id = '".$id."' ");
    Header("Location:" . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "");
}

$error = array();
$cbdoan = array();

if(isset($id))
{
   $cbdoan = array();
   $result = $db->query( "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . " WHERE id= '" . $id . "'");
   while ( $row = $result->fetch() )
   {
      $cbdoan[] = array (
         "id" => $row['id'],
         "ten" => $row['hoten'],
         "ngsinh" => $row['ngsinh'],
         "gt" => $row['gtinh'],
         "avt" => $row['avt'],
         "nvdoan" => $row['nvdoan'],
         "dang" => $row['dang'],
         "nvdang" => $row['nvdang'],
         "que" => $row['quequan'],
         "diachi" => $row['diachi'],
         "madvi" => $row['madvi'],
         "macvu1" => $row['macvu1'],
         "macvu2" => $row['macvu2'],
         "macvu3" => $row['macvu3'],
         "email" => $row['email'],
         "yahoo" => $row['yahoo'],
         "skype" => $row['skype'],
         "phone" => $row['phone'],
         "web" => $row['website'],
         "tt" => $row['tomtat']
      );
      
      if($row['gtinh'] != 0)
      {
        $xtpl->assign( 'CHECK_GT', 'checked="checked"' );
      }
      
      if($row['dang'] != 0)
      {
        $xtpl->assign( 'CHECK_D', 'checked="checked"' );
      }
    }    
}


//Cap nhat du lieu tu form
$cb_doan = array();
if ( $nv_Request->get_int( 'save', 'post' ) == 1 )
{
	
    //dua thong tin tu form vao mang
    $cb_doan['id'] = $nv_Request->get_string ('id', 'post','');
    $cb_doan['ten'] = $nv_Request->get_string ('ten', 'post','');
    $cb_doan['ngsinh'] = $nv_Request->get_string ('ngsinh', 'post',0);
    $cb_doan['gt'] = $nv_Request->get_int ('gt', 'post','');    
    $cb_doan['avt'] = $nv_Request->get_string ('avt', 'post','');
    $cb_doan['nvdoan'] = $nv_Request->get_string ('nvdoan', 'post',0);    
    $cb_doan['dang'] = $nv_Request->get_int ('dang', 'post','');
    $cb_doan['nvdang'] = $nv_Request->get_string ('nvdang', 'post',0);    
    $cb_doan['que'] = $nv_Request->get_string ('que', 'post','');
    $cb_doan['diachi'] = $nv_Request->get_string ('diachi', 'post','');
    $cb_doan['madvi'] = $nv_Request->get_int ('madvi', 'post','');
    $cb_doan['macvu1'] = $nv_Request->get_int ('macvu1', 'post','');
    $cb_doan['macvu2'] = $nv_Request->get_int ('macvu2', 'post','');
    $cb_doan['macvu3'] = $nv_Request->get_int ('macvu3', 'post','');
    $cb_doan['email'] = $nv_Request->get_string ('email', 'post','');
    $cb_doan['yahoo'] = $nv_Request->get_string ('yahoo', 'post','');
    $cb_doan['skype'] = $nv_Request->get_string ('skype', 'post','');
    $cb_doan['phone'] = $nv_Request->get_string ('phone', 'post','');
    $cb_doan['web'] = $nv_Request->get_string ('web', 'post','');
    $bodytext = $nv_Request->get_string( 'tt', 'post','' );
	$cbdoan['tt'] = defined( 'NV_EDITOR' ) ? nv_nl2br( $bodytext, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $bodytext ) ), '<br />' );
	
	
    //Dinh dang dia chi web
    if ( ! empty( $cb_doan['web'] ) )
    {
        if ( ! preg_match( "#^(http|https|ftp|gopher)\:\/\/#", $cb_doan['web'] ) )
        {
            $cb_doan['web'] = "http://" . $cb_doan['web'];
        }
        if ( ! nv_is_url( $cb_doan['web'] ) )
        {
            $cb_doan['web'] = "";
        }
    }
    
    //Xu ly cac ky tu xuong dong trong textarea
    //$cb_doan['tt'] = nv_nl2br( $cb_doan['tt'], "<br />" );
    
    //Kiem tra loi
    //Check loi ten can bo
    if(empty($cb_doan['ten']))
    {
        $error['no_name'] = $lang_module['no_name'];
    }
    
    //Check loi ngay sinh
    if(empty($cb_doan['ngsinh']))
    {
        $error['no_ngsinh'] = $lang_module['no_ngsinh'];
    }
    elseif(strlen($cb_doan['ngsinh']) != 10 )
    {
        $error['format_ngsinh'] = $lang_module['format_ngsinh'];
    }
	else 
	{
        if ( preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $cb_doan['ngsinh'], $m ) )
        {
            $cb_doan['ngsinh'] = mktime( 0, 0, 0, $m[2], $m[1], $m[3] );
        }
        else
        {
            $cb_doan['ngsinh'] = 0;
        }
	}
    
    //Check loi ngay vao doan
    if(!empty($cb_doan['nvdoan']) )
    {
    	if( strlen($cb_doan['nvdoan']) != 10 )
		{
			$error['format_nvdoan'] = $lang_module['format_nvdoan'];	
		}
		else {
	        if ( preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $cb_doan['nvdoan'], $m ) )
	        {
	            $cb_doan['nvdoan'] = mktime( 0, 0, 0, $m[2], $m[1], $m[3] );
	        }
	        else
	        {
	            $cb_doan['nvdoan'] = 0;
	        }
		}
    }
	else {
		$cb_doan['nvdoan'] = 0;
	}
    
    //Check loi ngay vao dang
    if($cb_doan['dang'] == 0 )
    {
    	if( ! empty( $cb_doan['nvdang'] ) ) 
		{
			$error['no_dang'] = $lang_module['no_dang'];	
		}
		$cb_doan['nvdang'] = 0;
    }
	else
	{
		if( ! empty( $cb_doan['nvdang'] ) )
		{
			if( strlen($cb_doan['nvdang']) != 10 )
			{
				$error['format_nvdang'] = $lang_module['format_nvdang'];	
			}
			else 
			{
		        if ( preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $cb_doan['nvdang'], $m ) )
		        {
		            $cb_doan['nvdang'] = mktime( 0, 0, 0, $m[2], $m[1], $m[3] );
		        }
		        else
		        {
		            $cb_doan['nvdang'] = 0;
		        }
			}
		}
		else
		{
			$cb_doan['nvdang'] = 0;
		}
	}
    
    //Check loi don vi
    if($cb_doan['madvi'] == "")
    {
        $error['no_dvi'] = $lang_module['no_dvi'];
    }
    
    //Check loi chuc vu
    if($cb_doan['macvu1'] == "")
    {
        $error['no_cvu'] = $lang_module['no_cvu'];
    }
    elseif($cb_doan['macvu1'] == $cb_doan['macvu2'] OR $cb_doan['macvu1'] == $cb_doan['macvu3'] OR !empty($cb_doan['macvu2']) && !empty($cb_doan['macvu3']) 
    && $cb_doan['macvu2'] == $cb_doan['macvu3'])
    {
        $error['tr_cvu'] = $lang_module['tr_cvu'];
    }
    
    //Kiem tra dinh dang email
    $pattern = '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/';
    $mailStr = $cb_doan['email'];
    if(( !empty($cb_doan['email']) && preg_match($pattern, $mailStr)==0) ) 
    {
        $error['format_email'] = $lang_module['format_email'];
    }
    
    //Kiem tra so dien thoai
    if(!empty($cb_doan['phone']) && strlen($cb_doan['phone']) <10  or !empty($cb_doan['phone']) && !is_numeric($cb_doan['phone']))
    {
        $error['format_phone'] = $lang_module['format_phone'];
    }
    
    if(empty($error))
    {
		
    $sql = "UPDATE " . NV_PREFIXLANG . "_" . $module_data . " SET
            hoten = '" . $cb_doan['ten'] . "',
            ngsinh = '" . $cb_doan['ngsinh'] . "',
            gtinh = '" . $cb_doan['gt'] . "',
            avt = '" . $cb_doan['avt'] . "',
            nvdoan = '" . $cb_doan['nvdoan'] . "',            
            dang = '" . $cb_doan['dang'] . "',
            nvdang = '" . $cb_doan['nvdang'] . "',            
            quequan = '" . $cb_doan['que'] . "',
            diachi = '" . $cb_doan['diachi'] . "',
            madvi = '" . $cb_doan['madvi'] . "',
            macvu1 = '" . $cb_doan['macvu1'] . "',
            macvu2 = '" . $cb_doan['macvu2'] . "',
            macvu3 = '" . $cb_doan['macvu3'] . "',
            email = '" . $cb_doan['email'] . "',
            yahoo = '" . $cb_doan['yahoo'] . "',
            skype = '" . $cb_doan['skype'] . "',
            phone = '" . $cb_doan['phone'] . "',
            website = '" . $cb_doan['web'] . "',
            tomtat = '" . $bodytext . "' WHERE id = '".$cb_doan['id']."'";      
    $result = $db->query($sql);
    
    if($result)
    {
        Header("Location:" . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "");
    }
	
    }
	
	
}


//Lay danh sach cac don vi
$donvi = getDonvi();

foreach($donvi as $list_dv)
{
    foreach ($cbdoan as $cb)
    {
        $xtpl->assign('LIST_DV', $list_dv);
        $xtpl->assign('SELECTED', $list_dv['madvi'] == $cb['madvi'] ? 'selected=\"selected\"' : '');
        $xtpl->parse( 'main.dv' );
    }
}


//Lay danh sach chuc vu
$chucvu = getChucvu();
foreach($chucvu as $list_cv)
{
    foreach($cbdoan as $cb)
    {
        $xtpl->assign('LIST_CV', $list_cv);
        $xtpl->assign('SELECTED', $list_cv['macvu'] == $cb['macvu1'] ? 'selected=\"selected\"' : '');
        $xtpl->parse( 'main.cv1' );
		$xtpl->assign('SELECTED', $list_cv['macvu'] == $cb['macvu2'] ? 'selected=\"selected\"' : '');
        $xtpl->parse( 'main.cv2' );
		$xtpl->assign('SELECTED', $list_cv['macvu'] == $cb['macvu3'] ? 'selected=\"selected\"' : '');
        $xtpl->parse( 'main.cv3' );
    }
}

foreach ($cbdoan AS $cb)
{
	if( $cb['ngsinh'] )
	{
		$cb['ngsinh'] = nv_date( 'd/m/Y', $cb['ngsinh'] );	
	}
	else {
		$cb['ngsinh'] = "";
	}
	if( $cb['nvdoan'] )
	{
		$cb['nvdoan'] = nv_date( 'd/m/Y', $cb['nvdoan'] );	
	}
	else {
		$cb['nvdoan'] = "";
	}
	if( $cb['nvdang'] )
	{
		$cb['nvdang'] = nv_date( 'd/m/Y', $cb['nvdang'] );	
	}
	else {
		$cb['nvdang'] = "";
	}
	if( defined( 'NV_EDITOR' ) and nv_function_exists( 'nv_aleditor' ) )
	{
		$data  = nv_aleditor( "tt", '99%', '300px', $cb['tt'] );
	}
	else
	{
		$data = "<textarea style=\"width: 99%\" name=\"tt\" id=\"tt\" cols=\"20\" rows=\"8\">" . $cb['tt'] . "</textarea>";
	}
    $xtpl->assign( 'CBDOAN', $cb);
	$xtpl->assign( 'bodytext', $data );
}

foreach($error as $errors)
{
    $xtpl->assign( 'ERROR', $errors );
    $xtpl->parse ( 'main.loop' );
}

$xtpl->assign( 'BROWSER', NV_BASE_ADMINURL . 'index.php?' . NV_NAME_VARIABLE . '=upload&popup=1&area=" + area+"&path="+path+"&type="+type, "NVImg", "850", "400","resizable=no,scrollbars=no,toolbar=no,location=no,status=no' );
$xtpl->assign( 'PATH', NV_UPLOADS_DIR . '/' . $module_name . "" );

$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_admin_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

