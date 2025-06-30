<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Signup</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-usernavbar></x-usernavbar>
    <div class="bg-gray-100 flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
            <h2 class="text-2xl text-center text-gray-500 mb-6">User Signup</h2>
            @error('user')
                <div class="text-red-500">{{ $message }}</div>  
            @enderror
            <form action="/user-signup" method="post" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="text-gray-500 mb-1">Name</label>
                    <input type="text" id="name" placeholder="Enter User Name" name="name"
                        class="w-full px-2 py-2  border border-gray-400 rounded-lg focus:outline-none">
                    @error('name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="email" class="text-gray-500 mb-1">Email</label>
                    <input type="email" id="email" placeholder="Enter User Email" name="email"
                        class="w-full px-2 py-2  border border-gray-400 rounded-lg focus:outline-none">
                    @error('email')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="password" class="text-gray-500 mb-1">Password</label>
                    <input type="password" id="password" placeholder="Enter User Password" name="password"
                        class="w-full px-2 py-2  border border-gray-400 rounded-lg focus:outline-none">
                    @error('password')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="confirm_password" class="text-gray-500 mb-1">Confirm Password</label>
                    <input type="password" id="confirm_password" placeholder="Confirm User Password" name="confirm_password"
                        class="w-full px-2 py-2  border border-gray-400 rounded-lg focus:outline-none">
                </div>
                <button type="submit" class="w-full bg-blue-500 p-2 rounded-lg text-white">Signup</button>
            </form>
        </div>
    </div>
    <x-footeruser></x-footeruser>
</body>

</html>
