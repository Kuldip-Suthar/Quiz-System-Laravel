<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Quiz</title>
    @vite('resources/css/app.css')
</head>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body class="bg-gray-100 min-h-screen">
    <x-navbar admin="{{ $admin->name }}"></x-navbar>
    <div class="flex flex-col items-center justify-start pt-6 space-y-10">
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden">
            <h2 class="text-xl font-semibold text-center text-gray-700 py-4 border-b">Total MCQs</h2>
            <div class="overflow-x-auto">

                <a class="text-yellow-400 text-lg" href='/add-quiz'>Back</a>

                <table class="min-w-full text-left text-sm text-gray-700">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-3">Sr no</th>
                            <th class="px-6 py-3">Question</th>
                            <th class="px-6 py-3">A</th>
                            <th class="px-6 py-3">B</th>
                            <th class="px-6 py-3">C</th>
                            <th class="px-6 py-3">D</th>
                            <th class="px-6 py-3">Correct Answer</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @foreach ($mcqs as $index => $mcq)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $index + 1 }}</td>
                                <td class="px-6 py-4">{{ $mcq->question }}</td>
                                <td class="px-6 py-4">{{ $mcq->a }}</td>
                                <td class="px-6 py-4">{{ $mcq->b }}</td>
                                <td class="px-6 py-4">{{ $mcq->c }}</td>
                                <td class="px-6 py-4">{{ $mcq->d }}</td>
                                <td class="px-6 py-4">{{ $mcq->correct_ans }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
