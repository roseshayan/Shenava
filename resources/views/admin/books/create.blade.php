@extends('admin.layout')

@section('content')
<h1 class="text-2xl mb-4">کتاب جدید</h1>

<form action="{{ route('books.store') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label>عنوان</label>
        <input type="text" name="title" class="border px-2 py-1 w-full">
    </div>

    <div class="mb-4">
        <label>نویسنده</label>
        <select name="author_id" class="border px-2 py-1 w-full">
            @foreach($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label>دسته‌بندی</label>
        <select name="category_id" class="border px-2 py-1 w-full">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label>توضیحات</label>
        <textarea name="description" class="border px-2 py-1 w-full"></textarea>
    </div>

    <div class="mb-4">
        <label>کاور (URL)</label>
        <input type="text" name="cover_url" class="border px-2 py-1 w-full">
    </div>

    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">ذخیره</button>
</form>
@endsection
