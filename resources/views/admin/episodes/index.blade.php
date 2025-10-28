@extends('admin.layout')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold">اپیزودها</h1>
        <a href="{{ route('episodes.create') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">اپیزود
            جدید</a>
    </div>

    <table class="w-full table-auto border border-gray-300 bg-white rounded shadow">
        <thead class="bg-gray-200 text-right">
        <tr>
            <th class="px-4 py-2 border">ID</th>
            <th class="px-4 py-2 border">عنوان</th>
            <th class="px-4 py-2 border">کتاب</th>
            <th class="px-4 py-2 border">نویسنده</th>
            <th class="px-4 py-2 border">مدت زمان</th>
            <th class="px-4 py-2 border">عملیات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($episodes as $ep)
            <tr>
                <td class="px-4 py-2 border">{{ $ep->id }}</td>
                <td class="px-4 py-2 border">{{ $ep->title }}</td>
                <td class="px-4 py-2 border">{{ $ep->book->name ?? '-' }}</td>
                <td class="px-4 py-2 border">{{ $ep->author->name ?? '-' }}</td>
                <td class="px-4 py-2 border">{{ $ep->duration ? gmdate("H:i:s", $ep->duration) : '-' }}</td>
                <td class="px-4 py-2 border flex space-x-2 justify-end">
                    <a href="{{ route('episodes.edit', $ep->id) }}"
                       class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-500">ویرایش</a>
                    <form action="{{ route('episodes.destroy', $ep->id) }}" method="POST"
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
