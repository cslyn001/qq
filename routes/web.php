<?php

use Illuminate\Support\Facades\Route;
use App\Announcement;

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
    $data['title'] = "E-Portfolio";
     $data['title'] = "announcements";
    $data['anoun'] = Announcement::get();
    return view('welcome', $data);
});

Auth::routes();

Route::post('/user-register', 'UserController@createUser');
Route::post('/user-login', 'Auth\LoginController@login');
Route::get('/home', 'HomeController@index')->name('home');

/* GET Provinces */
Route::post('/get-provinces', 'StudentController@getProvinces');
Route::post('/get-provinces', 'AdminController@getProvinces');


/* GET Cities */
Route::post('/get-cities', 'StudentController@getCities');
Route::post('/get-cities', 'AdminController@getCities');


/* ADMIN and STAFF/FACULTY urls */
Route::prefix('admin')->group(function(){
    Route::get('/dashboard', 'AdminController@index');
    Route::get('/profile', 'AdminController@getAdminProfile');
    Route::post('/save-profile', 'AdminController@saveProfile');

    /* Users */
    Route::get('/user-list', 'AdminController@getUserList');
    Route::get('/view', 'AdminController@getVeiw');
    Route::post('/delete-userlist', 'AdminController@deleteUserManagement');

     /* Faculty */
     Route::get('/faculty-list', 'AdminController@getFacultyList');
     Route::post('/delete-list', 'AdminController@deleteAdminManagement');




    /* Announcements */
    Route::get('/announcements', 'AdminController@getAnnouncements');
    Route::post('/save-announcements', 'AdminController@saveAnnouncements');
    Route::post('/delete-announcements ', 'AdminController@deleteAnnouncements');
    Route::post('/edit-announcements', 'AdminController@editannouncements');



    /* Change Password */
    Route::get('/changepassword', 'AdminController@getChangePassword');
    Route::post('change-password', 'AdminController@changePassword');
    Route::post('reset-passwords', 'AdminController@ResetPassword');
    Route::get('/resetpasswords', 'AdminController@getResetPassword');

    /* Organizations */
    Route::get('/org-list', 'AdminController@getOrgList');
    Route::post('/save-organization', 'AdminController@saveOrganization');
    Route::post('/delete-organizations', 'AdminController@deleteOrganizations');
    Route::post('/edit-organizations', 'AdminController@editOrganizations');


    Route::get('/messages', 'AdminController@getMessages');


     /* Admin Report */
     Route::get('/adminreport', 'AdminController@getAdminReport');

     Route::get('/profile', 'AdminController@getAdminProfile');
     Route::post('/save-profile', 'AdminController@saveAdminProfile');

        /* Admin Badge */
   Route::get('/badge', 'AdminController@getAdminBadge');
   Route::post('/save-badge', 'AdminController@saveBadge');



});


/* STUDENT urls */
Route::prefix('student')->group(function(){
    Route::get('/dashboard', 'StudentController@index');
    Route::get('/messages', 'StudentController@messages');
    Route::get('/associates', 'StudentController@getAssociates');
    Route::get('/profile', 'StudentController@getProfile');
    Route::get('/profile-view/{id}','StudentController@getProfileView');
    Route::post('/save-profile', 'StudentController@saveProfile');

    /* Education - CRUD */
    Route::post('/save-educ', 'StudentController@saveEduc');
    Route::post('/edit-educ', 'StudentController@editEduc');
    Route::post('/delete-educ', 'StudentController@deleteEduc');
    Route::post('/edit-educ/change-privacy', 'StudentController@changePrivacyEduc');

    /* Experience - CRUD */
    Route::post('/edit-experience', 'StudentController@editExperience');
    Route::post('/delete-experience', 'StudentController@deleteExperience');
    Route::post('/save-experience', 'StudentController@saveExperience');
    Route::post('/edit-experience/change-privacy', 'StudentController@changePrivacyExp');

     /* Skills - CRUD */
     Route::post('/save-skills', 'StudentController@saveSkills');
     Route::post('/edit-skills', 'StudentController@editSkills');
     Route::post('/delete-skills', 'StudentController@deleteSkills');

     /* Awards&Achievements - CRUD */
     Route::post('/save-awardsachievement', 'StudentController@saveAwardsAchievement');
     Route::post('/edit-awardsachievement', 'StudentController@editAwardsAchievement');
     Route::post('/delete-awardsachievement', 'StudentController@deleteAwardsAchievement');
     Route::post('/edit-awardsachievement/change-privacy', 'StudentController@changePrivacyAward');
      /* Certificstion- CRUD */
      Route::post('/save-certification', 'StudentController@saveCertification');
      Route::post('/edit-certification', 'StudentController@editCertification');
      Route::post('/delete-certification', 'StudentController@deleteCertification');
      Route::post('/edit-certification/change-privacy', 'StudentController@changePrivacyCer');

      /* Projects- CRUD */
      Route::post('/save-project', 'StudentController@saveProjects');
      Route::post('/edit-project', 'StudentController@editProjects');
      Route::post('/delete-project', 'StudentController@deleteProjects');

       /* Organizations- CRUD */
       Route::post('/save-org', 'StudentController@saveOrg');
       Route::post('/edit-org', 'StudentController@editOrg');
       Route::post('/delete-org', 'StudentController@deleteOrg');

       /* Seminar- CRUD */
       Route::post('/save-seminar', 'StudentController@saveSeminar');
       Route::post('/edit-seminar', 'StudentController@editSeminar');
       Route::post('/delete-seminar', 'StudentController@deleteSeminar');

       Route::post('/search', 'StudentController@searchStudent');

        // PDF
       Route::get('/my-pdf','StudentController@GeneratePDF');

          /* Change Password */
    Route::get('/changepassword', 'StudentController@getChangePassword');
    Route::post('change-password', 'StudentController@changePassword');



});
