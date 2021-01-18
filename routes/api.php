<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Faq Categories
    Route::apiResource('faq-categories', 'FaqCategoryApiController');

    // Faq Questions
    Route::apiResource('faq-questions', 'FaqQuestionApiController');

    // Annoucements
    Route::post('annoucements/media', 'AnnoucementApiController@storeMedia')->name('annoucements.storeMedia');
    Route::apiResource('annoucements', 'AnnoucementApiController');

    // Policies
    Route::post('policies/media', 'PolicyApiController@storeMedia')->name('policies.storeMedia');
    Route::apiResource('policies', 'PolicyApiController');

    // Textbooks
    Route::post('textbooks/media', 'TextbookApiController@storeMedia')->name('textbooks.storeMedia');
    Route::apiResource('textbooks', 'TextbookApiController');

    // Manuals
    Route::post('manuals/media', 'ManualApiController@storeMedia')->name('manuals.storeMedia');
    Route::apiResource('manuals', 'ManualApiController');

    // Templates
    Route::post('templates/media', 'TemplateApiController@storeMedia')->name('templates.storeMedia');
    Route::apiResource('templates', 'TemplateApiController');

    // Categories
    Route::apiResource('categories', 'CategoryApiController');

    // Books
    Route::post('books/media', 'BookApiController@storeMedia')->name('books.storeMedia');
    Route::apiResource('books', 'BookApiController');

    // Schools
    Route::apiResource('schools', 'SchoolApiController');

    // Class Rooms
    Route::apiResource('class-rooms', 'ClassRoomApiController');

    // Subjects
    Route::apiResource('subjects', 'SubjectApiController');

    // Academic Years
    Route::apiResource('academic-years', 'AcademicYearsApiController');

    // Students
    Route::post('students/media', 'StudentApiController@storeMedia')->name('students.storeMedia');
    Route::apiResource('students', 'StudentApiController');

    // History Admin Teachers
    Route::post('history-admin-teachers/media', 'HistoryAdminTeachersApiController@storeMedia')->name('history-admin-teachers.storeMedia');
    Route::apiResource('history-admin-teachers', 'HistoryAdminTeachersApiController');

    // Contents
    Route::post('contents/media', 'ContentApiController@storeMedia')->name('contents.storeMedia');
    Route::apiResource('contents', 'ContentApiController');

    // Content Categories
    Route::apiResource('content-categories', 'ContentCategoryApiController');
});
