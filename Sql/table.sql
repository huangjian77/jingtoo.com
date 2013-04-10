-- 创建表-
-- 后台管理员表
CREATE TABLE `jt_admin` (
  `id` INT(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `login_name` VARCHAR(32) NOT NULL  COMMENT '管理员登陆名',
  `name` VARCHAR(32) NOT NULL COMMENT '管理员登陆密码',
  `password` VARCHAR(32) COMMENT 'md5',
  `last_time` DATETIME,
  `last_ip` VARCHAR(15) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MYISAM DEFAULT CHARSET=utf8 COMMENT='后台管理员表'
-- 栏目表
CREATE TABLE IF NOT EXISTS `jt_cms_category` (
  `id` INT(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `parent_id` INT(10) NOT NULL DEFAULT '0' COMMENT '父类ID',
  `name` VARCHAR(50) NOT NULL DEFAULT '' COMMENT '分类名称',
  `display_order` VARCHAR(50) NOT NULL DEFAULT '0' COMMENT '排序值',
  `is_show` TINYINT(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '是否显示',
  `url` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '访问该栏目的url',
  `content_type` TINYINT(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '分类展示的内容的类型 文章列表、指定文章、内部链接、外部连接',
  `link_url` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `link_target` VARCHAR(50) NOT NULL DEFAULT '' COMMENT '链接的目标',
  `article_id` INT(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '显示文章的id',
  `keyword` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '分类的关键字',
  `description` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '分类的描述',
  `created_at` DATETIME NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MYISAM  DEFAULT CHARSET=utf8 COMMENT='栏目表';
-- 文章列表
CREATE TABLE IF NOT EXISTS `jt_cms_article` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '标题',
  `short_title` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '短标题',
  `category_id` INT(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '所属栏目ID',
  `source` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '来源',
  `author_id` INT(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '作者',
  `author` VARCHAR(50) NOT NULL DEFAULT '' COMMENT '作者ID',
  `keyword` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '文章关键字',
  `description` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '文章描述',
  `views` INT(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `display_order` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0' COMMENT '排序值',
  `is_show` TINYINT(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '是否显示',
  `created_at` DATETIME NOT NULL COMMENT '创建时间',
  `updated_at` DATETIME NOT NULL COMMENT '最后更新时间',
  `picture` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '缩略图地址',
  `content` TEXT NOT NULL COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=MYISAM  DEFAULT CHARSET=utf8 COMMENT='文章列表';
-- 友情连接表
CREATE TABLE IF NOT EXISTS `jt_site_friendlink` (
  `id` INT(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '名称',
  `url` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '地址',
  `display_order` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0' COMMENT '排序值',
  `logo_url` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'logo地址',
  `logo_pic` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'logo上传图片地址',
  `description` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '网站描述',
  `owner_email` VARCHAR(50) NOT NULL DEFAULT '' COMMENT '站长email',
  `created_at` DATETIME NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MYISAM  DEFAULT CHARSET=utf8;
-- 站点广告位表
CREATE TABLE `jt_site_ad` (
  `name` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '广告位标识',
  `title` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '广告位名称',
  `code` TEXT NOT NULL COMMENT '代码',
  `default_code` TEXT NOT NULL COMMENT '默认代码',
  `start_at` INT(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '开始时间',
  `end_at` INT(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '结束时间',
  `created_at` DATETIME NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`name`)
) ENGINE=MYISAM DEFAULT CHARSET=utf8 COMMENT='站点广告位表';

INSERT  INTO `jt_site_ad`(`name`,`title`,`code`,`default_code`,`start_at`,`end_at`,`created_at`) VALUES 
  ('ad_index_header_slider','首页头部图片轮播','','',0,0,0)
  ,('ad_index_about_me','底部京图简介','','',0,0,0);
