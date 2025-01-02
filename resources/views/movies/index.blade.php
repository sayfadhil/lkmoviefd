@extends('layouts.app')

@section('title', 'Daftar Movies')

@section('content')
    <div class="max-w-6xl mx-auto mt-10">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-extrabold text-blue-600">Daftar Movies</h1>
            <a href="{{ route('movies.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Tambah Movie
            </a>
        </div>

        <!-- Movies Table -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full table-auto border-collapse border border-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 border-b">#</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 border-b">Poster</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 border-b">Judul</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 border-b">Genre</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 border-b">Tahun</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 border-b">Ketersediaan</th>
                        <th class="px-6 py-4 text-right text-sm font-bold text-gray-700 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($movies as $index => $movie)
                        <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                            <!-- Index -->
                            <td class="px-6 py-4 text-sm text-gray-700 border-b">{{ $index + 1 }}</td>
                            
                            <!-- Poster -->
                            <td class="px-6 py-4 text-sm text-gray-700 border-b">
                                @if ($movie->poster)
                                    <img src="{{ $movie->poster }}" alt="Poster" class="w-20 h-auto rounded">
                                @else
                                    <span class="text-gray-500 italic">Tidak ada poster</span>
                                @endif
                            </td>
                            
                            <!-- Judul -->
                            <td class="px-6 py-4 text-sm text-gray-900 font-semibold border-b">
                                {{ $movie->title }}
                            </td>
                            
                            <!-- Genre -->
                            <td class="px-6 py-4 text-sm text-gray-700 border-b">
                                {{ $movie->genre->name ?? 'Tidak ada genre' }}
                            </td>
                            
                            <!-- Tahun -->
                            <td class="px-6 py-4 text-sm text-gray-700 border-b">
                                {{ $movie->year }}
                            </td>
                            
                            <!-- Ketersediaan -->
                            <td class="px-6 py-4 text-sm border-b">
                                <span class="{{ $movie->available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ $movie->available ? 'Tersedia' : 'Tidak Tersedia' }}
                                </span>
                            </td>
                            
                            <!-- Aksi -->
                            <td class="px-6 py-4 text-right text-sm border-b">
                                <a href="#" class="text-blue-600 hover:text-blue-900 font-medium">Edit</a>
                                <a href="#" class="ml-4 text-red-600 hover:text-red-900 font-medium">Hapus</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500 italic">
                                Tidak ada movie tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
