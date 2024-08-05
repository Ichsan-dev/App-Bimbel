<?php

use App\Http\Controllers\AbsensiGuruController;
use App\Http\Controllers\AbsensiKaryawanController;
use App\Http\Controllers\AbsensiSiswaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CekGajiController;
use App\Http\Controllers\CekJadwalController;
use App\Http\Controllers\FormulirPendaftaran;
use App\Http\Controllers\GajiKaryawanController;
use App\Http\Controllers\HomeControler;
use App\Http\Controllers\InstrukturController;
use App\Http\Controllers\JadwalSiswaController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JumbotronController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KelolaAkunController;
use App\Http\Controllers\KelolaKuisController;
use App\Http\Controllers\KemajuanSiswaController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\orangtuaController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PembayaranSppController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaKursusController;
use App\Http\Middleware\UserAccess;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'LandingPage/index');
Route::get('/dashboard', [HomeControler::class, 'index'])->name('dashboard');

Route::middleware(['guest'])->group(function(){
        Route::get('/login', [LoginController::class, 'login'])->name('login');
        Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
        Route::get('/register', [LoginController::class, 'register'])->name('register');
        Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');
        Route::get('Formulir/Pendaftaran', [FormulirPendaftaran::class, 'formulir'])->name('formulirpendaftaran');
        Route::get('pendaftaran/next-id', [FormulirPendaftaran::class, 'getNextId']);
        Route::post('Formulir/Store', [FormulirPendaftaran::class, 'store'])->name('formulirstore');
});
Route::middleware(['auth'])->group(function(){
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/admin', [AuthController::class, 'admin'])->name('admin')->middleware('userAccess:admin');
        Route::get('/operator', [AuthController::class, 'operator'])->name('operator')->middleware('userAccess:operator');
        Route::get('/calonsiswa', [AuthController::class, 'calonsiswa'])->name('calonsiswa')->middleware('userAccess:calonsiswa');
        Route::get('/guru', [AuthController::class, 'guru'])->name('guru')->middleware('userAccess:guru');
        Route::get('/orangtua', [AuthController::class, 'orangtua'])->name('orangtua')->middleware('userAccess:orantua');
        Route::get('/owner', [AuthController::class, 'owner'])->name('dashboardowner')->middleware('userAccess:owner');

        Route::get('/kuis/sederhana', [KuisController::class, 'kuis'])->name('Quiz')->middleware('userAccess:siswa');
        Route::get('/siswa', [AuthController::class, 'siswa'])->name('siswa')->middleware('userAccess:siswa');
        Route::get('/siswa/kuis', [KuisController::class, 'index'])->name('kuis')->middleware('userAccess:siswa');
        Route::get('siswa/jadwal', [CekJadwalController::class, 'index'])->name('cekjadwal')->middleware('userAccess:siswa');
        Route::get('siswa/absen', [CekJadwalController::class, 'absen'])->name('cekabsen')->middleware('userAccess:siswa');
        Route::get('siswa/reset/password', [CekJadwalController::class, 'resetpass'])->name('resetpassword')->middleware('userAccess:siswa');
        Route::post('siswa/password/update', [CekJadwalController::class, 'updatepass'])->name('updatepassword')->middleware('userAccess:siswa');

        Route::get('/admin/kuis', [KelolaKuisController::class, 'index'])->name('KelolaKuis')->middleware('userAccess:admin');
        Route::post('/questions', [KelolaKuisController::class, 'store'])->name('questions.store')->middleware('userAccess:admin');
        Route::put('/questions/{question}', [KelolaKuisController::class, 'update'])->name('questions.update')->middleware('userAccess:admin');
        Route::delete('/questions/{id}', [KelolaKuisController::class, 'destroy'])->name('questions.destroy')->middleware('userAccess:admin');

        Route::get('/admin/akun', [KelolaAkunController::class, 'index'])->name('KelolaAkun')->middleware('userAccess:admin');
        Route::get('/user/create', [KelolaAkunController::class, 'create'])->name('UserCreate')->middleware('userAccess:admin');
        Route::post('/user/store', [KelolaAkunController::class, 'store'])->name('UserStore')->middleware('userAccess:admin');
        Route::delete('/userdelete/{id}', [KelolaAkunController::class, 'destroy'])->name('UserDelete')->middleware('userAccess:admin');
        Route::get('/user/edit/{id}', [KelolaAkunController::class, 'edit'])->name('useredit')->middleware('userAccess:admin');
        Route::put('/user/update/{id}', [KelolaAkunController::class, 'update'])->name('userupdate')->middleware('userAccess:admin');

        Route::get('/admin/jumbotron', [JumbotronController::class, 'index'])->name('JumbotronWebsite')->middleware('userAccess:admin');
        Route::put('/jumbotron/update/{id}', [JumbotronController::class, 'update'])->name('JumbotronUpdate')->middleware('userAccess:admin');

        Route::get('/admin/review', [ReviewController::class, 'index'])->name('ReviewWebsite')->middleware('userAccess:admin');
        Route::post('/review/store', [ReviewController::class, 'store'])->name('ReviewStore')->middleware('userAccess:admin');
        Route::delete('/review/delete/{id}', [ReviewController::class, 'destroy'])->name('ReviewDelete')->middleware('userAccess:admin');
        Route::put('/review/update/{id}', [ReviewController::class, 'update'])->name('ReviewUpdate')->middleware('userAccess:admin');

        Route::get('/admin/section', [SectionController::class, 'index'])->name('SectionWebsite')->middleware('userAccess:admin');
        Route::get('/create/section', [SectionController::class, 'create'])->name('SectionCreate')->middleware('userAccess:admin');
        Route::post('/store/section', [SectionController::class, 'store'])->name('SectionStore')->middleware('userAccess:admin');
        Route::delete('/delete/{id}', [SectionController::class, 'destroy'])->name('SectionDelete')->middleware('userAccess:admin');
        Route::get('section/edit/{id}', [SectionController::class, 'edit'])->name('SectionEdit')->middleware('userAccess:admin');
        Route::put('section/update/{id}', [SectionController::class, 'update'])->name('SectionUpdate')->middleware('userAccess:admin');

        Route::get('/admin/setting', [SettingController::class, 'index'])->name('SettingWebsite')->middleware('userAccess:admin');
        Route::put('/setting/update/{id}', [SettingController::class, 'update'])->name('SettingUpdate')->middleware('userAccess:admin');

        Route::get('admin/pendaftaran', [FormulirPendaftaran::class, 'index'])->name('KelolaPendaftaran')->middleware('userAccess:admin');
        Route::get('admin/pendaftaran/edit/{id}', [FormulirPendaftaran::class, 'edit'])->name('EditPendaftaran')->middleware('userAccess:admin');
        Route::put('admin/pendaftaran/update/{id}', [FormulirPendaftaran::class, 'update'])->name('FormulirUpdate')->middleware('userAccess:admin');
        Route::post('admin/post/{id}', [FormulirPendaftaran::class, 'upload'])->name('PendaftaranUpload')->middleware('userAccess:admin');
        Route::delete('delete/{id}', [FormulirPendaftaran::class, 'destroy'])->name('DeletePendaftaran')->middleware('userAccess:admin');

        Route::get('/operator/jabatan', [JabatanController::class, 'index'])->name('KelolaJabatan')->middleware('userAccess:operator');
        Route::delete('jabatan/delete/{id}', [JabatanController::class, 'destroy'])->name('JabatanDelete')->middleware('userAccess:operator');
        Route::post('/jabatan/store', [JabatanController::class, 'store'])->name('JabatanStore')->middleware('userAccess:operator');
        Route::get('/jabatan/edit/{id}', [JabatanController::class, 'edit'])->name('JabatanEdit')->middleware('userAccess:operator');
        Route::put('/jabatan/update/{id}', [JabatanController::class, 'update'])->name('JabatanUpdate')->middleware('userAccess:operator');

        Route::get('/operator/karyawan', [KaryawanController::class, 'index'])->name('KelolaKaryawan')->middleware('userAccess:operator');
        Route::delete('karyawan/delete/{id}', [KaryawanController::class, 'destroy'])->name('KaryawanDelete')->middleware('userAccess:operator');
        Route::get('/Karyawan/create', [KaryawanController::class, 'create'])->name('KaryawanCreate')->middleware('userAccess:operator');
        Route::post('/Karyawan/store', [KaryawanController::class, 'store'])->name('KaryawanStore')->middleware('userAccess:operator');
        Route::get('/Karyawan/edit/{id}', [KaryawanController::class, 'edit'])->name('KaryawanEdit')->middleware('userAccess:operator');
        Route::put('/Karyawan/update/{id}', [KaryawanController::class, 'update'])->name('KaryawanUpdate')->middleware('userAccess:operator');

        Route::get('/operator/kursus', [KursusController::class, 'index'])->name('KelolaKursus')->middleware('userAccess:operator');
        Route::post('/kursus/store', [KursusController::class, 'store'])->name('KursusStore')->middleware('userAccess:operator');
        Route::put('/kursus/update/{id}', [KursusController::class, 'update'])->name('UpdateKursus')->middleware('userAccess:operator');
        Route::delete('/kursus/delete/{id}', [KursusController::class, 'destroy'])->name('KursusDelete')->middleware('userAccess:operator');


        Route::get('/operator/instruktur', [InstrukturController::class, 'index'])->name('KelolaInstruktur')->middleware('userAccess:operator');
        Route::post('/instruktur/store', [InstrukturController::class, 'store'])->name('InstrukturStore')->middleware('userAccess:operator');
        Route::put('/instruktur/update/{id}', [InstrukturController::class, 'update'])->name('InstrukturUpdate')->middleware('userAccess:operator');
        Route::delete('/instruktur/{id}', [InstrukturController::class, 'destroy'])->name('InstrukturDelete')->middleware('userAccess:operator');
        Route::get('/search/instruktur', [InstrukturController::class, 'search'])->name('SearchInstruktur');

        Route::get('/operator/siswa', [SiswaController::class, 'index'])->name('KelolaSiswa')->middleware('userAccess:operator');
        Route::get('/siswa/create', [SiswaController::class, 'create'])->name('SiswaCreate')->middleware('userAccess:operator');
        Route::post('/siswa/store', [SiswaController::class, 'store'])->name('SiswaStore')->middleware('userAccess:operator');
        Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('SiswaEdit')->middleware('userAccess:operator');
        Route::put('/siswa/update/{id}', [SiswaController::class, 'update'])->name('SiswaUpdate')->middleware('userAccess:operator');
        Route::delete('/siswa/delete/{id}', [SiswaController::class, 'destroy'])->name('SiswaDelete')->middleware('userAccess:operator');

        Route::get('/operator/siswakursus', [SiswaKursusController::class, 'index'])->name('KelolaSiswaKursus')->middleware('userAccess:operator');
        Route::post('/siswakursus/store', [SiswaKursusController::class, 'store'])->name('SiswaKursusStore')->middleware('userAccess:operator');
        Route::put('/siswakursus/update/{id}', [SiswaKursusController::class, 'update'])->name('SiswaKursusUpdate')->middleware('userAccess:operator');
        Route::delete('/siswakursus/delete/{id}', [SiswaKursusController::class, 'destroy'])->name('SiswaKursusDelete')->middleware('userAccess:operator');

        Route::get('/operator/siswajadwal', [JadwalSiswaController::class, 'index'])->name('KelolaJadwal')->middleware('userAccess:operator');
        Route::post('/operator/siswajadwal/store', [JadwalSiswaController::class, 'store'])->name('KelolaJadwalStore')->middleware('userAccess:operator');
        Route::put('/operator/siswajadwal/update/{id}', [JadwalSiswaController::class, 'update'])->name('KelolaJadwalUpdate')->middleware('userAccess:operator');
        Route::delete('/operator/siswajadwal/delete/{id}', [JadwalSiswaController::class, 'destroy'])->name('KelolaJadwalDestroy')->middleware('userAccess:operator');

        Route::get('/operator/absensisiswa', [AbsensiSiswaController::class, 'index'])->name('KelolaAbsensi')->middleware('userAccess:operator');
        Route::post('/operator/absensisiswa/store', [AbsensiSiswaController::class, 'store'])->name('AbsensiStore')->middleware('userAccess:operator');
        Route::put('/operator/absensisiswa/update/{id}', [AbsensiSiswaController::class, 'update'])->name('AbsensiUpdate')->middleware('userAccess:operator');
        Route::delete('/operator/absensisiswa/delete/{id}', [AbsensiSiswaController::class, 'destroy'])->name('AbsensiDelete')->middleware('userAccess:operator');

        Route::get('/operator/pembayaranspp', [PembayaranSppController::class, 'index'])->name('KelolaSPP');
        Route::post('/operator/sppsiswa/store', [PembayaranSppController::class, 'store'])->name('SppStore')->middleware('userAccess:operator');
        Route::put('/operator/sppsiswa/update/{id}', [PembayaranSppController::class, 'update'])->name('SppUpdate')->middleware('userAccess:operator');
        Route::delete('/operator/sppsiswa/delete/{id}', [PembayaranSppController::class, 'destroy'])->name('SppDelete')->middleware('userAccess:operator');

        Route::get('/operator/absensikaryawan', [AbsensiKaryawanController::class, 'index'])->name('AbsensiKaryawan')->middleware('userAccess:operator');
        Route::post('/operator/absensikaryawan/store', [AbsensiKaryawanController::class, 'store'])->name('AbsensiKaryawanStore')->middleware('userAccess:operator');
        Route::put('/operator/absensikaryawan/update/{id}', [AbsensiKaryawanController::class, 'update'])->name('AbsensiKaryawanUpdate')->middleware('userAccess:operator');
        Route::delete('/operator/absensikaryawan/delete/{id}', [AbsensiKaryawanController::class, 'destroy'])->name('AbsensiKaryawanDelete')->middleware('userAccess:operator');

        Route::get('/operator/gajikaryawan', [GajiKaryawanController::class, 'index'])->name('KelolaGaji')->middleware('userAccess:operator');
        Route::post('/operator/gajikaryawan/store', [GajiKaryawanController::class, 'store'])->name('KelolaGajiStore')->middleware('userAccess:operator');
        Route::delete('/operator/gajikaryawan/delete/{id}', [GajiKaryawanController::class, 'delete'])->name('KelolaGajiDelete')->middleware('userAccess:operator');

        Route::get('/guru/absensi', [AbsensiGuruController::class, 'index'])->name('CekAbsen')->middleware('userAccess:guru');
        Route::get('/guru/gaji', [CekGajiController::class, 'index'])->name('CekGaji')->middleware('userAccess:guru');
        Route::get('/guru/kemajuansiswa', [KemajuanSiswaController::class, 'index'])->name('KelolaKemajuanSiswa')->middleware('userAccess:guru');
        Route::post('/guru/kemajuansiswa/store', [KemajuanSiswaController::class, 'store'])->name('KemajuanSiswaStore')->middleware('userAccess:guru');
        Route::delete('/guru/kemajuansiswa/delete/{id}', [KemajuanSiswaController::class, 'delete'])->name('KemajuanSiswaDelete')->middleware('userAccess:guru');
        Route::put('/guru/kemajuansiswa/update/{id}', [KemajuanSiswaController::class, 'update'])->name('KemajuanSiswaUpdate')->middleware('userAccess:guru');
        Route::get('/guru/cetak/gaji/{id}', [CekGajiController::class, 'cetak'])->name('CetakGaji')->middleware('userAccess:guru');

        Route::get('/orangtua/Spp', [orangtuaController::class, 'spp'])->name('CekSpp')->middleware('userAccess:orantua');
        Route::get('/orangtua/KemajuanSiswa', [orangtuaController::class, 'KemajuanSiswa'])->name('CekKemajuanSiswa')->middleware('userAccess:orantua');
        Route::get('/orangtua/resetpassword', [orangtuaController::class, 'ResetPassword'])->name('ResetPassword')->middleware('userAccess:orantua');
        Route::post('/orangtua/updatepassword', [orangtuaController::class, 'UpdatePassword'])->name('UpdatePassword')->middleware('userAccess:orantua');

        Route::get('/owner/siswa', [OwnerController::class, 'siswa'])->name('laporansiswa')->middleware('userAccess:owner');
        Route::get('/owner/karyawan', [OwnerController::class, 'karyawan'])->name('laporankaryawan')->middleware('userAccess:owner');
        Route::get('/owner/spp', [OwnerController::class, 'spp'])->name('laporanspp')->middleware('userAccess:owner');
        Route::get('/owner/gaji', [OwnerController::class, 'gaji'])->name('laporangaji')->middleware('userAccess:owner');
        Route::get('/owner', [OwnerController::class, 'index'])->name('dashboardowner')->middleware('userAccess:owner');
        Route::get('/owner/siswa/aktif', [OwnerController::class, 'siswaAktif'])->name('siswaAktif')->middleware('userAccess:owner');
        Route::get('/owner/siswa/nonaktif', [OwnerController::class, 'siswaNonAktif'])->name('siswaNonAktif')->middleware('userAccess:owner');
});

Route::get('/home', function() {
    return redirect('/');
});








