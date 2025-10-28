@extends('admin.layout')

@section('content')
    <h1 class="text-xl font-bold mb-4">{{ isset($author) ? 'ویرایش نویسنده' : 'نویسنده جدید' }}</h1>

    <form action="{{ isset($author) ? route('authors.update', $author->id) : route('authors.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @if(isset($author))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label class="block mb-2">نام:</label>
            <input type="text" name="name" value="{{ $author->name ?? old('name') }}" class="w-full border px-3 py-2 rounded" required>
            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-2">تصویر پروفایل:</label>
            <input type="file" name="profile_photo" class="w-full border px-3 py-2 rounded" accept="image/*">
        </div>

        <div class="mb-4">
            <label class="block mb-2">بیوگرافی:</label>
            <textarea name="bio" class="w-full border px-3 py-2 rounded">{{ $author->bio ?? old('bio') }}</textarea>
            @error('bio') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-green-600 px-4 py-2 rounded hover:bg-green-700">
            {{ isset($author) ? 'ویرایش' : 'افزودن' }}
        </button>
    </form>
@endsection
