<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //them-moi-sp
    public function create() {
        // - Controller gọi View:
        // - Tạo cấu trúc thư mục cho view như sau:
        // resources/views/
        //                /layouts/main.blade.php
        //                /products/
        //                         /create.blade.php
        //                         /update.blade.php
        //                         /index.blade.php
        //
        return view('products/create');
    }

    public function insert(Request $request) {
        // - Validate form:
        $rules = [
            'name' => ['required'],
            'price' => ['required', 'numeric']
        ];
        $messages = [
            'name.required' => 'Tên phải nhập',
            'price.required' => 'Giá phải nhập',
            'price.numeric' => 'Giá phải là số'
        ];
        $request->validate($rules, $messages);
//        echo 'Form ko có lỗi validate nào';
        // - Controller gọi Model
        // Laravel có 2 cơ chế truy vấn: Eloquent và Query Builder
        $product = Product::create($request->all());
//        dump($product);
        if (!empty($product)) {
            session()->put('success', 'Thêm mới thành công');
        } else {
            session()->put('error', 'Thêm mới thất bại');
        }
        return redirect('danh-sach-sp');
    }
}
