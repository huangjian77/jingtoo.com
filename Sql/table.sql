-- 创建表-
-- 栏目表
CREATE TABLE IF NOT EXISTS `tb_cms_category` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `parent_id` INT(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '父类ID',
  `name` VARCHAR(50) NOT NULL DEFAULT '' COMMENT '分类名称',
  `display_order` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0' COMMENT '排序值',
  `is_show` TINYINT(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '是否显示',
  `url` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '访问该栏目的url',
  `content_type` TINYINT(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '分类展示的内容的类型',
  `link_url` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `link_target` VARCHAR(50) NOT NULL DEFAULT '' COMMENT '链接的目标',
  `article_id` INT(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '显示文章的id',
  `keyword` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '分类的关键字',
  `description` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '分类的描述',
  `created_at` INT(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
)
-- 文章列表
CREATE TABLE IF NOT EXISTS `tb_cms_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父类ID',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '分类名称',
  `display_order` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '排序值',
  `is_show` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否显示',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '访问该栏目的url',
  `content_type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '分类展示的内容的类型',
  `link_url` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `link_target` varchar(50) NOT NULL DEFAULT '' COMMENT '链接的目标',
  `article_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '显示文章的id',
  `keyword` varchar(255) NOT NULL DEFAULT '' COMMENT '分类的关键字',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '分类的描述',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;
