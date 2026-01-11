<?php

// use App\Models\Post;
// use App\Models\User;

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardOrtuController;
use App\Http\Controllers\DashboardAnakController;
use App\Http\Controllers\DashboardBukuTamuController;
use App\Http\Controllers\DashboardImunisasiController;
use App\Http\Controllers\DashboardJenisImunisasiController;
use App\Http\Controllers\DashboardVitaminAController;
use App\Http\Controllers\InformasiImunisasiController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardAgendaController;
use App\Http\Controllers\DashboardTimbangController;
use App\Http\Controllers\DashboardLaporanController;

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

// Route::get('/', function () {
//     return 'Halaman Home';
// });

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'Blog | About',
        'active' => 'about'
    ]);
});

Route::get('/blog', [PostController::class, 'index']);

//halaman single posts
Route::get('/blog/{post:slug}', [PostController::class, 'show']);
Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
// Route::get('/dashboard', function() {
//     return view('dashboard.index');
// })->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/ortus', DashboardOrtuController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/anaks', DashboardAnakController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/jenis_imunisasis', DashboardJenisImunisasiController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/imunisasis', DashboardImunisasiController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/vitamin_as', DashboardVitaminAController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/buku_tamus', DashboardBukuTamuController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

// Kelola User Routes (Admin only)
Route::resource('/dashboard/users', DashboardUserController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/agendas', DashboardAgendaController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/timbangs', DashboardTimbangController::class)->except('show')->middleware('auth');
Route::get('/dashboard/laporan', [DashboardLaporanController::class, 'index'])->middleware('auth');
Route::get('/dashboard/laporan/preview', [DashboardLaporanController::class, 'preview'])->middleware('auth');

// Informasi Imunisasi Routes (untuk Admin & Bidan)
Route::prefix('/dashboard/informasi-imunisasi')->middleware(['auth', 'bidan'])->group(function () {
    Route::get('/', [InformasiImunisasiController::class, 'index'])->name('informasi-imunisasi.index');
    Route::get('/dapat', [InformasiImunisasiController::class, 'dapatDiimunisasi'])->name('informasi-imunisasi.dapat');
    Route::get('/tidak-dapat', [InformasiImunisasiController::class, 'tidakDapatDiimunisasi'])->name('informasi-imunisasi.tidak-dapat');
    Route::get('/sudah', [InformasiImunisasiController::class, 'sudahDiimunisasi'])->name('informasi-imunisasi.sudah');
    Route::get('/belum', [InformasiImunisasiController::class, 'belumDiimunisasi'])->name('informasi-imunisasi.belum');
});



// Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

//Tidak Terpakai Karena Sudah Ada Di Models

// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'title' => "Post By Category : $category->name",
//         'active' => 'categories',
//         'posts' => $category->posts->load('category', 'author')
//     ]);
// });

// Route::get('/author/{author:username}', function (User $author) {
//     return view('posts', [
//         'title' => 'Post By Author : $author->name',
//         'active' => 'posts',
//         'posts' => $author->posts->load('category', 'author')
//     ]);
// });
