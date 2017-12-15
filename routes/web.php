<?php
Auth::routes();
 Route::get('/', 'HomeController@index');
 Route::group(['prefix' => 'absen_kelas'], function () {
      Route::get('/search', 'AbsenceController@search');
      Route::get('/selesai/{id}', 'AbsenceController@selesai');
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

Route::group(['middleware' => 'admin'], function () {
  Route::get('/laporan/statistik_matkul', 'LaporanController@statistik_matkul');
  Route::get('/laporan/total_mengajar', 'LaporanController@total_mengajar');
  Route::get('/laporan/total_konsultasi', 'LaporanController@total_konsultasi');
  Route::get('/laporan/siswa_belum_lunas', 'LaporanController@siswa_belum_lunas');
  Route::get('/check', 'GroupController@search');
  Route::get('/change_password', 'HomeController@change');
  Route::put('/change_password/save/{id}', 'HomeController@saveChange');

  Route::get('/admin/user', 'UserController@index');
  Route::get('/admin/user/create', 'UserController@create');
  Route::post('/admin/user/save', 'UserController@save');
  Route::get('/admin/user/{id}/edit', 'UserController@edit');
  Route::put('/admin/user/{id}/update', 'UserController@update');
  Route::get('/admin/user/{id}/hapus', 'UserController@delete');

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

});

   