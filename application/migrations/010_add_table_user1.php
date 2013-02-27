<?php

class Migration_Add_table_user1 extends CI_Migration {


		public function up() {
			$fields = array(



				'id' => array(
				'type' => 'int',
				'constraint' => 40,
				'auto_increment' => true,

			),

			'username' => array(
				'type' => 'varchar',
				'constraint' => 40,
				//'auto_increment' => true,
			),

			

			'password'=>array(
				'type'=> 'varchar',
				'constraint'=> 64,
			),

			'last_login_at'=>array(
				'type'=> 'datetime',
				
		));

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', true);

		$this->dbforge->create_table('user1');

		}

		public function down() {
				$this->dbforge->drop_table('user1');

	}


}