<?php

class Migration_members_remove_column_member_password extends CI_Migration {


		public function up() {
		

			$this->db->query('ALTER TABLE members DROP COLUMN member_password ');

		}

		public function down() {
			//	$this->dbforge->drop_table('user');
			$this->db->query('ALTER TABLE members ADD COLUMN member_password varchar(20) ');

		}



}