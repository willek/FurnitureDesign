<?php

Route::group(['as' => 'front.'] , function () {
    Route::get('/', 'Main\MainController@index')->name('index');
//    shop
    Route::get('/product/category/{id}', 'Main\MainController@category_product')->name('category_product');
    Route::get('/product/view/{id}', 'Main\MainController@view_product')->name('view_product');
    Route::get('/product', 'Main\MainController@search_product')->name('search_product');
//    blog
    Route::get('/blog', 'Main\MainController@default_blog')->name('blog');
    Route::get('/blog/category/{id}', 'Main\MainController@blog_by_category')->name('blog_category');
    Route::get('/blog/search', 'Main\MainController@search_blog')->name('search_blog');
    Route::get('/blog/detail/{id}', 'Main\MainController@detail_blog')->name('detail_blog');
//    gallery
    Route::get('/gallery', 'Main\MainController@gallery')->name('gallery');
//    contact
    Route::get('/contact', 'Main\MainController@contact')->name('contact');
    Route::post('/contact/message', 'Main\MainController@send_message')->name('message');
});

Route::group(['as' => 'auth.', 'prefix' => '/auth'] , function () {
    Route::get('/', 'Authentication\AuthController@index')->name('login');
    Route::post('/submit', 'Authentication\AuthController@authenticate')->name('submit');
});

Route::group(['as' => 'back.', 'prefix' => '/superuser', 'middleware' => 'superuser'] , function () {
//    dashboard
    Route::get('/', 'Superuser\DashboardController@index')->name('dashboard');
//    slider
    Route::get('/slider', 'Superuser\SliderController@index')->name('slider');
    Route::get('/slider/create', 'Superuser\SliderController@create')->name('create_slider');
    Route::post('/slider/created', 'Superuser\SliderController@created')->name('created_slider');
    Route::get('/slider/update/{id}', 'Superuser\SliderController@update')->name('update_slider');
    Route::post('/slider/updated/{id}', 'Superuser\SliderController@updated')->name('updated_slider');
    Route::get('/slider/delete/{id}', 'Superuser\SliderController@destroy')->name('delete_slider');
//    gallery
    Route::get('/gallery', 'Superuser\GalleryController@index')->name('gallery');
    Route::get('/gallery/create', 'Superuser\GalleryController@create')->name('create_gallery');
    Route::post('/gallery/created', 'Superuser\GalleryController@created')->name('created_gallery');
    Route::get('/gallery/update/{id}', 'Superuser\GalleryController@update')->name('update_gallery');
    Route::post('/gallery/updated/{id}', 'Superuser\GalleryController@updated')->name('updated_gallery');
    Route::get('/gallery/delete/{id}', 'Superuser\GalleryController@destroy')->name('delete_gallery');
//    category blog
    Route::get('/blog/category', 'Superuser\CategoryBlogController@index')->name('category_blog');
    Route::get('/blog/category/create', 'Superuser\CategoryBlogController@create')->name('create_category_blog');
    Route::post('/blog/category/created', 'Superuser\CategoryBlogController@created')->name('created_category_blog');
    Route::get('/blog/category/update/{id}', 'Superuser\CategoryBlogController@update')->name('update_category_blog');
    Route::post('/blog/category/updated/{id}', 'Superuser\CategoryBlogController@updated')->name('updated_category_blog');
    Route::get('/blog/category/delete/{id}', 'Superuser\CategoryBlogController@destroy')->name('delete_category_blog');
//    blog
    Route::get('/blog', 'Superuser\BlogController@index')->name('blog');
    Route::get('/blog/create', 'Superuser\BlogController@create')->name('create_blog');
    Route::post('/blog/created', 'Superuser\BlogController@created')->name('created_blog');
    Route::get('/blog/update/{id}', 'Superuser\BlogController@update')->name('update_blog');
    Route::post('blog/updated/{id}', 'Superuser\BlogController@updated')->name('updated_blog');
    Route::get('/blog/delete/{id}', 'Superuser\BlogController@destroy')->name('delete_blog');
//    product (single)
    Route::get('/product', 'Superuser\ProductController@index')->name('product');
    Route::get('/product/create', 'Superuser\ProductController@create')->name('create_product');
    Route::post('/product/created', 'Superuser\ProductController@created')->name('created_product');
    Route::get('/product/update/{id}', 'Superuser\ProductController@update')->name('update_product');
    Route::post('/product/updated/{id}', 'Superuser\ProductController@updated')->name('updated_product');
    Route::get('/product/delete/{id}', 'Superuser\ProductController@destroy')->name('delete_product');
//    product category
    Route::get('/product/category', 'Superuser\CategoryProductController@index')->name('category_product');
    Route::get('/product/category/create', 'Superuser\CategoryProductController@create')->name('create_category_product');
    Route::post('/product/category/created', 'Superuser\CategoryProductController@created')->name('created_category_product');
    Route::get('/product/category/update/{id}', 'Superuser\CategoryProductController@update')->name('update_category_product');
    Route::post('/product/category/updated/{id}', 'Superuser\CategoryProductController@updated')->name('updated_category_product');
    Route::get('/product/category/delete/{id}', 'Superuser\CategoryProductController@destroy')->name('delete_category_product');
//    partnership
    Route::get('/partnership', 'Superuser\PartnershipController@index')->name('partnership');
    Route::get('/partnership/create', 'Superuser\PartnershipController@create')->name('create_partnership');
    Route::post('/partnership/created', 'Superuser\PartnershipController@created')->name('created_partnership');
    Route::get('/partnership/update/{id}', 'Superuser\PartnershipController@update')->name('update_partnership');
    Route::post('/partnership/updated/{id}', 'Superuser\PartnershipController@updated')->name('updated_partnership');
    Route::get('/partnership/delete/{id}', 'Superuser\PartnershipController@destroy')->name('delete_partnership');
//    testimonials
    Route::get('/testimonials', 'Superuser\TestimonialsController@index')->name('testimonials');
    Route::get('/testimonials/create', 'Superuser\TestimonialsController@create')->name('create_testimonials');
    Route::post('/testimonials/created', 'Superuser\TestimonialsController@created')->name('created_testimonials');
    Route::get('/testimonials/update/{id}', 'Superuser\TestimonialsController@update')->name('update_testimonials');
    Route::post('/testimonials/updated/{id}', 'Superuser\TestimonialsController@updated')->name('updated_testimonials');
    Route::get('/testimonials/delete/{id}', 'Superuser\TestimonialsController@destroy')->name('delete_testimonials');
//    contact
    Route::get('/social_media', 'Superuser\SocialMediaController@index')->name('social_media');
    Route::get('/social_media/create', 'Superuser\SocialMediaController@create')->name('create_social_media');
    Route::post('/social_media/created', 'Superuser\SocialMediaController@created')->name('created_social_media');
    Route::get('/social_media/update/{id}', 'Superuser\SocialMediaController@update')->name('update_social_media');
    Route::post('/social_media/updated/{id}', 'Superuser\SocialMediaController@updated')->name('updated_social_media');
    Route::get('/social_media/delete/{id}', 'Superuser\SocialMediaController@destroy')->name('delete_social_media');
//    inbox
    Route::get('/inbox', 'Superuser\InboxController@index')->name('inbox');
    Route::get('/inbox/view/{id}', 'Superuser\InboxController@view')->name('view_inbox');
    Route::get('/inbox/delete/{id}', 'Superuser\InboxController@destroy')->name('delete_inbox');
//    header img
    Route::get('/header', 'Superuser\HeaderController@index')->name('header');
    Route::post('/header/save/{id}', 'Superuser\HeaderController@save')->name('save_header');
//    config
    Route::get('/config', 'Superuser\ConfigController@index')->name('config');
    Route::post('/config/settings/{id}', 'Superuser\ConfigController@settings')->name('config_settings');
    Route::post('/config/contact/{id}', 'Superuser\ConfigController@contact')->name('config_contact');
    Route::post('/config/maps/{id}', 'Superuser\ConfigController@maps')->name('config_maps');
    Route::post('/config/images/{id}', 'Superuser\ConfigController@images')->name('config_images');
    Route::post('/config/admin/{id}', 'Authentication\AuthController@update')->name('config_admin');
//    logout
    Route::get('/logout', 'Authentication\AuthController@logout')->name('logout');
});