<?php

class Migration_Add_last_login_at_to_info extends CI_Migration {


		public function up() {
		

			$this->db->query('ALTER TABLE info ADD COLUMN last_login_at datetime ');

		}

		public function down() {
			//	$this->dbforge->drop_table('user');
			$this->db->query('ALTER TABLE info drop COLUMN last_login_at ');

		}






















}