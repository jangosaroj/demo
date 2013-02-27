<?php

class MyModel extends ActiveRecord\Model {

	public static $table_name = 'table1';
	public static $primary_key = 'id';
	
	public static function getrecords() {


		$data = self::find('all');
		return $data;




	}




}

