<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/listing/houses','WelcomeController@listHouses')->name('houses');
Route::get('/listing/vehicles','WelcomeController@listCars')->name('vehicles');
Route::get('/listing/lands-and-plots','WelcomeController@listLands')->name('lands');
Route::get('/listing/products','WelcomeController@listProducts')->name('products');

Route::get('/houses/houses/{house:slug}','HouseDetailController')->name('house');
Route::get('/vehicles/cars/{car:slug}','VehicleDetailController')->name('car');
Route::get('/products/product/{product:slug}','ProductDetailController')->name('product');
Route::get('/lands/land/{land:slug}','LandDetailController')->name('land');

Route::get('/locations/{location:state}','LocationController')->name('location');

Route::get('/about-us','AboutUsController')->name('about-us');
Route::get('/contact-us','ContactController@index')->name('contact-us');

Auth::routes();

/**
 * @return void
 */
function permissions(): void
{
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Plan
    Route::delete('plans/destroy', 'PlanController@massDestroy')->name('plans.massDestroy');
    Route::resource('plans', 'PlanController');

    // House
    Route::delete('houses/destroy', 'HouseController@massDestroy')->name('houses.massDestroy');
    Route::post('houses/media', 'HouseController@storeMedia')->name('houses.storeMedia');
    Route::resource('houses', 'HouseController');

    // Amenity
    Route::delete('amenities/destroy', 'AmenityController@massDestroy')->name('amenities.massDestroy');
    Route::resource('amenities', 'AmenityController');

    // Car
    Route::delete('cars/destroy', 'CarController@massDestroy')->name('cars.massDestroy');
    Route::post('cars/media', 'CarController@storeMedia')->name('cars.storeMedia');
    Route::resource('cars', 'CarController');

    // Vehicle Info
    Route::delete('vehicle-infos/destroy', 'VehicleInfoController@massDestroy')->name('vehicle-infos.massDestroy');
    Route::resource('vehicle-infos', 'VehicleInfoController');

    // Land Or Plot
    Route::delete('land-or-plots/destroy', 'LandOrPlotController@massDestroy')->name('land-or-plots.massDestroy');
    Route::post('land-or-plots/media', 'LandOrPlotController@storeMedia')->name('land-or-plots.storeMedia');
       Route::resource('land-or-plots', 'LandOrPlotController');

    // Product
    Route::delete('electronics/destroy', 'ProductController@massDestroy')->name('electronics.massDestroy');
    Route::post('electronics/media', 'ProductController@storeMedia')->name('electronics.storeMedia');
    Route::resource('electronics', 'ProductController');

    // Subscription
    Route::delete('subscriptions/destroy', 'SubscriptionController@massDestroy')->name('subscriptions.massDestroy');
    Route::resource('subscriptions', 'SubscriptionController');

    // Advert
    Route::delete('adverts/destroy', 'AdvertController@massDestroy')->name('adverts.massDestroy');
    Route::post('adverts/media', 'AdvertController@storeMedia')->name('adverts.storeMedia');
    Route::resource('adverts', 'AdvertController');

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');
}

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    // Permissions
    permissions();

    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
    Route::get('team-members', 'TeamMembersController@index')->name('team-members.index');
    Route::post('team-members', 'TeamMembersController@invite')->name('team-members.invite');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/my-listing', 'HomeController@listing')->name('listing');

    // House
    Route::delete('houses/destroy', 'HouseController@massDestroy')->name('houses.massDestroy');
    Route::post('houses/media', 'HouseController@storeMedia')->name('houses.storeMedia');
    Route::resource('houses', 'HouseController');

    // Amenity
    Route::get('/amenities/{house:slug}/edit','AmenityController@edit')->name('amenities.edit');
    Route::patch('/amenities/{house}','AmenityController@update')->name('amenities.update');

    // Car
    Route::delete('cars/destroy', 'CarController@massDestroy')->name('cars.massDestroy');
    Route::post('cars/media', 'CarController@storeMedia')->name('cars.storeMedia');
    Route::resource('cars', 'CarController');

    // Vehicle Info
    Route::get('vehicle-infos/{car:slug}/edit', 'VehicleInfoController@edit')->name('vehicle-infos.edit');
    Route::patch('vehicle-infos/{car}', 'VehicleInfoController@update')->name('vehicle-infos.update');

    // Land Or Plot
    Route::delete('land-or-plots/destroy', 'LandOrPlotController@massDestroy')->name('land-or-plots.massDestroy');
    Route::post('land-or-plots/media', 'LandOrPlotController@storeMedia')->name('land-or-plots.storeMedia');
    Route::resource('land-or-plots', 'LandOrPlotController');

    // Product
    Route::delete('electronics/destroy', 'ProductController@massDestroy')->name('electronics.massDestroy');
    Route::post('electronics/media', 'ProductController@storeMedia')->name('electronics.storeMedia');
    Route::resource('electronics', 'ProductController');

    // Subscription
    Route::delete('subscriptions/destroy', 'SubscriptionController@massDestroy')->name('subscriptions.massDestroy');
    Route::resource('subscriptions', 'SubscriptionController');

    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');



    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
