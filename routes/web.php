<?php

use App\Http\Controllers\DoctoreController\Notification;
use App\Http\Controllers\ReciptionController\cleanderControrller;
use App\Http\Controllers\ReciptionController\replyMassage;
use App\Http\Controllers\WebsiteController\bookAppointmentController;
use App\Http\Controllers\WebsiteController\ContactUsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController\DoctoreMangeController;

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

Route::get ('/', 'App\Http\Controllers\WebsiteController\homePageController@index');

Route::get ("/patientProfile",'App\Http\Controllers\PatientC0ntrpller\profileController@index');
Route::get('/Patient/profile/update/{id}', 'App\Http\Controllers\PatientC0ntrpller\profileController@update')->name ('patient.profile.update');
Route::get('/patintAppointment/Delete/{id}', 'App\Http\Controllers\PatientC0ntrpller\profileController@destroy');

// Route::get ("/not",[Notification::class,'index']);


//Route for Admin Dashboard
Route::group (['prefix' => 'admin'], function () {
    Route::resource ('/home', 'App\Http\Controllers\AdminController\homeController');
    Route::resource ('/DoctoreMange', 'App\Http\Controllers\AdminController\DoctoreMangeController');
    Route::resource ('/patientMange', 'App\Http\Controllers\AdminController\PatientMangeController');
    Route::resource ('/AddNewUser', 'App\Http\Controllers\AdminController\AddNewUSerController');
    Route::resource ('/ReciptionMange', 'App\Http\Controllers\AdminController\ReciptionManageController');
    Route::resource ('/Appointment', 'App\Http\Controllers\AdminController\AppointmentController');
    Route::resource ('/not', 'App\Http\Controllers\AdminController\NotificationAdmin');

});

Route::get('Admin/DoctoreMange/update/{id}', 'App\Http\Controllers\AdminController\DoctoreMangeController@update')->name ('admin.Doctre.update');
Route::post ('Admin/DoctoreMange/delete/{id}', 'App\Http\Controllers\AdminController\DoctoreMangeController@destroy')->name ('admin.Doctre.delete');
Route::get ('Admin/DoctoreMange/Create','App\Http\Controllers\AdminController\DoctoreMangeController@store')->name ('admin.Doctre.store');
Route::get ('Admin/ReciptionManage/Create','App\Http\Controllers\AdminController\ReciptionManageController@store')->name ('admin.Reciption.store');
Route::get('Admin/ReciptionMange/update/{id}', 'App\Http\Controllers\AdminController\ReciptionManageController@update')->name ('admin.Reciption.update');
Route::post ('Admin/ReciptionMange/delete/{id}', 'App\Http\Controllers\AdminController\ReciptionManageController@destroy')->name ('admin.Reciption.delete');
Route::get ('Admin/PatientMange/Create','App\Http\Controllers\AdminController\PatientMangeController@store')->name ('admin.patients.store');
Route::get('Admin/PatientMange/update/{id}', 'App\Http\Controllers\AdminController\PatientMangeController@update')->name ('admin.Patient.update');
Route::post ('Admin/PatientMange/delete/{id}', 'App\Http\Controllers\AdminController\PatientMangeController@destroy')->name ('admin.Patient.delete');
Route::post ('Admin/Appointment/delete/{id}', 'App\Http\Controllers\AdminController\AppointmentController@destroy')->name ('Admin.Appointment.delete');


//Route for  Dashboard Reciption
Route::group (['prefix' => 'Reciption'], function () {
    Route::resource ('/home', 'App\Http\Controllers\ReciptionController\homeController');
    Route::resource ('/Service', 'App\Http\Controllers\ReciptionController\ServiceController');
    Route::resource ('/Appointment', 'App\Http\Controllers\ReciptionController\AppointmentController');
    Route::resource ('/Cleander', 'App\Http\Controllers\ReciptionController\cleanderControrller');
    Route::resource ('/DoctoreMange', 'App\Http\Controllers\ReciptionController\DoctoreMangeController');
    Route::resource ('/PatientMange','App\Http\Controllers\ReciptionController\PatientMangeController');
    Route::resource ('/clintMassage','App\Http\Controllers\ReciptionController\replyMassage');
    Route::resource ('/opinions','App\Http\Controllers\ReciptionController\opinionsController');
    Route::resource ('/not','App\Http\Controllers\ReciptionController\NotificationReciption');

});

Route::get ('/send/reply/{id}',[replyMassage::class, 'reply'])->name ('reply');
Route::get ('/Service/Create','App\Http\Controllers\ReciptionController\ServiceController@store')->name ('Reciption.Service.store');
Route::get('Service/update/{id}', 'App\Http\Controllers\ReciptionController\ServiceController@update')->name ('Reciption.Service.update');
Route::post('Services/Delete/{id}', 'App\Http\Controllers\ReciptionController\ServiceController@destroy')->name ('Reciption.Servece.delete');
Route::get('opinions/update/{id}', 'App\Http\Controllers\ReciptionController\opinionsController@update')->name ('Reciption.Opinion.update');
Route::post('Service/Delete/{id}', 'App\Http\Controllers\ReciptionController\opinionsController@destroy')->name ('Reciption.opinion.delete');
Route::get ('Reciption/PatientMange/Create','App\Http\Controllers\ReciptionController\opinionsController@store')->name ('Reciption.patients.store');


Route::get ('/PatientMange/Create','App\Http\Controllers\ReciptionController\PatientMangeController@store')->name ('Reciption.patients.store');
Route::get('PatientMange/update/{id}', 'App\Http\Controllers\ReciptionController\PatientMangeController@update')->name ('Reciption.Patient.update');
Route::post ('PatientMange/delete/{id}', 'App\Http\Controllers\ReciptionController\PatientMangeController@destroy')->name ('Reciption.Patient.delete');

Route::get ('Reciption/PatientMange/Create','App\Http\Controllers\ReciptionController\PatientMangeController@store')->name ('Reciption.patients.store');
Route::get ('/Appointment/Create','App\Http\Controllers\ReciptionController\AppointmentController@store')->name ('Reciption.Appointment.store');

Route::get('Appointment/update/{id}', 'App\Http\Controllers\ReciptionController\AppointmentController@update')->name ('Reciption.Appointment.update');
Route::post ('Riciption/PatientMange/delete/{id}', 'App\Http\Controllers\ReciptionController\AppointmentController@destroy')->name ('Reciption.Appointment.delete');

//Route::post('/calender/events', 'App\Http\Controllers\ReciptionController\cleanderControrller@Events')->name('Events.clender');
Route::post('/action/full-calender', [cleanderControrller::class, 'action']);


//Route for  Dashboard Doctor
Route::group (['prefix' => 'Doctor'], function () {
    Route::resource ('/home', 'App\Http\Controllers\DoctoreController\homeController');
    Route::resource ('/AppointmentManage', 'App\Http\Controllers\DoctoreController\AppointmentDoctoreMandeController');
    Route::resource ('/PatientRecord', 'App\Http\Controllers\DoctoreController\PatientMangeController');
    Route::resource ('/not', 'App\Http\Controllers\DoctoreController\NotificationDoctor');
});
Route::post ('doctore/PatientMange/delete/{id}', 'App\Http\Controllers\DoctoreController\PatientMangeController@destroy')->name ('Doctore.Patient.delete');

Route::get('AppointmentManage/update/{id}', 'App\Http\Controllers\DoctoreController\AppointmentDoctoreMandeController@update')->name ('Doctor.Appointment.update');
Route::post ('AppointmentManage/delete/{id}', 'App\Http\Controllers\DoctoreController\AppointmentDoctoreMandeController@destroy')->name ('Doctor.Appointment.delete');

Route::group (['prefix' => 'webSite'], function () {
    Route::resource ('/HomePage', 'App\Http\Controllers\WebsiteController\homePageController');
    Route::resource ('/AboutUs', 'App\Http\Controllers\WebsiteController\AboutUsController');
    Route::resource ('/bookAppointment', 'App\Http\Controllers\WebsiteController\bookAppointmentController');
    Route::resource ('/ContactUs', 'App\Http\Controllers\WebsiteController\ContactUsController');
    Route::resource ('/Services', 'App\Http\Controllers\WebsiteController\ServicesController');
    Route::resource ('/SignIn', 'App\Http\Controllers\WebsiteController\SignInController');
    Route::resource ('/SignUp', 'App\Http\Controllers\WebsiteController\SignUpController');

});


Route::get ('webSite/Appointment/Create','App\Http\Controllers\WebsiteController\bookAppointmentController@store')->name ('webSite.bookAppointment.store');
Route::get('myform/ajax/{id}',[bookAppointmentController::class, 'myformAjax']);
Route::get ('webSite/opinions/Store','App\Http\Controllers\WebsiteController\homePageController@Notes')->name ('webSite.opinions.store');

Route::post ('/addMassege',[ContactUsController::class, 'store'])->name ('contact.send.mail');

Route::group (['prefix' => 'Patient'], function () {
    Route::resource ('/HomePage', 'App\Http\Controllers\PatientC0ntrpller\homePageController');
    Route::resource ('/AboutUs', 'App\Http\Controllers\PatientC0ntrpller\AboutUsController');
    Route::resource ('/bookAppointment', 'App\Http\Controllers\PatientC0ntrpller\bookAppointmentController');
    Route::resource ('/ContactUs', 'App\Http\Controllers\PatientC0ntrpller\ContactUsController');
    Route::resource ('/Services', 'App\Http\Controllers\PatientC0ntrpller\ServicesController');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
