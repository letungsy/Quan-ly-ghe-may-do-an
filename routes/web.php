<?php
use App\HelpersClass\Date;
use App\Http\Middleware\chech;
use App\Http\Controllers\SanphamController;
use App\Http\Controllers\GhemayController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\GalerryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\checkmanh;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

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
Route::get('/admin', function () {
    return view('welcome');
})->name('welcome');
// //san pham
//     Route::get('/hang', [SanphamController::class, 'index'])->name('hang');
//     Route::get('/hang/create', [SanphamController::class, 'create']);
//     Route::get('/hang/edit/{id}', [SanphamController::class, 'edit']);
//     Route::get('/hang/show', [SanphamController::class, 'show'])->name('show');
//     Route::post('/hang/store', [SanphamController::class, 'store']);
//     Route::post('/hang/update/{id}', [SanphamController::class, 'update']);
//     Route::get('/hang/destroy/{id}', [SanphamController::class, 'destroy']);
//     Route::get('/thaydoigia', [SanphamController::class, 'thaydoigia'])->name('thaydoigia');
//     Route::get('/timkiem', [SanphamController::class, 'timkiem'])->name('timkiem');
//     Route::get('/timkiemshow', [SanphamController::class, 'timkiemshow'])->name('timkiemshow');
// //baiviet
// Route::get('/baiviet/create',[ArticleController::class, 'create'])->name('create');
// Route::get('/baiviet',[ArticleController::class, 'index'])->name('baiviet');
// Route::post('/baiviet/store', [ArticleController::class, 'store'])->name('articlestore');
// Route::get('/baiviet/edit/{id}', [ArticleController::class, 'edit'])->name('edit');
// Route::get('baiviet/destroy/{id}', [ArticleController::class, 'destroy'])->name('destroy');
// Route::post('baiviet/update/{id}', [ArticleController::class, 'update'])->name('update');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
// 'permission:'.implode("|",$per1)
Route::group(['middleware'=>['auth']],function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/xoamenu/{id}', [HomeController::class, 'xoamenu'])->name('xoamenu')->middleware('can:xoamenu');
    Route::get('/xemmenu', [HomeController::class, 'xemmenu'])->name('xemmenu')->middleware('can:xemmenu');
  //baiviet
Route::get('/themtintuc',[ArticleController::class, 'create'])->name('create')->middleware('can:themtintuc');
Route::get('/lietketintuc',[ArticleController::class, 'index'])->name('baiviet')->middleware('can:lietketintuc');
Route::post('/baiviet/store', [ArticleController::class, 'store'])->name('articlestore')->middleware('can:lietkesanpham');
Route::get('/baiviet/edit/{id}', [ArticleController::class, 'edittintuc'])->name('edittintuc')->middleware('can:suatintuc');
Route::get('baiviet/destroy/{id}', [ArticleController::class, 'destroy'])->name('destroy')->middleware('can:xoatintuc');
Route::post('baiviet/update/{id}', [ArticleController::class, 'update'])->name('update');
    //san pham
   Route::get('/lietkesanpham', [SanphamController::class, 'index'])->name('hang')->middleware('can:lietkesanpham');
   Route::get('/themsanpham', [SanphamController::class, 'create'])->middleware('can:themsanpham');
   Route::get('/hang/edit/{id}', [SanphamController::class, 'edit'])->middleware('can:suasanpham');
   Route::get('/hang/show', [SanphamController::class, 'show'])->name('show')->middleware('can:showsanpham');
   Route::post('/hang/store', [SanphamController::class, 'store']);
   Route::post('/hang/update/{id}', [SanphamController::class, 'update']);
   Route::get('/hang/destroy/{id}', [SanphamController::class, 'destroy'])->middleware('can:xoasanpham');
   Route::get('/xemthaydoigia', [SanphamController::class, 'thaydoigia'])->name('thaydoigia')->middleware('can:xemthaydoigia');
   Route::get('/timkiemsanpham',[SanphamController::class, 'timkiemsanpham'])->name('timkiemsanpham');
   Route::get('/timkiemshow', [SanphamController::class, 'timkiemshow'])->name('timkiemshow');
  //don hang
Route::get('/xemdonhang',[DonHangController::class, 'index'])->name('donhang')->middleware('can:xemdonhang');
Route::get('/donhang/destroy/{id}', [DonHangController::class, 'destroy'])->name('destroy');
Route::post('/donhang/update/{id}', [DonHangController::class, 'updatedonhang'])->name('updatedonhang');
Route::get('/donhang/sua', [DonHangController::class, 'sua'])->name('sua');
Route::get('/donhang/xemchitiet', [DonHangController::class, 'xemchitiet'])->name('xemchitiet');
//user
Route::get('/lietkeuser',[UserController::class, 'index'])->name('user')->middleware('can:lietkeuser');
Route::get('/themuser', [UserController::class, 'themthanhvien'])->name('themthanhvien')->middleware('can:themuser');
Route::post('/user/store', [UserController::class, 'store'])->name('store');
Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('delete');
Route::get('/user/chuyenquyen/{id}', [UserController::class, 'chuyenquyen'])->name('chuyenquyen');
Route::get('/user/xoachuyenquyen', [UserController::class, 'xoachuyenquyen'])->name('xoachuyenquyen');
Route::get('/user/timkiem', [UserController::class, 'timuser'])->name('timuser');
Route::get('/xoauser', [UserController::class, 'xoauser'])->name('xoauser')->middleware('can:xoauser');
//export thaydoigia
Route::get('/export', [ArticleController::class, 'export'])->name('export');
Route::post('/import', [ArticleController::class, 'import'])->name('import');
Route::get('/exportsanpham', [SanphamController::class, 'export'])->name('exportsanpham');
Route::post('/importsanpham', [SanphamController::class, 'import'])->name('importsanpham');
//Danh muc san pham
Route::get('/lietkedanhmuc',[DanhMucController::class, 'xemdanhmuc'])->name('xemdanhmuc')->middleware('can:lietkedanhmuc');
Route::get('/themdanhmuc',[DanhMucController::class, 'themdanhmuc'])->name('themdanhmuc')->middleware('can:themdanhmuc');
Route::post('/storedanhmuc',[DanhMucController::class, 'storedanhmuc'])->name('storedanhmuc');
Route::get('/xoadanhmuc/{id}',[DanhMucController::class, 'xoadanhmuc'])->name('xoadanhmuc')->middleware('can:xoadanhmuc');
Route::get('/thaydoidanhmuc',[DanhMucController::class, 'thaydoidanhmuc'])->name('thaydoidanhmuc')->middleware('can:suadanhmuc');
Route::post('/nanglen/{danhmuc_id}',[DanhMucController::class, 'nanglen'])->name('nanglen');
Route::get('/timkiemxem',[DanhMucController::class, 'timkiemxem'])->name('timkiemxem');
//role
Route::get('/phanquyen/{id}',[UserController::class, 'phanquyen'])->name('phanquyen');
Route::get('/phanquyennho/{id}',[UserController::class, 'phanquyennho'])->name('phanquyennho');
Route::post('/themrole/{id}',[UserController::class, 'themrole'])->name('themrole');
Route::post('/themrolenho/{id}',[UserController::class, 'themrolenho'])->name('themrolenho');
Route::post('/themquyennua',[UserController::class, 'themquyennua'])->name('themquyennua');
Route::post('/themvaitronua',[UserController::class, 'themvaitronua'])->name('themvaitronua');
Route::get('/xoavaitro',[UserController::class, 'xoavaitro'])->name('xoavaitro')->middleware('can:xoavaitro');
Route::get('/xoathatvaitro/{id}',[UserController::class, 'xoathatvaitro'])->name('xoathatvaitro');
Route::get('/xoaquyen',[UserController::class, 'xoaquyen'])->name('xoaquyen')->middleware('can:xoaquyen');
Route::get('/xoaquyenthat/{id}',[UserController::class, 'xoaquyenthat'])->name('xoaquyenthat');
//thong ke
Route::get('/xemthongke',[HomeController::class, 'xemthongke'])->name('xemthongke')->middleware('can:xemthongke');
});

Route::post('/admin/img_upload', [AdminController::class, 'imgUpload'])->name('image_upload'); 
//ghe may
Route::get('/showdanhmuc/{id}',[DanhMucController::class, 'showdanhmuc'])->name('showdanhmuc');
Route::get('/search', [GhemayController::class, 'search']);
Route::get('/', [GhemayController::class, 'index'])->name('ghemay');
Route::get('/ghemay/detail/{id}', [GhemayController::class, 'detail'])->name('detail');
Route::get('/ghemay/add-to-cart/{id}', [GhemayController::class, 'addToCart'])->name('addToCart');
Route::post('/ghemay/updategia/{id}', [GhemayController::class, 'updategia'])->name('updategia');
Route::get('/ghemay/show-cart/', [GhemayController::class, 'showCart'])->name('showCart');
Route::get('/ghemay/hover', [GhemayController::class, 'hover'])->name('hover');
Route::get('/ghemay/update-cart/', [GhemayController::class, 'updateCart'])->name('updateCart');
Route::get('/ghemay/delete-cart/', [GhemayController::class, 'deleteCart'])->name('deleteCart');
Route::group(['prefix'=>'showCart'],function(){
Route::get('/ghemay/thanh-toan/', [GhemayController::class, 'thanhtoan'])->name('thanhtoan');
Route::post('/ghemay/saveCart/', [GhemayController::class, 'saveCart'])->name('saveCart');
});

//dang ky dang nhap
    // Route::get('dang-ky',[LoginController::class, 'getRegister'])->name('getRegister');
    // Route::post('dang-ky/store',[LoginController::class, 'postRegister'])->name('store');
    // Route::get('dang-nhap',[LoginController::class, 'getLogin'])->name('getLogin');
    // Route::post('dang-nhap',[LoginController::class,'postLogin'])->name('postLogin');
    // Route::get('dang-xuat',[LoginController::class, 'Logout'])->name('getLogout');
// //user
// Route::get('/user',[UserController::class, 'index'])->name('user');
// Route::get('/user/themthanhvien', [UserController::class, 'themthanhvien'])->name('themthanhvien');
// Route::post('/user/store', [UserController::class, 'store'])->name('store');
// Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('delete');
// Route::get('/user/chuyenquyen/{id}', [UserController::class, 'chuyenquyen'])->name('chuyenquyen');
// Route::get('/user/xoachuyenquyen', [UserController::class, 'xoachuyenquyen'])->name('xoachuyenquyen');
// Route::get('/user/timkiem', [UserController::class, 'timuser'])->name('timuser');
// Route::get('/xoauser', [UserController::class, 'xoauser'])->name('xoauser');
// //export thaydoigia
// Route::get('/export', [ArticleController::class, 'export'])->name('export');
// Route::post('/import', [ArticleController::class, 'import'])->name('import');
// Route::get('/exportsanpham', [SanphamController::class, 'export'])->name('exportsanpham');
// Route::post('/importsanpham', [SanphamController::class, 'import'])->name('importsanpham');
// tin tuc
Route::get('/tintuc',[ArticleController::class,'tintuc'])->name('tintuc');
Route::get('/gioithieu',[ArticleController::class,'gioithieu'])->name('gioithieu');
Route::get('/show-tintuc/{id}',[ArticleController::class, 'showtintuc'])->name('showtintuc');



Route::get('/login/facebook','Auth\LoginController@redirectToProvider')->name('redirectToProvider');
Route::get('/login/facebook/callback','Auth\LoginController@handleProviderCallback')->name('handleProviderCallback');
//Galerry
Route::get('/add-galerry/{id}',[GalerryController::class, 'addgalerry'])->name('addgalerry');
Route::get('/themthuvien',[GalerryController::class, 'themthuvien'])->name('themthuvien');
Route::post('/store',[GalerryController::class, 'storega'])->name('storega');
Route::get('/xoaanh/{id}',[GalerryController::class, 'xoaanh'])->name('xoaanh');
// //Danh muc san pham
// Route::get('/xemdanhmuc',[DanhMucController::class, 'xemdanhmuc'])->name('xemdanhmuc');
// Route::get('/themdanhmuc',[DanhMucController::class, 'themdanhmuc'])->name('themdanhmuc');
// Route::post('/storedanhmuc',[DanhMucController::class, 'storedanhmuc'])->name('storedanhmuc');
// Route::get('/xoadanhmuc/{id}',[DanhMucController::class, 'xoadanhmuc'])->name('xoadanhmuc');
// Route::get('/thaydoidanhmuc/{id}',[DanhMucController::class, 'thaydoidanhmuc'])->name('thaydoidanhmuc');
// Route::post('/nanglen/{id}',[DanhMucController::class, 'nanglen'])->name('nanglen');
// Route::get('/timkiem',[DanhMucController::class, 'timkiem'])->name('timkiem');

Route::post('/thaydanhmuc',[HomeController::class, 'banh'])->name('banh');

Route::get('/thanhcong',[DonHangController::class, 'thanhcong'])->name('thanhcong');
//messeger
Route::get('/facebook_messenger_api',[FacebookController::class, 'index'])->name('index');
Route::post('/facebook_messenger_api',[FacebookController::class, 'index'])->name('index');