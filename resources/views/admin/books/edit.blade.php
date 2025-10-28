@extends('admin.layout')

@section('content')
<h1 class="text-3xl font-bold mb-6">ویرایش کتاب</h1>

<form action="{{ route('books.update', $book->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
@csrf
@method('PUT')

<div class="mb-4">
<label class="block mb-1 font-semibold">عنوان</label>
<input type="text" name="title" value="{{ $book->title }}" class="border px-3 py-2 w-full rounded" required>
</div>

<div class="mb-4">
<label class="block mb-1 font-semibold">نویسنده</label>
<select name="author_id" class="border px-3 py-2 w-full rounded" required>
@foreach($authors as $author)
<option value="{{ $author->id }}" @if($book->author_id==$author->id) selected @endif>{{ $author->name }}</option>
@endforeach
</select>
</div>

<div class="mb-4">
<label class="block mb-1 font-semibold">دسته‌بندی</label>
<select name="category_id" class="border px-3 py-2 w-full rounded">
@foreach($categories as $category)
<option value="{{ $category->id }}" @if($book->category_id==$category->id) selected @endif>{{ $category->name }}</option>
@endforeach
</select>
</div>

<div class="mb-4">
<label class="block mb-1 font-semibold">توضیحات</label>
<textarea name="description" class="border px-3 py-2 w-full rounded" rows="4">{{ $book->description }}</textarea>
</div>

<div class="mb-4">
<label class="block mb-1 font-semibold">کاور (URL)</label>
<input type="text" name="cover_url" value="{{ $book->cover_url }}" class="border px-3 py-2 w-full rounded">
</div>

<button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">ذخیره تغییرات</button>
</form>
@endsection
