<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت شنوا</title>

    {{-- Vite CSS/JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans min-h-screen flex flex-col text-right">
{{-- Navbar --}}
<nav class="bg-gray-800 text-white p-4 flex justify-between items-center">
    <div class="flex space-x-4">
        <a href="{{ route('books.index') }}" class="hover:underline">کتاب‌ها</a>
        <a href="{{ route('categories.index') }}" class="hover:underline">دسته‌بندی‌ها</a>
        <a href="{{ route('authors.index') }}" class="hover:underline">نویسندگان</a>
        <a href="{{ route('episodes.index') }}" class="hover:underline">اپیزودها</a>
    </div>
    <div>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="hover:underline">خروج</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
    </div>
</nav>

{{-- Content --}}
<div class="container mx-auto p-6 flex-1">
    @yield('content')
</div>
</body>
</html>
