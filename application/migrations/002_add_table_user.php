<?php

class Migration_Add_table_user extends CI_Migration {


		public function up() {
			$fields = array(

			'first_name' => array(
				'type' => 'varchar',
				'constraint' => 40,
				//'auto_increment' => true,
			),



				'id' => array(
				'type' => 'int',
				'constraint' => 40,
				'auto_increment' => true,

			),



			'last_name'=>array(
				'type'=> 'varchar',
				'constraint'=> 64,
					

		));

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', true);

		$this->dbforge->create_table('user');

		}

		public function down() {
				$this->dbforge->drop_table('user');

		}






















}