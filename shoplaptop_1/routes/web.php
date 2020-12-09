<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('trang-chu');
});


Route::get('index',[
	'as'=>'trang-chu',
	'uses'=>'pgcontroller@getIndex'
]);

Route::get('loai-san-pham/{typesanpham}',[
	'as'=>'loaisanpham',
	'uses'=>'pgcontroller@getLoaiSP'
]);

Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'pgcontroller@getChitiet'
]);

Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'pgcontroller@getLienHe'
]);
Route::post('lien-he',[
	'as'=>'lienhe',
	'uses'=>'pgcontroller@postLienHe'
]);


Route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'pgcontroller@getGioiThieu'
]);

Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'pgcontroller@getAddToCart'
]);

Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'pgcontroller@getDelCart'
]);


Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'pgcontroller@getDatHang'
]);

Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'pgcontroller@postDatHang'
]);



Route::post('dang-nhap',[
	'as'=>'dangnhap',
	'uses'=>'TaiKhoan_Controller@postDangNhap'
]);

Route::get('dang-ky',[
	'as'=>'dangky',
	'uses'=>'pgcontroller@getDangKy'
]);

Route::post('dang-ky',[
	'as'=>'dangky',
	'uses'=>'pgcontroller@postDangKy'
]);

Route::get('dang-xuat',[
	'as'=>'dangxuat',
	'uses'=>'pgcontroller@postDangXuat'
]);

Route::get('tim-kiem',[
	'as'=>'timkiem',
	'uses'=>'pgcontroller@getTimKiem'
]);

Route::get('gio-hang-chi-tiet',[
	'as'=>'chitietgiohang',
	'uses'=>'pgcontroller@getGioHangChiTiet'
]);

Route::post('userUpdate1',[
	'as'=>'userupdate1',
	'uses'=>'TaiKhoan_Controller@userUpdate1'
]);


/*-----------------------------------------------------Admin-------------------------------------------------------------*/



Route::get('index-admin',[
	'as'=>'trang-chu-admin',
	'uses'=>'admincontroller@getIndexAdmin'
]);

Route::get('dash',[
	'as'=>'dash',
	'uses'=>'admincontroller@getDash'
]);


Route::get('ql-nguoi-dung',[
	'as'=>'quanlynguoidung',
	'uses'=>'admincontroller@getQL_NguoiDung'
]);

Route::get('ql-nsx',[
	'as'=>'quanlynsx',
	'uses'=>'admincontroller@getQL_Nsx'
]);

Route::get('ql-san-pham',[
	'as'=>'quanlysanpham',
	'uses'=>'admincontroller@getQL_Sanpham'
]);

Route::get('ql-slide',[
	'as'=>'quanlyslide',
	'uses'=>'admincontroller@getQL_Slide'
]);

/*-----------------------------------------------------QL-User-----------------------------------------------------------*/


Route::get('user/{id}/delete',[
	'as'=>'delete',
	'uses'=>'admincontroller@DelAdmin'
]);



Route::get('update-user/{id}',[
	'as'=>'update_admin',
	'uses'=>'admincontroller@getUpdateAdmin'
]);
Route::post('update-user/{id}',[
	'as'=>'update_admin',
	'uses'=>'admincontroller@postUpdateAdmin'
]);


Route::post('add-ad',[
	'as'=>'addnew',
	'uses'=>'admincontroller@AddAdmin'
]);



/*--------------------------------------------------------QL-Slide-------------------------------------------------------*/

Route::get('update-slide/{id}',[
	'as'=>'update_slide',
	'uses'=>'admincontroller@getUpdateSlide'
]);
Route::post('update-slide/{id}',[
	'as'=>'update_slide',
	'uses'=>'admincontroller@postUpdateSlide'
]);


Route::post('add-ad-slide',[
	'as'=>'addnewslide',
	'uses'=>'admincontroller@AddAdmin_Slide'
]);

Route::get('slide/{id}/delete',[
	'as'=>'deleteslide',
	'uses'=>'admincontroller@DelAdmin_Slide'
]);

/*--------------------------------------------------------QL-NSX---------------------------------------------------------*/

Route::post('add-ad-nsx',[
	'as'=>'addnewnsx',
	'uses'=>'admincontroller@AddAdmin_NSX'
]);

Route::get('nsx/{id}/delete',[
	'as'=>'deletensx',
	'uses'=>'admincontroller@DelAdmin_NSX'
]);

Route::get('update-nsx/{id}',[
	'as'=>'update_nsx',
	'uses'=>'admincontroller@getUpdateNsx'
]);
Route::post('update-nsx/{id}',[
	'as'=>'update_nsx',
	'uses'=>'admincontroller@postUpdateNsx'
]);

/*--------------------------------------------------------QL-Product-----------------------------------------------------*/

Route::post('add-ad-sp',[
	'as'=>'addnewsp',
	'uses'=>'admincontroller@AddAdmin_Sp'
]);

Route::get('sp/{id}/delete',[
	'as'=>'deletensp',
	'uses'=>'admincontroller@DelAdmin_Sp'
]);

Route::get('update-sp/{id}',[
	'as'=>'update_sp',
	'uses'=>'admincontroller@getUpdateSp'
]);

Route::post('update-sp/{id}',[
	'as'=>'update_sp',
	'uses'=>'admincontroller@postUpdateSp'
]);

/*--------------------------------------------------------Oder-----------------------------------------------------*/

Route::get('ql-don-hang',[
	'as'=>'donhang',
	'uses'=>'admincontroller@getDonHang'
]);

Route::get('dh/{id}',[
	'as'=>'deletedh',
	'uses'=>'admincontroller@DelAdmin_DonHang'
]);

Route::get('ql-don-hang-chi-tiet/{id}',[
	'as'=>'donhangchitiet',
	'uses'=>'admincontroller@getChiTietDonHang'
]);
