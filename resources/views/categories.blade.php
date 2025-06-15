<!DOCTYPE html>
<html lang="en">

<head>
    <title>Categories</title>
    @vite('resources/css/app.css')
</head>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body class="bg-gray-100 min-h-screen">
    <x-navbar admin="{{ $admin }}"></x-navbar>

    <!-- SweetAlert Notifications -->
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        @elseif (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
            });
        @endif
    </script>

    <!-- Centered Container -->
    <div class="flex flex-col items-center justify-start pt-24 space-y-10">

        <!-- Create Category Form -->
        <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
            <h2 class="text-2xl text-center text-gray-700 mb-6">Create Category</h2>
            @error('user')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
            <form action="/add-category" method="post" class="space-y-4">
                @csrf
                <div>
                    <input type="text" id="name" placeholder="Enter Category Name" name="name"
                        class="w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 p-2 rounded-lg text-white font-medium">Add</button>
            </form>
        </div>

        <!-- Category List Table -->
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden">
            <h2 class="text-xl font-semibold text-center text-gray-700 py-4 border-b">Category List</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full text-left text-sm text-gray-700">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-3">S. No</th>
                            <th class="px-6 py-3">Name</th>
                            <th class="px-6 py-3">Creator</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($categories as $index => $category)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $index + 1 }}</td>
                                <td class="px-6 py-4">{{ $category->name }}</td>
                                <td class="px-6 py-4">{{ $category->creator }}</td>
                                <td class="px-6 py-4">
                                    <a href="category/delete/{{$category->id}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="#EA3323">
                                            <path
                                                d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
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
</body>

</html>
