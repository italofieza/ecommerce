<?php
use \Hcode\Page;
use \Hcode\Model\Product;
$app->get('/', function() {
    $page = Product::listALL();
	$page = new Page();
	$page->setTpl("index", [
		'products'=>$product::checklist($products)
	]);
});
 ?>