<?php

use App\Http\Controllers\LogoutController;
use App\Livewire\Dashboard\Absensi;
use App\Livewire\Dashboard\Blog;
use App\Livewire\Dashboard\Blog\BlogForm;
use App\Livewire\Dashboard\Dashboard;
use App\Livewire\Dashboard\Faq;
use App\Livewire\Dashboard\Faq\FaqForm;
use App\Livewire\Dashboard\MappingSiswa;
use App\Livewire\Dashboard\MataPelajaran as DashboardMataPelajaran;
use App\Livewire\Dashboard\Pendapatan;
use App\Livewire\Dashboard\RekapAbsensi;
use App\Livewire\Dashboard\Tes;
use App\Livewire\Dashboard\Users;
use App\Livewire\Dashboard\Users\Profile;
use App\Livewire\Front\About;
use App\Livewire\Front\Affiliate;
use App\Livewire\Front\AffiliateRegister;
use App\Livewire\Front\Home;
use App\Livewire\Front\PostDetail;
use App\Livewire\Front\TeacherJoin;
use App\Livewire\Front\TeacherPageRegister;
use App\Livewire\Front\Login;
use App\Livewire\Front\Page\RegistrasiTeacher;
use App\Livewire\Front\Post;
use App\Livewire\Front\Sop;
use App\Livewire\Front\StudentPageRegister;
use App\Models\MataPelajaran;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;

Route::get('/generate-sitemap', function () {
    SitemapGenerator::create(config('app.url'))
        ->writeToFile(public_path('sitemap.xml'));
    return "Sitemap generated successfully!";
});


Route::get('/',Home::class)->name('home');
Route::get('/login',Login::class)->name('login')->middleware('guest');
// Route::get('/daftar/siswa',StudentPageRegister::class)->name('register.siswa')->middleware('guest');
Route::get('/daftar/siswa/{token?}',StudentPageRegister::class)->name('register')->middleware('guest');
Route::get('/blog', Post::class)->name('post.index');
Route::get('/affiliate/program', Affiliate::class)->name('affiliate');
Route::get('/affiliate/program/registrasi', AffiliateRegister::class)->name('affiliate.registrasi');
Route::get('/sop/tutor-rifaya-education', Sop::class)->name('sop.index');
Route::get('/tentang', About::class)->name('about');
Route::get('/page/pengajar', TeacherJoin::class)->name('teacher.join');
Route::get('/page/pengajar/daftar', TeacherPageRegister::class)->name('teacher.register');
Route::get('/blog/artikel/detail/{slug?}', PostDetail::class)->name('post.detail');
Route::get('/blog/bank-soal/detail/{slug?}', PostDetail::class)->name('post.banksoal.detail');
Route::get('/logout', LogoutController::class)->name('logout');
Route::prefix('success')->group(function(){
    Route::get('register/teacher', RegistrasiTeacher::class)->name('success.register.teacher');
});
Route::middleware('auth')->group(function () {
    Route::prefix('account')->group(function () {
        Route::get('dashboard', Dashboard::class)->name('account.dashboard');
        Route::get('tes', Tes::class)->name('account.tes');
        Route::get('dashboard/login', [Tes::class, 'loginView'])->name('account.dashboard.login');
        // access only admin & contributor
        Route::middleware(['roles:1'])->group(function(){
            Route::get('blog', Blog::class)->name('account.blog');
            Route::get('/blog/{action?}/{slug?}', BlogForm::class)->name('account.blog.action');
            Route::get('users/{type?}', Users::class)->name('account.users');
            Route::get('mapping/users', MappingSiswa::class)->name('account.mapping.users');
        });
        Route::middleware(['roles:1,2,5'])->group(function(){
            Route::get('salary/{type?}', Pendapatan::class)->name('account.salary');
        });
        Route::get('/users/profile/{username?}', Profile::class)->name('account.users.profile');
        Route::prefix('absensi')->group(function(){
            Route::get('/harian', Absensi::class)->name('account.absensi.harian');
            Route::get('/rekap', RekapAbsensi::class)->name('account.absensi.rekap');
        });
        Route::middleware(['roles:1'])->group(function(){
            Route::prefix('master')->group(function () {
                Route::get('matapelajaran', DashboardMataPelajaran::class)->name('account.master.matapelajaran');
                Route::get('qa', Faq::class)->name('account.master.qa');
                Route::get('/qa/{action?}/{id?}', FaqForm::class)->name('account.master.qa.action');
            });
        });
    });
});

Route::get('/tes',function(){
    // dd(auth()->user());
    return view('welcome');
})->name('tes');


Route::get('/clear-cache', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return 'Cache cleared successfully!';
});
