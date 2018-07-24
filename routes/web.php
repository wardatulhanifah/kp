<?php
 
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('blank');
    });

    Route::get('profile', 'ProfileController@show')->name('profile.show');
    Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
    Route::patch('profile', 'ProfileController@update')->name('profile.update');
    Route::get('password', 'ProfileController@editpassword')->name('password.show');
    Route::patch('password', 'ProfileController@storepassword')->name('password.store');
    Route::patch('profile/picture', 'ProfileController@profilePicture')->name('profile.picture');

    Route::post('users/deactivate/{id}', 'UserController@deactivate')->name('users.deactivate');
    Route::post('users/activate/{id}', 'UserController@activate')->name('users.activate');
    Route::resource('users', 'UserController');

    // Tugas Pengelolaan Mahasiswa starts here
    Route::resource('mahasiswa', 'MahasiswaController');

    Route::resource('instansi', 'InstansiController');
    Route::resource('dosen','DosenController');
    Route::resource('proposal','ProposalController');
    Route::get('tambah_anggota/{id}','ProposalController@tambah_anggota')->name('tambah_anggota.add');
    Route::get('selesai','ProposalController@selesai_kp')->name('selesai.add');
    Route::post('tambah_anggota','ProposalController@storedata')->name('tambah_anggota.storedata');
    Route::delete('hapus_anggota/{id}','ProposalController@hapus_anggota')->name('tambah_anggota.hapus_anggota');
    Route::resource('selesai','MahasiswaKPController');
    Route::get('selesai/mahasiswakp/{id}','MahasiswaKPController@selesai')->name('selesai.mhs');
    Route::post('selesai/mahasiswakp/{id}','MahasiswaKPController@selesaiSave')->name('selesai.kp');
    // Route::get('registrasi','ProposalController@isidata')->name('registrasi.create');
    // Route::post('registrasi','ProposalController@storedata')->name('registrasi.storedata');
    Route::resource('harian','KegiatanHarianController');
    
    // Route::get('kegiatan_harian','KegiatanHarianController@create')->name('kegiatan_harian.create');
});

Route::get('image/{type}/{id}', 'FileController@image')->name('get.image');
