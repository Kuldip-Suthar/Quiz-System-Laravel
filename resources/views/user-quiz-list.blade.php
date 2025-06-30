<!DOCTYPE html>
<html lang="en">

<head>
    <title>Categories</title>
    @vite('resources/css/app.css')
</head>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body class="bg-gray-100 min-h-screen">
    <x-usernavbar></x-usernavbar>

    <!-- Centered Container -->
    <div class="flex flex-col items-center justify-start pt-10 space-y-5 mb-5">
        <p class="text-3xl text-green-500 font-bold">Category Name : {{ $category }} </p>
        <!-- Category List Table -->
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden">
            <h2 class="text-xl font-semibold text-center text-gray-700 py-4 border-b">Quiz List</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full text-left text-sm text-gray-700">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr> 
                            <th class="px-6 py-3">S. No</th>
                            <th class="px-6 py-3">Name</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($quiz as $index => $q)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $index + 1 }}</td>
                                <td class="px-6 py-4">{{ $q->name }}</td>
                                <td class="px-6 py-4">
                                    <a href="/start-quiz/{{$category}}" class="text-green-500 font-bold">
                                       Attempt Quiz
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
