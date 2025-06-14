<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body>
    <nav class="shadow-md px-4 py-3 flex items-center justify-between bg-gray-600 text-white">
        <div class="text-2xl text-yellow-200 hover:text-yellow-500">Quiz System</div>
        <div class="space-x-4">
            <a class="hover:text-yellow-500" href="">Categories</a>
            <a class="hover:text-yellow-500" href="">Quiz</a>
            <a class="hover:text-yellow-500" href="">Welcome {{$admin}}</a>
            <a class="hover:text-yellow-500" href="">Logout</a>
        </div>
    </nav>
</body>
</html>