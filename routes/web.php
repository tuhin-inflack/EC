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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::middleware(['force_password'])->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/', 'HomeController@landing')->name('welcome');

        Route::resource('system/user', 'UserController');
        Route::resource('user/role', 'RoleController');
        Route::resource('user/permission', 'PermissionController');
    });

    Route::get('/change/password', 'ChangePasswordController@change');
    Route::post('/change/password', 'ChangePasswordController@update');
    // organisation
    Route::post('organizations', 'OrganizationController@store')->name('organizations.store');
    // attributes
    Route::prefix('attributes')->group(function () {
        Route::post('/', 'AttributeController@store')->name('attributes.store');
        Route::put('{attribute}', 'AttributeController@update')->name('attributes.update');
        // attribute-values
        Route::prefix('{attribute}')->group(function () {
            Route::post('values', 'AttributeValueController@store')->name('attribute-values.store');
            Route::put('values/{attributeValue}', 'AttributeValueController@update')->name('attribute-values.update');
            Route::get('graphs', 'AttributeValueGraphController@update')->name('attribute-values.graph');
        });
    });

    //Notifications
    Route::get('/notification/count', 'AppNotificationController@countUnread')->name('notification.count');
    Route::get('/unread/notifications', 'AppNotificationController@getUnreadNotification')->name('notification.unread');
    Route::get('/latest/notifications', 'AppNotificationController@getLatestNotifications')->name('notification.latest');
    Route::get('/all/notifications', 'AppNotificationController@index')->name('notification.index');
    Route::get('/read/notifications', 'AppNotificationController@markAsRead')->name('notification.read');
    Route::get('/clear/notifications', 'AppNotificationController@clearAll')->name('notification.clear');

    // districts
    Route::get('divisions/{division}/districts', function (\App\Entities\Division $division) {
       return $division->districts;
    });
    // thanas
    Route::get('districts/{district}/thanas', function (\App\Entities\District $district) {
        return $district->thanas;
    });
    // unions
    Route::get('thanas/{thana}/unions', function (\App\Entities\Thana $thana) {
       return $thana->unions;
    });
});

Route::get('booking-requests', 'PublicBookingRequestController@create')->name('public-booking-requests.create');
Route::post('booking-requests', 'PublicBookingRequestController@store')->name('public-booking-requests.store');

//Training Registration

Route::get('training','PublicTrainingRegistrationController@index')->name('training-registration.index');
Route::get('training/registration','PublicTrainingRegistrationController@create')->name('training-registration.create');

Route::get('/lang/{key}', function ($key) {
    Session::put('locale', $key);
    Session::save();
    return redirect()->back();
});

Route::get('/test/upload', 'AttachmentController@index')->name('test.upload-index');
Route::post('/test/upload', 'AttachmentController@uploadFile')->name('test.upload');
Route::get('/file/download', 'AttachmentController@downloadFile')->name('file.download');
Route::get('/file/get', 'AttachmentController@get')->name('file.getfile');
Route::get('/test/url/{fileName}', 'AttachmentController@fileUrl')->name('test.fileUrl');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
