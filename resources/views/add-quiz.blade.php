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
                        <input type="text" id="name" placeholder="Enter Quiz Name" required name="name"
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
        <span class="text-green-500 font-b  old text-center">Quiz: {{ session('quizDetails')->name }}</span></br>
        <p class="text-yellow-500 font-bold ">Total: {{ $totalMcq }}
            @if ($totalMcq>0)
                <span><a href="/show-mcqs">Show McQs</a></span>
            @endif
        </p>
        <h2 class="text-2xl text-center text-gray-700 mb-6">
            Add MCQ
        </h2>
        <form action="/add-mcq" method="post" class="space-y-4">
            @csrf
            <div>
                <textarea type="text" placeholder="Enter Question" name="question"
                    class="w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </textarea>
                @error('question')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <input type="text" id="a" placeholder="Enter First Option" name="a"
                    class="w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
                @error('a')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <input type="text" id="b" placeholder="Enter Second Option" name="b"
                    class="w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
                @error('b')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <input type="text" id="c" placeholder="Enter Third Option" name="c"
                    class="w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
                @error('c')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <input type="text" id="d" placeholder="Enter Fourth Option" name="d"
                    class="w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
                @error('d')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <select id="ans" name="correct_ans"
                    class="w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">Select Correct Answer</option>
                    <option value="a">A</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                    <option value="d">D</option>
                </select>
                @error('correct_ans')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" name="add_more" value="add-more"
                class="w-full bg-blue-500 hover:bg-blue-600 p-2 rounded-lg text-white font-medium">
                Add More
            </button>

            <button type="submit" name="done" value="done"
                class="w-full bg-green-500 hover:bg-green-600 p-2 rounded-lg text-white font-medium">
                Add & Next
            </button>
            <a href="/end-quiz"
                class="w-full block text-center bg-red-500 hover:bg-red-600 p-2 rounded-lg text-white font-medium">Finish
                Quiz</a>

        </form>
        @endif
    </div>
</body>

</html>
