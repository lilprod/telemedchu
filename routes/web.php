<?php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

//Website

Route::feeds();

Route::get('/', 'PagesController@index')->name('index');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/contact', 'PagesController@contact')->name('contact');

Route::get('/about', 'PagesController@about')->name('about');

Route::get('/timeline', 'PagesController@timeline')->name('timeline');

/*Route::get('timelines/{id}/details', ['as' => 'timeline.show', 'uses' => 'PagesController@details']);*/

Route::get('timeline/{slug}', ['as' => 'timeline.show', 'uses' => 'PagesController@details']);

Route::get('sante/{slug}', ['as' => 'sante.show', 'uses' => 'PagesController@show']);

Route::get('newsletter','NewsletterController@create');

Route::post('newsletter','NewsletterController@store');

Route::get('pages/check_slug', 'PagesController@check_slug')->name('pages.check_slug');

Route::get('pages/post_slug', 'PagesController@post_slug')->name('pages.post_slug');

Route::get('/sitemap.xml', 'SitemapController@sitemap');

//Statistiques
Route::get('/statistiques/consultation', 'StatsController@consultation')->name('stats-consultation');

Route::get('/statistiques/examination', 'StatsController@examination')->name('stats-examination');

Route::post('/statistiques/fetch_consultation', 'StatsController@fetch_consultation')->name('stats.fetch_consultation');

Route::post('/statistiques/fetch_examination', 'StatsController@fetch_examination')->name('stats.fetch_examination');

Route::get('/patient/department', 'StatsController@patient')->name('patient-department');

Route::get('/doctor/department', 'StatsController@doctor')->name('doctor-department');

Route::get('/patient/search', 'StatsController@search_patient')->name('patient_search');

Route::get('/doctor/search', 'StatsController@search_doctor')->name('doctor_search');

Route::get('/patient_search/action', 'DashboardController@action')->name('patient_search.action');

Route::get('/appointment_search/action', 'PatientManagerController@action')->name('appointment_search.action');

Route::get('patient/{id}/antecedent', ['as' => 'antecedent.create', 'uses' => 'AntecedentController@addAntecedent']);

Route::get('patient/{id}/biometry', ['as' => 'biometry.create', 'uses' => 'BiometryController@addBiometry']);

Route::get('/doctor/patients', 'DoctorManagerController@mypatients')->name('doctor-patients');

Route::get('/prescriptionbiologies', 'PrescriptionController@prescriptionBiologies')->name('prescriptionbiologies');

Route::get('/myprescriptions', 'PatientManagerController@myPrescriptions')->name('myprescriptions');

Route::get('/doctor/posts', 'DoctorManagerController@myposts')->name('doctor-posts');

Route::get('/doctor/consultations', 'DoctorManagerController@myconsultations')->name('doctor-consultations');

Route::get('/doctor/examinations', 'DoctorManagerController@myexaminations')->name('doctor-examinations');

Route::get('/doctor/prescriptions', 'DoctorManagerController@myprescriptions')->name('doctor-prescriptions');

Route::get('/doctor/examprescriptions', 'DoctorManagerController@mybiologies')->name('doctor-examprescriptions');

Route::get('/doctor/patient-results', 'DoctorManagerController@patientResults')->name('doctor-patientResults');

Route::get('/doctor/pending-appointments', 'DoctorManagerController@mypendingApt')->name('doctor-pendingappointments');

Route::get('/doctor/appointments', 'DoctorManagerController@myAppointments')->name('doctor-appointments');

//Patient

Route::get('/mybiologies', 'PatientManagerController@myBiologies')->name('mybiologies');

Route::get('/myconsultations', 'PatientManagerController@myConsultations')->name('myconsultations');

Route::get('/myappointments', 'PatientManagerController@myAppointments')->name('myappointments');

Route::get('/myarchivedapts', 'PatientManagerController@myarchivedApt')->name('myarchivedapts');

Route::get('/myexaminations', 'PatientManagerController@myExaminations')->name('myexaminations');

Route::get('/checkpatient/pendingexamination', 'PatientManagerController@mypendingExams')->name('checkpatient_pendingexamination');

Route::get('patient/{id}/prescriptionInvoice', ['as' => 'prescription.invoice', 'uses' => 'PatientManagerController@pdfexport']);

Route::get('patient/{id}/prescriptionExamInvoice', ['as' => 'prescriptionExam.invoice', 'uses' => 'PatientManagerController@pdfexportexam']);

Route::get('/patient/{id}/results', ['as' => 'result.create', 'uses' => 'PatientManagerController@addResult']);

Route::post('/result', 'PatientManagerController@postResult')->name('result');

Route::get('/setting', 'ProfilController@setting')->name('setting');

Route::get('/edit/profil', 'ProfilController@editProfil')->name('editprofil');

Route::post('/updatepassword', 'ProfilController@updatePassword')->name('updatepassword');

Route::get('/checkpatient/prescription', 'ExaminationController@getPrescription')->name('checkpatient_prescription');

Route::get('patient/{id}/examination', ['as' => 'examination.create', 'uses' => 'ExaminationController@addExamination']);

Route::get('/checkpatient/consultation', 'ConsultationController@getPatient')->name('checkpatient_consultation');

Route::get('patient/{id}/consultation', ['as' => 'consultation.create', 'uses' => 'ConsultationController@addConsultation']);

Route::get('/checkconsultation/prescription', 'PrescriptionController@getConsultation')->name('checkconsultation_prescription');

Route::get('consultation/{id}/prescription', ['as' => 'prescription.create', 'uses' => 'PrescriptionController@addPrescription']);

Route::get('/our-services', 'PagesController@services')->name('services');

Route::post('/contact', 'ContactController@store')->name('contact');

Route::get('events', 'EventController@index');

//Route::get('/chat', 'ChatsController@index')->name('chat');

Route::get('fetchmessages', 'ChatsController@fetchMessages')->name('fetchMessages');

Route::post('messages', 'ChatsController@sendMessage')->name('sendMessage');

Route::post('seenmessage', 'ChatsController@seenMessage')->name('seenMessage');

Route::get('/typing', 'ChatsController@getTyping')->name('typing');

/*Route::get('/getCurrentUser', 'ChatsController@getCurrentUser')->name('getCurrentUser');*/

Route::get('/getDoctors', 'PagesController@getDoctors')->name('getDoctors');

Route::post('/takeup', 'DoctorManagerController@takeUp')->name('takeUp');

Route::post('/take/{id}', ['as' => 'take', 'uses' => 'DoctorManagerController@take']);

Route::post('/checkup', 'AppointmentController@check')->name('checkUp');

Route::post('/archivedapt', 'DoctorManagerController@archivedApt')->name('archivedapt');

Route::get('prescriptions/{id}/prescriptionexamShow', ['as' => 'prescriptionexam.show', 'uses' => 'PrescriptionController@precriptExamshow']);

Route::get('patient/{id}/result', ['as' => 'result.show', 'uses' => 'DoctorManagerController@patientResultshow']);

Route::post('/interpretation', 'DoctorManagerController@postDoctorResult')->name('interpretation');

Route::get('/getNotifs', 'NotificationController@lastNotifAjax')->name('getNotifs');

Route::get('/updateStatus', 'NotificationController@updateStatusAjax')->name('updateStatus');

Route::post('/updatepassword', 'ProfilController@updatePassword')->name('updatepassword');

Route::resource('departments', 'DepartmentController');

Route::resource('examinations', 'ExaminationController');

Route::resource('medications', 'MedicationController');

Route::resource('appointments', 'AppointmentController');

Route::resource('posts', 'PostController');

Route::resource('prescriptions', 'PrescriptionController');

Route::resource('typeprescriptions', 'TypeprescriptionController');

Route::resource('antecedents', 'AntecedentController');

Route::resource('biometries', 'BiometryController');

Route::resource('notifications', 'NotificationController');

Route::resource('consultations', 'ConsultationController');

Route::resource('doctors', 'DoctorController');

Route::resource('patients', 'PatientController');

Route::resource('profils', 'ProfilController');

Route::resource('blog', 'BlogController');

Route::resource('timelines', 'TimelineController');

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('historiques', 'HistoriqueController');

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);

    return redirect()->back();
});

/* Route::get('/create_role_permission', function () {
    $role = Role::create(['name' => 'Administrer']);
    $permission = Permission::create(['name' => 'Roles Administration & Permission']);
    auth()->user()->assignRole('Administrer');
    auth()->user()->givePermissionTo('Roles Administration & Permission');
}); */

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

/* Route::get('/', function () {
    return view('welcome');
}); */
