<?php
use \Hcode\Page;
use \Hcode\Model\Product;
use \Hcode\Model\Category;
$app->get('/', function() {
    $page = Product::listALL();
	$page = new Page();
	$page->setTpl("index", [
		'products'=>$product::checklist($products)
	]);
});
$app->get("/categories/:idcategory", function($idcategory){
	$category = new Category();
	$category->get((int)$idcategory);
	$page = new Page();
	$page->setTpl("category", [
		'category'=>$category->getValues(),
		'products'=>Product::checkList($category->getProducts()
	]);
});
 ?>