@extends('layouts.app')

@section('title', 'Daftar Genres')

@section('content')
    <div class="max-w-6xl mx-auto mt-10">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-extrabold text-blue-600">Daftar Genres</h1>
            <a href="{{ route('genres.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Tambah Genre
            </a>
        </div>

        <!-- Genres List -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            @if($genres->isEmpty())
                <p class="text-center text-gray-500 italic">Tidak ada genre tersedia.</p>
            @else
                <ul class="space-y-4">
                    @foreach ($genres as $genre)
                        <li class="flex items-center justify-between bg-gray-50 hover:bg-gray-100 rounded-lg p-4 shadow">
                            <!-- Genre Name -->
                            <div class="text-lg font-semibold text-gray-700">
                                {{ $genre->name }}
                            </div>

                            <!-- Actions -->
                            <div class="flex space-x-4">
                                <a href="#" class="text-blue-600 hover:text-blue-900 font-medium">Edit</a>
                                <a href="#" class="text-red-600 hover:text-red-900 font-medium">Hapus</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
