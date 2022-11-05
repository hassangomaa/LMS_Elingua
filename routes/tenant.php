<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Modules\FrontendManage\Entities\LoginPage;

Auth::routes(['verify' => true]);


Route::get('send-password-reset-link', 'Auth\ForgotPasswordController@SendPasswordResetLink')->name('SendPasswordResetLink');
Route::get('reset-password', 'Auth\ForgotPasswordController@ResetPassword')->name('ResetPassword');
Route::get('register', 'Auth\RegisterController@RegisterForm')->name('register');
Route::get('saas-signup', 'Auth\RegisterController@LmsRegisterForm')->name('lms_register');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::post('/resend', '\App\Http\Controllers\Auth\VerificationController@resend_mail')->name('verification_mail_resend');
Route::get('auto-login/{key}', '\App\Http\Controllers\Auth\LoginController@autologin')->name('auto.login');

//====================================SUB DOMAIN=============================
 Route::group(['middleware' => ['subdomain'], 'domain' => '{subdomain}.' . config('app.short_url')], function ($routes) {
     Route::get('/sub', function () {
         return "This will respond to requests for 'admin.localhost/'";
     });
 });
     Route::get('subdomain',function(){
         return '{subdomain}.'.config('app.short_url');
     });
//============================END SUB DOMAIN==================================
 Route::get('/test', 'Frontend\FrontendHomeController@test');

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'FrontendHomeController@index')->name('frontendHomePage');

    Route::get('/get-courses-by-category/{category_id}', 'EdumeFrontendThemeController@getCourseByCategory')->name('getCourseByCategory');
    //wetech theme controller
    Route::get('/wetech/{route_name}', 'WeTechFrontendThemeController@route')->name('weTechController');

    Route::get('/offline', 'WebsiteController@offline')->name('offline');

//    Route::get('/footer/page/{slug}', 'WebsiteController@page')->name('dynamic.page');
    Route::get('/about-us', 'WebsiteController@aboutData')->name('about');
    Route::get('/contact-us', 'WebsiteController@contact')->name('contact');
    Route::post('/contact-submit', 'WebsiteController@contactMsgSubmit')->name('contactMsgSubmit');
    Route::get('privacy', 'WebsiteController@privacy')->name('privacy');
    Route::get('calendar-view', 'WebsiteController@calendarView')->name('calendar-view');

    Route::get('instructors', 'InstructorController@instructors')->name('instructors');
    Route::get('become-instructor', 'InstructorController@becomeInstructor')->name('becomeInstructor');
    Route::get('instructorDetails/{id}/{name}', 'InstructorController@instructorDetails')->name('instructorDetails');

    Route::get('courses', 'CourseController@courses')->name('courses');
    Route::get('offer', 'CourseController@offer')->name('offer');
    Route::get('courses-details/{slug}', 'CourseController@courseDetails')->name('courseDetailsView');

    Route::get('free-course', 'CourseController@freeCourses')->name('freeCourses');

    Route::get('classes', 'ClassController@classes')->name('classes');
    Route::get('class-details/{slug}', 'ClassController@classDetails')->name('classDetails');
    Route::get('class-start/{slug}/{host}/{meeting_id}', 'ClassController@classStart')->name('classStart');

    Route::get('quizzes', 'QuizController@quizzes')->name('quizzes');
    Route::get('quiz-details/{slug}', 'QuizController@quizDetails')->name('quizDetailsView');
    Route::get('quizStart/{id}/{quiz_id}/{slug}', 'QuizController@quizStart')->name('quizStart');
    Route::post('quizSubmit', 'QuizController@quizSubmit')->name('quizSubmit');
    Route::post('quizTestStart', 'QuizController@quizTestStart')->name('quizTestStart')->middleware('auth');
    Route::post('singleQuizSubmit', 'QuizController@singleQuizSubmit')->name('singleQuizSubmit')->middleware('auth');
    Route::get('quizResult/{id}', 'QuizController@quizResult')->name('getQuizResult');
    Route::get('quizResultPreview/{id}', 'QuizController@quizResultPreview')->name('quizResultPreview');
    Route::get('quizResultPreviewApi/{quiz_id}', 'QuizController@quizResultPreviewApi')->name('quizResultPreviewApi')->middleware('auth');


    Route::get('search', 'WebsiteController@search')->name('search');
    Route::get('category/{id}/{name}', 'WebsiteController@categoryCourse')->name('categoryCourse');
    Route::get('sub_category/{id}/{slug}', 'WebsiteController@subCategoryCourse')->name('subCategory.course');

    Route::get('/certificate-verification', 'WebsiteController@searchCertificate')->name('searchCertificate');
    Route::post('/certificate-verification', 'WebsiteController@showCertificate')->name('showCertificate');
    Route::get('/verify-certificate/{number}', 'WebsiteController@certificateCheck')->name('certificateCheck');
    Route::get('/download-certificate/{number}', 'WebsiteController@certificateDownload')->name('certificateDownload');

    Route::get('blogs', 'BlogController@allBlog')->name('blogs');
    Route::get('blog-details/{slug}', 'BlogController@blogDetails')->name('blogDetails');
    Route::post('blog-comment-submit', 'BlogController@blogCommentSubmit')->name('blogCommentSubmit');
    Route::post('blog-comment-delete/{id}', 'BlogController@deleteBlogComment')->name('deleteBlogComment');
    Route::get('load-blog-data', 'BlogController@loadMoreData')->name('load-blog-data');

    Route::get('/addToCart/{id}', 'WebsiteController@addToCart')->name('addToCart');
    Route::get('/buyNow/{id}', 'WebsiteController@buyNow')->name('buyNow');
    Route::post('enrollOrCart/{id}', 'WebsiteController@enrollOrCart')->name('enrollOrCart');
    Route::get('my-cart', 'WebsiteController@myCart')->name('myCart');
    Route::get('ajaxCounterCity', 'WebsiteController@ajaxCounterCity')->name('ajaxCounterCity');
    Route::get('ajaxCounterState', 'WebsiteController@ajaxCounterState')->name('ajaxCounterState');
    Route::get('/home/removeItem/{id}', 'WebsiteController@removeItem')->name('removeItem');
    Route::get('/home/removeItemAjax/{id}', 'WebsiteController@removeItemAjax')->name('removeItemAjax');
    Route::post('/submit_ans', 'WebsiteController@submitAns')->name('submitAns');

    Route::get('referral/{code}', 'ReferalController@referralCode')->name('referralCode');
    Route::get('referral', 'ReferalController@referral')->name('referral');

    Route::get('pages/{slug}', 'WebsiteController@frontPage')->name('frontPage');
    Route::post('subscribe', 'WebsiteController@subscribe')->name('subscribe');
    Route::get('getItemList', 'WebsiteController@getItemList')->name('getItemList');

    //subscription module
    Route::get('/course/subscription', 'WebsiteController@subscription')->name('courseSubscription');
    Route::get('/course/subscription/{plan_id}', 'WebsiteController@subscriptionCourseList')->name('subscriptionCourseList');
    Route::get('/course-subscription/checkout', 'WebsiteController@subscriptionCheckout')->name('courseSubscriptionCheckout');
    Route::get('/subscription-courses', 'WebsiteController@subscriptionCourses')->name('subscriptionCourses');
    Route::get('/continue-course/{slug}', 'WebsiteController@continueCourse')->name('continueCourse');

    //saas module
    Route::get('/saas-packages', 'FrontendSaasController@index')->name('saasPackages');
    Route::get('/saas-packages/checkout', 'FrontendSaasController@saasCheckout')->name('saasCheckout');


    //org subscription module
    Route::get('/org-subscription-courses', 'WebsiteController@orgSubscriptionCourses')->name('orgSubscriptionCourses');
    Route::get('/org-subscription-plan-list/{id}', 'WebsiteController@orgSubscriptionPlanList')->name('orgSubscriptionPlanList');


    Route::post('comment', 'CommentController@saveComment')->name('saveComment')->middleware('auth');
    Route::post('comment-replay', 'CommentController@submitCommnetReply')->name('submitCommnetReply')->middleware('auth');
    Route::post('comment-delete/{id}', 'CommentController@deleteComment')->name('deleteComment')->middleware('auth');
    Route::post('review-delete/{id}', 'CommentController@deleteReview')->name('deleteReview')->middleware('auth');
    Route::post('comment-replay-delete/{id}', 'CommentController@deleteCommnetReply')->name('deleteCommentReply')->middleware('auth');


});
Route::group(['prefix' => 'saas', 'middleware' => ['auth']], function () {
    Route::post('payment', 'SaasPaymentController@payment')->name('saasPayment');
    Route::post('submit', 'SaasPaymentController@subscriptionSubmit')->name('saasSubmit');
    Route::get('paypalSaasSuccess', 'SaasPaymentController@paypalSubscriptionSuccess')->name('paypalSaasSuccess');
    Route::get('paypalSaasFailed', 'SaasPaymentController@paypalSubscriptionFailed')->name('paypalSaasFailed');

});

Route::group(['namespace' => 'Frontend', 'middleware' => ['student']], function () {
    Route::get('student-dashboard', 'StudentController@myDashboard')->name('studentDashboard');
    Route::get('my-courses', 'StudentController@myCourses')->name('myCourses');
    Route::get('my-classes', 'StudentController@myCourses')->name('myClasses');
    Route::get('my-online-course', 'StudentController@myCourses')->name('myOnlineCourse');
    Route::get('my-offline-course', 'StudentController@myCourses')->name('myOfflineCourse');
    Route::get('my-quizzes', 'StudentController@myCourses')->name('myQuizzes');
    Route::get('my-report', 'StudentController@myReports')->name('myReports');
    Route::get('my-certificate', 'StudentController@myCertificate')->name('myCertificate');
    Route::get('my-assignment', 'StudentController@myAssignment')->name('myAssignment');
    Route::get('my-assignment/{id}', 'StudentController@myAssignmentDetails')->name('myAssignment_details');
    Route::get('my-wishlist', 'StudentController@myWishlists')->name('myWishlists');
    Route::get('my-purchases', 'StudentController@myPurchases')->name('myPurchases');
    Route::get('my-bundle', 'StudentController@myBundle')->name('myBundle');
    Route::get('topic-report/{id}', 'StudentController@topicReport')->name('topicReport');
    Route::get('my-profile', 'StudentController@myProfile')->name('myProfile');
    Route::any('ajax-update-profile-image', 'StudentController@ajaxUploadProfilePic')->name('ajaxUploadProfilePic');
    Route::post('my-profile-update', 'StudentController@myProfileUpdate')->name('myProfileUpdate');
    Route::get('my-account', 'StudentController@myAccount')->name('myAccount');
    Route::post('my-password-update', 'StudentController@MyUpdatePassword')->name('MyUpdatePassword');
    Route::post('my-email-update', 'StudentController@MyEmailUpdate')->name('MyEmailUpdate');

    Route::get('deposit', 'StudentController@deposit')->name('deposit');
    Route::post('deposit', 'StudentController@deposit')->name('depositSelectOption');
    Route::get('logged-in/devices', 'StudentController@loggedInDevices')->name('logged.in.devices');
    Route::post('logged-out/device', 'StudentController@logOutDevice')->name('log.out.device');
    Route::get('invoice/{id}', 'StudentController@Invoice')->name('invoice');
    Route::get('subscription-invoice/{id}', 'StudentController@subInvoice')->name('subInvoice');
    Route::get('StudentApplyCoupon', 'StudentController@StudentApplyCoupon')->name('StudentApplyCoupon');
    Route::get('checkout', 'StudentController@CheckOut')->name('CheckOut');
    Route::get('remove-profile-pic', 'StudentController@removeProfilePic')->name('removeProfilePic');
    Route::get('course-certificate/{id}/{slug}', 'StudentController@getCertificate')->name('getCertificate');
    Route::post('/submitReview', 'StudentController@submitReview')->name('submitReview');

    Route::get('my-study-materials', 'StudyMaterialController@myHomework')->name('myHomework');
    Route::get('my-study-materials/{id}', 'StudyMaterialController@myHomeworkDetails')->name('myHomework_details');


});
Route::group(['middleware' => ['student']], function () {
    Route::get('my-notification-setup', 'NotificationController@myNotificationSetup')->name('myNotificationSetup');
    Route::get('my-notifications', 'NotificationController@myNotification')->name('myNotification');
});


//in this controller we can use for place order
Route::group(['prefix' => 'order', 'middleware' => ['auth']], function () {

    Route::post('submit', 'PaymentController@makePlaceOrder')->name('makePlaceOrder');
    Route::get('/payment', 'PaymentController@payment')->name('orderPayment');
    Route::post('/paymentSubmit', 'PaymentController@paymentSubmit')->name('paymentSubmit');
    //paypal url
    Route::get('paypal/success', 'PaymentController@paypalSuccess')->name('paypalSuccess');
    Route::get('paypal/failed', 'PaymentController@paypalFailed')->name('paypalFailed');
});
//deposit
Route::group(['prefix' => 'deposit', 'middleware' => ['auth']], function () {

    Route::post('submit', 'DepositController@depositSubmit')->name('depositSubmit');
    Route::get('paypalDepositSuccess', 'DepositController@paypalDepositSuccess')->name('paypalDepositSuccess');
    Route::get('paypalDepositFailed', 'DepositController@paypalDepositFailed')->name('paypalDepositFailed');

});

Route::group(['prefix' => 'subscription', 'middleware' => ['auth']], function () {
    Route::post('payment', 'SubscriptionPaymentController@payment')->name('subscriptionPayment');
    Route::post('submit', 'SubscriptionPaymentController@subscriptionSubmit')->name('subscriptionSubmit');
    Route::get('paypalSubscriptionSuccess', 'SubscriptionPaymentController@paypalSubscriptionSuccess')->name('paypalSubscriptionSuccess');
    Route::get('paypalSubscriptionFailed', 'SubscriptionPaymentController@paypalSubscriptionFailed')->name('paypalSubscriptionFailed');

});


Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('getDashboardData', 'HomeController@getDashboardData')->name('getDashboardData')->middleware('RoutePermissionCheck:dashboard');
    Route::get('userLoginChartByDays', 'HomeController@userLoginChartByDays')->name('userLoginChartByDays');
    Route::get('userLoginChartByTime', 'HomeController@userLoginChartByTime')->name('userLoginChartByTime');
    Route::get('/validateGenerate', 'HomeController@validateGenerate')->name('validateGenerate');
    Route::post('/validateGenerate', 'HomeController@validateGenerateSubmit')->name('validateGenerateSubmit');
    Route::post('lesson-complete', 'Frontend\WebsiteController@lessonComplete')->name('lesson.complete');
    Route::any('lesson-complete-ajax', 'Frontend\WebsiteController@lessonCompleteAjax')->name('lesson.complete.ajax');

    Route::get('ajaxNotificationMakeRead', 'NotificationController@ajaxNotificationMakeRead')->name('ajaxNotificationMakeRead');
    Route::get('NotificationMakeAllRead', 'NotificationController@NotificationMakeAllRead')->name('NotificationMakeAllRead');

});
Route::get('fullscreen-view/{course_id}/{lesson_id}', 'Frontend\WebsiteController@fullScreenView')->name('fullScreenView');


//Admin Routes Here
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {


    Route::post('/get-user-data/{id}', 'AdminController@getUserDate')->name('getUserDate');


    Route::get('/reveune-list', 'AdminController@reveuneList')->name('reveuneList')->middleware('RoutePermissionCheck:admin.reveuneList');
    Route::get('/reveuneListInstructor', 'AdminController@reveuneListInstructor')->name('reveuneListInstructor')->middleware('RoutePermissionCheck:admin.reveuneListInstructor');
//
    Route::get('/enrol-list', 'AdminController@enrollLogs')->name('enrollLogs')->middleware('RoutePermissionCheck:admin.enrollLogs');
    Route::get('/enrol-delete/{id}', 'AdminController@enrollDelete')->name('enrollDelete')->middleware('RoutePermissionCheck:admin.enrollDelete');
    Route::get('/instructor-payout', 'AdminController@instructorPayout')->name('instructor.payout')->middleware('RoutePermissionCheck:admin.instructor.payout');
    Route::post('/instructor-payout-request', 'AdminController@instructorRequestPayout')->name('instructor.instructorRequestPayout')->middleware('RoutePermissionCheck:admin.instructor.payout');
    Route::post('/instructor-payout-complete', 'AdminController@instructorCompletePayout')->name('instructor.instructorCompletePayout')->middleware('RoutePermissionCheck:admin.instructor.payout');
    Route::get('/enrollFilter', 'AdminController@enrollLogs');
    Route::post('/enrollFilter', 'AdminController@enrollFilter')->name('enrollFilter');
    Route::get('/courseEnrolls/{id}', 'AdminController@courseEnrolls')->name('enrollLog');
    Route::post('/courseEnrolls/{id}', 'AdminController@sortByDiscount')->name('sortByDiscount');

    Route::get('/all/enrol-list-data', 'AdminController@getEnrollLogsData')->name('getEnrollLogsData')->middleware('RoutePermissionCheck:admin.enrollLogs');
    Route::get('/all/payout-data', 'AdminController@getPayoutData')->name('getPayoutData');


});


Route::group(['namespace' => 'Admin', 'prefix' => 'course', 'as' => 'course.', 'middleware' => ['auth', 'admin']], function () {


    Route::get('categories', 'CourseController@category')->name('category')->middleware('RoutePermissionCheck:course.category');
    Route::post('categories/status-update', 'CourseController@category_status_update')->name('category.status_update')->middleware('RoutePermissionCheck:course.category.status_update');
    Route::post('categories/store', 'CourseController@category_store')->name('category.store')->middleware('RoutePermissionCheck:course.category.store');
    Route::post('categories/update', 'CourseController@category_update')->name('category.update')->middleware('RoutePermissionCheck:course.category.edit');
    Route::get('categories/edit/{id}', 'CourseController@category_edit')->name('category.edit')->middleware('RoutePermissionCheck:course.category.edit');
    Route::get('categories/delete/{id}', 'CourseController@category_delete')->name('category.delete')->middleware('RoutePermissionCheck:course.category.delete');


    Route::get('sub-categories', 'CourseController@sub_category')->name('subcategory')->middleware('RoutePermissionCheck:course.subcategory');
    Route::post('sub-categories/status-update', 'CourseController@sub_category_status_update')->name('subcategory.status_update')->middleware('RoutePermissionCheck:course.subcategory.status_update');
    Route::post('sub-categories/store', 'CourseController@sub_category_store')->name('subcategory.store')->middleware('RoutePermissionCheck:course.subcategory.store');
    Route::post('sub-categories/update', 'CourseController@sub_category_update')->name('subcategory.update')->middleware('RoutePermissionCheck:course.subcategory.edit');
    Route::get('sub-categories/edit/{id}', 'CourseController@sub_category_edit')->name('subcategory.edit')->middleware('RoutePermissionCheck:course.subcategory.edit');
    Route::get('sub-categories/delete/{id}', 'CourseController@sub_category_delete')->name('subcategory.delete')->middleware('RoutePermissionCheck:course.subcategory.delete');


});
Route::get('status-enable-disable', 'AjaxController@statusEnableDisable')->name('statusEnableDisable')->middleware(['auth']);

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('profile-settings', 'UserController@changePassword')->name('changePassword');
    Route::post('profile-settings', 'UserController@UpdatePassword')->name('updatePassword');
    Route::post('profile-update', 'UserController@update_user')->name('update_user');
});
//Route::post('get-user-by-role', 'UserController@getUsersByRole')->name('getUsersByRole')->middleware('auth');

Route::group(['namespace' => 'Admin', 'prefix' => 'communication', 'as' => 'communication.', 'middleware' => ['auth', 'admin']], function () {
    Route::get('private-messages', 'CommunicationController@PrivateMessage')->name('PrivateMessage')->middleware('RoutePermissionCheck:communication.PrivateMessage');
    Route::get('questions-answer', 'CommunicationController@QuestionAnswer')->name('QuestionAnswer')->middleware('RoutePermissionCheck:communication.QuestionAnswer');
    Route::any('StorePrivateMessage', 'CommunicationController@StorePrivateMessage')->name('StorePrivateMessage')->middleware('RoutePermissionCheck:communication.send');
    Route::post('getMessage', 'CommunicationController@getMessage')->name('getMessage');
});


Route::get('change-language/{language_code}', 'UserController@changeLanguage')->name('changeLanguage');
Route::post('/search', 'SearchController@search')->name('routeSearch');

Route::prefix('filepond/api')->group(function () {
    Route::post('/process', 'FilepondController@upload')->name('filepond.upload');
    Route::patch('/process', 'FilepondController@chunk')->name('filepond.chunk');
    Route::delete('/process', 'FilepondController@delete')->name('filepond.delete');
});
Route::get('get_preview_modal/{id}', 'AjaxController@get_preview_modal')->name('get_preview_modal');
Route::get('ajaxGetSubCategoryList', 'AjaxController@ajaxGetSubCategoryList')->name('ajaxGetSubCategoryList');
Route::get('ajaxGetCourseList', 'AjaxController@ajaxGetCourseList')->name('ajaxGetCourseList');
Route::get('ajaxGetQuizList', 'AjaxController@ajaxGetQuizList')->name('ajaxGetQuizList');
Route::get('update-activity', 'AjaxController@updateActivity')->name('updateActivity');

Route::post('summer-note-file-upload', 'UploadFileController@upload_image')->name('summerNoteFileUpload');


//auth adding
Route::get('auth/social', 'Auth\LoginController@showLoginForm')->name('social.login');
Route::get('oauth/{driver}', 'Auth\LoginController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');

Route::get('vimeo/video/{vimeo_id}', 'Frontend\WebsiteController@vimeoPlayer')->name('vimeoPlayer');


Route::group(['namespace' => 'User'], function () {

    Route::get('/index', 'VisitorController@index')->name('student.test');
});
#######################################################################################################











Auth::routes(['verify' => true]);


Route::get('send-password-reset-link', 'Auth\ForgotPasswordController@SendPasswordResetLink')->name('SendPasswordResetLink');
Route::get('reset-password', 'Auth\ForgotPasswordController@ResetPassword')->name('ResetPassword');
Route::get('register', 'Auth\RegisterController@RegisterForm')->name('register');
Route::get('saas-signup', 'Auth\RegisterController@LmsRegisterForm')->name('lms_register');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::post('/resend', '\App\Http\Controllers\Auth\VerificationController@resend_mail')->name('verification_mail_resend');
Route::get('auto-login/{key}', '\App\Http\Controllers\Auth\LoginController@autologin')->name('auto.login');



Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'FrontendHomeController@index')->name('frontendHomePage');

    Route::get('/get-courses-by-category/{category_id}', 'EdumeFrontendThemeController@getCourseByCategory')->name('getCourseByCategory');
    //wetech theme controller
    Route::get('/wetech/{route_name}', 'WeTechFrontendThemeController@route')->name('weTechController');

    Route::get('/offline', 'WebsiteController@offline')->name('offline');

    //    Route::get('/footer/page/{slug}', 'WebsiteController@page')->name('dynamic.page');
    Route::get('/about-us', 'WebsiteController@aboutData')->name('about');
    Route::get('/contact-us', 'WebsiteController@contact')->name('contact');
    Route::post('/contact-submit', 'WebsiteController@contactMsgSubmit')->name('contactMsgSubmit');
    Route::get('privacy', 'WebsiteController@privacy')->name('privacy');
    Route::get('calendar-view', 'WebsiteController@calendarView')->name('calendar-view');

    Route::get('instructors', 'InstructorController@instructors')->name('instructors');
    Route::get('become-instructor', 'InstructorController@becomeInstructor')->name('becomeInstructor');
    Route::get('instructorDetails/{id}/{name}', 'InstructorController@instructorDetails')->name('instructorDetails');

    Route::get('courses', 'CourseController@courses')->name('courses');
    Route::get('offer', 'CourseController@offer')->name('offer');
    Route::get('courses-details/{slug}', 'CourseController@courseDetails')->name('courseDetailsView');

    Route::get('free-course', 'CourseController@freeCourses')->name('freeCourses');

    Route::get('classes', 'ClassController@classes')->name('classes');
    Route::get('class-details/{slug}', 'ClassController@classDetails')->name('classDetails');
    Route::get('class-start/{slug}/{host}/{meeting_id}', 'ClassController@classStart')->name('classStart');

    Route::get('quizzes', 'QuizController@quizzes')->name('quizzes');
    Route::get('quiz-details/{slug}', 'QuizController@quizDetails')->name('quizDetailsView');
    Route::get('quizStart/{id}/{quiz_id}/{slug}', 'QuizController@quizStart')->name('quizStart');
    Route::post('quizSubmit', 'QuizController@quizSubmit')->name('quizSubmit');
    Route::post('quizTestStart', 'QuizController@quizTestStart')->name('quizTestStart')->middleware('auth');
    Route::post('singleQuizSubmit', 'QuizController@singleQuizSubmit')->name('singleQuizSubmit')->middleware('auth');
    Route::get('quizResult/{id}', 'QuizController@quizResult')->name('getQuizResult');
    ##
    Route::get('quizResult', 'QuizController@quizResult')->name('quizResult');
    Route::get('quizResultPreview/{id}', 'QuizController@quizResultPreview')->name('quizResultPreview');
    Route::get('quizResultPreviewApi/{quiz_id}', 'QuizController@quizResultPreviewApi')->name('quizResultPreviewApi')->middleware('auth');


    Route::get('search', 'WebsiteController@search')->name('search');
    Route::get('category/{id}/{name}', 'WebsiteController@categoryCourse')->name('categoryCourse');
    Route::get('sub_category/{id}/{slug}', 'WebsiteController@subCategoryCourse')->name('subCategory.course');

    Route::get('/certificate-verification', 'WebsiteController@searchCertificate')->name('searchCertificate');
    Route::post('/certificate-verification', 'WebsiteController@showCertificate')->name('showCertificate');
    Route::get('/verify-certificate/{number}', 'WebsiteController@certificateCheck')->name('certificateCheck');
    Route::get('/download-certificate/{number}', 'WebsiteController@certificateDownload')->name('certificateDownload');

    Route::get('blogs', 'BlogController@allBlog')->name('blogs');
    Route::get('blog-details/{slug}', 'BlogController@blogDetails')->name('blogDetails');
    Route::post('blog-comment-submit', 'BlogController@blogCommentSubmit')->name('blogCommentSubmit');
    Route::post('blog-comment-delete/{id}', 'BlogController@deleteBlogComment')->name('deleteBlogComment');
    Route::get('load-blog-data', 'BlogController@loadMoreData')->name('load-blog-data');

    Route::get('/addToCart/{id}', 'WebsiteController@addToCart')->name('addToCart');
    Route::get('/buyNow/{id}', 'WebsiteController@buyNow')->name('buyNow');
    Route::post('enrollOrCart/{id}', 'WebsiteController@enrollOrCart')->name('enrollOrCart');
    Route::get('my-cart', 'WebsiteController@myCart')->name('myCart');
    Route::get('ajaxCounterCity', 'WebsiteController@ajaxCounterCity')->name('ajaxCounterCity');
    Route::get('ajaxCounterState', 'WebsiteController@ajaxCounterState')->name('ajaxCounterState');
    Route::get('/home/removeItem/{id}', 'WebsiteController@removeItem')->name('removeItem');
    Route::get('/home/removeItemAjax/{id}', 'WebsiteController@removeItemAjax')->name('removeItemAjax');
    Route::post('/submit_ans', 'WebsiteController@submitAns')->name('submitAns');

    Route::get('referral/{code}', 'ReferalController@referralCode')->name('referralCode');
    Route::get('referral', 'ReferalController@referral')->name('referral');

    Route::get('pages/{slug}', 'WebsiteController@frontPage')->name('frontPage');
    Route::post('subscribe', 'WebsiteController@subscribe')->name('subscribe');
    Route::get('getItemList', 'WebsiteController@getItemList')->name('getItemList');

    //subscription module
    Route::get('/course/subscription', 'WebsiteController@subscription')->name('courseSubscription');
    Route::get('/course/subscription/{plan_id}', 'WebsiteController@subscriptionCourseList')->name('subscriptionCourseList');
    Route::get('/course-subscription/checkout', 'WebsiteController@subscriptionCheckout')->name('courseSubscriptionCheckout');
    Route::get('/subscription-courses', 'WebsiteController@subscriptionCourses')->name('subscriptionCourses');
    Route::get('/continue-course/{slug}', 'WebsiteController@continueCourse')->name('continueCourse');

    //saas module
    Route::get('/saas-packages', 'FrontendSaasController@index')->name('saasPackages');
    Route::get('/saas-packages/checkout', 'FrontendSaasController@saasCheckout')->name('saasCheckout');


    //org subscription module
    Route::get('/org-subscription-courses', 'WebsiteController@orgSubscriptionCourses')->name('orgSubscriptionCourses');
    Route::get('/org-subscription-plan-list/{id}', 'WebsiteController@orgSubscriptionPlanList')->name('orgSubscriptionPlanList');


    Route::post('comment', 'CommentController@saveComment')->name('saveComment')->middleware('auth');
    Route::post('comment-replay', 'CommentController@submitCommnetReply')->name('submitCommnetReply')->middleware('auth');
    Route::post('comment-delete/{id}', 'CommentController@deleteComment')->name('deleteComment')->middleware('auth');
    Route::post('review-delete/{id}', 'CommentController@deleteReview')->name('deleteReview')->middleware('auth');
    Route::post('comment-replay-delete/{id}', 'CommentController@deleteCommnetReply')->name('deleteCommentReply')->middleware('auth');
});
Route::group(['prefix' => 'saas', 'middleware' => ['auth']], function () {
    Route::post('payment', 'SaasPaymentController@payment')->name('saasPayment');
    Route::post('submit', 'SaasPaymentController@subscriptionSubmit')->name('saasSubmit');
    Route::get('paypalSaasSuccess', 'SaasPaymentController@paypalSubscriptionSuccess')->name('paypalSaasSuccess');
    Route::get('paypalSaasFailed', 'SaasPaymentController@paypalSubscriptionFailed')->name('paypalSaasFailed');
});

Route::group(['namespace' => 'Frontend', 'middleware' => ['student']], function () {
    Route::get('student-dashboard', 'StudentController@myDashboard')->name('studentDashboard');
    Route::get('my-courses', 'StudentController@myCourses')->name('myCourses');
    Route::get('my-classes', 'StudentController@myCourses')->name('myClasses');
    Route::get('my-online-course', 'StudentController@myCourses')->name('myOnlineCourse');
    Route::get('my-offline-course', 'StudentController@myCourses')->name('myOfflineCourse');
    Route::get('my-quizzes', 'StudentController@myCourses')->name('myQuizzes');
    Route::get('my-report', 'StudentController@myReports')->name('myReports');
    Route::get('my-certificate', 'StudentController@myCertificate')->name('myCertificate');
    Route::get('my-assignment', 'StudentController@myAssignment')->name('myAssignment');
    Route::get('my-assignment/{id}', 'StudentController@myAssignmentDetails')->name('myAssignment_details');
    Route::get('my-wishlist', 'StudentController@myWishlists')->name('myWishlists');
    Route::get('my-purchases', 'StudentController@myPurchases')->name('myPurchases');
    Route::get('my-bundle', 'StudentController@myBundle')->name('myBundle');
    Route::get('topic-report/{id}', 'StudentController@topicReport')->name('topicReport');
    Route::get('my-profile', 'StudentController@myProfile')->name('myProfile');
    Route::any('ajax-update-profile-image', 'StudentController@ajaxUploadProfilePic')->name('ajaxUploadProfilePic');
    Route::post('my-profile-update', 'StudentController@myProfileUpdate')->name('myProfileUpdate');
    Route::get('my-account', 'StudentController@myAccount')->name('myAccount');
    Route::post('my-password-update', 'StudentController@MyUpdatePassword')->name('MyUpdatePassword');
    Route::post('my-email-update', 'StudentController@MyEmailUpdate')->name('MyEmailUpdate');

    Route::get('deposit', 'StudentController@deposit')->name('deposit');
    Route::post('deposit', 'StudentController@deposit')->name('depositSelectOption');
    Route::get('logged-in/devices', 'StudentController@loggedInDevices')->name('logged.in.devices');
    Route::post('logged-out/device', 'StudentController@logOutDevice')->name('log.out.device');
    Route::get('invoice/{id}', 'StudentController@Invoice')->name('invoice');
    Route::get('subscription-invoice/{id}', 'StudentController@subInvoice')->name('subInvoice');
    Route::get('StudentApplyCoupon', 'StudentController@StudentApplyCoupon')->name('StudentApplyCoupon');
    Route::get('checkout', 'StudentController@CheckOut')->name('CheckOut');
    Route::get('remove-profile-pic', 'StudentController@removeProfilePic')->name('removeProfilePic');
    Route::get('course-certificate/{id}/{slug}', 'StudentController@getCertificate')->name('getCertificate');
    Route::post('/submitReview', 'StudentController@submitReview')->name('submitReview');

    Route::get('my-study-materials', 'StudyMaterialController@myHomework')->name('myHomework');
    Route::get('my-study-materials/{id}', 'StudyMaterialController@myHomeworkDetails')->name('myHomework_details');
});
Route::group(['middleware' => ['student']], function () {
    Route::get('my-notification-setup', 'NotificationController@myNotificationSetup')->name('myNotificationSetup');
    Route::get('my-notifications', 'NotificationController@myNotification')->name('myNotification');
});


//in this controller we can use for place order
Route::group(['prefix' => 'order', 'middleware' => ['auth']], function () {

    Route::post('submit', 'PaymentController@makePlaceOrder')->name('makePlaceOrder');
    Route::get('/payment', 'PaymentController@payment')->name('orderPayment');
    Route::post('/paymentSubmit', 'PaymentController@paymentSubmit')->name('paymentSubmit');
    //paypal url
    Route::get('paypal/success', 'PaymentController@paypalSuccess')->name('paypalSuccess');
    Route::get('paypal/failed', 'PaymentController@paypalFailed')->name('paypalFailed');
});
//deposit
Route::group(['prefix' => 'deposit', 'middleware' => ['auth']], function () {

    Route::post('submit', 'DepositController@depositSubmit')->name('depositSubmit');
    Route::get('paypalDepositSuccess', 'DepositController@paypalDepositSuccess')->name('paypalDepositSuccess');
    Route::get('paypalDepositFailed', 'DepositController@paypalDepositFailed')->name('paypalDepositFailed');
});

Route::group(['prefix' => 'subscription', 'middleware' => ['auth']], function () {
    Route::post('payment', 'SubscriptionPaymentController@payment')->name('subscriptionPayment');
    Route::post('submit', 'SubscriptionPaymentController@subscriptionSubmit')->name('subscriptionSubmit');
    Route::get('paypalSubscriptionSuccess', 'SubscriptionPaymentController@paypalSubscriptionSuccess')->name('paypalSubscriptionSuccess');
    Route::get('paypalSubscriptionFailed', 'SubscriptionPaymentController@paypalSubscriptionFailed')->name('paypalSubscriptionFailed');
});


Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('getDashboardData', 'HomeController@getDashboardData')->name('getDashboardData')->middleware('RoutePermissionCheck:dashboard');
    Route::get('userLoginChartByDays', 'HomeController@userLoginChartByDays')->name('userLoginChartByDays');
    Route::get('userLoginChartByTime', 'HomeController@userLoginChartByTime')->name('userLoginChartByTime');
    Route::get('/validateGenerate', 'HomeController@validateGenerate')->name('validateGenerate');
    Route::post('/validateGenerate', 'HomeController@validateGenerateSubmit')->name('validateGenerateSubmit');
    Route::post('lesson-complete', 'Frontend\WebsiteController@lessonComplete')->name('lesson.complete');
    Route::any('lesson-complete-ajax', 'Frontend\WebsiteController@lessonCompleteAjax')->name('lesson.complete.ajax');

    Route::get('ajaxNotificationMakeRead', 'NotificationController@ajaxNotificationMakeRead')->name('ajaxNotificationMakeRead');
    Route::get('NotificationMakeAllRead', 'NotificationController@NotificationMakeAllRead')->name('NotificationMakeAllRead');
});
Route::get('fullscreen-view/{course_id}/{lesson_id}', 'Frontend\WebsiteController@fullScreenView')->name('fullScreenView');


//Admin Routes Here
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {


    Route::post('/get-user-data/{id}', 'AdminController@getUserDate')->name('getUserDate');


    Route::get('/reveune-list', 'AdminController@reveuneList')->name('reveuneList')->middleware('RoutePermissionCheck:admin.reveuneList');
    Route::get('/reveuneListInstructor', 'AdminController@reveuneListInstructor')->name('reveuneListInstructor')->middleware('RoutePermissionCheck:admin.reveuneListInstructor');
    //
    Route::get('/enrol-list', 'AdminController@enrollLogs')->name('enrollLogs')->middleware('RoutePermissionCheck:admin.enrollLogs');
    Route::get('/enrol-delete/{id}', 'AdminController@enrollDelete')->name('enrollDelete')->middleware('RoutePermissionCheck:admin.enrollDelete');
    Route::get('/instructor-payout', 'AdminController@instructorPayout')->name('instructor.payout')->middleware('RoutePermissionCheck:admin.instructor.payout');
    Route::post('/instructor-payout-request', 'AdminController@instructorRequestPayout')->name('instructor.instructorRequestPayout')->middleware('RoutePermissionCheck:admin.instructor.payout');
    Route::post('/instructor-payout-complete', 'AdminController@instructorCompletePayout')->name('instructor.instructorCompletePayout')->middleware('RoutePermissionCheck:admin.instructor.payout');
    Route::get('/enrollFilter', 'AdminController@enrollLogs');
    Route::post('/enrollFilter', 'AdminController@enrollFilter')->name('enrollFilter');
    Route::get('/courseEnrolls/{id}', 'AdminController@courseEnrolls')->name('enrollLog');
    Route::post('/courseEnrolls/{id}', 'AdminController@sortByDiscount')->name('sortByDiscount');

    Route::get('/all/enrol-list-data', 'AdminController@getEnrollLogsData')->name('getEnrollLogsData')->middleware('RoutePermissionCheck:admin.enrollLogs');
    Route::get('/all/payout-data', 'AdminController@getPayoutData')->name('getPayoutData');
});


Route::group(['namespace' => 'Admin', 'prefix' => 'course', 'as' => 'course.', 'middleware' => ['auth']], function () {


    Route::get('categories', 'CourseController@category')->name('category');
    Route::post('categories/status-update', 'CourseController@category_status_update')->name('category.status_update')->middleware('RoutePermissionCheck:course.category.status_update');
    Route::post('categories/store', 'CourseController@category_store')->name('category.store')->middleware('RoutePermissionCheck:course.category.store');
    Route::post('categories/update', 'CourseController@category_update')->name('category.update')->middleware('RoutePermissionCheck:course.category.edit');
    Route::get('categories/edit/{id}', 'CourseController@category_edit')->name('category.edit')->middleware('RoutePermissionCheck:course.category.edit');
    Route::get('categories/delete/{id}', 'CourseController@category_delete')->name('category.delete')->middleware('RoutePermissionCheck:course.category.delete');


    Route::get('sub-categories', 'CourseController@sub_category')->name('subcategory')->middleware('RoutePermissionCheck:course.subcategory');
    Route::post('sub-categories/status-update', 'CourseController@sub_category_status_update')->name('subcategory.status_update')->middleware('RoutePermissionCheck:course.subcategory.status_update');
    Route::post('sub-categories/store', 'CourseController@sub_category_store')->name('subcategory.store')->middleware('RoutePermissionCheck:course.subcategory.store');
    Route::post('sub-categories/update', 'CourseController@sub_category_update')->name('subcategory.update')->middleware('RoutePermissionCheck:course.subcategory.edit');
    Route::get('sub-categories/edit/{id}', 'CourseController@sub_category_edit')->name('subcategory.edit')->middleware('RoutePermissionCheck:course.subcategory.edit');
    Route::get('sub-categories/delete/{id}', 'CourseController@sub_category_delete')->name('subcategory.delete')->middleware('RoutePermissionCheck:course.subcategory.delete');
});
Route::get('status-enable-disable', 'AjaxController@statusEnableDisable')->name('statusEnableDisable')->middleware(['auth']);

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('profile-settings', 'UserController@changePassword')->name('changePassword');
    Route::post('profile-settings', 'UserController@UpdatePassword')->name('updatePassword');
    Route::post('profile-update', 'UserController@update_user')->name('update_user');
});
//Route::post('get-user-by-role', 'UserController@getUsersByRole')->name('getUsersByRole')->middleware('auth');

Route::group(['namespace' => 'Admin', 'prefix' => 'communication', 'as' => 'communication.', 'middleware' => ['auth', 'admin']], function () {
    Route::get('private-messages', 'CommunicationController@PrivateMessage')->name('PrivateMessage')->middleware('RoutePermissionCheck:communication.PrivateMessage');
    Route::get('questions-answer', 'CommunicationController@QuestionAnswer')->name('QuestionAnswer')->middleware('RoutePermissionCheck:communication.QuestionAnswer');
    Route::any('StorePrivateMessage', 'CommunicationController@StorePrivateMessage')->name('StorePrivateMessage')->middleware('RoutePermissionCheck:communication.send');
    Route::post('getMessage', 'CommunicationController@getMessage')->name('getMessage');
});


Route::get('change-language/{language_code}', 'UserController@changeLanguage')->name('changeLanguage');
Route::post('/search', 'SearchController@search')->name('routeSearch');

Route::prefix('filepond/api')->group(function () {
    Route::post('/process', 'FilepondController@upload')->name('filepond.upload');
    Route::patch('/process', 'FilepondController@chunk')->name('filepond.chunk');
    Route::delete('/process', 'FilepondController@delete')->name('filepond.delete');
});
Route::get('get_preview_modal/{id}', 'AjaxController@get_preview_modal')->name('get_preview_modal');
Route::get('ajaxGetSubCategoryList', 'AjaxController@ajaxGetSubCategoryList')->name('ajaxGetSubCategoryList');
Route::get('ajaxGetCourseList', 'AjaxController@ajaxGetCourseList')->name('ajaxGetCourseList');
Route::get('ajaxGetQuizList', 'AjaxController@ajaxGetQuizList')->name('ajaxGetQuizList');
Route::get('update-activity', 'AjaxController@updateActivity')->name('updateActivity');

Route::post('summer-note-file-upload', 'UploadFileController@upload_image')->name('summerNoteFileUpload');


//auth adding
Route::get('auth/social', 'Auth\LoginController@showLoginForm')->name('social.login');
Route::get('oauth/{driver}', 'Auth\LoginController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');

Route::get('vimeo/video/{vimeo_id}', 'Frontend\WebsiteController@vimeoPlayer')->name('vimeoPlayer');


Route::group(['namespace' => 'User'], function () {

    Route::get('/index', 'VisitorController@index')->name('student.test');
});
###############################################

//Route For Admin

Route::group(['prefix' => 'admin/course', 'middleware' => ['auth', 'admin']], function () {


    Route::any('/change-chapter-position', 'CourseSettingController@changeChapterPosition')->name('changeChapterPosition');
    Route::any('/change-lesson-position', 'CourseSettingController@changeLessonPosition')->name('changeLessonPosition');
    Route::any('/change-lesson-chapter', 'CourseSettingController@changeLessonChapter')->name('changeLessonChapter');

    //Get Course Subcategory
    Route::get('/ajaxGetCourseSubCategory', 'CourseSettingController@ajaxGetCourseSubCategory');

    //Manage Category
    Route::get('/messages', 'CourseSettingController@toastrMessages')->name('toastrMessages');

    Route::get('/searchCategory', 'CourseSettingController@searchCategory')->name('searchCategory');
    Route::get('/searchCourse', 'CourseSettingController@searchCourse')->name('searchCourse');
    Route::post('/saveCategory', 'CourseSettingController@saveCategory')->name('saveCategory');
    Route::get('/categoryEdit/{id}', 'CourseSettingController@categoryEdit')->name('categoryEdit');

    Route::post('/updateCategory', 'CourseSettingController@updateCategory')->name('updateCategory');
    Route::get('/categoryStatus/{id}', 'CourseSettingController@categoryStatus')->name('categoryStatus');

    //Manage Subcategory

    Route::get('/editSubCategory/{id}', 'CourseSettingController@editSubCategory')->name('editSubCategory');
    Route::post('/updateSubCategory', 'CourseSettingController@updateSubCategory')->name('updateSubCategory');
    Route::post('/disableSubCategory', 'CourseSettingController@disableSubCategory')->name('disableSubCategory');

    //Course Invitation
    Route::get('/course-invitation/{id}', 'CourseInvitationController@courseInvitation')->name('course.courseInvitation')->middleware('RoutePermissionCheck:course.courseInvitation');
    Route::get('/course-statistics', 'CourseInvitationController@courseStatistics')->name('course.courseStatistics')->middleware('RoutePermissionCheck:course.courseStatistics');
    Route::get('/course-statistics-course-report', 'CourseInvitationController@courseStatisticsCourseReport')->name('course.courseStatisticsCourseReport')->middleware('RoutePermissionCheck:course.courseStatistics');
    Route::get('/course-statistics-quiz-report', 'CourseInvitationController@courseStatisticsQuizReport')->name('course.courseStatisticsQuizReport')->middleware('RoutePermissionCheck:course.courseStatistics');

    Route::get('/course-statistics-course-data', 'CourseInvitationController@courseStatisticsCourseData')->name('course.courseStatisticsCourseData')->middleware('RoutePermissionCheck:course.courseStatistics');
    Route::get('/course-statistics-quiz-data', 'CourseInvitationController@courseStatisticsQuizData')->name('course.courseStatisticsQuizData')->middleware('RoutePermissionCheck:course.courseStatistics');


    Route::get('/course-students/{course_id}', 'CourseInvitationController@enrolled_students')->name('course.enrolled_students');
    Route::get('/course-students-list/{course_id}', 'CourseInvitationController@getAllStudentData')->name('course.getAllStudentData');
    Route::get('/course-student-notify/{course_id}/{student_id}', 'CourseInvitationController@courseStudentNotify')->name('course.courseStudentNotify')->middleware('RoutePermissionCheck:course.courseStudentNotify');

    Route::get('/course-details/{id}', 'CourseSettingController@courseDetails')->name('courseDetails')->middleware('RoutePermissionCheck:course.details');
    Route::get('/course-feature/{id}/{type}', 'CourseSettingController@courseMakeAsFeature')->name('courseMakeAsFeature');
    Route::get('/course-lesson-show/{course_id}/{chapter_id}/{lesson_id}', 'CourseSettingController@CourseLessonShow')->name('CourseQuetionShow');
    Route::get('/course-question-show/{question_id}/{course_id}/{chapter_id}/{lesson_id}', 'CourseSettingController@CourseQuetionShow')->name('CourseQuetionShow');
    Route::get('/course-chapter-show/{course_id}/{chapter_id}', 'CourseSettingController@CourseChapterShow')->name('CourseChapterShow');

    Route::get('/course-question-delete/{quiz_id}/{question_id}', 'CourseSettingController@CourseQuestionDelete')->name('CourseQuestionDelete');


    Route::post('/setCourseDripContent', 'CourseSettingController@setCourseDripContent')->name('setCourseDripContent');
    // Route::get('/course-test/{id}', 'CourseSettingController@courseDetails2')->name('courseDetails2');


    //Manage course
    Route::get('/all/courses', 'CourseSettingController@getAllCourse')->name('getAllCourse')->middleware('RoutePermissionCheck:getAllCourse');

    Route::get('/new/course', 'CourseSettingController@addNewCourse')->name('addNewCourse')->middleware('RoutePermissionCheck:course.store');
//    Route::get('/edit/course/{id}', 'CourseSettingController@editCourse')->name('addNewCourse')->middleware('RoutePermissionCheck:addNewCourse');

    Route::get('/active/courses', 'CourseSettingController@getAllCourse')->name('getActiveCourse')->middleware('RoutePermissionCheck:getAllCourse');
    Route::get('/pending/courses', 'CourseSettingController@getAllCourse')->name('getPendingCourse')->middleware('RoutePermissionCheck:getAllCourse');

    Route::post('/saveCourse', 'CourseSettingController@saveCourse')->name('AdminSaveCourse')->middleware('RoutePermissionCheck:course.store');
    Route::get('/editCourse/{id}', 'CourseSettingController@editCourse')->name('editCourse')->middleware('RoutePermissionCheck:course.edit');
    Route::post('/updateCourse', 'CourseSettingController@AdminUpdateCourse')->name('AdminUpdateCourse')->middleware('RoutePermissionCheck:course.edit');
    Route::post('/updatecourse-certificate', 'CourseSettingController@AdminUpdateCourseCertificate')->name('AdminUpdateCourseCertificate')->middleware('RoutePermissionCheck:course.edit');
    Route::post('/unpublishCourse', 'CourseSettingController@unpublishCourse')->name('AdminUnpublishCourse');
    Route::get('/publishCourse/{id}', 'CourseSettingController@publishCourse')->name('publishCourse');
    Route::post('/courseStatus', 'CourseSettingController@courseStatus')->name('AdminCourseStatus')->middleware('RoutePermissionCheck:course.status_update');


    Route::get('/getEnroll/{id}', 'CourseSettingController@getEnroll')->name('getEnroll');
    Route::post('/rejectEnroll', 'CourseSettingController@rejectEnroll')->name('rejectEnroll');
    Route::post('/enableEnroll', 'CourseSettingController@enableEnroll')->name('enableEnroll');
    Route::post('/submitEnroll/{id}', 'CourseSettingController@submitEnroll')->name('submitEnroll');
    Route::post('/course-sort-by', 'CourseSettingController@courseSortBy')->name('courseSortBy');
    Route::get('/course-sort-by', 'CourseSettingController@getAllCourse')->name('courseSortByGet');
    Route::get('/courseSortByCat/{id}', 'CourseSettingController@courseSortByCat')->name('courseSortByCat');
    Route::get('/courseSort/{value}', 'CourseSettingController@courseSort')->name('courseSort');
    Route::get('/courseSortByInstructor/{value}', 'CourseSettingController@courseSortByInstructor')->name('courseSortByInstructor');
    Route::get('/course-delete/{id}', 'CourseSettingController@courseDelete')->name('course.delete');


    Route::get('chapter', 'ChapterController@index')->name('chapterPage');
    Route::POST('chapter', 'ChapterController@store')->name('saveChapterPage');
    Route::POST('chapter-search', 'ChapterController@chapterSearchByCourse')->name('chapterSearchByCourse');
    Route::get('chapter/{id}', 'ChapterController@chapterEdit')->name('chapterEdit');
    Route::PUT('chapter-update', 'ChapterController@chapterUpdate')->name('chapterUpdate');

    Route::get('lesson/{id}', 'LessonController@index')->name('lessonPage');
    Route::post('/addLesson', 'LessonController@addLesson')->name('addLesson');
    Route::get('/edit-lesson/{id}', 'LessonController@editLesson')->name('editLesson');
    Route::put('/updateLesson', 'LessonController@updateLesson')->name('updateLesson');
    Route::post('/deleteLesson', 'LessonController@deleteLesson')->name('deleteLesson');
    Route::post('/deleteLessonAssignment', 'LessonController@deleteLessonAssignment')->name('deleteLessonAssignment');

    Route::post('/addAssignment', 'CourseAssignmentController@AssignmentStore')->name('course_assignment_store');
    Route::get('/course-assignment-show/{course_id}/{chapter_id}/{lesson_id}', 'CourseAssignmentController@CourseAssignmentShow')->name('course_assignment_show');
    Route::post('/updateAssignment', 'CourseAssignmentController@AssignmentUpdate')->name('course_assignment_update');


    Route::post('/add-chapter', 'InstructorCourseSettingController@saveChapter')->name('saveChapter');
    Route::post('/saveFile', 'InstructorCourseSettingController@saveFile')->name('saveFile');
    Route::get('/download-file/{id}', 'InstructorCourseSettingController@download_course_file')->name('download_course_file');
    Route::get('/edit-chapter/{id}/{course}', 'InstructorCourseSettingController@editChapter')->name('editChapter');
    Route::get('/delete-chapter/{id}/{course}', 'InstructorCourseSettingController@deleteChapter')->name('deleteChapter');
    Route::put('/update-chapter', 'InstructorCourseSettingController@updateChapter')->name('updateChapter');
    Route::POST('/updateFile', 'InstructorCourseSettingController@updateFile')->name('updateFile');
    Route::get('/course_chapters/{id}', 'InstructorCourseSettingController@course_chapters')->name('course_chapters');
    Route::post('/deleteFile2', 'InstructorCourseSettingController@deleteFile')->name('deleteFile');


    Route::resource('course-level', 'CourseLevelController')->middleware('RoutePermissionCheck:course-level.index')->except('destroy');
    Route::get('course-level-delete/{id}', 'CourseLevelController@delete')->middleware('RoutePermissionCheck:course-level.destroy')->name('course-level.destroy');


    Route::get('/all/courses-data', 'CourseSettingController@getAllCourseData')->name('getAllCourseData')->middleware('RoutePermissionCheck:getAllCourse');

    Route::get('/vdocipher/video-list', 'CourseSettingController@getAllVdocipherData')->name('getAllVdocipherData');
    Route::get('/vdocipher/video/{id}', 'CourseSettingController@getSingleVdocipherData')->name('getSingleVdocipherData');
});



Route::prefix('appearance')->as('appearance.')->middleware('auth')->group(function () {
    Route::get('/', 'AppearanceController@index')->name('index')->middleware('RoutePermissionCheck:appearance.themes.index');

    //themes
    Route::resource('/themes', 'ThemeController')->except('destroy', 'update', 'edit')->middleware('RoutePermissionCheck:appearance.themes.index');
    Route::post('/themes/active', 'ThemeController@active')->name('themes.active')->middleware('RoutePermissionCheck:appearance.themes.index');
    Route::post('/themes/delete', 'ThemeController@destroy')->name('themes.delete')->middleware('RoutePermissionCheck:appearance.themes.index');

    //customize

    Route::get('/demo', 'ThemeController@demo')->name('themes.demo')->middleware('RoutePermissionCheck:appearance.themes.index');
    Route::post('/demo', 'ThemeController@demoSubmit')->name('themes.demoSubmit')->middleware('RoutePermissionCheck:appearance.themes.index');

    Route::get('themes-customize/{theme}/copy', 'ThemeCustomizeController@copy')->name('themes-customize.copy')->middleware('RoutePermissionCheck:appearance.themes-customize.index');
    Route::get('themes-customize/{theme}/default', 'ThemeCustomizeController@default')->name('themes-customize.default')->middleware('RoutePermissionCheck:appearance.themes-customize.index');
    Route::resource('themes-customize',  'ThemeCustomizeController')->middleware('RoutePermissionCheck:appearance.themes-customize.index');
});
Route::prefix('notification-setup')->middleware(['auth'])->group(function() {
    Route::get('/', 'NotificationSetupController@index')->name('notification_setup_list')->middleware('RoutePermissionCheck:notification_setup_list');
    Route::post('/', 'NotificationSetupController@setup')->name('update_notification_setup');
    Route::post('/browser-message', 'NotificationSetupController@UpdateBrowserMsg')->name('updateBrowserMessage')->middleware('RoutePermissionCheck:updateBrowserMessage');
    Route::get('/users-notifications', 'NotificationSetupController@UserNotificationControll')->name('UserNotificationControll')->middleware('RoutePermissionCheck:UserNotificationControll');
    Route::post('/users-notifications', 'NotificationSetupController@UpdateUserNotificationControll')->name('UpdateUserNotificationControll')->middleware('RoutePermissionCheck:UpdateUserNotificationControll');


    Route::get('/my-notifications', 'NotificationSetupController@MyNotification')->name('MyNotification');
});
#############
Route::group(['prefix' => 'setting', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'SettingController@index')->name('setting.index');
    Route::get('/activation', 'SettingController@activation')->name('setting.activation')->middleware('RoutePermissionCheck:setting.activation');
    Route::get('/general-settings', 'SettingController@general_settings')->name('setting.general_settings')->middleware('RoutePermissionCheck:setting.general_settings');
    Route::get('/email-configaration', 'SettingController@email_setup')->name('setting.email_setup')->middleware('RoutePermissionCheck:setting.email_setup');
    Route::get('/seo-setup', 'SettingController@seo_setting')->name('setting.seo_setting')->middleware('RoutePermissionCheck:setting.seo_setting');
    Route::get('/payment-setup', 'SettingController@paymentSetup')->name('setting.paymentSetup')->middleware('RoutePermissionCheck:route_name');
    Route::get('/social-login-setup', 'SettingController@social_login_setup')->name('setting.social_login_setup')->middleware('RoutePermissionCheck:setting.social_login_setup');
    Route::post('/update-activation-status', 'SettingController@update_activation_status')->name('update_activation_status')->middleware('RoutePermissionCheck:settings.ChangeActivationStatus');
    Route::post('general-settings/update', 'GeneralSettingsController@update')->name('company_information_update')->middleware('RoutePermissionCheck:settings.general_setting_update');
    Route::post('smtp-gateway-credentials/update', 'GeneralSettingsController@smtp_gateway_credentials_update')->name('smtp_gateway_credentials_update');
    Route::post('/test-mail/send', 'GeneralSettingsController@test_mail_send')->name('test_mail.send')->middleware('RoutePermissionCheck:setting.send_test_mail');
    Route::post('/social_login', 'GeneralSettingsController@socialCreditional')->name('socialCreditional')->middleware('RoutePermissionCheck:setting.setting.social_login_setup_update');
    Route::post('/seo-setup', 'GeneralSettingsController@seoSetting')->name('seo_setup')->middleware('RoutePermissionCheck:setting.seo_setting_update');

    Route::get('/student-setup', 'SettingController@student_setup')->name('settings.student_setup')->middleware('RoutePermissionCheck:settings.student_setup');
    Route::post('/student-setup', 'SettingController@student_setup_update')->name('settings.student_setup_update')->middleware('RoutePermissionCheck:settings.student_setup_update');

    Route::get('/instructor-setup', 'SettingController@instructor_setup')->name('settings.instructor_setup')->middleware('RoutePermissionCheck:settings.instructor_setup');
    Route::post('/instructor-setup', 'SettingController@instructor_setup_update')->name('settings.instructor_setup_update')->middleware('RoutePermissionCheck:settings.instructor_setup_update');


    Route::get('/footerEmailConfig', 'GeneralSettingsController@footerEmailConfig')->name('footerEmailConfig')->middleware('RoutePermissionCheck:footerEmailConfig');
    Route::get('/EmailTemp', 'GeneralSettingsController@EmailTemp')->name('EmailTemp')->middleware('RoutePermissionCheck:EmailTemp');


    Route::resource('currencies', 'CurrencyController')->except('destroy')->middleware('RoutePermissionCheck:currencies.index');
    Route::post('currency-edit-modal', 'CurrencyController@edit_modal')->name('currencies.edit_modal')->middleware('RoutePermissionCheck:currencies.edit_modal');
    Route::get('/currencies/destroy/{id}', 'CurrencyController@destroy')->name('currencies.destroy')->middleware('RoutePermissionCheck:currencies.destroy');


    Route::get('/aboutSystem', 'GeneralSettingsController@aboutSystem')->name('setting.aboutSystem')->middleware('RoutePermissionCheck:setting.aboutSystem');
    Route::get('/updateSystem', 'UpdateController@updateSystem')->name('setting.updateSystem')->middleware('RoutePermissionCheck:setting.updateSystem', 'saasAdmin');
    Route::post('/updateSystem', 'UpdateController@updateSystemSubmit')->name('setting.updateSystem.submit')->middleware('RoutePermissionCheck:setting.updateSystem.submit', 'saasAdmin');


    Route::resource('ipBlock', 'IpBlockController')->except('destroy')->middleware('RoutePermissionCheck:ipBlock.index', 'saasAdmin');
    Route::post('ipBlock-delete', 'IpBlockController@destroy')->name('ipBlockDelete')->middleware('RoutePermissionCheck:ipBlock.index', 'saasAdmin');

    Route::get('/geo-location', 'GeoLocationController@index')->name('setting.geoLocation')->middleware('RoutePermissionCheck:setting.geoLocation');
    Route::get('/geo-location-data', 'GeoLocationController@data')->name('setting.geoLocation.data')->middleware('RoutePermissionCheck:setting.geoLocation');
    Route::post('/geo-location-delete', 'GeoLocationController@destroy')->name('setting.geoLocation.delete')->middleware('RoutePermissionCheck:setting.geoLocation');
    Route::post('/geo-location-empty', 'GeoLocationController@EmptyLog')
        ->name('setting.geoLocation.empty')
        ->middleware('RoutePermissionCheck:setting.geoLocation');


    Route::get('/cron-job', 'CornJobController@index')->name('setting.cronJob')->middleware('RoutePermissionCheck:setting.cronJob');


    Route::get('/cookie-setting', 'CookieSettingController@index')
        ->name('setting.cookieSetting')
        ->middleware('RoutePermissionCheck:setting.cookieSetting');

    Route::post('/cookie-setting', 'CookieSettingController@store')
        ->name('setting.cookieSettingStore')
        ->middleware('RoutePermissionCheck:setting.cookieSettingStore');


    Route::get('/cache-setting', 'CacheSettingController@index')
        ->name('setting.cacheSetting')
        ->middleware('RoutePermissionCheck:setting.cacheSetting');

    Route::post('/cache-setting', 'CacheSettingController@store')
        ->name('setting.cacheSettingStore')
        ->middleware('RoutePermissionCheck:setting.cacheSettingStore');

    Route::resource('timezone', 'TimezoneController')->except('destroy')->middleware('RoutePermissionCheck:timezone.index');
    Route::post('timezone-edit-modal', 'TimezoneController@edit_modal')->name('timezone.edit_modal')->middleware('RoutePermissionCheck:timezone.edit_modal');
    Route::get('/timezone/destroy/{id}', 'TimezoneController@destroy')->name('timezone.destroy')->middleware('RoutePermissionCheck:timezone.destroy');


    Route::resource('city', 'CityController')->except('destroy')->middleware('RoutePermissionCheck:city.index');
    Route::post('city-edit-modal', 'CityController@edit_modal')->name('city.edit_modal')->middleware('RoutePermissionCheck:city.edit_modal');
    Route::get('/city/destroy/{id}', 'CityController@destroy')->name('city.destroy')->middleware('RoutePermissionCheck:city.destroy');


    Route::get('/maintenance', 'SettingController@maintenance')
        ->name('setting.maintenance')
        ->middleware('RoutePermissionCheck:setting.maintenance', 'saasAdmin');

    Route::post('/maintenance', 'SettingController@maintenanceAction')
        ->middleware('RoutePermissionCheck:setting.maintenance', 'saasAdmin');


    Route::get('/utilities', 'UtilitiesController@index')
        ->name('setting.utilities')
        ->middleware('RoutePermissionCheck:setting.utilities', 'saasAdmin');

    Route::post('utilities/reset-database', 'UtilitiesController@resetDatabase')->name('utilities.resetDatabase')->middleware(['RoutePermissionCheck:utilities.resetDatabase']);
    Route::post('utilities/import-demo-database', 'UtilitiesController@importDemoDatabase')->name('utilities.importDemoDatabase')->middleware(['RoutePermissionCheck:utilities.importDemoDatabase']);


    Route::get('/captcha', 'SettingController@captcha')
        ->name('setting.captcha')
        ->middleware('RoutePermissionCheck:setting.captcha');

    Route::post('/captcha', 'SettingController@captchaStore')
        ->middleware('RoutePermissionCheck:setting.captcha');


    Route::get('/socialLogin', 'SettingController@socialLogin')
        ->name('setting.socialLogin')
        ->middleware('RoutePermissionCheck:setting.socialLogin');

    Route::post('/socialLogin', 'SettingController@socialLoginStore')
        ->middleware('RoutePermissionCheck:setting.socialLogin');


    Route::get('/error_log', 'ErrorLogController@index')
        ->name('setting.error_log')
        ->middleware('RoutePermissionCheck:setting.error_log');


    Route::get('/error_log_data', 'ErrorLogController@getAllErrorLogData')
        ->name('setting.getAllErrorLogData')
        ->middleware('RoutePermissionCheck:setting.getAllErrorLogData');

    Route::post('/error_log_data', 'ErrorLogController@DeleteErrorLog')
        ->name('setting.error_log.delete')
        ->middleware('RoutePermissionCheck:setting.DeleteErrorLog');

    Route::post('/error_log_empty', 'ErrorLogController@EmptyErrorLog')
        ->name('setting.error_log.empty')
        ->middleware('RoutePermissionCheck:setting.DeleteErrorLog');


    Route::get('/push-notification', 'PushNotificationController@pushNotification')
        ->name('setting.pushNotification')
        ->middleware('RoutePermissionCheck:setting.pushNotification');

    Route::post('/push-notification', 'PushNotificationController@pushNotificationSubmit')
        ->middleware('RoutePermissionCheck:setting.pushNotification');

    Route::get('/queue-setting', 'QueueSettingController@index')
        ->name('setting.queueSetting')
        ->middleware('RoutePermissionCheck:setting.queueSetting');

    Route::post('/queue-setting', 'QueueSettingController@store')
        ->name('setting.queueSettingStore')
        ->middleware('RoutePermissionCheck:setting.queueSettingStore');

    Route::get('/preloader-setting', 'PreloaderSettingController@index')
        ->name('setting.preloader')
        ->middleware('RoutePermissionCheck:setting.preloader');

    Route::post('/preloader-setting', 'PreloaderSettingController@store')
        ->name('setting.preloaderStore')
        ->middleware('RoutePermissionCheck:setting.preloaderStore');


    Route::get('/gdrive', 'GoogleDriveController@index')->name('gdrive.setting');
    Route::post('/gdrive', 'GoogleDriveController@update')->name('gdrive.setting.update');
    Route::get('/login/google', 'GoogleDriveController@redirecttogoogleprovider')->name('setting.google.login');
    Route::get('/logout/google', 'GoogleDriveController@googlelogout')->name('setting.google.logout');
    Route::get('login/google/callback', 'GoogleDriveController@handleProviderGoogleCallback')->name('setting.google.callback');

//        Route::post('/google-drive/files', 'googledrivecontroller@listfiles')->name('drive.list.files');
//        Route::post('/google-drive/folders', 'googledrivecontroller@listfolders')->name('drive.list.folder');
//        Route::get('/google-drive/delete/{id}', 'googledrivecontroller@deletefileorfolder')->name('delete.drive.file');
//
//        Route::get('/drive', 'GoogleDriveController@getDrive'); // retreive folders
//
//        Route::get('/drive/upload', 'GoogleDriveController@uploadFile'); // File upload form
//
//        Route::post('/drive/upload', 'googledrivecontroller@uploadfile')->name('upload.drive'); // Upload file to Drive from Form
//
//        Route::get('/drive/create', 'GoogleDriveController@create'); // Upload file to Drive from Storage
//
//        Route::get('/drive/delete/{id}', 'GoogleDriveController@deleteFile'); // Delete file or folder
//
//        Route::get('dropbox/oauth', function(){
//            return Dropbox::connect();
//        })->name('dropbox.login');
//
//        Route::post('/backup/folder-create', 'backupcontroller@createbackupfolder')->name('create.new.folder'); // create folder
//        Route::post('/dropbox/upload', 'dropboxcontroller@uploadfile')->name('upload.dropbox'); // Upload file to Drive from Form
//        Route::get('/dropbox-drive/delete/{path}', 'dropboxcontroller@deletefileorfolder')->name('delete.dropbox.file');
//        Route::post('/storage/api-setting', 'backupcontroller@credentialsupdate')->name('storage.api.setting');

});


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

Route::prefix('systemsetting')->group(function () {
    Route::get('/', 'SystemSettingController@index');
    Route::get('/setLocale/{lang}', 'SystemSettingController@setLocale');
    Route::get('/getLocale', 'SystemSettingController@getLocale');
    Route::get('/languages', 'SystemSettingController@languages');
    Route::get('/currencies', 'SystemSettingController@currencies');
    Route::get('/get_language', 'SystemSettingController@getLocaleLang');
});

Route::group(['prefix' => 'admin/systemsetting', 'middleware' => ['auth']], function () {

    Route::get('/getAllLanguage', 'SystemSettingController@getAllLanguage');
});

Route::group(['prefix' => 'admin/systemsetting', 'middleware' => ['auth']], function () {
    Route::get('/', 'SystemSettingController@index');

    Route::post('/add_phrase', 'SystemSettingController@addPhrase');
    Route::post('/add_module', 'SystemSettingController@addModule');

    Route::get('/messages', 'InstructorSettingController@toastrMessages');
    Route::get('/companyMessages', 'CompanyController@toastrMessages');
    Route::get('/workMessages', 'BecomeInstructorSettingController@toastrMessages');
    Route::get('/testimonialMessages', 'TestimonialController@toastrMessages');
    Route::get('/blogMessages', 'SystemSettingController@toastrMessages');
    Route::get('/faqMessages', 'FAQController@toastrMessages');
    Route::get('/footerMessages', 'FooterController@toastrMessages');
    Route::get('/socialMessages', 'SocialLinkController@toastrMessages');
    Route::get('/pageMessages', 'PageController@toastrMessages');

    //Language Setting

    Route::get('/getAllLanguage', 'SystemSettingController@getAllLanguage');
    Route::get('/languageStatus/{id}', 'SystemSettingController@languageStatus');
    Route::post('/language_add', 'SystemSettingController@language_add');
    Route::get('/language_edit/{id}', 'SystemSettingController@language_edit');
    Route::post('/language_update', 'SystemSettingController@language_update');
    Route::post('/language_search', 'SystemSettingController@language_search');
    Route::get('/language_searchData', 'SystemSettingController@language_searchData');
    Route::post('/language_phase', 'SystemSettingController@language_phase');
    Route::get('/language', 'SystemSettingController@language');
    Route::post('/language_delete/{id}', 'SystemSettingController@language_delete');
    Route::get('/changeLanguage/{id}', 'SystemSettingController@changeLanguage');
    Route::get('/allModules', 'SystemSettingController@allModules');
    Route::post('/moduleCode', 'SystemSettingController@moduleCode');
    Route::post('/saveTranslate/{lang}', 'SystemSettingController@saveTranslate');
    Route::post('/socialCreditional', 'SystemSettingController@socialCreditional');

//Instructor Manage
    Route::get('/all/instructor-data', 'InstructorSettingController@getAllInstructorData')->name('getAllInstructorData')->middleware('RoutePermissionCheck:allInstructor');

    Route::get('/allInstructor', 'InstructorSettingController@index')->name('allInstructor')->middleware('RoutePermissionCheck:allInstructor');
    Route::post('/store', 'InstructorSettingController@store')->name('instructor.store')->middleware('RoutePermissionCheck:instructor.store');
    Route::get('/searchInstructor', 'InstructorSettingController@searchInstructor');
    Route::get('/edit/{id}', 'InstructorSettingController@edit')->middleware('RoutePermissionCheck:instructor.edit');
    Route::post('/update', 'InstructorSettingController@update')->name('instructor.update')->middleware('RoutePermissionCheck:instructor.edit');
    Route::post('/destroy', 'InstructorSettingController@destroy')->name('instructor.delete')->middleware('RoutePermissionCheck:instructor.delete');
    Route::get('/status/{id}', 'InstructorSettingController@status')->name('instructor.change_status')->middleware('RoutePermissionCheck:instructor.change_status');

    //Email Setting
    Route::get('/editEmailSetting', 'SystemSettingController@editEmailSetting');
    Route::post('/updateEmailSetting', 'SystemSettingController@updateEmailSetting')->name('updateEmailSetting');
    Route::post('/sendTestMail', 'SystemSettingController@sendTestMail')->name('sendTestMail');
    Route::get('/getEmailTemp', 'SystemSettingController@getEmailTemp');
    Route::get('/editEmailTemp/{id}', 'SystemSettingController@editEmailTemp');
    Route::get('/viewEmailTemp/{id}', 'SystemSettingController@viewEmailTemp');
    Route::post('/updateEmailTemp', 'SystemSettingController@updateEmailTemp')->name('updateEmailTemp')->middleware('RoutePermissionCheck:updateEmailTemp');
    Route::post('/footerTemplateUpdate', 'SystemSettingController@footerTemplateUpdate')->name('footerTemplateUpdate')->middleware('RoutePermissionCheck:footerTemplateUpdate');

    //Web Setting
    Route::post('/websiteSetting', 'SystemSettingController@websiteSetting');
    Route::post('/seoSetting', 'SystemSettingController@seoSetting');
    Route::post('/recapchaSetting', 'SystemSettingController@recapchaSetting');
    Route::post('/homeVarriant/{id}', 'SystemSettingController@homeVarriant');
    Route::post('/systemSetting', 'SystemSettingController@systemSetting');
    Route::get('/websiteSetting_view', 'SystemSettingController@websiteSetting_view');
    Route::get('/alltimezones', 'SystemSettingController@alltimezones');

    //Currency Setting
    Route::get('/allCurrency', 'SystemSettingController@allCurrency');
    Route::get('/currencyStatus/{id}', 'SystemSettingController@currencyStatus');
    Route::get('/currency_edit/{id}', 'SystemSettingController@currency_edit');
    Route::post('/currency_update', 'SystemSettingController@currency_update');
    Route::post('/currency_add', 'SystemSettingController@currency_add');


    // Company Manage
    Route::get('/allCompany', 'CompanyController@index');
    Route::post('/storeCompany', 'CompanyController@store');
    Route::get('/editCompany/{id}', 'CompanyController@edit');
    Route::post('/updateCompany', 'CompanyController@update');
    Route::get('/destroyCompany/{id}', 'CompanyController@destroy');
    Route::get('/companyStatus/{id}', 'CompanyController@status');
    Route::get('/searchCompany', 'CompanyController@search');

    // Page Manage
    Route::get('/allPage', 'PageController@index');
    Route::post('/storePage', 'PageController@store');
    Route::get('/editPage/{id}', 'PageController@edit');
    Route::post('/updatePage', 'PageController@update');
    Route::get('/destroyPage/{id}', 'PageController@destroy');
    Route::get('/pageStatus/{id}', 'PageController@status');
    Route::get('/searchPage', 'PageController@search');

    // Frontend Manage
    Route::get('/allFrontend', 'FrontendSettingController@index');
    Route::get('/editFrontend/{id}', 'FrontendSettingController@edit');
    Route::post('/updateFrontend', 'FrontendSettingController@update');
    Route::get('/searchFrontend', 'FrontendSettingController@search');

    // Testimonial Manage
    Route::get('/allTestimonial', 'TestimonialController@index');
    Route::post('/storeTestimonial', 'TestimonialController@store');
    Route::get('/editTestimonial/{id}', 'TestimonialController@edit');
    Route::post('/updateTestimonial', 'TestimonialController@update');
    Route::get('/destroyTestimonial/{id}', 'TestimonialController@destroy');
    Route::get('/testimonialStatus/{id}', 'TestimonialController@status');
    Route::get('/searchTestimonial', 'TestimonialController@search');

    // Faq Manage
    Route::get('/allFaq', 'FAQController@index');
    Route::post('/storeFaq', 'FAQController@store');
    Route::get('/editFaq/{id}', 'FAQController@edit');
    Route::post('/updateFaq', 'FAQController@update');
    Route::get('/destroyFaq/{id}', 'FAQController@destroy');
    Route::get('/faqStatus/{id}', 'FAQController@status');
    Route::get('/searchFaq', 'FAQController@search');


    Route::prefix('user')->group(function () {
        //message Area
        Route::get('/users', 'MessageController@index');
        Route::get('/findUser/{id}', 'MessageController@show');
        Route::get('/firstUser', 'MessageController@user');
        Route::post('/sentMessage/{id}', 'MessageController@store');
        Route::get('/searchUser', 'MessageController@search');

        Route::get('api', 'SystemSettingController@allApi')->name('api.setting');
        Route::post('save/api', 'SystemSettingController@saveApi')->name('save.api.setting');


        Route::get('/hr/departments', 'DepartmentController@index')->name('hr.department.index');
        Route::post('/hr/departments/store', 'DepartmentController@store')->name('hr.department.store');
        Route::post('/hr/departments/update', 'DepartmentController@update')->name('hr.department.update');
        Route::post('/hr/departments/delete', 'DepartmentController@delete')->name('hr.department.delete');

        Route::get('settings', 'StaffController@settings')->name('staffs.settings');
        Route::post('settings', 'StaffController@settingsPost')->name('staffs.settings');
        Route::resource('staffs', 'StaffController')->except('destroy')->middleware('RoutePermissionCheck:staffs.index');
        Route::post('/staff-document/store', 'StaffController@document_store')->name('staff_document.store');
        Route::get('/staff-document/destroy/{id}', 'StaffController@document_destroy')->name('staff_document.destroy');
        Route::get('/profile-view', 'StaffController@profile_view')->name('profile_view');
        Route::post('/profile-edit', 'StaffController@profile_edit')->name('profile_edit_modal');
        Route::post('/profile-update/{id}', 'StaffController@profile_update')->name('profile.update');


        Route::post('/staff-status-update', 'StaffController@status_update')->name('staffs.update_active_status');
        Route::get('/staff/view/{id}', 'StaffController@show')->name('staffs.view');
        Route::get('/staff/report-print/{id}', 'StaffController@report_print')->name('staffs.report_print');
        Route::get('/staff/destroy/{id}', 'StaffController@destroy')->name('staffs.destroy')->middleware('RoutePermissionCheck:staffs.destroy');
        Route::get('/staff/active/{id}', 'StaffController@active')->name('staffs.active');
        Route::get('/staff/inactive/{id}', 'StaffController@inactive')->name('staffs.inactive');
        Route::post('/staff/inactive-update/{id}', 'StaffController@inactiveUpdate')->name('staffs.inactive.update');
        Route::get('/staff/document-upload', 'StaffController@documentUpload')->name('staffs.document.upload');
        Route::post('/staff/document-store', 'StaffController@documentUploadStore')->name('staffs.document.store');
        Route::get('/staff/document-remove/{id}', 'StaffController@documentRemove')->name('staffs.document.remove');
        Route::get('/staff/resume/{id?}', 'StaffController@staffResume')->name('staffs.resume');

        Route::get('/staff/csv-upload-page', 'StaffController@csv_upload')->name('staffs.csv_upload');
        Route::post('/staff/csv-upload-store', 'StaffController@csv_upload_store')->name('staffs.csv_upload_store');
    });

});

Route::get('/become_instructor/getSetting', 'BecomeInstructorSettingController@getSetting');


Route::group(['prefix' => 'websitesetting'], function () {
    Route::get('/blog_details/{id}', 'SystemSettingController@blog_detail');
    Route::get('/nextBlog/{id}', 'SystemSettingController@nextBlog');
    Route::get('/previousBlog/{id}', 'SystemSettingController@previousBlog');
    Route::get('/viewBlog/{id}', 'SystemSettingController@viewBlog');

    Route::get('/website_data', 'GeneralSettingController@index');
});

//Footer Section
Route::group(['prefix' => 'footer/'], function () {
    Route::get('/categories', 'FooterController@index');
    Route::get('/categories/{id}', 'FooterController@show');
    Route::get('/content', 'FooterController@firstContent');
    Route::post('/saveFooter/{id}', 'FooterController@store');
    Route::post('/saveCategory/{id}', 'FooterController@saveCategory');
    Route::get('/destroy/{id}', 'FooterController@destroy');
    Route::get('/footerData', 'FooterController@footerData');
});

//Socail Link Section
Route::group(['prefix' => 'social/', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/social_list', 'SocialLinkController@index');
    Route::get('/getSocial/{id}', 'SocialLinkController@show');
    Route::post('/store', 'SocialLinkController@store');
    Route::post('/update', 'SocialLinkController@update');
    Route::get('/destroy/{id}', 'SocialLinkController@destroy');
    Route::get('/status/{id}', 'SocialLinkController@status');
});

//Socail Link Section
Route::group(['prefix' => 'counter/'], function () {
    Route::get('/counter_list', 'PageController@counters');
    Route::get('/getCounter/{id}', 'PageController@getCounter');
    Route::post('/saveCounter', 'PageController@saveCounter');
    Route::post('/updateCounter', 'PageController@updateCounter');
});



Route::group(['prefix' => 'admin/payment', 'middleware' => ['auth', 'admin']], function () {
    Route::get('commission', 'PaymentController@setCommission')->name('setting.setCommission')->middleware('RoutePermissionCheck:setting.setCommission');

    Route::post('/saveFlat', 'PaymentController@saveFlat')->name('saveFlat')->middleware('RoutePermissionCheck:setting.setCourseFee_update');
    Route::post('/instructor_commission', 'PaymentController@instructor_commission')->name('instructor_commission')->middleware('RoutePermissionCheck:setting.instructorCommission_edit');

    Route::post('/courseCommissionUpdate/', 'PaymentController@courseCommissionUpdate')->middleware('RoutePermissionCheck:setting.courseCommission_update');

    Route::get('/withdraws', 'ReportController@withdraws')->name('withdraws')->middleware('RoutePermissionCheck:instructor_payout');

    Route::post('/courseCommission', 'PaymentController@courseCommission')->name('courseCommission');
    Route::get('/online-payment-received', 'ReportController@onlineLog')->name('onlineLog')->middleware('RoutePermissionCheck:onlineLog');

    Route::post('/filterSearch', 'ReportController@filterSearch')->name('filterSearch');
    Route::post('/filterSearchByMethod', 'ReportController@filterMethod');

    Route::get('/set-payout', 'PaymentController@setPayout')->name('set.payout');
    Route::post('/set-payout/email', 'PaymentController@savePayout')->name('save.payout.email');
});


//Route::prefix('paymentmethodsetting')->middleware('auth')->group(function () {
Route::get('payment-method-setting', 'PaymentMethodSettingController@index')->name('paymentmethodsetting.payment_method_setting')->middleware('RoutePermissionCheck:paymentmethodsetting.payment_method_setting');
Route::get('payment-method-setting-test', 'PaymentMethodSettingController@test')->name('paymentmethodsetting.test')->middleware('RoutePermissionCheck:paymentmethodsetting.test');
Route::post('payment-method-setting-test', 'PaymentMethodSettingController@testSubmit');
Route::post('payment-method-setting', 'PaymentMethodSettingController@update')->name('paymentmethodsetting.update_payment_gateway')->middleware('RoutePermissionCheck:paymentmethodsetting.payment_method_setting_update');
Route::post('changePaymentGatewayStatus', 'PaymentMethodSettingController@changePaymentGatewayStatus')->name('paymentmethodsetting.changePaymentGatewayStatus');


Route::get('paypalTestSuccess', 'PaymentMethodSettingController@paypalTestSuccess')->name('paypalTestSuccess');
Route::get('paypalTestFailed', 'PaymentMethodSettingController@paypalTestFailed')->name('paypalTestFailed');
//});

Route::prefix('vimeosetting')->middleware('auth')->group(function () {
    Route::get('vimeo-setting', 'VimeoSettingController@index')->name('vimeosetting.index')->middleware('RoutePermissionCheck:vimeosetting.index');
    Route::post('vimeo-setting', 'VimeoSettingController@update')->name('vimeosetting.update')->middleware('RoutePermissionCheck:vimeosetting.update');
});

//Route::prefix('vdocipher')->group(function () {
Route::get('/setting', 'VdoCipherController@setting')->name('vdocipher.setting');
Route::post('/setting', 'VdoCipherController@settingUpdate')->name('vdocipher.settingUpdate');
//});



Route::group(['middleware' => ['auth', 'verified']], function(){
    Route::prefix('localization')->group(function() {
        Route::get('/','LanguageController@index')->name('languages.index')->middleware('RoutePermissionCheck:languages.index');
        Route::get('/languages/destroy/{id}', 'LanguageController@destroy')->name('languages.destroy')->middleware('RoutePermissionCheck:languages.destroy');
        Route::post('/edit', 'LanguageController@edit')->name('languages.edit_modal')->middleware('RoutePermissionCheck:languages.edit');
        Route::post('/store', 'LanguageController@store')->name('languages.store')->middleware('RoutePermissionCheck:languages.store');
        Route::post('/update/{id}', 'LanguageController@update')->name('languages.update')->middleware('RoutePermissionCheck:languages.edit');
        Route::get('/translate-view/{id}', 'LanguageController@show')->name('language.translate_view')->middleware('RoutePermissionCheck:languages.translate_view');
        Route::post('/update-rtl-status', 'LanguageController@update_rtl_status')->name('languages.update_rtl_status')->middleware('RoutePermissionCheck:languages.update_rtl_status');
        Route::post('/update-active-status', 'LanguageController@update_active_status')->name('languages.update_active_status')->middleware('RoutePermissionCheck:languages.update_active_status');
        Route::post('/languages/key_value_store', 'LanguageController@key_value_store')->name('languages.key_value_store')->middleware('RoutePermissionCheck:languages.key_value_store');
//        Route::post('/set-language', 'LanguageController@changeLanguage')->name('language.change')->middleware('RoutePermissionCheck:languages.change');
        Route::post('/get-translate-file', 'LanguageController@get_translate_file')->name('language.get_translate_file')->middleware('RoutePermissionCheck:languages.get_translate_file');
    });
});



Route::prefix('modulemanager')->middleware(['auth','admin'])->group(function () {
    Route::get('/', 'ModuleManagerController@ManageAddOns')->name('modulemanager.index');
    Route::post('/uploadModule', 'ModuleManagerController@uploadModule')->name('modulemanager.uploadModule');

    Route::get('manage-adons-delete/{name}', 'ModuleManagerController@ManageAddOns')->name('deleteModule');
    Route::get('manage-adons-enable/{name}', 'ModuleManagerController@moduleAddOnsEnable')->name('moduleAddOnsEnable');
    Route::get('manage-adons-disable/{name}', 'ModuleManagerController@moduleAddOnsDisable')->name('moduleAddOnsDisable');
});















