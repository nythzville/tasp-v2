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
use App\Teacher;
use App\TeacherSchedule;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home/fileinfo', function(){
	return phpinfo();
});


// Route::get('/home', 'HomeController@index');
Route::get('/home'
, function () {
	$teachers = Teacher::rightJoin('teachers_rank', 'teachers_rank.teacher_id', '=', 'teachers.id')
            ->orderBy('teachers_rank.rank', 'ASC')
            ->limit(5)->get();
    $data['teachers'] = $teachers;        
    return view('front.home')->with($data);

});

	
/*  Front Views */
Route::get('/', function () {
	$teachers = Teacher::rightJoin('teachers_rank', 'teachers_rank.teacher_id', '=', 'teachers.id')
            ->orderBy('teachers_rank.rank', 'ASC')
            ->limit(5)->get();
    $data['teachers'] = $teachers;        
    return view('front.home')->with($data);

});

	
/*  Online School Views */
Route::get('/online-school', function () {
	$teachers = Teacher::rightJoin('teachers_rank', 'teachers_rank.teacher_id', '=', 'teachers.id')
            ->orderBy('teachers_rank.rank', 'ASC')
            ->limit(5)->get();
    $data['teachers'] = $teachers;        
    return view('front.online-school')->with($data);

});
Route::get('/blog', function () {
    return view('front.blog');
});
Route::get('/contact-us', function () {
    return view('front.contact');
});
Route::get('/faq', function () {
    return view('front.faq');
});

// Route::get('/online-school', function () {
//     return view('front.online-school');
// });
Route::get('/our-tutors', function () {
    return view('front.our-tutors');
});

Route::get('/english-test', function () {
    return view('front.english-test');
});
Route::get('/kids-english', function () {
    return view('front.kids-english');
});
Route::get('/business-english', function () {
    return view('front.business-english');
});
Route::get('/everyday-english', function () {
    return view('front.everyday-english');
});


Route::post('/trial_application', 'FrontController@trial_class_application');

//
//
// Route::auth();

Route::get('/redirect', 'UserController@index');

// Route::get('/home', 'HomeController@index');

// Route::get('/dashboard',['middleware' => ['admin'], function () {
	
//     return "Hello Admin";
// }]);


// Routes for Student
Route::group(['prefix' => 'student', 'namespace'=> 'Student', 'middleware' => 'student'], function () {
	
	Route::post('/crop_image', 'ProfileController@crop_image');

	Route::get('/profile', 'ProfileController@index');
	Route::get('/progress_report', 'ProfileController@progress_report');


	Route::get('/teachers', 'StudentTeacherController@index');
	Route::get('/teachers/{id}', 'StudentTeacherController@show');


	Route::post('/book/available/teacher', 'StudentClassController@getAvailableTeacher');
	
	Route::get('/book/date/{date}', 'StudentClassController@bookByDate');
	Route::get('/book/time', 'StudentClassController@bookByTime');
	Route::get('/book/teacher/{id}', 'StudentClassController@bookByteacher');
	Route::get('/book', 'StudentClassController@book');

	Route::get('/classes/{id}/evaluation', 'StudentClassController@class_evaluation');
	Route::get('/classes/{id}/evaluation/print', 'StudentClassController@class_evaluation_print');

	Route::get('/classes/today', 'StudentClassController@classes_today');
	Route::get('/classes/completed', 'StudentClassController@classes_completed');
	Route::get('/classes/upcoming', 'StudentClassController@upcoming_classes');
	Route::get('/classes/booked', 'StudentClassController@booked_classes');

	Route::delete('/classes/{id}', 'StudentClassController@destroy');

	Route::get('/classes', 'StudentClassController@index');
	Route::post('/classes', 'StudentClassController@store');

	/* News Routes */

	Route::get('/news', 'StudentNewsController@index');

	// Route::get('/users', 'AdminUserController@index');

});


// Routes for Admin
Route::group(['prefix' => 'admin', 'namespace'=> 'Admin', 'middleware' => 'admin'], function () {
	
	Route::get('/dashboard', 'AdminDashboardController@index');
	Route::post('/records', 'AdminDashboardController@get_graph');

	
	Route::Resource('/user', 'AdminUserController');
	Route::get('/profile', 'AdminUserController@profile');
	Route::post('/profile', 'AdminUserController@update_profile');
	Route::post('/crop_image', 'AdminUserController@crop_image');


	// Student 
	Route::post('/students/{id}/available_class', 'AdminStudentController@update_available_class');
	Route::Resource('/students', 'AdminStudentController');
	Route::Resource('/students/{id}/booking', 'AdminStudentController@booking');

	// Teacher
	Route::get('/teachers/ranking', 'AdminTeacherController@ranking');
	Route::post('/teachers/ranking', 'AdminTeacherController@ranking_post');
	Route::get('/teachers/{id}/profile', 'AdminTeacherController@profile');
	Route::Resource('/teachers/{teacher_id}/schedule', 'AdminTeacherScheduleController');
	Route::post('/teachers/{teacher_id}/edit_desc', 'AdminTeacherController@edit_desc');
	Route::post('/teachers/{id}/recording', 'AdminTeacherController@recording');
	Route::post('/teachers/{id}/crop_image', 'AdminTeacherController@crop_image');
	Route::Resource('/teachers', 'AdminTeacherController');

	// Agent
	Route::post('/agents/{id}/crop_image', 'AdminAgentController@crop_image');
	Route::Resource('/agents', 'AdminAgentController');
	Route::Resource('/course', 'AdminCourseController');
	
	// Classes
	Route::get('/classes/{id}/evaluation', 'AdminClassController@class_evaluation');
	Route::post('/classes/{id}/evaluation', 'AdminClassController@update_class_evaluation');
	Route::post('/classes/{id}/cancel', 'AdminClassController@cancel_class');

	Route::get('/classes/{id}/evaluate_trial', 'AdminClassController@evaluate_trial_form');
	Route::post('/classes/{id}/evaluate_trial', 'AdminClassController@evaluate_trial');
	
	Route::Resource('/classes', 'AdminClassController');

	Route::Resource('/news', 'AdminNewsController');

	// Reports
	Route::get('/reports', 'AdminReportController@index');


	// Student Trial Class
	Route::get('/teachers/{id}/schedule', 'AdminTeacherController@get_teacher_sched');
	Route::get('/students/{id}/trial_class', 'AdminStudentController@student_trial_class_teacher');
	Route::get('/students/{student_id}/teachers/{teacher_id}/trial_class', 'AdminStudentController@trial_class');
	Route::post('/students/{student_id}/teachers/{teacher_id}/trial_class', 'AdminStudentController@book_trial_class');
	Route::post('/students/{id}/crop_image', 'AdminStudentController@crop_image');

	// Route::get('/users', 'AdminUserController@index');

	// Book Regular Class
	Route::get('/students/{id}/book', 'AdminStudentController@book');
	Route::get('/students/{student_id}/teachers/{teacher_id}/book', 'AdminStudentController@book_by_teacher');
	Route::post('/students/{student_id}/teachers/{teacher_id}/book', 'AdminStudentController@book_regular_class');


});


// Routes for Teacher
Route::group(['prefix' => 'teacher', 'namespace'=> 'Teacher', 'middleware' => 'teacher'], function () {

	Route::get('/classes/weekly', 'TeacherClassController@weekly_class');	

	Route::get('/classes/today', 'TeacherClassController@classes_today');	
	Route::get('/classes/upcoming', 'TeacherClassController@upcoming_classes');
	Route::get('/classes/completed', 'TeacherClassController@completed_classes');	
	Route::get('/classes/booked', 'TeacherClassController@booked_classes');	

	Route::get('/classes/{id}/evaluation', 'TeacherClassController@class_evaluation');
	Route::post('/classes/{id}/evaluation', 'TeacherClassController@update_class_evaluation');

	Route::get('/classes/{id}/evaluate_trial', 'TeacherClassController@evaluate_trial_form');
	Route::post('/classes/{id}/evaluate_trial', 'TeacherClassController@evaluate_trial');

	Route::Resource('/classes', 'TeacherClassController');
	Route::get('/student/{id}', 'TeacherStudentController@show');
	Route::post('/student/{id}/progress-report', 'TeacherStudentController@progress_report');


	/* Profile Routes */
	Route::post('/crop_image', 'TeacherProfileController@crop_image');
	Route::Resource('/profile', 'TeacherProfileController');
	Route::Resource('/schedule', 'TeacherScheduleController');

	Route::post('/edit_desc', 'TeacherProfileController@edit_desc');
	Route::post('/recording', 'TeacherProfileController@recording');


	/* News Routes */

	Route::get('/news', 'TeacherNewsController@index');
});


// Routes for Agent
Route::group(['prefix' => 'agent', 'namespace'=> 'Agent', 'middleware' => 'agent'], function () {

	Route::get('/profile', 'AgentProfileController@index');
	Route::post('/crop_image', 'AgentProfileController@crop_image');


	Route::Resource('/students', 'AgentStudentController');
	Route::get('/teachers', 'AgentTeacherController@index');
	Route::get('/teachers/{id}', 'AgentTeacherController@show');

	Route::get('/teachers/{id}/schedule', 'AgentTeacherController@get_teacher_sched');

	Route::get('/students/{id}/trial_class', 'AgentStudentController@student_trial_class_teacher');
	Route::get('/students/{student_id}/teacher/{teacher_id}/trial_class', 'AgentStudentController@trial_class');
	Route::post('/students/{student_id}/teacher/{teacher_id}/trial_class', 'AgentStudentController@book_trial_class');
	Route::get('/classes', 'AgentClassController@index');
	Route::post('/classes/{id}/cancel', 'AgentClassController@cancel_class');
	Route::get('/classes/upcoming', 'AgentClassController@upcoming_classes');

	

	// Book Regular Class
	Route::post('/students/{id}/available_class', 'AgentStudentController@update_available_class');
	Route::get('/students/{id}/book', 'AgentStudentController@book');
	Route::get('/students/{student_id}/teachers/{teacher_id}/book', 'AgentStudentController@book_by_teacher');
	Route::post('/students/{student_id}/teachers/{teacher_id}/book', 'AgentStudentController@book_regular_class');



	/* News Routes */
	Route::get('/news', 'AgentNewsController@index');

});

Route::get('/{any}', function($any){
    return Redirect::to('/');
})->where('any', '.*');