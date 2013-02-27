<?php

class Migration_Add_table_member1 extends CI_Migration {


		public function up() {
			$fields = array(


			'id' => array(
				'type' => 'int',
				'constraint' => 40,
				'auto_increment' => true,

			),


			'first_name' => array(
				'type' => 'varchar',
				'constraint' => 40,
				//'auto_increment' => true,
			),


			'last_name'=>array(
				'type'=> 'varchar',
				'constraint'=> 64,
			),

			'email'=>array(
				'type'=> 'varchar',
				'constraint'=> 64,
			));

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', true);

		$this->dbforge->create_table('member1');

		}

		public function down() {
				$this->dbforge->drop_table('member1');

	}


}