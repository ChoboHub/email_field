<?php

	Class extension_Email_Field extends Extension{

		public function uninstall(){
			Symphony::Database()->query("DROP TABLE `tbl_fields_email`");
		}

		public function install(){
			return Symphony::Database()->query("
				CREATE TABLE `tbl_fields_email` (
					`id` int(11) unsigned NOT NULL auto_increment,
					`field_id` int(11) unsigned NOT NULL,
					`validator` varchar(255) default NULL,
					PRIMARY KEY  (`id`),
					KEY `field_id` (`field_id`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
			");
		}

		public function update($previousVersion = false){

			if (version_compare($previousVersion, '1.2.2', '<=')) {
				Symphony::Database()->query(
					"ALTER TABLE `tbl_fields_email`
					ADD COLUMN `validator` varchar(255) default NULL;"
				);
			}

		}
	}
