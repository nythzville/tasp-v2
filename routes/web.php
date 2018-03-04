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
	Route::post('/student/{id}/available_class', 'AdminStudentController@update_available_class');
	Route::Resource('/student', 'AdminStudentController');
	Route::Resource('/student/{id}/booking', 'AdminStudentController@booking');

	// Teacher
	Route::get('/teacher/ranking', 'AdminTeacherController@ranking');
	Route::post('/teacher/ranking', 'AdminTeacherController@ranking_post');
	Route::get('/teacher/{id}/profile', 'AdminTeacherController@profile');
	Route::Resource('/teacher/{teacher_id}/schedule', 'AdminTeacherScheduleController');
	Route::post('/teacher/{teacher_id}/edit_desc', 'AdminTeacherController@edit_desc');
	Route::post('/teacher/{id}/recording', 'AdminTeacherController@recording');
	Route::post('/teacher/{id}/crop_image', 'AdminTeacherController@crop_image');
	Route::Resource('/teacher', 'AdminTeacherController');

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
	Route::get('/teacher/{id}/schedule', 'AdminTeacherController@get_teacher_sched');
	Route::get('/student/{id}/trial_class', 'AdminStudentController@student_trial_class_teacher');
	Route::get('/student/{student_id}/teacher/{teacher_id}/trial_class', 'AdminStudentController@trial_class');
	Route::post('/student/{student_id}/teacher/{teacher_id}/trial_class', 'AdminStudentController@book_trial_class');
	Route::post('/student/{id}/crop_image', 'AdminStudentController@crop_image');

	// Route::get('/users', 'AdminUserController@index');

	// Book Regular Class
	Route::get('/student/{id}/book', 'AdminStudentController@book');
	Route::get('/student/{student_id}/teacher/{teacher_id}/book', 'AdminStudentController@book_by_teacher');
	Route::post('/student/{student_id}/teacher/{teacher_id}/book', 'AdminStudentController@book_regular_class');


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


	Route::Resource('/student', 'AgentStudentController');
	Route::get('/teacher', 'AgentTeacherController@index');
	Route::get('/teacher/{id}', 'AgentTeacherController@show');

	Route::get('/teacher/{id}/schedule', 'AgentTeacherController@get_teacher_sched');

	Route::get('/student/{id}/trial_class', 'AgentStudentController@student_trial_class_teacher');
	Route::get('/student/{student_id}/teacher/{teacher_id}/trial_class', 'AgentStudentController@trial_class');
	Route::post('/student/{student_id}/teacher/{teacher_id}/trial_class', 'AgentStudentController@book_trial_class');
	Route::get('/class', 'AgentClassController@index');

	// Book Regular Class
	Route::get('/student/{id}/book', 'AgentStudentController@book');
	Route::get('/student/{student_id}/teacher/{teacher_id}/book', 'AgentStudentController@book_by_teacher');
	Route::post('/student/{student_id}/teacher/{teacher_id}/book', 'AgentStudentController@book_regular_class');



	/* News Routes */
	Route::get('/news', 'AgentNewsController@index');

});

Route::get('/{any}', function($any){
    return Redirect::to('/');
})->where('any', '.*');