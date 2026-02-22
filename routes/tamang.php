<?php

use App\Http\Controllers\Tamang\CaseStudyCategoryController;
use App\Http\Controllers\Tamang\CaseStudyController;
use App\Http\Controllers\Tamang\PageController;
use App\Http\Controllers\Tamang\ProjectComponentController;
use App\Http\Controllers\Tamang\ProjectDescriptionController;
use App\Http\Controllers\Tamang\ProjectObjectiveController;
use App\Http\Controllers\Tamang\ProjectResourceController;
use App\Http\Controllers\Tamang\PublicationCategoryController;
use App\Http\Controllers\Tamang\PublicationController;
use App\Http\Controllers\Tamang\SectionController;
use App\Http\Controllers\Tamang\EventController;
use App\Http\Controllers\Tamang\MediaCoverageController;
use App\Http\Controllers\Tamang\NoticeController;
use App\Http\Controllers\Tamang\SettingController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('admin/tamang')->name('tamang.')->group(function () {
    Route::resource('settings', SettingController::class);
    Route::post('settings/change', [SettingController::class, 'change'])->name('settings.change');
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
    Route::resource('notices', NoticeController::class);
    Route::resource('media-coverage', MediaCoverageController::class);
});
