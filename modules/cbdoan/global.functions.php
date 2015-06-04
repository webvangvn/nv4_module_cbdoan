<?php

/**
 * @Project NUKEVIET 4.x
 * @Author hongoctrien (01692777913@yahoo.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @Copyright (C) 2012 2mit.org. All rights reserved
 * @Createdate 19-07-2012 14:43
 */

if( ! defined( 'NV_MAINFILE' ) ) die( 'Stop!!!' );

//Hien thi danh sach don vi
function getDonvi()
{
   global $module_data, $db;
   $donvi = array();
   
   $result = $db->query( "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_donvi");
   while ( $row = $result->fetch() )
   {
      $donvi[] = array (
         "madvi" => $row['madvi'],
         "tendvi" => $row['tendonvi'],
         "gt_dv" => $row['gt_dv']
      );
   }
   return $donvi ;
}

//Hien thi danh sach chuc vu
function getChucvu()
{
   global $module_data, $db;
   $chucvu = array();
   
   $result = $db->query( "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_chucvu");
   while ( $row = $result->fetch() )
   {
      $chucvu[] = array (
         "macvu" => $row['macvu'],
         "tenchucvu" => $row['tenchucvu'],
         "gt_cv" => $row['gt_cv']
      );
   }
   return $chucvu;
}


