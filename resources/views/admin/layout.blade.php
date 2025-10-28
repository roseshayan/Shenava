<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت شنوا</title>
    <link href="{{ asset('build/assets/app-CHpz3BqR.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

    <nav class="bg-gray-800 text-white p-4">
        <a href="{{ route('books.index') }}" class="mr-4">کتاب‌ها</a>
        <a href="{{ route('categories.index') }}" class="mr-4">دسته‌بندی‌ها</a>
        <a href="{{ route('authors.index') }}" class="mr-4">نویسندگان</a>
        <a href="{{ route('episodes.index') }}" class="mr-4">اپیزودها</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="float-left">خروج</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </nav>

    <div class="container mx-auto p-4">
        @yield('content')
    </div>

</body>
</html>
