<?php
use \Hcode\Page;
use \Hcode\Model\Product;
use \Hcode\Model\Category;
use \Hcode\Model\Cart;
$app->get('/', function() {
    $page = Product::listALL();
	$page = new Page();
	$page->setTpl("index", [
		'products'=>$product::checklist($products)
	]);
});
$app->get("/categories/:idcategory", function($idcategory){
	$page = (isset($_GET)) ? (int)$_GET['page']: 1;
	$category = new Category();
	$category->get((int)$idcategory);
	$pagination = $category->getProductsPage($page);
	$pages = [];
	for ($i=1; $i <= $pagination['pages']; $i++){
		array_push($pages, [
			'link' =>'/categories/'.$category->geitidcategory().'?pages='.$i,
			'page'=>$i
		]);
	}
	$page = new Page();
	$page->setTpl("category", [
		'category'=>$category->getValues(),
		'products'=>($pagination["data"])
	]);
});
$app->get("/products/:desurl", function($desurl){
	$product = new Product();
	$product->getFromURL($desurl);
	$page->setTpl("product-detail", [
		'product'=>$product->getValues(),
		'categories'=>$product->getCategoies()
	]);
});
$app->get("/cart", function(){
	$cart = Cart::getFromSession();
	$page = new Page();
	$page->setTpl("cart");
});
 ?>