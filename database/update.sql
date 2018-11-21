ALTER TABLE `tbl_post_requirement` CHANGE `is_logistic` `is_logistic` INT(2) NOT NULL COMMENT '1=No, 2=Yes';

ALTER TABLE `tbl_post_requirement` CHANGE `certification_id` `certification_id` VARCHAR(150) NOT NULL;

ALTER TABLE `tbl_post_requirement` CHANGE `is_verified` `is_verified` INT(2) NOT NULL COMMENT '1= Verified, 0= Not Verified';

ALTER TABLE `tbl_post_requirement` ADD `user_id` INT(11) NOT NULL AFTER `product_id`, ADD INDEX `fk_user_id` (`user_id`);