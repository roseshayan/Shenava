@extends('admin.layout')

@section('content')
<h1 class="text-2xl mb-4">کتاب‌ها</h1>
<a href="{{ route('books.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">کتاب جدید</a>

<table class="w-full table-auto bg-white">
    <thead>
        <tr>
            <th class="border px-4 py-2">عنوان</th>
            <th class="border px-4 py-2">نویسنده</th>
            <th class="border px-4 py-2">دسته‌بندی</th>
            <th class="border px-4 py-2">عملیات</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
        <tr>
            <td class="border px-4 py-2">{{ $book->title }}</td>
            <td class="border px-4 py-2">{{ $book->author->name }}</td>
            <td class="border px-4 py-2">{{ $book->category->name ?? '-' }}</td>
            <td class="border px-4 py-2">
                <a href="{{ route('books.edit', $book->id) }}" class="bg-yellow-400 px-2 py-1 rounded">ویرایش</a>
                <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 px-2 py-1 rounded">حذف</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
