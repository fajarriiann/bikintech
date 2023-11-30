@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-2xl font-bold mb-3">Ubah Nilai</div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('student-score.update', $studentScore) }}" method="post">
                    @csrf
                    @method('put')
                        <div class="font-semibold text-lg mb-5">Data Siswa</div>
                        <div class="mb-6 flex items-center">
                            <label for="name" class="w-1/3 block mb-2 text-sm font-medium text-gray-900">Nama <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $studentScore->name }}" required>
                        </div>
                        <div class="mb-6 flex items-center">
                            <label for="class" class="w-1/3 block mb-2 text-sm font-medium text-gray-900">Kelas <span class="text-red-500">*</span></label>
                            <input type="text" id="class" name="class" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $studentScore->class }}" required>
                        </div>
                        <div class="font-semibold text-lg mb-5">Data Tugas</div>
                        @foreach (json_decode($studentScore->task_score) as $key => $val)
                            <div class="mb-6 flex items-center">
                                <label for="task{{ $key + 1 }}" class="w-1/3 block mb-2 text-sm font-medium text-gray-900">Tugas {{ $key + 1 }} <span class="text-red-500">*</span></label>
                                <input type="number" id="task{{ $key + 1 }}" name="task{{ $key + 1 }}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $val }}" required>
                            </div>
                        @endforeach
                        <div class="font-semibold text-lg mb-5">Data Ujian</div>
                        @foreach (json_decode($studentScore->test_score) as $key => $val)
                            <div class="mb-6 flex items-center">
                                <label for="test{{ $key + 1 }}" class="w-1/3 block mb-2 text-sm font-medium text-gray-900">Ujian {{ $key + 1 }} <span class="text-red-500">*</span></label>
                                <input type="number" id="test{{ $key + 1 }}" name="test{{ $key + 1 }}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $val }}" required>
                            </div>
                        @endforeach
                        <div class="flex justify-end items-center space-x-2">
                            @if (session('status') === 'student-score-updated')
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