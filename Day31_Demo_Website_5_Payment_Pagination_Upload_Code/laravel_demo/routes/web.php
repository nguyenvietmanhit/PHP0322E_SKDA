<?php
//routes/web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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
    return view('welcome');
});
// Route trong LAravel có các method tuân theo chuẩn API RESTFUL
// Method:
// get: hiển thị dữ liệu
// post: insert data
// put: update data
// delete: delete data
// - Thêm mới sản phẩm cần 2 route: get để show ra form, post để
//insert data khi submit form
//
Route::get('them-moi-sp',
    [ProductController::class, 'create']);

Route::post('insert-sp',
    [ProductController::class, 'insert']);
