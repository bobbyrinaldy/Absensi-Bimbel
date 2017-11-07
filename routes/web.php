<?php
Auth::routes();


Route::group(['middleware' => 'auth'], function () {
  Route::get('/', 'HomeController@index');
  Route::get('/check', 'GroupController@search');
  Route::put('/bayar', 'AdministrationController@bayar');

    Route::group(['prefix' => 'pendaftaran'], function () {
      Route::get('/', 'RegistrationController@index');
      Route::post('/save', 'RegistrationController@save');
    });

    Route::group(['prefix' => 'administrasi'], function () {
      Route::get('/', 'AdministrationController@index');
    });

    Route::group(['prefix' => 'kelompok'], function () {
      Route::get('/', 'GroupController@index');
      Route::get('/create', 'GroupController@create');
      Route::post('/save', 'GroupController@save');
      Route::get('/edit/{id}', 'GroupController@edit');
      Route::put('/update/{id}', 'GroupController@update');
      Route::get('/hapus/{id}', 'GroupController@delete');

    });

    Route::group(['prefix' => 'pengajar'], function () {
      Route::get('/', 'TeacherController@index');
      Route::get('/create', 'TeacherController@create');
      Route::post('/save', 'TeacherController@save');
      Route::get('/edit/{id}', 'TeacherController@edit');
      Route::put('/update/{id}', 'TeacherController@update');
      Route::get('/hapus/{id}', 'TeacherController@delete');

    });

    Route::group(['prefix' => 'siswa'], function () {
      Route::get('/', 'StudentController@index');
      Route::get('/edit/{id}', 'StudentController@edit');
      Route::put('/update/{id}', 'StudentController@update');
      Route::get('/hapus/{id}', 'StudentController@delete');

    });

    Route::group(['prefix' => 'absen_kelas'], function () {
      Route::get('/search', 'AbsenceController@search');
      Route::get('/', 'AbsenceController@index');
      Route::get('/create', 'AbsenceController@create');
      Route::post('/save', 'AbsenceController@save');
      Route::get('/edit/{id}', 'AbsenceController@edit');
      Route::put('/update/{id}', 'AbsenceController@update');
      Route::get('/hapus/{id}', 'AbsenceController@delete');

    });

    Route::group(['prefix' => 'absen_konsultasi'], function () {
      Route::get('/search', 'ConsultationController@search');
      Route::get('/', 'ConsultationController@index');
      Route::get('/create', 'ConsultationController@create');
      Route::post('/save', 'ConsultationController@save');
      Route::get('/edit/{id}', 'ConsultationController@edit');
      Route::put('/update/{id}', 'ConsultationController@update');
      Route::get('/hapus/{id}', 'ConsultationController@delete');

    });


});
