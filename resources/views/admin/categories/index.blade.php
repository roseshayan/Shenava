@extends('admin.layout')

@section('content')
<h1 class="text-3xl font-bold mb-6">لیست دسته‌بندی‌ها</h1>

<a href="{{ route('categories.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">دسته‌بندی جدید</a>

@if(session('success'))
<div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
@endif

<table class="min-w-full bg-white border border-gray-200">
<thead class="bg-gray-200">
<tr>
<th class="border px-4 py-2 text-right">نام</th>
<th class="border px-4 py-2 text-center">عملیات</th>
</tr>
</thead>
<tbody>
@foreach($categories as $category)
<tr class="hover:bg-gray-100">
<td class="border px-4 py-2 text-right">{{ $category->name }}</td>
<td class="border px-4 py-2 text-center space-x-2">
<a href="{{ route('categories.edit', $category->id) }}" class="bg-yellow-400 hover:bg-yellow-500 px-3 py-1 rounded">ویرایش</a>
<form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block">
@csrf
@method('DELETE')
<button type="submit" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded">حذف</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
@endsection
