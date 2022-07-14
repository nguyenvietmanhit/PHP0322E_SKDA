{{--products/create.blade.php--}}
@extends('layouts/main')
@section('page_title', 'Form thêm mới')

@section('content')
    <h2>Form thêm mới</h2>
    <form method="post" action="{{ url('insert-sp') }}">
        @csrf
        Nhập tên: <input type="text" name="name" /><br />
        Nhập giá: <input type="text" name="price" /><br />
        <input type="submit" name="submit" value="Lưu" />
    </form>
@endsection

