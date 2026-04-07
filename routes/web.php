<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OurServiceController;
use App\Http\Controllers\Admin\ServiceTypeController;
use App\Http\Controllers\Admin\PaymentOrderController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\ClosedDurationController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\OpeningDurationController;
use App\Http\Controllers\Admin\ReminderSettingController;
use App\Http\Controllers\BookBirthCertificateController;

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
    return redirect()->route('home');
})->name('oldhome');



//Sitemap Routes
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap.index');


// User area designs

// new booking
// Route::get('/bookit', function () {
//     return view('book.index');
// });
Route::post('/bookings/getAvailableTimeSlot',[ BookingController::class, 'geAvailableTimeSlots']);
Route::post('/bookings/getAvailableService',[ BookingController::class, 'getAvailableService']);
Route::post('/bookings/getSingleService',[ BookingController::class, 'getSingleService']);
Route::group(['prefix' => 'DEACIL-professionals'], function () {
    Route::get('/', function () { return view('home');  })->name('home');
    Route::get('/bookings/preview/{refno}', [BookingController::class, 'displayBookedInformation'])->name('bookingPreview');
    Route::post('/bookings/process_manual', [BookingController::class, 'processManualBooking'])->name('processManualBooking');
    Route::get('/cheap-flight-ticket-to-nigeria', [BookingController::class, 'flightTicket'])->name('flightTicket');
    Route::post('/cheap-flight-ticket-to-nigeria', [BookingController::class, 'processFlightTicket'])->name('processflightTicket');
    Route::resource('/bookings', BookingController::class);
    Route::post('nin-down-request', [FrontController::class, 'processNinRegistrationDownNotification'])->name('nin-notification.store');
    Route::get('checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('checkout', [App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('checkout/success/{ref}', [App\Http\Controllers\CheckoutController::class, 'checkoutSuccess'])->name('checkout.success');
    

    Route::get('/payment/stp/success', [CheckoutController::class, 'stripeSuccess'])->name('stripe.success');
    Route::get('/payment/pp/success', [CheckoutController::class, 'paypalSuccess'])->name('paypal.success');
    Route::get('/payment/cancelled', [CheckoutController::class, 'paymentCancelled'])->name('payment.cancelled');
    Route::post('/payment/take/success', [CheckoutController::class, 'takepaymentSuccess'])->name('takepayment.success');

    //Paypal
    //Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
    Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
    Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
    Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');
    Route::get('contact', [App\Http\Controllers\FrontController::class, 'contactUs'])->name('contactUs');
    Route::post('contact', [App\Http\Controllers\FrontController::class, 'sendAdminMessage'])->name('sendAdminMessage');
    Route::get('process-nigerian-bvn', [FrontController::class, 'bvn'])->name('bvn');
    Route::get('process-nigerian-international-passport', [FrontController::class, 'nigerianPassport'])->name('nigerianPassport');
    Route::get('birth-certificate-options', [FrontController::class, 'certificateOptions'])->name('birthCertificateOptions');
    Route::get('national-population-commission-birth-certificate', [FrontController::class, 'birthCertificate'])->name('npc-birth-certificate');
    Route::get('pre-checkout/{slug}', [App\Http\Controllers\PreCheckoutController::class, 'show'])->name('pre-checkout.show');
    Route::post('pre-checkout', [App\Http\Controllers\PreCheckoutController::class, 'store'])->name('pre-checkout.store');
    Route::get('nigerian-tax-identification-number-tin', [FrontController::class, 'tin'])->name('tin');
});

Auth::routes();
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth'] ], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/settings', GeneralSettingController::class);
    Route::resource('/reminder-setting', ReminderSettingController::class);
    Route::resource('/durations', OpeningDurationController::class);
    Route::resource('/payments', PaymentOrderController::class);
    Route::resource('/locations', LocationController::class);
    Route::resource('/closed-durations', ClosedDurationController::class);
    Route::resource('/service-types', ServiceTypeController::class);
    Route::resource('/our-services', OurServiceController::class);
    Route::get('messages',[MessageController::class, 'messageList'])->name('messageList');
    Route::get('messages/{message}',[MessageController::class, 'viewMessage'])->name('viewMessage');
    Route::post('mark-message-as-unread/{message}',[MessageController::class, 'markMessageAsUnread'])->name('markMessageAsUnread');
    Route::group(['middleware' => ['auth.superadmin']], function(){
        Route::get('admins',[AdminController::class, 'adminList'])->name('adminList');
        Route::get('admins/new',[AdminController::class, 'newAdmin'])->name('newAdmin');
    });
    Route::get('appointments',[AdminController::class, 'appointmentList'])->name('appointmentList');
    Route::get('appointment-reschedule/{appointment}',[AdminController::class, 'appointmentReschedule'])->name('appointmentReschedule');
    Route::post('appointment-reschedule/{appointment}',[AdminController::class, 'appointmentRescheduleUpdate'])->name('appointmentRescheduleUpdate');
    Route::get('appointment-mark-as-done/{appointment}',[AdminController::class, 'markAsDone'])->name('markAsDone');
    Route::post('appointment-cancel/{appointment}',[AdminController::class, 'cancelAppointment'])->name('cancelAppointment')->missing(function () {
        return redirect()->route('admin.appointmentList')->with('error', 'Appointment record does not exist');
    });
});




Route::get('set-password', [ResetPasswordController::class, 'setPassword'])->name('set-password');
Route::post('save-password', [ResetPasswordController::class, 'savePassword'])->name('save-password');
Route::get('/reload-captcha', [FrontController::class, 'reloadCaptcha']);


// Auth

// Route::get('/login', function () {
//     return view('auth.login');
// });


// Route::get('/forgot-password', function () {
//     return view('auth.forgot-password');
// });


// Route::get('/forgot-password/success', function () {
//     return view('auth.forgot-password-success');
// });


// Route::get('/reset-password', function () {
//     return view('auth.reset-password');
// });


// Route::get('/reset-password/success', function () {
//     return view('auth.reset-password-success');
// });


// Route::get('/register/email-confirmation', function () {
//     return view('auth.email-confirmation');
// });


// Route::get('/register/email-confirmation/success', function () {
//     return view('auth.email-confirmation-success');
// });












// Admin Account

// Route::get('/admin', function () {
//     return view('admin.dashboard');
// });

// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// });

// Route::get('/admin/appointments', function () {
//     return view('admin.appointments.list');
// });

// Route::get('/admin/appointments/{id}', function () {
//     return view('admin.appointments.details');
// });

// Route::get('/admin/payments', function () {
//     return view('admin.payments.list');
// });

// Route::get('/admin/messages', function () {
//     return view('admin.messages.list');
// });

// Route::get('/admin/settings', function () {
//     return view('admin.settings.list');
// });

// Route::get('/admin/users', function () {
//     return view('admin.users.list');
// });

// Route::get('/admin/users/create', function () {
//     return view('admin.users.form');
// });

// Route::get('/admin/users/edit/{id}', function () {
//     return view('admin.users.form');
// });

// Route::get('/admin/messages', function () {
//     return view('admin.messages.list');
// });

// Route::get('/admin/messages/{id}', function () {
//     return view('admin.messages.details');
// });

// Route::get('/admin/settings', function () {
//     return view('admin.settings.list');
// });






// Email designs

Route::get('/emails', function () {
    return view('emails.index');
});

Route::get('/404', function () {
    return view('errors.404');
});
