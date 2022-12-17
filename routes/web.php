<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\ExamCategoryController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestQuestionController;
use App\Http\Controllers\front\FrontHomeController;
use App\Http\Controllers\front\AuthController;
use Illuminate\Routing\Router;

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


 Route::get('/',function(){
    return redirect()->route('front.index');
 });
Route::prefix('front')->group(function () {
    Route::controller(FrontHomeController::class)->group(function () {
        Route::get('index', 'index')->name('front.index');
    });
    Route::controller(AuthController::class)->group(function () {
        Route::get('login', 'login')->name('front.login');
        Route::post('register','register')->name('front.register');
        Route::post('postlogin', 'postlogin')->name('front.postlogin');
        Route::get('logout','logout')->name('front.logout');
    });
});
Route::middleware(['auth'])->group(function () {
    Route::prefix('front')->group(function () {
        Route::get('studentdashboard',[FrontHomeController::class,'dashboard'])->name('front.dashboard');
        Route::get('studentprofile',[FrontHomeController::class,'profile'])->name('front.profile');
        Route::get('studentchangepassword',[FrontHomeController::class,'changepassword'])->name('front.changepassword');
        Route::post('postchangepassword',[FrontHomeController::class,'updatePassword'])->name('front.postchangepassword');
    });
});
/* Admin Route */
Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login-validate', 'login')->name('login-validate');
    Route::get('logout', 'logout')->name('logout');
});

Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('forgotpassword', 'forgotpassword')->name('forgotpassword');
    Route::post('send-mail-forgotpassword', 'sendEmailForgotPassword')->name('send-mail-forgotpassword');
    Route::get('resetpassword/{email}', 'resetpassword')->name('resetpassword');
    Route::post('resetpassword', 'postResetPassword')->name('post-resetpassword');
});

Route::middleware(['auth','prevent-back-history'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::controller(HomeController::class)->group(function () {
            Route::get('dashboard', 'dashboard')->name('admin.dashboard');
            Route::get('profile', 'profile')->name('admin.profile');
            Route::post('update-profile', 'updateProfile')->name('admin.update.profile');
            Route::post('update-password', 'updatePassword')->name('admin.update.pssword');
        });
        Route::controller(CountryController::class)->group(function () {
            Route::get('country', 'index')->name('admin.country');
            Route::post('get-country-list', 'getCountryList')->name('admin.get-country-list');
            Route::get('add-country', 'create')->name('admin.country.add');
            Route::post('store-country', 'store')->name('admin.country.store');
            Route::get('edit-country/{id}', 'edit')->name('admin.country.edit');
            Route::post('update-country/{id}', 'update')->name('admin.country.update');
            Route::post('delete-country', 'delete')->name('admin.country.delete');
        });
        Route::controller(StateController::class)->group(function () {
            Route::get('state', 'index')->name('admin.state');
            Route::post('get-state-list', 'getStateList')->name('admin.get-state-list');
            Route::get('add-state', 'create')->name('admin.state.add');
            Route::post('store-state', 'store')->name('admin.state.store');
            Route::get('edit-state/{id}', 'edit')->name('admin.state.edit');
            Route::post('update-state/{id}', 'update')->name('admin.state.update');
            Route::post('delete-state', 'delete')->name('admin.state.delete');
        });
        Route::controller(ExamCategoryController::class)->group(function () {
            Route::get('examcategory', 'index')->name('admin.examcategory');
            Route::post('get-examcategory-list', 'getExamCategoryList')->name('admin.get-examcategory-list');
            Route::get('add-examcategory', 'create')->name('admin.examcategory.add');
            Route::post('store-examcategory', 'store')->name('admin.examcategory.store');
            Route::get('edit-examcategory/{id}', 'edit')->name('admin.examcategory.edit');
            Route::post('update-examcategory/{id}', 'update')->name('admin.examcategory.update');
            Route::post('delete-examcategory', 'delete')->name('admin.examcategory.delete');
        });
        Route::controller(ExamController::class)->group(function () {
            Route::get('exam', 'index')->name('admin.exam');
            Route::post('get-exam-list', 'getExamList')->name('admin.get-exam-list');
            Route::get('add-exam', 'create')->name('admin.exam.add');
            Route::post('get-state', 'get_StateList')->name('admin.getstate');
            Route::post('store-exam', 'store')->name('admin.exam.store');
            Route::get('edit-exam/{id}', 'edit')->name('admin.exam.edit');
            Route::post('update-exam/{id}', 'update')->name('admin.exam.update');
            Route::post('delete-exam', 'delete')->name('admin.exam.delete');
        });
        Route::controller(PlanController::class)->group(function () {
            Route::get('plan', 'index')->name('admin.plan');
            Route::post('get-plan-list', 'getPlanList')->name('admin.get-plan-list');
            Route::get('add-plan', 'create')->name('admin.plan.add');
            Route::post('store-plan', 'store')->name('admin.plan.store');
            Route::get('edit-plan/{id}', 'edit')->name('admin.plan.edit');
            Route::post('update-plan/{id}', 'update')->name('admin.plan.update');
            Route::post('delete-plan', 'delete')->name('admin.plan.delete');
        });
        Route::controller(SubjectController::class)->group(function () {
            Route::get('subject', 'index')->name('admin.subject');
            Route::post('get-subject-list', 'getSubjectList')->name('admin.get-subject-list');
            Route::get('add-subject', 'create')->name('admin.subject.add');
            Route::post('store-subject', 'store')->name('admin.subject.store');
            Route::get('edit-subject/{id}', 'edit')->name('admin.subject.edit');
            Route::post('update-subject/{id}', 'update')->name('admin.subject.update');
            Route::post('delete-subject', 'delete')->name('admin.subject.delete');
        });
        Route::controller(SubjectController::class)->group(function () {
            Route::get('subject', 'index')->name('admin.subject');
            Route::post('get-subject-list', 'getSubjectList')->name('admin.get-subject-list');
            Route::get('add-subject', 'create')->name('admin.subject.add');
            Route::post('store-subject', 'store')->name('admin.subject.store');
            Route::get('edit-subject/{id}', 'edit')->name('admin.subject.edit');
            Route::post('update-subject/{id}', 'update')->name('admin.subject.update');
            Route::post('delete-subject', 'delete')->name('admin.subject.delete');
        });
        Route::controller(TestController::class)->group(function () {
            Route::get('test', 'index')->name('admin.test');
            Route::post('get-test-list', 'getTestList')->name('admin.get-test-list');
            Route::get('add-test', 'create')->name('admin.test.add');
            Route::post('store-test', 'store')->name('admin.test.store');
            Route::get('edit-test/{id}', 'edit')->name('admin.test.edit');
            Route::post('update-test/{id}', 'update')->name('admin.test.update');
            Route::post('delete-test', 'delete')->name('admin.test.delete');
        });
        Route::controller(TestQuestionController::class)->group(function () {
            Route::get('question', 'index')->name('admin.question');
            Route::post('get-question-list', 'getQuestionList')->name('admin.get-question-list');
            Route::get('view-question/{id}', 'show')->name('admin.question.show');
            Route::get('add-question', 'create')->name('admin.question.add');
            Route::post('store-question', 'store')->name('admin.question.store');
            Route::get('edit-question/{id}', 'edit')->name('admin.question.edit');
            Route::post('update-question/{id}', 'update')->name('admin.question.update');
            Route::post('delete-question', 'delete')->name('admin.question.delete');
        });
    });
});
