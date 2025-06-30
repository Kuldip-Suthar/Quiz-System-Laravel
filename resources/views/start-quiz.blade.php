<!DOCTYPE html>
<html lang="en">

<head>
    <title>Start Quiz</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-usernavbar></x-usernavbar>
    <div class="bg-gray-100 flex flex-col items-center justify-center min-h-screen pt-5">
        <h1 class="text-4xl text-center mb-6 text-orange-500 font-bold ">{{ $category }}</h1>
        <h2 class="text-lg text-center text-green-500 mb-6 font-bold">The Quiz contain Questions and no limit to attempt
            this Quiz
            <h1 class="text-lg text-center text-green-500 mb-6 font-bold">Good Luck</h1>
        </h2>
        <a type="submit" class="bg-blue-500 rounded-md px-4 py-3 text-md text-white font-bold">
            Login/Signup for Start Quiz
        </a>

    </div>
    <x-footeruser></x-footeruser>

</body>

</html>
