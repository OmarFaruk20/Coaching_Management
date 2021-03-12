<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['Middleware' => ['Auth']], function(){

Route::get('/user_registration', [
    'uses' => 'UserRegistrationController@ShowRegistrationForm',
    'as' => 'user_registration',
]);

Route::post('/user_registration', [
    'uses' => 'UserRegistrationController@SaveUser',
    'as' => 'save-user',
]);

Route::get('/user_list', [
    'uses' => 'UserRegistrationController@Userlist',
    'as' => 'user-list',
]);

Route::get('/user_profile/{userId}', 'UserRegistrationController@user_profile')->name('user_profile');

Route::get('/change_user_info/{id}', 'UserRegistrationController@ChangeUserInfo');

Route::post('/update_user_info', 'UserRegistrationController@UpdateUserInfo')->name('update_user_info');

Route::get('/change_user_avatar/{id}', 'UserRegistrationController@ChangeUserAvatar');

Route::post('/upload_user_photo', 'UserRegistrationController@UploadProfile')->name('upload_user_photo');

Route::get('/change_user_password/{id}', 'UserRegistrationController@ChangePassword')->name('change_user_password');

Route::post('/user_password_update', 'UserRegistrationController@UpdatePassword')->name('user_password_update');


/*General Section Route*/

Route::get('/add.header_footer','HomepageController@AddHeaderFooter')->name('add.header_footer');

Route::post('/save_header_footer','HomepageController@SaveHeaderFooter')->name('save_header_footer');

Route::get('/manage.header_footer','HomepageController@ManageHeaderFooter')->name('manage.header_footer');

Route::post('/update_header_footer','HomepageController@UpdateHeaderFooter')->name('update_header_footer');

/*Slider Section Route*/

Route::get('/add_slider', 'SliderController@AddSlider')->name('add_slider');

Route::post('/upload_slide', 'SliderController@UploadSlide')->name('upload_slide');

Route::get('/manage_slider', 'SliderController@ManageSlider')->name('manage_slider');

Route::get('/slide_unpublish/{id}', 'SliderController@SliderUnpublish')->name('slide_unpublish');

Route::get('/slide_publish/{id}', 'SliderController@SliderPublish')->name('slide_publish');

Route::get('/slide_delete/{id}', 'SliderController@DeleteSlider')->name('slide_delete');

Route::get('/slide_edit/{id}', 'SliderController@EditSlider')->name('slide_edit');

Route::post('/update_slide', 'SliderController@UpdateSlider')->name('update_slide');

Route::get('/photo_gallery', 'SliderController@PhotoGallery')->name('photo_gallery');

/*School Management Section*/

Route::get('/School/Add','SchoolManagementController@AddSchool')->name('add_school');

Route::post('/School/Add','SchoolManagementController@SaveSchool')->name('save_school');

Route::get('/School/list','SchoolManagementController@AllSchool')->name('all_school');

Route::get('/unpublished_school/{id}','SchoolManagementController@Unpublished')->name('unpublished_school');

Route::get('/published_school/{id}','SchoolManagementController@Published')->name('published_school');

Route::get('/edit_school/{id}','SchoolManagementController@SchoolEdit')->name('edit_school');

Route::post('/update_school','SchoolManagementController@SchoolUpdate')->name('update_school');

Route::get('/delete_school/{id}','SchoolManagementController@SchoolDelete')->name('delete_school');

/*Class Management System*/

Route::get('/add_class', 'ClassManagementController@AddClass')->name('add_class');

Route::post('/save_class', 'ClassManagementController@SaveClass')->name('save_class');

Route::get('/Class/List', 'ClassManagementController@ClassList')->name('class_list');

Route::get('/unpublished_class/{id}', 'ClassManagementController@Unpublish')->name('unpublished_class');

Route::get('/published_class/{id}', 'ClassManagementController@Publish')->name('published_class');

Route::get('/edit_class/{id}', 'ClassManagementController@ClassEdit')->name('edit_class');

Route::post('/update_class', 'ClassManagementController@UpdateClass')->name('update_class');

Route::get('/delete_class/{id}', 'ClassManagementController@DeleteClass')->name('delete_class');

/*Batch Management Section*/

Route::get('/add/batch','BatchManagementController@AddBactch')->name('add_batch');

Route::post('/save/batch','BatchManagementController@SaveBactch')->name('save_batch');

Route::get('/batch/list','BatchManagementController@Bactchlist')->name('batch_list');

Route::get('/batch/list_by_ajax', 'BatchManagementController@batchListAjax')->name('batch_list_by_ajax');

Route::get('batch/Unpublished', 'BatchManagementController@batchUnpublished')->name('batch_unpublished');

Route::get('batch/Published', 'BatchManagementController@batchPublished')->name('batch_published');

Route::get('batch/Delete', 'BatchManagementController@batchDelete')->name('batch_delete');

Route::get('/batch/edit/{id}','BatchManagementController@editBatch')->name('edit_batch');

Route::post('/batch/update','BatchManagementController@updateBatch')->name('batch_update');

/* Student Management Section */
Route::get('/student_type', 'StudentTypeController@index')->name('student_type');

Route::post('/student_type_add', 'StudentTypeController@AddStudentType')->name('student_type_add');

Route::get('/student_type_list', 'StudentTypeController@StudentTypelist')->name('student_type_list');

});
