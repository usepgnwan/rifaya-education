<?php

use App\Http\Controllers\LogoutController;
use App\Livewire\Dashboard\Blog;
use App\Livewire\Dashboard\Blog\BlogForm;
use App\Livewire\Dashboard\Dashboard;
use App\Livewire\Dashboard\Tes;
use App\Livewire\Dashboard\Users;
use App\Livewire\Front\About;
use App\Livewire\Front\Home;
use App\Livewire\Front\PostDetail;
use App\Livewire\Front\TeacherJoin;
use App\Livewire\Front\TeacherPageRegister;
use App\Livewire\Front\Login;
use App\Livewire\Front\Page\RegistrasiTeacher;
use App\Livewire\Front\Post;
use App\Livewire\Front\StudentPageRegister;
use Illuminate\Support\Facades\Route;

Route::get('/',Home::class)->name('home');
Route::get('/login',Login::class)->name('login')->middleware('guest');
Route::get('/registrasi',StudentPageRegister::class)->name('register')->middleware('guest');
Route::get('/blog', Post::class)->name('post.index');
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
        Route::get('blog', Blog::class)->name('account.blog');
        Route::get('/blog/{action?}/{slug?}', BlogForm::class)->name('account.blog.action');
        Route::get('users', Users::class)->name('account.users');

    });
});

Route::get('/tes',function(){
    // dd(auth()->user());
    return view('welcome');
})->name('tes');

