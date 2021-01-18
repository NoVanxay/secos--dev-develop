<?php

Route::view('/', 'welcome');
Auth::routes(['register' => true]);

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth',  'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Faq Categories
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Questions
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');

    // Annoucements
    Route::delete('annoucements/destroy', 'AnnoucementController@massDestroy')->name('annoucements.massDestroy');
    Route::post('annoucements/media', 'AnnoucementController@storeMedia')->name('annoucements.storeMedia');
    Route::post('annoucements/ckmedia', 'AnnoucementController@storeCKEditorImages')->name('annoucements.storeCKEditorImages');
    Route::resource('annoucements', 'AnnoucementController');

    // Policies
    Route::delete('policies/destroy', 'PolicyController@massDestroy')->name('policies.massDestroy');
    Route::post('policies/media', 'PolicyController@storeMedia')->name('policies.storeMedia');
    Route::post('policies/ckmedia', 'PolicyController@storeCKEditorImages')->name('policies.storeCKEditorImages');
    Route::resource('policies', 'PolicyController');

    // Textbooks
    Route::delete('textbooks/destroy', 'TextbookController@massDestroy')->name('textbooks.massDestroy');
    Route::post('textbooks/media', 'TextbookController@storeMedia')->name('textbooks.storeMedia');
    Route::post('textbooks/ckmedia', 'TextbookController@storeCKEditorImages')->name('textbooks.storeCKEditorImages');
    Route::resource('textbooks', 'TextbookController');

    // Manuals
    Route::delete('manuals/destroy', 'ManualController@massDestroy')->name('manuals.massDestroy');
    Route::post('manuals/media', 'ManualController@storeMedia')->name('manuals.storeMedia');
    Route::post('manuals/ckmedia', 'ManualController@storeCKEditorImages')->name('manuals.storeCKEditorImages');
    Route::resource('manuals', 'ManualController');

    // Templates
    Route::delete('templates/destroy', 'TemplateController@massDestroy')->name('templates.massDestroy');
    Route::post('templates/media', 'TemplateController@storeMedia')->name('templates.storeMedia');
    Route::post('templates/ckmedia', 'TemplateController@storeCKEditorImages')->name('templates.storeCKEditorImages');
    Route::resource('templates', 'TemplateController');

    // Categories
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Books
    Route::delete('books/destroy', 'BookController@massDestroy')->name('books.massDestroy');
    Route::post('books/media', 'BookController@storeMedia')->name('books.storeMedia');
    Route::post('books/parse-csv-import', 'bookController@parseCsvImport')->name('books.parseCsvImport');
    Route::post('books/process-csv-import', 'bookController@processCsvImport')->name('books.processCsvImport');
    Route::post('books/ckmedia', 'BookController@storeCKEditorImages')->name('books.storeCKEditorImages');
    Route::resource('books', 'BookController');

    // Schools
    Route::delete('schools/destroy', 'SchoolController@massDestroy')->name('schools.massDestroy');
    Route::resource('schools', 'SchoolController');

    // Class Rooms
    Route::delete('class-rooms/destroy', 'ClassRoomController@massDestroy')->name('class-rooms.massDestroy');
    Route::resource('class-rooms', 'ClassRoomController');

    // Subjects
    Route::delete('subjects/destroy', 'SubjectController@massDestroy')->name('subjects.massDestroy');
    Route::resource('subjects', 'SubjectController');

    // Academic Years
    Route::delete('academic-years/destroy', 'AcademicYearsController@massDestroy')->name('academic-years.massDestroy');
    Route::resource('academic-years', 'AcademicYearsController');

    // Students
    Route::delete('students/destroy', 'StudentController@massDestroy')->name('students.massDestroy');
    Route::post('students/media', 'StudentController@storeMedia')->name('students.storeMedia');
    Route::post('students/parse-csv-import', 'StudentController@parseCsvImport')->name('students.parseCsvImport');
    Route::post('students/process-csv-import', 'StudentController@processCsvImport')->name('students.processCsvImport');
    Route::post('students/ckmedia', 'StudentController@storeCKEditorImages')->name('students.storeCKEditorImages');
    Route::resource('students', 'StudentController');

    // History Admin Teachers
    Route::delete('history-admin-teachers/destroy', 'HistoryAdminTeachersController@massDestroy')->name('history-admin-teachers.massDestroy');
    Route::post('history-admin-teachers/media', 'HistoryAdminTeachersController@storeMedia')->name('history-admin-teachers.storeMedia');
    Route::post('history-admin-teachers/ckmedia', 'HistoryAdminTeachersController@storeCKEditorImages')->name('history-admin-teachers.storeCKEditorImages');
    Route::resource('history-admin-teachers', 'HistoryAdminTeachersController');
    Route::post('history-admin-teachers/parse-csv-import', 'HistoryAdminTeachersController@parseCsvImport')->name('history-admin-teachers.parseCsvImport');
    Route::post('history-admin-teachers/process-csv-import', 'HistoryAdminTeachersController@processCsvImport')->name('history-admin-teachers.processCsvImport');

    // Contents
    Route::delete('contents/destroy', 'ContentController@massDestroy')->name('contents.massDestroy');
    Route::post('contents/media', 'ContentController@storeMedia')->name('contents.storeMedia');
    Route::post('contents/ckmedia', 'ContentController@storeCKEditorImages')->name('contents.storeCKEditorImages');
    Route::resource('contents', 'ContentController');

    // Content Categories
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');

    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/Welcome', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Annoucements
    Route::delete('annoucements/destroy', 'AnnoucementController@massDestroy')->name('annoucements.massDestroy');
    Route::post('annoucements/media', 'AnnoucementController@storeMedia')->name('annoucements.storeMedia');
    Route::post('annoucements/ckmedia', 'AnnoucementController@storeCKEditorImages')->name('annoucements.storeCKEditorImages');
    Route::resource('annoucements', 'AnnoucementController');

    // Policies
    Route::delete('policies/destroy', 'PolicyController@massDestroy')->name('policies.massDestroy');
    Route::post('policies/media', 'PolicyController@storeMedia')->name('policies.storeMedia');
    Route::post('policies/ckmedia', 'PolicyController@storeCKEditorImages')->name('policies.storeCKEditorImages');
    Route::resource('policies', 'PolicyController');

    // Textbooks
    Route::delete('textbooks/destroy', 'TextbookController@massDestroy')->name('textbooks.massDestroy');
    Route::post('textbooks/media', 'TextbookController@storeMedia')->name('textbooks.storeMedia');
    Route::post('textbooks/ckmedia', 'TextbookController@storeCKEditorImages')->name('textbooks.storeCKEditorImages');
    Route::resource('textbooks', 'TextbookController');

    // Manuals
    Route::delete('manuals/destroy', 'ManualController@massDestroy')->name('manuals.massDestroy');
    Route::post('manuals/media', 'ManualController@storeMedia')->name('manuals.storeMedia');
    Route::post('manuals/ckmedia', 'ManualController@storeCKEditorImages')->name('manuals.storeCKEditorImages');
    Route::resource('manuals', 'ManualController');

    // Templates
    Route::delete('templates/destroy', 'TemplateController@massDestroy')->name('templates.massDestroy');
    Route::post('templates/media', 'TemplateController@storeMedia')->name('templates.storeMedia');
    Route::post('templates/ckmedia', 'TemplateController@storeCKEditorImages')->name('templates.storeCKEditorImages');
    Route::resource('templates', 'TemplateController');

    // Categories
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Books
    Route::delete('books/destroy', 'BookController@massDestroy')->name('books.massDestroy');
    Route::post('books/media', 'BookController@storeMedia')->name('books.storeMedia');
    Route::post('books/ckmedia', 'BookController@storeCKEditorImages')->name('books.storeCKEditorImages');
    Route::resource('books', 'BookController');

    // Schools
    Route::delete('schools/destroy', 'SchoolController@massDestroy')->name('schools.massDestroy');
    Route::resource('schools', 'SchoolController');

    // Class Rooms
    Route::delete('class-rooms/destroy', 'ClassRoomController@massDestroy')->name('class-rooms.massDestroy');
    Route::resource('class-rooms', 'ClassRoomController');

    // Subjects
    Route::delete('subjects/destroy', 'SubjectController@massDestroy')->name('subjects.massDestroy');
    Route::resource('subjects', 'SubjectController');

    // Academic Years
    Route::delete('academic-years/destroy', 'AcademicYearsController@massDestroy')->name('academic-years.massDestroy');
    Route::resource('academic-years', 'AcademicYearsController');

    // Students
    Route::delete('students/destroy', 'StudentController@massDestroy')->name('students.massDestroy');
    Route::post('students/media', 'StudentController@storeMedia')->name('students.storeMedia');
    Route::post('students/ckmedia', 'StudentController@storeCKEditorImages')->name('students.storeCKEditorImages');
    Route::resource('students', 'StudentController');

    // History Admin Teachers
    Route::delete('history-admin-teachers/destroy', 'HistoryAdminTeachersController@massDestroy')->name('history-admin-teachers.massDestroy');
    Route::post('history-admin-teachers/media', 'HistoryAdminTeachersController@storeMedia')->name('history-admin-teachers.storeMedia');
    Route::post('history-admin-teachers/ckmedia', 'HistoryAdminTeachersController@storeCKEditorImages')->name('history-admin-teachers.storeCKEditorImages');
    Route::resource('history-admin-teachers', 'HistoryAdminTeachersController');

    // Contents
    Route::delete('contents/destroy', 'ContentController@massDestroy')->name('contents.massDestroy');
    Route::post('contents/media', 'ContentController@storeMedia')->name('contents.storeMedia');
    Route::post('contents/ckmedia', 'ContentController@storeCKEditorImages')->name('contents.storeCKEditorImages');
    Route::resource('contents', 'ContentController');

    // Content Categories
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');

});
