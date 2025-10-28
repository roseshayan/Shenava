@extends('admin.layout')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold">نویسندگان</h1>
        <a href="{{ route('authors.create') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">نویسنده جدید</a>
    </div>

    <table class="w-full table-auto border bg-white rounded shadow">
        <thead class="bg-gray-200 text-right">
        <tr>
            <th class="px-4 py-2 border">ID</th>
            <th class="px-4 py-2 border">تصویر</th>
            <th class="px-4 py-2 border">نام</th>
            <th class="px-4 py-2 border">عملیات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <td class="px-4 py-2 border">{{ $author->id }}</td>
                <td class="px-4 py-2 border">
                    @if($author->profile_photo)
                        <img src="{{ asset('storage/'.$author->profile_photo) }}" class="w-12 h-12 rounded-full">
                    @else
                        -
                    @endif
                </td>
                <td class="px-4 py-2 border">{{ $author->name }}</td>
                <td class="px-4 py-2 border flex space-x-2 justify-end">
                    <a href="{{ route('authors.edit',$author->id) }}"
                       class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-500">ویرایش</a>
                    <form action="{{ route('authors.destroy',$author->id) }}" method="POST"
                          onsubmit="return confirm('آیا مطمئن هستید؟')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">حذف
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
