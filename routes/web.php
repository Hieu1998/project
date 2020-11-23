<?php
Route::get('/', function () {
	return view('welcome');
});

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
//thay doi ngon ngu
Route::group(['middleware' => ['lang']], function() {
Route::group(['middleware' => ['CheckRole']], function () {
	//menu
	Route::get('quanlymenu', 'MenuController@index')->name('quanlymenu');
	Route::post('/createmenu', 'MenuController@create')->name('createmenu');
	Route::get('/xoamenu/{id}', 'MenuController@destroy')->name('xoamenu');
	Route::get('/suamenu/{id}','MenuController@edit')->name('suamenu');
	Route::post('/suamenu','MenuController@update')->name('suamenu');
	//quan ly product
	Route::any('/quanlysanpham', 'ProductController@index')->name('quanlysanpham');
	Route::post('/createproduct', 'ProductController@create')->name('createproduct');
	Route::get('/xoasanpham/{id}', 'ProductController@destroy')->name('xoasanpham');
	Route::get('/suasanpham/{id}', 'ProductController@edit')->name('suasanpham');
	Route::post('/suasanpham', 'ProductController@update')->name('suasanpham');
	//quan ly trip
	Route::get('/quanlytrip', 'TripController@index')->name('quanlytrip');
	Route::post('/createtrip', 'TripController@create')->name('createtrip');
	Route::get('/xoatrip/{id}', 'TripController@destroy')->name('xoatrip');
	Route::get('/suatrip/{id}','TripController@edit')->name('suatrip');
	Route::post('/suatrip','TripController@update')->name('suatrip');
	//quan ly bill
	Route::any('/quanlybill', 'BillController@index')->name('quanlybill');
	Route::get('/billdelete/{id}', 'BillController@destroy')->name('billdelete');
	//index admin
	Route::get('/admin', 'AdminController@index')->name('admin');
	//Blog
	Route::any('/quanlyblog', 'BlogController@index')->name('quanlyblog');
	Route::get('/themmoiblog', 'BlogController@create');
	Route::post('/themmoiblog', 'BlogController@store')->name('themmoiblog');
	Route::get('/suablog/{id}', 'BlogController@edit')->name('suablog');
	Route::post('/suablog', 'BlogController@update')->name('suablog');
	Route::get('/xoablog/{id}', 'BlogController@destroy');
	Route::get('/danhmucblog','DanhMucBlogController@index')->name('danhmucblog');
	Route::get('/themdanhmucblog', 'DanhMucBlogController@create');
	Route::post('/themdanhmucblog', 'DanhMucBlogController@show')->name('themdanhmucblog');
	Route::get('/suadanhmucblog/{id}', 'DanhMucBlogController@edit');
	Route::post('/suadanhmucblog', 'DanhMucBlogController@update')->name('suadanhmucblog');
	Route::get('/xoadanhmucblog/{id}', 'DanhMucBlogController@destroy');
	//lien he
	Route::get('/quanlylienhe', 'ContactController@index')->name('quanlylienhe');
	Route::get('/thongtinlienhe', 'ContactController@ThongTinLienHe')->name('thongtinlienhe');
	Route::get('/xoathongtinlienhe/{id}', 'ContactController@XoaThongTinLienHe');
	Route::post('/sualienhe', 'ContactController@edit')->name('sualienhe');
	Route::post('/sendMailContact', 'ContactController@sendMail')->name('sendMailContact');
	//quan ly thong tin
	Route::get('/quanlythongtin', 'InformationController@index')->name('quanlythongtin');
	//quan ly hinh anh
	Route::get('/quanlyhinhanh', 'ImageController@index')->name('quanlyhinhanh');
	Route::get('/themhinhanh', 'ImageController@create')->name('themhinhanh');
	Route::get('/suahinhanh/{id}', 'ImageController@edit')->name('suahinhanh');
	Route::get('/xoahinhanh/{id}', 'ImageController@destroy');
	Route::post('/uploadImage', 'ImageController@upLoad')->name('uploadImage');
	//quan ly About
	Route::get('/quanlyabout', 'AboutController@index')->name('quanlyabout');
	Route::any('/suaabout', 'AboutController@About')->name('suaabout');
	Route::get('/elementor', 'AboutController@AboutElementor')->name('elementor');
	Route::get('/suaelementor/{id}', 'AboutController@SuaAboutElementor');
	Route::post('/suaelementor', 'AboutController@PostAboutElementor')->name('suaelementor');
	Route::get('/questions', 'AboutController@AboutQuestion')->name('questions');
	Route::post('/themquestion', 'AboutController@AddAboutQuestion')->name('themquestion');
	Route::get('/suaquestion/{id}', 'AboutController@EditQuestion');
	Route::post('/suaquestion', 'AboutController@SqlEditQuestion')->name("suaquestion");
	Route::get('/xoaquestion/{id}', 'AboutController@DeleteQuestion');
	//banner
	Route::any('/quanlybanner', 'BannerController@index')->name('quanlybanner');
	Route::get('/thembanner', 'BannerController@create');
	Route::post('/thembanner', 'BannerController@store')->name('thembanner');
	Route::get('/xoabanner/{id}', 'BannerController@destroy');
	Route::get('/activebanner/{id}', 'BannerController@ActiveBanner');
    
});

//index customer
	Route::get('/home', 'HomeController@index')->name('home');
//cloudtrip
	Route::any('/cloudtrip', 'HomeController@cloudTrip')->name('cloudtrip');
//contact 
	Route::get('/contact', 'ContactController@ViewContact')->name('contact');
//blog
	Route::get('/blog', 'BlogController@ViewBlog')->name('blog');
	Route::get('/chitietblog/{id}', 'BlogController@ViewChiTietBlog')->name('chitietblog');
//about 
	Route::get('/about', 'AboutController@ViewAbout')->name('about');
//booking
	Route::get('/detailproduct/{id}', 'ProductController@ViewDetail')->name('detailproduct');
	Route::post('/reviewDetailProduct', 'ProductController@reviewDetailProduct')->name('reviewDetailProduct');
//checkout
	Route::get('/checkout', 'CheckoutController@index')->name('checkout');
	Route::post('/checkout', 'CheckoutController@postCheckOut')->name('checkout');
//quan ly bill
	Route::get('/detailbill/{id}', 'BillController@ViewDetail')->name('detailbill');
//cart
	Route::post('/cart', 'CartController@cart')->name('cart');
	Route::post('/cart-quantity-up', 'CartController@cartQuantityUp')->name('cart-quantity-up');
	Route::post('/cart-quantity-down', 'CartController@cartQuantityDown')->name('cart-quantity-down');
	Route::get('/destroycart', 'CartController@destroy')->name('destroycart');
	Route::get('/deleteproduct', 'CartController@deleteProduct')->name('deleteproduct');
	Route::post('/gotocart', 'CartController@goToCart')->name('gotocart');
});
