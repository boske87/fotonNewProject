<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', ['as' => '/login', 'uses' => 'IndexController@index']);
Route::get('/logout', ['as' => '/logout', 'uses' => 'IndexController@logout']);
Route::post('/pass-reset', ['as' => '/pass-reset', 'uses' => 'AuthController@sendResetLinkEmailAjax']);
Route::get('/logout-club', ['as' => 'logout-club', 'uses' => 'ClubController@logoutClub']);

Route::get('/pocetni-nivo', ['as' => '/pocetni-nivo', 'uses' => 'IndexController@basic']);
Route::get('/napredni-nivo', ['as' => '/napredni-nivo', 'uses' => 'IndexController@advance']);
Route::get('/prijava', ['as' => '/prijava', 'uses' => 'IndexController@prijava']);
Route::get('/profesori', ['as' => '/profesori', 'uses' => 'IndexController@prof']);
Route::get('/profesor/{slug}', ['as' => 'profesor', 'uses' => 'IndexController@profOne']);
Route::get('/galerija-fotografija', ['as' => 'galerija-fotografija', 'uses' => 'GalleryController@index']);
Route::get('/kontakt', ['as' => 'kontakt', 'uses' => 'IndexController@contact']);
Route::get('/linkovi', ['as' => 'linkovi', 'uses' => 'IndexController@links']);
Route::get('/vesti', ['as' => 'vesti', 'uses' => 'NewsController@index']);
Route::get('/vest/{slug}', ['as' => 'vest', 'uses' => 'NewsController@news']);


Route::get('/foton-klub', ['as' => 'foton-klub', 'uses' => 'ClubController@index']);
Route::group(['prefix' => 'foton-klub', 'middleware' => ['is-admin']], function () {

    Route::get('/galerije', ['as' => 'foton-klub.galerije', 'uses' => 'ClubController@stepOne']);
    Route::get('/moja-galerija/{id}', ['as' => 'foton-klub.moja-galerija', 'uses' => 'ClubController@galleryOne']);
    Route::get('/galerija/{id}/slika/{idImage}', ['as' => 'foton-klub.galerija.slika', 'uses' => 'ClubController@imageOne']);
    Route::get('/my-profile', ['as' => 'foton-klub.my-profile', 'uses' => 'ClubController@myProfile']);

    Route::get('/vesti', ['as' => 'foton-klub.vesti', 'uses' => 'ClubExtraController@news']);
    Route::get('/vest/{slug}', ['as' => 'foton-klub.vest', 'uses' => 'ClubExtraController@oneNews']);

    Route::get('/vesti', ['as' => 'foton-klub.vesti', 'uses' => 'ClubExtraController@news']);

    Route::get('/vesti-brisanje/{id}', ['as' => 'foton-klub.vesti-brisanje', 'uses' => 'ClubExtraController@newsDelete']);

    Route::post('/vesti/add', ['as' => 'foton-klub.vesti.add', 'uses' => 'ClubExtraController@storeNews']);
    Route::get('/strana3', ['as' => 'foton-klub.strana2', 'uses' => 'ClubController@strana3']);
    Route::get('/strana4', ['as' => 'foton-klub.strana2', 'uses' => 'ClubController@strana4']);


    //comments - user galerije
    Route::get('/getComents/{imageId}/{galleryId}', ['as' => 'foton-klub.getComents', 'uses' => 'ClubController@getComments']);

    Route::post('/updateImageAjax/{type}/{imageId}', ['as' => 'foton-klub.updateImageAjax', 'uses' => 'ClubController@updateAjax']);
    Route::post('/updateGallAjaxText/{type}/{gallId}', ['as' => 'foton-klub.updateImageAjax', 'uses' => 'ClubController@updateGallAjax']);

    //galerija zvanja
    Route::get('/galerija-zvanja/{id}', ['as' => 'foton-klub.galerija-zvanja', 'uses' => 'ClubCallController@galleryOne']);
    Route::get('/galerija-zvanja/{id}/slika/{idImage}', ['as' => 'foton-klub.galerija-zvanja.slika', 'uses' => 'ClubCallController@imageOne']);

    //comments zvanje
    Route::get('/getComents-call/{imageId}/{galleryId}', ['as' => 'foton-klub.getComents-call', 'uses' => 'ClubCallController@getComments']);

    Route::post('/updateImageAjax-call/{type}/{imageId}', ['as' => 'foton-klub.updateImageAjax-call', 'uses' => 'ClubCallController@updateAjax']);


    Route::get('/dodavanje-nove-galerije', ['as' => 'foton-klub.dodavanje-nove-galerije', 'uses' => 'ClubController@createGallery']);

    Route::get('/dodavanje-nove-slike-album/{gallId}', ['as' => 'foton-klub.dodavanje-nove-slike-album', 'uses' => 'ClubController@addImageGallery']);

    Route::post('/dodavanje-galerije', ['as' => 'foton-klub.dodavanje-galerije', 'uses' => 'ClubController@storeGallery']);

    Route::post('/dodavanje-slika-u-galeriju', ['as' => 'foton-klub.dodavanje-u-galerije', 'uses' => 'ClubController@createGalleryImage']);

    Route::get('/nove-fotografije', ['as' => 'foton-klub.nove-fotografije', 'uses' => 'ClubExtraController@newImage']);

    Route::get('/komentari-profesora', ['as' => 'foton-klub.komentari-profesora', 'uses' => 'ClubExtraController@profCommImage']);

    Route::get('/komentarisane-fotografije', ['as' => 'foton-klub.komentarisane-fotografije', 'uses' => 'ClubExtraController@commentsImage']);

    Route::get('/izlozbe-konkursi', ['as' => 'foton-klub.izlozbe-konkursi', 'uses' => 'ClubExtraController@exhibitions']);

    Route::post('/izlozbe-konkursi', ['as' => 'foton-klub.izlozbe-konkursi', 'uses' => 'ClubExtraController@exhibitionsAdd']);

    Route::patch('/izlozbe-konkursi-izmena/{id}', ['as' => 'foton-klub.izlozbe-konkursi-izmena', 'uses' => 'ClubExtraController@exhibitionsEdit']);

    Route::get('/izlozbe-konkursi-brisanje/{id}', ['as' => 'foton-klub.izlozbe-konkursi-brisanje', 'uses' => 'ClubExtraController@exhibitionsDelete']);

    Route::get('/album-brisanje/{id}', ['as' => 'foton-klub.album-brisanje', 'uses' => 'ClubController@deleteGall']);

    Route::get('/slika-brisanje/{id}', ['as' => 'foton-klub.slika-brisanje', 'uses' => 'ClubController@deleteImage']);

    Route::get('/clanovi', ['as' => 'foton-klub.clanovi', 'uses' => 'MemberController@memberList']);



});

Route::post('/sendMail', ['as' => 'sendMail', 'uses' => 'IndexController@sendMail']);
Route::post('/sendMailPrijava', ['as' => 'sendMailPrijava', 'uses' => 'IndexController@sendMailPrijava']);


Auth::routes();
Route::post('/main-login', ['as' => '/main-login', 'uses' => 'AuthController@authenticate']);
Route::get('/get-user', ['as' => '/main-login', 'uses' => 'AuthController@getUser']);
Route::post('/checkEmail', ['as' => '/checkEmail', 'uses' => 'AuthController@checkEmail']);
Route::post('/login', ['as' => '/login', 'uses' => 'Admin\AuthController@authenticate']);

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('/klub', ['as' => 'admin.club', 'uses' => 'Admin\ClubController@gallery']);
    Route::post('/klub-gallery-add', ['as' => 'admin.club-gallery-add', 'uses' => 'Admin\ClubController@basicGalleryAddStore']);
    Route::get('/klub-gallery-add', ['as' => 'admin.club-gallery-add', 'uses' => 'Admin\ClubController@basicGalleryAdd']);
    Route::delete('/klub-gallery-delete/{id}', ['as' => 'admin.club-gallery-delete', 'uses' => 'Admin\ClubController@basicGalleryDelete']);

    //basic
    Route::get('/klub-text/{id}', ['as' => 'admin.club.text', 'uses' => 'Admin\ClubController@text']);
    Route::patch('klub-update/{id}', ['as' => 'admin.club.text.update', 'uses' => 'Admin\ClubController@basicUpdate']);

    Route::get('/users', ['as' => 'admin.users', 'uses' => 'Admin\UsersController@index']);
    Route::get('/user/{id}', ['as' => 'admin.user', 'uses' => 'Admin\UsersController@edit']);
    Route::get('/user/gallery/{id}', ['as' => 'admin.user.gallery', 'uses' => 'Admin\UsersController@gallery']);
    Route::get('/user/oneGallery/{id}', ['as' => 'admin.user.one-gallery', 'uses' => 'Admin\UsersController@oneGallery']);
    Route::delete('/user/oneGallery/{id}', ['as' => 'admin.user.one-gallery', 'uses' => 'Admin\UsersController@deleteImage']);

    Route::get('/users/add', ['as' => 'admin.users.add', 'uses' => 'Admin\UsersController@add']);

    Route::post('/users/add', ['as' => 'admin.users.add', 'uses' => 'Admin\UsersController@store']);


    //galerija zvanja
    Route::get('/user/gallery/call/{id}', ['as' => 'admin.user.gallery.call', 'uses' => 'Admin\CallController@index']);
    Route::get('/user/gallery/call/add/{id}', ['as' => 'admin.user.gallery.call.add', 'uses' => 'Admin\CallController@addGallery']);
    Route::post('/user/gallery/call/add/{id}', ['as' => 'admin.user.gallery.call.add', 'uses' => 'Admin\CallController@storeGallery']);

    Route::delete('/user/gallery/call/delete/{id}', ['as' => 'admin.user.gallery.call.delete', 'uses' => 'Admin\CallController@galleryImageDelete']);

    Route::get('/user/gallery/call/view/{id}', ['as' => 'admin.user.gallery.call.view', 'uses' => 'Admin\CallController@galleryImage']);
    Route::get('/user/gallery/call/add/image/{id}', ['as' => 'admin.user.gallery.call.add.image', 'uses' => 'Admin\CallController@addGalleryImage']);

    Route::get('/user/gallery/call/add/image/my-gallery/{id}',
        ['as' => 'admin.user.gallery.call.add.image.my-gallery', 'uses' => 'Admin\CallController@addGalleryImageFromMyGallery']);

    Route::post('/user/gallery/call/add/image/my-gallery/{id}',
        ['as' => 'admin.user.gallery.call.add.image.my-gallery', 'uses' => 'Admin\CallController@storeGalleryImageFromMyGallery']);


    Route::post('/user/gallery/call/add/image/{id}', ['as' => 'admin.user.gallery.call.add.image', 'uses' => 'Admin\CallController@storeGalleryImage']);
    Route::delete('/user/gallery/call/view/{id}', ['as' => 'admin.user.gallery.call.view', 'uses' => 'Admin\CallController@deleteImage']);


    Route::patch('users/update/{id}', ['as' => 'admin.users.update', 'uses' => 'Admin\UsersController@update']);
    Route::delete('/users/delete/{id}', ['as' => 'admin.users.delete', 'uses' => 'Admin\UsersController@delete']);

    Route::get('/', 'Admin\AdminController@index');
    Route::get('/home/{id}', ['as' => 'admin.home', 'uses' => 'Admin\AdminController@home']);
    Route::patch('home-update/{id}', ['as' => 'admin.home.update', 'uses' => 'Admin\AdminController@homeUpdate']);

    # Save reorder
    Route::post('reorderSave/{tableName}', 'Admin\UtilitiesAdminController@reorderSave');

    Route::get('/home-gallery', ['as' => 'admin.home-gallery', 'uses' => 'Admin\AdminController@homeGallery']);
    Route::post('/home-gallery-add', ['as' => 'admin.home-gallery-add', 'uses' => 'Admin\AdminController@homeGalleryAddStore']);
    Route::get('/home-gallery-add', ['as' => 'admin.home-gallery-add', 'uses' => 'Admin\AdminController@homeGalleryAdd']);
    Route::delete('/home-gallery-delete/{id}', ['as' => 'admin.home-gallery-delete', 'uses' => 'Admin\AdminController@homeGalleryDelete']);


    //basic
    Route::get('/basic/{id}', ['as' => 'admin.basic', 'uses' => 'Admin\BasicController@index']);
    Route::patch('basic-update/{id}', ['as' => 'admin.basic.update', 'uses' => 'Admin\BasicController@basicUpdate']);

    Route::get('/basic-gallery', ['as' => 'admin.basic-gallery', 'uses' => 'Admin\BasicController@basicGallery']);
    Route::post('/basic-gallery-add', ['as' => 'admin.basic-gallery-add', 'uses' => 'Admin\BasicController@basicGalleryAddStore']);
    Route::get('/basic-gallery-add', ['as' => 'admin.basic-gallery-add', 'uses' => 'Admin\BasicController@basicGalleryAdd']);
    Route::delete('/basic-gallery-delete/{id}', ['as' => 'admin.basic-gallery-delete', 'uses' => 'Admin\BasicController@basicGalleryDelete']);


    //advance
    Route::get('/advance/{id}', ['as' => 'admin.advance', 'uses' => 'Admin\AdvanceController@index']);
    Route::patch('advance-update/{id}', ['as' => 'admin.advance.update', 'uses' => 'Admin\AdvanceController@advanceUpdate']);

    Route::get('/advance-gallery', ['as' => 'admin.advance-gallery', 'uses' => 'Admin\AdvanceController@advanceGallery']);
    Route::post('/advance-gallery-add', ['as' => 'admin.advance-gallery-add', 'uses' => 'Admin\AdvanceController@advanceGalleryAddStore']);
    Route::get('/advance-gallery-add', ['as' => 'admin.advance-gallery-add', 'uses' => 'Admin\AdvanceController@advanceGalleryAdd']);
    Route::delete('/advance-gallery-delete/{id}', ['as' => 'admin.advance-gallery-delete', 'uses' => 'Admin\AdvanceController@advanceGalleryDelete']);

    //prof

    Route::get('/prof', ['as' => 'admin.prof', 'uses' => 'Admin\ProfController@index']);
    Route::get('/prof/add', ['as' => 'admin.prof.add', 'uses' => 'Admin\ProfController@add']);

    Route::post('/prof/add', ['as' => 'admin.prof.add', 'uses' => 'Admin\ProfController@store']);
    Route::delete('/prof/delete/{id}', ['as' => 'admin.prof.delete', 'uses' => 'Admin\ProfController@delete']);
    Route::get('/prof/edit/{id}', ['as' => 'admin.prof.edit', 'uses' => 'Admin\ProfController@edit']);
    Route::patch('prof/update/{id}', ['as' => 'admin.prof.update', 'uses' => 'Admin\ProfController@update']);

    Route::get('/prof/view/{id}', ['as' => 'admin.prof.view', 'uses' => 'Admin\ProfController@view']);

    Route::get('/prof/gallery/add/{id}', ['as' => 'admin.prof.gallery.add', 'uses' => 'Admin\ProfController@galleryAdd']);
    Route::post('/prof/gallery/add', ['as' => 'admin.prof.gallery.add', 'uses' => 'Admin\ProfController@galleryStore']);

    Route::delete('/prof/gallery/delete/{id}', ['as' => 'admin.prof.gallery.delete', 'uses' => 'Admin\ProfController@deleteImageGallery']);

    Route::get('/prof-text/{id}', ['as' => 'admin.prof-text', 'uses' => 'Admin\ProfController@editText']);
    Route::patch('prof-text-update/{id}', ['as' => 'admin.prof-text.update', 'uses' => 'Admin\ProfController@editUpdate']);


    //news
    Route::get('/news', ['as' => 'admin.news', 'uses' => 'Admin\NewsController@index']);

    Route::get('/news/add', ['as' => 'admin.news.add', 'uses' => 'Admin\NewsController@add']);
    Route::post('/news/add', ['as' => 'admin.news.add', 'uses' => 'Admin\NewsController@store']);
    Route::delete('/news/delete/{id}', ['as' => 'admin.news.delete', 'uses' => 'Admin\NewsController@delete']);

    Route::get('/news/{id}', ['as' => 'admin.news.edit', 'uses' => 'Admin\NewsController@edit']);
    Route::patch('news/update/{id}', ['as' => 'admin.news.update', 'uses' => 'Admin\NewsController@update']);

    Route::get('/news-pop-up/{id}', ['as' => 'admin.news-pop-up.edit', 'uses' => 'Admin\NewsController@editPopUp']);
    Route::patch('/news-pop-up/update/{id}', ['as' => 'admin.news-pop-up.update', 'uses' => 'Admin\NewsController@updatePopUp']);


    //gallery
    Route::get('/gallery', ['as' => 'admin.gallery', 'uses' => 'Admin\GalleryController@index']);
    Route::get('/gallery/add', ['as' => 'admin.gallery.add', 'uses' => 'Admin\GalleryController@add']);
    Route::post('/gallery/add', ['as' => 'admin.gallery.add', 'uses' => 'Admin\GalleryController@store']);
    Route::delete('/gallery/delete/{id}', ['as' => 'admin.gallery.delete', 'uses' => 'Admin\GalleryController@delete']);

    Route::get('/gallery-text', ['as' => 'admin.gallery-text', 'uses' => 'Admin\GalleryController@text']);
    Route::patch('/gallery-text/add', ['as' => 'admin.gallery-text.add', 'uses' => 'Admin\GalleryController@textStore']);


    //links
    Route::get('/links', ['as' => 'admin.links', 'uses' => 'Admin\NewsController@links']);
    Route::get('/links/add', ['as' => 'admin.links.add', 'uses' => 'Admin\NewsController@linkAdd']);
    Route::post('/links/add', ['as' => 'admin.links.add', 'uses' => 'Admin\NewsController@linkStore']);
    Route::delete('/links/delete/{id}', ['as' => 'admin.links.delete', 'uses' => 'Admin\NewsController@linkDelete']);

});


