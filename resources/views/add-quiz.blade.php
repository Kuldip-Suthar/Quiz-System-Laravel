<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Quiz</title>
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

    <div class="flex flex-col items-center justify-start pt-6 space-y-10">
        <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-lg">
            @if (!session('quizDetails'))
                <h2 class="text-2xl text-center text-gray-700 mb-6">
                    Add Quiz
                </h2>
                @error('user')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <form action="/add-quiz" method="get" class="space-y-4">
                    <div>
                        <input type="text" id="name" placeholder="Enter Quiz Name" name="name"
                            class="w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
                    </div>
                    <div>
                        <select type="text" id="name" name="category"
                            class="w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 p-2 rounded-lg text-white font-medium">
                        Add
                    </button>
                </form>
        </div>
    @else
        <span class="text-green-500 font-bold text-center">Quiz: {{ session('quizDetails')->name }}</span>
        <h2 class="text-2xl text-center text-gray-700 mb-6">
            Add MCQ
        </h2>
        <form action="/add-mcq" method="get" class="space-y-4">
            <div>
                <textarea type="text" placeholder="Enter Question" name="name"
                    class="w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </textarea>
            </div>
            <div>
                <input type="text" id="name" placeholder="Enter First Option" name="firstopt"
                    class="w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>
            <div>
                <input type="text" id="name" placeholder="Enter Second Option" name="secondopt"
                    class="w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>
            <div>
                <input type="text" id="name" placeholder="Enter Third Option" name="thirdopt"
                    class="w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>
            <div>
                <input type="text" id="name" placeholder="Enter Fourth Option" name="fourthopt"
                    class="w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>


            <div>
                <select id="name" name="answer"
                    class="w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option>Select Correct Answer</option>
                    <option>A</option>
                    <option>B</option>
                    <option>C</option>
                    <option>D</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 p-2 rounded-lg text-white font-medium">
                Add More
            </button>

            <button type="submit" class="w-full bg-green-500 hover:bg-green-600 p-2 rounded-lg text-white font-medium">
                Add & Next
            </button>

        </form>
        @endif
    </div>
</body>

</html>
