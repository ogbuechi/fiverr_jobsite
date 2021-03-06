<?php

use App\Http\Controllers\admin\AdController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\DatabaseProductController;
use App\Http\Controllers\admin\EducationalDetails;
use App\Http\Controllers\admin\FormsController;
use App\Http\Controllers\admin\HighlighController;
use App\Http\Controllers\admin\JobsController;
use App\Http\Controllers\admin\LocationController;
use App\Http\Controllers\admin\PackagesController;
use App\Http\Controllers\admin\PagesController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\UserBackgroundVerificationController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\VerificationPackageController;
use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\admin\AdminsController;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FunctionalAreaController;
use App\Http\Controllers\IndustryTypeController;
use App\Http\Controllers\LgaController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\StateController;
use App\Models\DatabaseProduct;
use App\Models\UserBackgroundVerification;


Route::group(['middleware' => ['auth','role:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', AdminDashboard::class)->name('dashboard');

//    User Listing

    Route::get('user/admins', [UsersController::class, 'admins'])->name('user.admins');
    Route::get('user/sub_admins', [UsersController::class, 'subAdmins'])->name('user.sub_admins');
    Route::get('user/employers', [UsersController::class, 'employers'])->name('user.employers');
    Route::get('user/jobseekers', [UsersController::class, 'jobseekers'])->name('user.jobseekers');
    Route::post('settings/store/item', [SettingsController::class, 'storeItem'])->name('settings.store.item');

    Route::get('pages/edit/page', [PagesController::class, 'editPage'])->name('pages.edit.page');

    Route::get('resume/access', [AdminsController::class, 'resumeAccess'])->name('resume.access');
    Route::get('inactive/resumes', [AdminsController::class, 'inactiveResumes'])->name('inactive.resumes');
    Route::post('resume/search', [AdminsController::class, 'resumeSearch'])->name('resume.search');
    Route::get('inactive/companies', [AdminsController::class, 'inactiveCompanies'])->name('inactive.companies');

    Route::get('employee/database/access', [AdminsController::class, 'employeeDBAccess'])->name('employee.db.access');
    Route::get('employee/database/order', [AdminsController::class, 'employeeDBAccessOrders'])->name('employee.db.access.orders');
    Route::get('employee/job/access/order', [AdminsController::class, 'employeeJobAccessOrders'])->name('employee.job.access.orders');
    Route::get('employee/job/access', [AdminsController::class, 'employeeJobAccess'])->name('employee.job.access');

    Route::get('package/purchased', [AdminsController::class, 'packagePurchased'])->name('package.purchased');

    Route::get('background/forms', [FormsController::class, 'backgroundIndex'])->name('background.form.index');

    Route::get('background/submissions', [UserBackgroundVerificationController::class, 'index'])->name('background.submissions');

    Route::get('background/submission/{id}', [UserBackgroundVerificationController::class, 'show'])->name('background.submission');
    Route::get('background/upload/{id}', [UserBackgroundVerificationController::class, 'upload'])->name('background.upload');
    Route::post('background/upload/store', [UserBackgroundVerificationController::class, 'storeUpload'])->name('background.upload.store');
    Route::get('background/approve/{id}', [UserBackgroundVerificationController::class, 'approve'])->name('background.approve');

    Route::get('settings/home', [SettingsController::class, 'home'])->name('settings.home');

    Route::get('jobseeker/newsletter', [AdminsController::class, 'jobseekerNewsletter'])->name('jobseeker.newsletter');
    Route::get('employer/newsletter', [AdminsController::class, 'employerNewsletter'])->name('employer.newsletter');
    Route::post('newsletter/submit', [AdminsController::class, 'newsletterSubmit'])->name('newsletter.submit');

    Route::post('newsletter/send', [AdminsController::class, 'newsletterSend'])->name('newsletter.send');

    Route::get('/jobs/toggle/disabled/{slug}', [JobsController::class, 'toggleDisabled'])->name('jobs.toggle_disabled');
    

    Route::resources([
        'countries' => CountryController::class,
        'highlights' => HighlighController::class,
        'users' => UsersController::class,
        'lgas' => LgaController::class,
        'states' => StateController::class,
        'cities' => CityController::class,
        'skills' => SkillsController::class,
        'industry-type'     => IndustryTypeController::class,
        'functional-area'   => FunctionalAreaController::class,
        'educational-details' => EducationalDetails::class,
        'products' => ProductsController::class,
        'ads' => AdController::class,
        'packages' => PackagesController::class,
        'pages' => PagesController::class,
        'banners' => BannerController::class,
        'settings' => SettingsController::class,
        'categories' => CategoriesController::class,
        'locations' => LocationController::class,
        'testimonial' => TestimonialController::class,
        'dbproducts' => DatabaseProductController::class,
        'v_packages' => VerificationPackageController::class,
        'forms' => FormsController::class,
        '/home/jobs' => JobsController::class,

    ]);

});

