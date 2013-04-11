<?php
class CmsArticleViewModel extends ViewModel{
	/**
	 * SELECT CmsArticle.id AS id,CmsArticle.title AS title,
     * CmsArticle.source AS source,CmsArticle.keyword AS keyword,
     * CmsArticle.description AS description,CmsArticle.is_show AS is_show,
     * CmsArticle.created_at AS created_at,CmsArticle.content AS content,
     * CmsCategory.name AS category_name,Admin.name AS author 
     *      FROM jt_cms_article CmsArticle 
     *    JOIN jt_cms_category CmsCategory ON CmsArticle.category_id=CmsCategory.id 
     *    JOIN jt_admin Admin ON CmsArticle.author_id=Admin.id ORDER BY CmsArticle.display_order ASC
	 * @var unknown_type
	 */
	public $viewFields = array(
	   'CmsArticle'=>array('id','title','views','source','keyword','description','is_show','created_at','content'),
	   'CmsCategory'=>array('name'=>'category_name','_on'=>'CmsArticle.category_id=CmsCategory.id'),
	   'Admin'=>array('name'=>'writer','_on'=>'CmsArticle.author_id=Admin.id')
	);
}
?>