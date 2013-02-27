<?php

class Migration_Add_last_login_at_to_user extends CI_Migration {


		public function up() {
		

			$this->db->query('ALTER TABLE user ADD COLUMN last_login_at datetime ');

		}

		public function down() {
			//	$this->dbforge->drop_table('user');
			$this->db->query('ALTER TABLE user drop COLUMN last_login_at ');

		}






















}