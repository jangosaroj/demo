<?php

class Migration_add_table_info extends CI_Migration {


		public function up() {
			$fields = array(

			'first_name' => array(
				'type' => 'varchar',
				'constraint' => 40,
				
			),

			'id' => array(
				'type' => 'int',
				'constraint' => 40,
				'auto_increment' => true,
			),



			'last_name'=>array(
				'type'=> 'varchar',
				'constraint'=> 64,
			),

			'email'=>array(
				'type'=> 'varchar',
				'constraint'=> 64,
			),
			'member_password'=>array(
				'type'=> 'varchar',
				'constraint'=> 64,

		));

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', true);

		$this->dbforge->create_table('info');

		}

		public function down() {
				$this->dbforge->drop_table('info');

	}


}