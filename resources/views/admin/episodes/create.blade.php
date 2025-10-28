@extends('admin.layout')

@section('content')
    <h1 class="text-xl font-bold mb-4">{{ isset($episode) ? 'ویرایش اپیزود' : 'اپیزود جدید' }}</h1>

    <form action="{{ isset($episode) ? route('episodes.update', $episode->id) : route('episodes.store') }}"
          method="POST" class="bg-white p-6 rounded shadow" enctype="multipart/form-data">
        @csrf
        @if(isset($episode))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label class="block mb-2">عنوان:</label>
            <input type="text" name="title" value="{{ $episode->title ?? old('title') }}"
                   class="w-full border px-3 py-2 rounded" required>
            @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-2">کتاب:</label>
            <select name="book_id" class="w-full border px-3 py-2 rounded" required>
                <option value="">انتخاب کتاب</option>
                @foreach($books as $book)
                    <option
                        value="{{ $book->id }}" {{ (isset($episode) && $episode->book_id==$book->id) ? 'selected' : '' }}>
                        {{ $book->title }} {{-- حتما ستون عنوان کتاب title باشد --}}
                    </option>
                @endforeach
            </select>
            @error('book_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-2">نویسنده:</label>
            <select name="author_id" class="w-full border px-3 py-2 rounded" required>
                <option value="">انتخاب نویسنده</option>
                @foreach($authors as $author)
                    <option
                        value="{{ $author->id }}" {{ (isset($episode) && $episode->author_id==$author->id) ? 'selected' : '' }}>{{ $author->name }}</option>
                @endforeach
            </select>
            @error('author_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-2">آدرس فایل صوتی (Audio URL):</label>
            <input type="text" name="audio_url" value="{{ $episode->audio_url ?? old('audio_url') }}"
                   class="w-full border px-3 py-2 rounded" required>
            @error('audio_url') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-2">فایل صوتی:</label>
            <input type="file" name="audio_file" class="w-full border px-3 py-2 rounded"
                   accept="audio/*" {{ isset($episode) ? '' : 'required' }}>
        </div>

        <div class="mb-4">
            <label class="block mb-2">مدت زمان (ثانیه):</label>
            <input type="number" name="duration" value="{{ $episode->duration ?? old('duration') }}"
                   class="w-full border px-3 py-2 rounded">
            @error('duration') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-2">توضیحات:</label>
            <textarea name="description"
                      class="w-full border px-3 py-2 rounded">{{ $episode->description ?? old('description') }}</textarea>
            @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-green-600 px-4 py-2 rounded hover:bg-green-700">
            {{ isset($episode) ? 'ویرایش' : 'افزودن' }}
        </button>
    </form>
@endsection
