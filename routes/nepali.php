<?php

use App\Http\Controllers\Nepali\CaseStudyCategoryController;
use App\Http\Controllers\Nepali\CaseStudyController;
use App\Http\Controllers\Nepali\PageController;
use App\Http\Controllers\Nepali\ProjectComponentController;
use App\Http\Controllers\Nepali\ProjectDescriptionController;
use App\Http\Controllers\Nepali\ProjectObjectiveController;
use App\Http\Controllers\Nepali\ProjectResourceController;
use App\Http\Controllers\Nepali\PublicationCategoryController;
use App\Http\Controllers\Nepali\PublicationController;
use App\Http\Controllers\Nepali\SectionController;
use App\Http\Controllers\Nepali\EventController;
use App\Http\Controllers\Nepali\MediaCoverageController;
use App\Http\Controllers\Nepali\NoticeController;
use App\Http\Controllers\Nepali\SettingController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('admin/nepali')->name('nepali.')->group(function () {
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
