<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
        <h2 class="text-2xl text-center text-gray-500 mb-6">Admin Login</h2>
        @error('user')
            <div class="text-red-500">{{ $message }}</div>  
        @enderror
        <form action="/admin-login" method="post" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="text-gray-500 mb-1">Name</label>
                <input type="text" id="name" placeholder="Enter Admin Name" name="name"
                    class="w-full px-2 py-2  border border-gray-400 rounded-lg focus:outline-none">
                @error('name')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="password" class="text-gray-500 mb-1">Password</label>
                <input type="password" id="password" placeholder="Enter Admin Password" name="password"
                    class="w-full px-2 py-2  border border-gray-400 rounded-lg focus:outline-none">
                @error('password')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="w-full bg-blue-500 p-2 rounded-lg text-white">Login</button>
        </form>
    </div>
</body>

</html>
