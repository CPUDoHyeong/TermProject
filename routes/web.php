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

// 메인 홈
Route::get('/', function () {
    return view('home/index');
});

// 도움말 들어가면 기본적으로 보여줄 공지사항
Route::get('help', [
	'as' => 'help.notice',
	'uses' => 'HelpController@index'
]);

// 글 작성화면
Route::get('help/write_form', [
	'as' => 'help.write_form',
	'uses' => 'HelpController@write_form'
]);

// 글작성 처리
Route::POST('help/write', [
	'as' => 'help.write',
	'uses' => 'HelpController@write'
]);

// 상세글 보기 화면
Route::get('help/view/{id}', 'HelpController@view');

// 글 수정 화면
Route::get('help/update_form/{id}', 'HelpController@update_form');

// 글 수정 처리
Route::POST('help/update/{id}', 'HelpController@update');

// 글 삭제 처리
Route::get('help/delete/{id}', 'HelpController@delete');

// 연락하기
Route::get('help/contact', [
	'as' => 'help.contact',
	'uses' => 'HelpController@contact'
]);

// 회사소개
Route::get('help/about_company', [
	'as' => 'help.about_company',
	'uses' => 'HelpController@about_company'
]);

// 이용약관
Route::get('help/terms', [
	'as' => 'help.terms',
	'uses' => 'HelpController@terms'
]);



// 개인정보처리방침
Route::get('help/privacy', [
	'as' => 'help.privacy',
	'uses' => 'HelpController@privacy'
]);

// 연락하기에서 고객지원 버튼 누르면 뜰 iframe의 페이지
Route::get('customer_support', function() {
	return view('help.customer_support');
});

// surveyBoard route
// 설문조사 메인페이지(전체 설문)
Route::get('surveyBoard/whole_survey', [
	'as' => 'surveyBoard.whole_survey',
	'uses' => 'SurveyController@whole_survey'
]);

// 진행중인 설문조사
Route::get('surveyBoard/on_survey', [
	'as' => 'surveyBoard.on_survey',
	'uses' => 'SurveyController@on_survey'
]);

// 종료된 설문
Route::get('surveyBoard/off_survey', [
	'as' => 'surveyBoard.off_survey',
	'uses' => 'SurveyController@off_survey'
]);

// 설문작성
Route::get('surveyBoard/make_survey', [
	'as' => 'surveyBoard.make_survey',
	'uses' => 'SurveyController@make_survey'
]);

// 설문작성
Route::get('create_survey', 'surveyController@create_survey');

Route::get('surveyView', function () {
	return view('surveyBoard.surveyView');
});

// 로그인 화면
Route::get('member', [
	'as' => 'member',
	'uses' => 'MemberController@form'
]);

// 비밀번호 재설정 클릭 시
Route::get('member/password_reset', function () {
	return view('member.password_reset');
});

// 로그인 후 개인정보 변경 form
Route::get('user', [
	'as' => 'user',
	'uses' => 'UserController@index'
]);

// user 기본 사항 업데이트
Route::POST('user/userUpdate', [
	'as' => 'user.userUpdate',
	'uses' => 'UserController@userUpdate'
]);

// 비밀번호 변경 form
Route::get('user/pwUpdate_form', [
	'as' => 'user.pwUpdate_form',
	'uses' => 'UserController@pwUpdate_form'
]);

// 비밀번호 변경
Route::post('user/pwUpdate', [
	'as' => 'user.pwUpdate',
	'uses' => 'UserController@pwUpdate'
]);

// 구글 연동을 위한 route
Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');

// 페이스북 연동을 위한 route
// Route::get('/redirect', 'SocialAuthFacebookController@redirect');
// Route::get('/callback', 'SocialAuthFacebookController@callback');

// 깃허브 로그인
Route::get('social/{provider}', [
	'as' => 'social.login',
	'uses' => 'SocialAuthGithubController@execute',
]);






// Route::get('test/{name?}', function($name="홍길동"){
// 	return $name . ' 님, Test입니다.';
// });

Route::get('json', function() {
	$data = ['name'=>'Iron Man', 'gender'=>'Man'];
	return response()->json($data);
});

Route::get('hello', function(){	
	return View::make('hello.html');
});

Route::get('bbs', 'BBSController@index');

Route::get('view', 'BBSController@show');

Route::get('modify', 'BBSController@edit');

Route::post('modify','BBSController@update')->name('modify.update');

Route::get('write','BBSController@create');

Route::post('write', 'BBSController@store');

Route::post('delete', 'BBSController@destroy');

Route::get('contact', 'HelpController@contact');

Route::get('template', function(){
	return view('layouts.template');
});

Route::get('task/view', function() {
	$task = ['name' => 'Task1', 'due_date' => '2018-11-15'];
	return view('task.view')->with('task', $task);
});

Route::get('task/alert', function() {
	$task = ['name' => '라라벨 예제 작성', 
			 'due_date' => '2018-11-15',
			 'comment' => '<script>alert("Welcome");</script>'];

	return view('task.alert')->with('task', $task);
});

Route::get('task/list3', 'TaskController@list3');

Route::resource('test', 'resourceController');

Route::get('model/{name}', function($name) {
	return Artisan::call('make:model', ['name' => $name]);
});

// 라우트에서 배개변수를 받도록 설정하고 컨트롤러에 전달해야 한다면
Route::get('task/param/{id?}/{arg?}', 'TaskController@param');

// 라우트에 이름 지정하기
// 이렇게 하면 html에서 링크를 걸어준 것을 수정하지 않아도
// 아래의 post 다음에 나오는 경로만 바꿔주면 됨...
// html에서는 그냥 {{ route('task.add') }} 그대로 냅두면된다.
// 만약 as 가 바뀐다면 그땐 다 수정해줘야함 !! 개꿀
// Route::post('task/add', ['as' => 'task.add', 'uses' => 'TaskController@add']);
Route::post('/project/task/store', ['as' => 'task.add', 'uses' => 'TaskController@add']);

// 암시적 컨트롤러
// Route::controller를 사용해 라우팅과 컨트롤러를 지정
// 라라벨 5.3부터 controller는 사용할 수 없음 !!
// 그래서 resource 라는 것을 사용
Route::resource('orders', 'OrderController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('ajax', function() {
// 	return view('message');
// });

// Route::post('/getmsg', 'AjaxController@index');

// Route::get('test', function() {
// 	return view('test');
// });
