@extends('admin.layout')

@section('content')
    <h1 class="text-3xl font-bold mb-6">دسته‌بندی جدید</h1>

    <form action="{{ route('categories.store') }}" method="POST" class="bg-white p-6 rounded shadow-md w-full max-w-lg">
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-semibold">نام دسته‌بندی</label>
            <input type="text" name="name" class="border px-3 py-2 w-full rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">دسته والد</label>
            <select name="parent_id" class="border px-3 py-2 w-full rounded">
                <option value="">بدون والد</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">ذخیره</button>
    </form>
@endsection
