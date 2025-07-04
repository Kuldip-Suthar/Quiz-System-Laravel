<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-usernavbar></x-usernavbar>

    <div class="flex flex-col items-center min-h-screen bg-gray-100">
        <h1 class="text-4xl font-bold text-orange-400 p-5">Check Your Skills</h1>
        <div class="w-full max-w-md">
            <div class="relative">
                <input class="w-full px-4 py-2 border border-gray-300 rounded-2xl shadow" type="text" name=""
                    placeholder="Search Quiz..." id="">
                <button class="absolute right-2 top-3">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#000000">
                        <path
                            d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden mt-9">
            <h2 class="text-xl font-semibold text-center text-gray-700 py-4 border-b">Category List</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full text-left text-sm text-gray-700">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-3">S. No</th>
                            <th class="px-6 py-3">Name</th>
                            <th class="px-6 py-3">Creator</th>
                            <th class="px-6 py-3">Quiz Count</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($categories as $index => $category)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $index + 1 }}</td>
                                <td class="px-6 py-4">{{ $category->name }}</td>
                                <td class="px-6 py-4">{{ $category->creator }}</td>
                                <td class="px-6 py-4">{{ $category->quizzes_count }}</td>
                                <td class="px-6 py-4 flex">
                                    <a href="/user-show-quiz/{{ $category->id }}/{{ $category->name }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="#000000">
                                            <path
                                                d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <x-footeruser></x-footeruser>
</body>

</html>
 