<?php

/**
 * @Project NUKEVIET 3.x
 * @Author hongoctrien (01692777913@yahoo.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @Copyright (C) 2012 2mit.org. All rights reserved
 * @Createdate 19-07-2012 14:43
 */

if( ! defined( 'NV_SYSTEM' ) ) die( 'Stop!!!' );

define( 'NV_IS_MOD_CBDOAN', true );
require_once NV_ROOTDIR . "/modules/" . $module_name . '/global.functions.php';


	$count_op = sizeof( $array_op );

	if( ! empty( $array_op ) and $op == "main" )
	{	
		$op = "main";
		if( $count_op == 1 )
		{
			$array_page = explode( "-", $array_op[0] );
			
			$id = intval( $array_page[0] );
			
			$number = strlen( $id ) + 1;
			$alias_url = substr( $array_op[0], 0, -$number );
			
			if( $id > 0 and $alias_url != "" )
			{
				//var_dump($alias_url);
				$op = "detail";
			}
		}
	}

