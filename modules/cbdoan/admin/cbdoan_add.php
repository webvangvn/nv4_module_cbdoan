<?php

/**
 * @Project NUKEVIET 4.x
 * @Author hongoctrien (01692777913@yahoo.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @Copyright (C) 2012 2mit.org. All rights reserved
 * @Createdate 19-07-2012 14:43
 */

if( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$page_title = $lang_module['cbdoan_add'];
global $global_config, $file_name;

if( defined( 'NV_EDITOR' ) )
{
	require_once ( NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php' );
}

$xtpl = new XTemplate( "cbdoan_add.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'GLANG', $lang_global );

$my_head = "<script type=\"text/javascript\" src=\"" . NV_BASE_SITEURL . "js/popcalendar/popcalendar.js\"></script>\n";

$url = NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=" . $op . "";
$xtpl->assign( 'ACTION', $url );

$op = $nv_Request->get_string ('op', 'get','');

$donvi = getDonvi();
$chucvu = getChucvu();

if(empty($donvi))
{
    Header("Location:" . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=donvi_add");
}

if(empty($chucvu))
{
    Header("Location:" . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=chucvu_add");
}

$cbdoan = array();

$cbdoan['ten'] = "";
$cbdoan['ngsinh'] = "";
$cbdoan['gt'] = 1;    
$cbdoan['avt'] = "";
$cbdoan['nvdoan'] = "";    
$cbdoan['dang'] = 0;
$cbdoan['nvdang'] = "";    
$cbdoan['que'] = "";
$cbdoan['diachi'] = "";
$cbdoan['madvi'] = "";
$cbdoan['macvu1'] = "";
$cbdoan['macvu2'] = "";
$cbdoan['macvu3'] = "";
$cbdoan['email'] = "";
$cbdoan['yahoo'] = "";
$cbdoan['skype'] = "";
$cbdoan['phone'] = "";
$cbdoan['web'] = "";
$cbdoan['tt'] = "";

$error = array();

if ( $nv_Request->get_int( 'save', 'post' ) == 1 )
{
    //dua thong tin tu form vao mang
    $cbdoan['ten'] = $nv_Request->get_string ('ten', 'post','');
    $cbdoan['ngsinh'] = $nv_Request->get_string ('ngsinh', 'post',0);
    $cbdoan['gt'] = $nv_Request->get_int ('gt', 'post', 1); 
    $cbdoan['avt'] = $nv_Request->get_string ('avt', 'post','');
    $cbdoan['nvdoan'] = $nv_Request->get_string ('nvdoan', 'post',0);    
    $cbdoan['dang'] = $nv_Request->get_string ('dang', 'post','');
    $cbdoan['nvdang'] = $nv_Request->get_string ('nvdang', 'post',0);    
    $cbdoan['que'] = $nv_Request->get_string ('que', 'post','');
    $cbdoan['diachi'] = $nv_Request->get_string ('diachi', 'post','');
    $cbdoan['madvi'] = $nv_Request->get_int ('madvi', 'post',0);
    $cbdoan['macvu1'] = $nv_Request->get_int ('macvu1', 'post',0);
    $cbdoan['macvu2'] = $nv_Request->get_int ('macvu2', 'post',0);
    $cbdoan['macvu3'] = $nv_Request->get_int ('macvu3', 'post',0);
    $cbdoan['email'] = $nv_Request->get_string ('email', 'post','');
    $cbdoan['yahoo'] = $nv_Request->get_string ('yahoo', 'post','');
    $cbdoan['skype'] = $nv_Request->get_string ('skype', 'post','');
    $cbdoan['phone'] = $nv_Request->get_string ('phone', 'post','');
    $cbdoan['web'] = $nv_Request->get_string ('web', 'post','');
    $bodytext = $nv_Request->get_string( 'tt', 'post','' );
	$cbdoan['tt'] = defined( 'NV_EDITOR' ) ? nv_editor_br2nl( $bodytext, '' ) : nv_editor_br2nl( nv_htmlspecialchars( strip_tags( $bodytext ) ), '<br />' );
   
    //Dinh dang dia chi web
    if ( ! empty( $cbdoan['web'] ) )
    {
        if ( ! preg_match( "#^(http|https|ftp|gopher)\:\/\/#", $cbdoan['web'] ) )
        {
            $cbdoan['web'] = "http://" . $cbdoan['web'];
        }
        if ( ! nv_is_url( $cbdoan['web'] ) )
        {
            $cbdoan['web'] = "";
        }
    }
    
    //Xu ly cac ky tu xuong dong trong textarea
    $cbdoan['tt'] = nv_nl2br( $cbdoan['tt'], "<br />" );

    //Kiem tra loi
    //Check loi ten can bo
    if(empty($cbdoan['ten']))
    {
        $error['no_name'] = $lang_module['no_name'];
    }

    //Check loi ngay sinh
    if(empty($cbdoan['ngsinh']))
    {
        $error['no_ngsinh'] = $lang_module['no_ngsinh'];
    }
    elseif(strlen($cbdoan['ngsinh']) != 10 )
    {
        $error['format_ngsinh'] = $lang_module['format_ngsinh'];
    }
	else 
	{
        if ( preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $cbdoan['ngsinh'], $m ) )
        {
            $cbdoan['ngsinh'] = mktime( 0, 0, 0, $m[2], $m[1], $m[3] );
        }
        else
        {
            $cbdoan['ngsinh'] = 0;
        }
	}
    
    //Check loi ngay vao doan
    if(!empty($cbdoan['nvdoan']) )
    {
    	if( strlen($cbdoan['nvdoan']) != 10 )
		{
			$error['format_nvdoan'] = $lang_module['format_nvdoan'];	
		}
		else {
	        if ( preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $cbdoan['nvdoan'], $m ) )
	        {
	            $cbdoan['nvdoan'] = mktime( 0, 0, 0, $m[2], $m[1], $m[3] );
	        }
	        else
	        {
	            $cbdoan['nvdoan'] = 0;
	        }
		}
    }
	else {
		$cbdoan['nvdoan'] = 0;
	}
  
    //Check loi ngay vao dang
    if($cbdoan['dang'] == 0 )
    {
    	if( ! empty( $cbdoan['nvdang'] ) ) 
		{
			$error['no_dang'] = $lang_module['no_dang'];	
		}
		$cbdoan['nvdang'] = 0;
    }
	else
	{
		if( ! empty( $cbdoan['nvdang'] ) )
		{
			if( strlen($cbdoan['nvdang']) != 10 )
			{
				$error['format_nvdang'] = $lang_module['format_nvdang'];	
			}
			else 
			{
		        if ( preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $cbdoan['nvdang'], $m ) )
		        {
		            $cbdoan['nvdang'] = mktime( 0, 0, 0, $m[2], $m[1], $m[3] );
		        }
		        else
		        {
		            $cbdoan['nvdang'] = 0;
		        }
			}
		}
		else
		{
			$cbdoan['nvdang'] = 0;
		}
	}
	
    //Check loi don vi
    if($cbdoan['madvi'] == "")
    {
        $error['no_dvi'] = $lang_module['no_dvi'];
    }
    
    //Check loi chuc vu
    if($cbdoan['macvu1'] == "")
    {
        $error['no_cvu'] = $lang_module['no_cvu'];
    }
    elseif($cbdoan['macvu1'] == $cbdoan['macvu2'] OR $cbdoan['macvu1'] == $cbdoan['macvu3'] OR !empty($cbdoan['macvu2']) && !empty($cbdoan['macvu3']) 
    && $cbdoan['macvu2'] == $cbdoan['macvu3'])
    {
        $error['tr_cvu'] = $lang_module['tr_cvu'];
    }
    
    //Kiem tra dinh dang email
    $pattern = '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/';
    $mailStr = $cbdoan['email'];
    if(( !empty($cbdoan['email']) && preg_match($pattern, $mailStr)==0) ) 
    {
        $error['format_email'] = $lang_module['format_email'];
    }
    
    //Kiem tra so dien thoai
    if(!empty($cbdoan['phone']) && strlen($cbdoan['phone']) <10  or $cbdoan['phone'] && !is_numeric($cbdoan['phone']))
    {
        $error['format_phone'] = $lang_module['format_phone'];
    }
   
	///////////////////////////////////////
    if(empty($error))
    {
		$sql = 'INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '
				( hoten, ngsinh, gtinh, avt, nvdoan, dang, nvdang, quequan, diachi, madvi, macvu1, macvu2, macvu3, email, yahoo, skype, phone, website, tomtat) VALUES (
				 :hoten,
				 :ngsinh,
				 :gtinh,
				 :avt,
				 :nvdoan,
				 :dang,
				 :nvdang,
				 :quequan,
				 :diachi,
				 :madvi,
				 :macvu1,
				 :macvu2,
				 :macvu3,
				 :email,
				 :yahoo,
				 :skype,
				 :phone,
				 :website,
				 :tomtat)';

			$data_insert = array();
			$data_insert['hoten'] = $cbdoan['ten'];
			
			$data_insert['ngsinh'] = $cbdoan['ngsinh'];
			$data_insert['gtinh'] = $cbdoan['gt'];
			$data_insert['avt'] = $cbdoan['avt'];
			$data_insert['nvdoan'] = $cbdoan['nvdoan'];
			$data_insert['dang'] = $cbdoan['dang'];
			$data_insert['nvdang'] = $cbdoan['nvdang'];
			$data_insert['quequan'] = $cbdoan['que'];
			$data_insert['diachi'] = $cbdoan['diachi'];
			$data_insert['madvi'] = $cbdoan['madvi'];
			$data_insert['macvu1'] = $cbdoan['macvu1'];
			$data_insert['macvu2'] = $cbdoan['macvu2'];
			$data_insert['macvu3'] = $cbdoan['macvu3'];
			$data_insert['email'] = $cbdoan['email'];
			$data_insert['yahoo'] = $cbdoan['yahoo'];
			$data_insert['skype'] = $cbdoan['skype'];
			$data_insert['phone'] = $cbdoan['phone'] ;
			$data_insert['website'] = $cbdoan['web'];
			$data_insert['tomtat'] = $cbdoan['tt'];
			$kq = $db->insert_id( $sql, 'id', $data_insert );
            if($kq)
            {
                Header("Location:" . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name );
            }
            else
            {
                $error['csdl'] = $lang_module['csdl'];
            }
    }
}
else
{
    $cbdoan['dang'] = 0;
    $cbdoan['gt'] = 1;
}

$cbdoan['dang1'] = $cbdoan['dang'] ? " checked=\"checked\"" : "";
$cbdoan['gt1'] = $cbdoan['gt'] ? " checked=\"checked\"" : "";

//Lay danh sach cac don vi
foreach($donvi as $list_dv)
{
	$xtpl->assign('SELECTED', $list_dv['madvi'] == $cbdoan['madvi'] ? 'selected=\"selected\"' : '' );
    $xtpl->assign('LIST_DV', $list_dv);
    $xtpl->parse( 'main.dv' );
}

//Lay danh sach chuc vu
foreach($chucvu as $list_cv)
{
    $xtpl->assign('LIST_CV', $list_cv);
	$xtpl->assign('SELECTED', $list_cv['macvu'] == $cbdoan['macvu1'] ? 'selected=\"selected\"' : '' );
    $xtpl->parse( 'main.cv1' );
	$xtpl->assign('SELECTED', $list_cv['macvu'] == $cbdoan['macvu2'] ? 'selected=\"selected\"' : '' );
    $xtpl->parse( 'main.cv2' );
	$xtpl->assign('SELECTED', $list_cv['macvu'] == $cbdoan['macvu3'] ? 'selected=\"selected\"' : '' );
    $xtpl->parse( 'main.cv3' );
}

if( $cbdoan['ngsinh'] )
{
	$cbdoan['ngsinh'] = nv_date( 'd/m/Y', $cbdoan['ngsinh'] );	
}

if( $cbdoan['nvdoan'] )
{
	$cbdoan['nvdoan'] = nv_date( 'd/m/Y', $cbdoan['nvdoan'] );	
}

if( $cbdoan['nvdang'] )
{
	$cbdoan['nvdang'] = nv_date( 'd/m/Y', $cbdoan['nvdang'] );	
}
if( defined( 'NV_EDITOR' ) and nv_function_exists( 'nv_aleditor' ) )
	{
		$data  = nv_aleditor( "tt", '99%', '300px', $cbdoan['tt'] );
	}
	else
	{
		$data = "<textarea style=\"width: 99%\" name=\"tt\" id=\"tt\" cols=\"20\" rows=\"8\">" . $cbdoan['tt'] . "</textarea>";
	}

$xtpl->assign( 'CBDOAN', $cbdoan );
$xtpl->assign( 'bodytext', $data );

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

