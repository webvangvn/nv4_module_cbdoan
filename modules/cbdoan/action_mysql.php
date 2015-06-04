<?php

/**
 * @Project NUKEVIET 4.x
 * @Author hongoctrien (01692777913@yahoo.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @Copyright (C) 2012 2mit.org. All rights reserved
 * @Createdate 19-07-2012 14:43
 */

if( ! defined( 'NV_IS_FILE_MODULES' ) ) die( 'Stop!!!' );

$sql_drop_module = array();

$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_donvi";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_chucvu";

$sql_create_module = $sql_drop_module;

//Danh sach can bo doan
$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . " (
  id int(3) NOT NULL AUTO_INCREMENT,
  hoten varchar(40) NOT NULL,
  ngsinh varchar(10) NOT NULL,
  gtinh int(1) default 1,
  avt varchar(255),
  nvdoan varchar(10),
  dang int(1) DEFAULT '0',
  nvdang varchar(10),
  quequan varchar(255),
  diachi varchar(255),
  madvi int(3) NOT NULL,
  macvu1 int(3) NOT NULL,
  macvu2 int(3) NOT NULL,
  macvu3 int(3) NOT NULL,
  email varchar(40),
  yahoo varchar(50),
  skype varchar(50),
  phone varchar(12),
  website varchar(50),
  tomtat varchar(255),
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_donvi (
  madvi int(3) NOT NULL AUTO_INCREMENT,
  tendonvi varchar(100) NOT NULL,
  gt_dv varchar(255),
  PRIMARY KEY (madvi)
) ENGINE=MyISAM DEFAULT CHARSET=utf8";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_chucvu (
  macvu int(3) NOT NULL AUTO_INCREMENT,
  tenchucvu varchar(100) NOT NULL,
  gt_cv varchar(255),
  PRIMARY KEY (macvu)
) ENGINE=MyISAM DEFAULT CHARSET=utf8";


$data = array();
$data['toplip'] = 1;
$data['per_page'] = '30';
$data['search'] = 1;
foreach ( $data as $config_name => $config_value )
{
    $sql_create_module[] = "REPLACE INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES('" . $lang . "', '" . $module_name . "', '" . $config_name . "', '" . $config_value . "')";
}