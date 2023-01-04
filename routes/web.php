<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CreditTransferController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\AccountActivityController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\ListUserController;
use App\Http\Controllers\Admin\ListLoanController;
use App\Http\Middleware\Authenticate;

Route::redirect('/', 'home')->name('dashboard');

Route::get('home', [HomeController::class, 'index'])->name('home', '/');

Route::get('about', [AboutController::class, 'index'])->name('about');

Route::get('login', [LoginController::class, 'index'])->name('login');

Route::post('login', [LoginController::class, 'doLogin'])->name('login.auth');

// Route::middleware('Auth')->get('/', function() {
//     return "Berhasil Login";
// });

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('signup', [SignUpController::class, 'signup'])->name('signup'); 

Route::post('signup/action', [SignUpController::class, 'actionsignup'])->name('actionsignup');

Route::get('signup/verify/{verify_key}', [SignUpController::class, 'verify'])->name('verify');

Route::get('profile/{id}', [ProfileController::class, 'profile'])->name('profile');

Route::get('credittransfer', [CreditTransferController::class, 'index'])->middleware('auth')->name('credittransfer'); 

Route::get('credittransfer/search', [CreditTransferController::class, 'searchindex'])->middleware('auth')->name('credittransfer/search'); 

Route::post('credittransfer/action/search', [CreditTransferController::class, 'searchcard'])->middleware('auth')->name('credittransfer/action/search'); 

Route::post('credittransfer/action/register', [CreditTransferController::class, 'registercard'])->middleware('auth')->name('credittransfer/action/register'); 

Route::get('credittransfer/listcard', [CreditTransferController::class, 'listcard'])->middleware('auth')->name('credittransfer/listcard'); 

Route::get('credittransfer/transfer/{cardnumber}', [CreditTransferController::class, 'transfer'])->middleware('auth')->name('credittransfer/transfer');

Route::post('credittransfer/transfer/action', [CreditTransferController::class, 'transferaction'])->middleware('auth')->name('credittransfer/transfer/action'); 

Route::get('accountactivity/{cardnumber}', [AccountActivityController::class, 'index'])->middleware('auth')->name('accountactivity');

Route::get('forgotpassword', [ForgetPasswordController::class, 'index'])->name('forgotpassword');

Route::post('forgotpassword/action', [ForgetPasswordController::class, 'sendotp'])->name('forgotpasswordaction');

Route::get('otpverify/{email}/{token}', [ForgetPasswordController::class, 'otpverify'])->name('otpverify');

Route::post('changepassword', [ForgetPasswordController::class, 'changepassword'])->name('changepassword');

Route::get('loan', [LoanController::class, 'index'])->middleware('auth')->name('loan');

Route::get('loan/termandcondition', [LoanController::class, 'termandcondition'])->middleware('auth')->name('loan/termandcondition');

Route::post('loan/create/nominal', [LoanController::class, 'createloannominal'])->middleware('auth')->name('loan/create/nominal');

Route::get('loan/create/nominal', [LoanController::class, 'createloannominalindex'])->middleware('auth')->name('loan/create/nominal');

Route::post('loan/create/installment', [LoanController::class, 'createloaninstallment'])->middleware('auth')->name('loan/create/installment');

Route::post('loan/create/calcuate', [LoanController::class, 'createloancalcuate'])->middleware('auth')->name('loan/create/calcuate');

Route::post('loan/create', [LoanController::class, 'createloan'])->middleware('auth')->name('loan/create');

Route::get('loan/list/{cardnumber}', [LoanController::class, 'listloan'])->middleware('auth')->name('loan/list');

Route::post('loan/uploadktp', [LoanController::class, 'storektp'])->middleware('auth')->name('loan/uploadktp');

Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin/login');

Route::post('admin/login', [AdminLoginController::class, 'doLogin'])->name('admin/login.auth');

Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin/logout');

// Route::get('admin/dashboard', [DashboardController::class, 'index'])->middleware('admin')->name('admin/dashboard');

Route::get('admin/listusers', [ListUserController::class, 'index'])->name('admin/listusers');

Route::get('admin/listloan', [ListLoanController::class, 'index'])->middleware('admin')->name('admin/listloan');

Route::post('admin/listloan/reject', [ListLoanController::class, 'reject'])->middleware('admin')->name('admin/listloan/reject');

Route::post('admin/listloan/rejectktp', [ListLoanController::class, 'rejectktp'])->middleware('admin')->name('admin/listloan/rejectktp');

Route::post('admin/listloan/approve', [ListLoanController::class, 'approve'])->middleware('admin')->name('admin/listloan/approve');
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

