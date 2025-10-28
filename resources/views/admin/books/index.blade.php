@extends('admin.layout')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold">لیست کتاب‌ها</h1>
        <a href="{{ route('books.create') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">کتاب جدید</a>
    </div>

    <table class="min-w-full bg-white border border-gray-200">
        <thead class="bg-gray-200">
        <tr>
            <th class="border px-4 py-2 text-right">عنوان</th>
            <th class="border px-4 py-2 text-right">نویسنده</th>
            <th class="border px-4 py-2 text-right">دسته‌بندی</th>
            <th class="border px-4 py-2 text-center">عملیات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr class="hover:bg-gray-100">
                <td class="border px-4 py-2 text-right">{{ $book->title }}</td>
                <td class="border px-4 py-2 text-right">{{ $book->author->name }}</td>
                <td class="border px-4 py-2 text-right">{{ $book->category->name ?? '-' }}</td>
                <td class="border px-4 py-2 text-center space-x-2">
                    <a href="{{ route('books.edit', $book->id) }}"
                       class="bg-yellow-400 hover:bg-yellow-500 px-3 py-1 rounded">ویرایش</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline-block">
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
