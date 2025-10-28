@extends('admin.layout')

@section('content')
<h1 class="text-3xl font-bold mb-6">ویرایش دسته‌بندی</h1>

<form action="{{ route('categories.update', $category->id) }}" method="POST" class="bg-white p-6 rounded shadow-md w-full max-w-lg">
@csrf
@method('PUT')
<div class="mb-4">
<label class="block mb-1 font-semibold">نام دسته‌بندی</label>
<input type="text" name="name" value="{{ $category->name }}" class="border px-3 py-2 w-full rounded" required>
</div>

<button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">ذخیره تغییرات</button>
</form>
@endsection
