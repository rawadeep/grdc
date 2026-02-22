<?php

use App\Http\Controllers\Backend\CaseStudyCategoryController;
use App\Http\Controllers\Backend\CaseStudyController;
use App\Http\Controllers\Backend\ContactMessageController;
use App\Http\Controllers\Backend\GrievanceController;
use App\Http\Controllers\Backend\MainController;
use App\Http\Controllers\Backend\MediaCoverageController;
use App\Http\Controllers\Backend\NoticeController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\ProjectComponentController;
use App\Http\Controllers\Backend\ProjectDescriptionController;
use App\Http\Controllers\Backend\ProjectObjectiveController;
use App\Http\Controllers\Backend\ProjectResourceController;
use App\Http\Controllers\Backend\PublicationCategoryController;
use App\Http\Controllers\Backend\PublicationController;
use App\Http\Controllers\Backend\SectionController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('settings', SettingController::class);
    Route::post('settings/change', [SettingController::class, 'change'])->name('settings.change');
    Route::resource('languages', LanguageController::class);
    Route::resource('users', UserController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('pages', PageController::class);
    Route::resource('sections', SectionController::class);
    Route::resource('project-descriptions', ProjectDescriptionController::class);
    Route::resource('project-objectives', ProjectObjectiveController::class);
    Route::resource('project-components', ProjectComponentController::class);

    Route::resource('case-study-categories', CaseStudyCategoryController::class);
    Route::resource('case-studies', CaseStudyController::class);
    Route::resource('project-resources', ProjectResourceController::class);

    Route::resource('publication-categories', PublicationCategoryController::class);
    Route::resource('publications', PublicationController::class);
    Route::resource('events', EventController::class);
    Route::resource('media', MediaController::class);
    Route::resource('media-coverage', MediaCoverageController::class);
    Route::resource('notices', NoticeController::class);
    Route::get('backup/database', [MainController::class, 'backupDatabase'])->name('backup.database');
});

Route::resource('grievances', GrievanceController::class);
Route::resource('contact-messages', ContactMessageController::class);
