@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-2xl font-bold mb-3">Tambah Nilai</div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('student-score.store') }}" method="post">
                    @csrf
                    @method('post')
                        <div class="font-semibold text-lg mb-5">Data Siswa</div>
                        <div class="mb-6 flex items-center">
                            <label for="name" class="w-1/3 block mb-2 text-sm font-medium text-gray-900">Nama <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
                        <div class="mb-6 flex items-center">
                            <label for="class" class="w-1/3 block mb-2 text-sm font-medium text-gray-900">Kelas <span class="text-red-500">*</span></label>
                            <input type="text" id="class" name="class" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
                        <div class="font-semibold text-lg mb-5">Data Tugas</div>
                        <div class="mb-6 flex items-center">
                            <label for="task1" class="w-1/3 block mb-2 text-sm font-medium text-gray-900">Tugas 1 <span class="text-red-500">*</span></label>
                            <input type="number" id="task1" name="task1" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
                        <div class="mb-6 flex items-center">
                            <label for="task2" class="w-1/3 block mb-2 text-sm font-medium text-gray-900">Tugas 2 <span class="text-red-500">*</span></label>
                            <input type="number" id="task2" name="task2" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
                        <div class="mb-6 flex items-center">
                            <label for="task3" class="w-1/3 block mb-2 text-sm font-medium text-gray-900">Tugas 3 <span class="text-red-500">*</span></label>
                            <input type="number" id="task3" name="task3" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
                        <div class="mb-6 flex items-center">
                            <label for="task4" class="w-1/3 block mb-2 text-sm font-medium text-gray-900">Tugas 4 <span class="text-red-500">*</span></label>
                            <input type="number" id="task4" name="task4" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
                        <div class="mb-6 flex items-center">
                            <label for="task5" class="w-1/3 block mb-2 text-sm font-medium text-gray-900">Tugas 5 <span class="text-red-500">*</span></label>
                            <input type="number" id="task5" name="task5" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
                        <div class="font-semibold text-lg mb-5">Data Ujian</div>
                        <div class="mb-6 flex items-center">
                            <label for="test1" class="w-1/3 block mb-2 text-sm font-medium text-gray-900">Ujian 1 <span class="text-red-500">*</span></label>
                            <input type="number" id="test1" name="test1" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
                        <div class="mb-6 flex items-center">
                            <label for="test2" class="w-1/3 block mb-2 text-sm font-medium text-gray-900">Ujian 2 <span class="text-red-500">*</span></label>
                            <input type="number" id="test2" name="test2" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
                        <div class="flex justify-end items-center space-x-2">
                            @if (session('status') === 'student-score-created')
                                <p class="text-sm text-gray-600">Berhasil</p>
                            @endif
                            <a href="{{ route('student-score.index') }}" class="px-4 py-2 bg-red-600 rounded-md font-semibold text-xs text-white uppercase hover:bg-red-500">Batal</a>
                            <button type="submit" class="px-4 py-2 bg-green-600 rounded-md font-semibold text-xs text-white uppercase hover:bg-green-500">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection