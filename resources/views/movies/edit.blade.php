@extends('layouts.app')

@section('title', 'Edit Movie')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-10 rounded-lg shadow-md border border-gray-200 mt-10">
        <h1 class="text-4xl font-bold text-blue-600 mb-8 text-center">Edit Movie</h1>
        <form action="{{ route('movies.update', $movie->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <label for="title" class="block text-lg font-medium text-gray-700 mb-2">Judul Film</label>
                <input 
                    type="text" 
                    name="title" 
                    id="title" 
                    value="{{ old('title', $movie->title) }}" 
                    class="block w-full rounded-lg bg-gray-50 border border-gray-300 px-4 py-3 text-sm focus:ring-blue-500 focus:border-blue-500" 
                    placeholder="Masukkan judul film" 
                    required>
            </div>

            <!-- Synopsis -->
            <div>
                <label for="synopsis" class="block text-lg font-medium text-gray-700 mb-2">Sinopsis</label>
                <textarea 
                    name="synopsis" 
                    id="synopsis" 
                    rows="5" 
                    class="block w-full rounded-lg bg-gray-50 border border-gray-300 px-4 py-3 text-sm focus:ring-blue-500 focus:border-blue-500" 
                    placeholder="Masukkan sinopsis film" 
                    required>{{ old('synopsis', $movie->synopsis) }}</textarea>
            </div>

            <!-- Poster URL -->
            <div>
                <label for="poster" class="block text-lg font-medium text-gray-700 mb-2">URL Poster</label>
                <input 
                    type="text" 
                    name="poster" 
                    id="poster" 
                    value="{{ old('poster', $movie->poster) }}" 
                    class="block w-full rounded-lg bg-gray-50 border border-gray-300 px-4 py-3 text-sm focus:ring-blue-500 focus:border-blue-500" 
                    placeholder="Masukkan URL poster (opsional)">
            </div>

            <!-- Year and Availability -->
            <div class="grid grid-cols-2 gap-4">
                <!-- Year -->
                <div>
                    <label for="year" class="block text-lg font-medium text-gray-700 mb-2">Tahun Rilis</label>
                    <input 
                        type="number" 
                        name="year" 
                        id="year" 
                        value="{{ old('year', $movie->year) }}" 
                        class="block w-full rounded-lg bg-gray-50 border border-gray-300 px-4 py-3 text-sm focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Masukkan tahun rilis" 
                        required>
                </div>

                <!-- Available -->
                <div>
                    <label for="available" class="block text-lg font-medium text-gray-700 mb-2">Ketersediaan</label>
                    <select 
                        name="available" 
                        id="available" 
                        class="block w-full rounded-lg bg-gray-50 border border-gray-300 px-4 py-3 text-sm focus:ring-blue-500 focus:border-blue-500" 
                        required>
                        <option value="1" {{ $movie->available ? 'selected' : '' }}>Tersedia</option>
                        <option value="0" {{ !$movie->available ? 'selected' : '' }}>Tidak Tersedia</option>
                    </select>
                </div>
            </div>

            <!-- Genre -->
            <div>
                <label for="genre_id" class="block text-lg font-medium text-gray-700 mb-2">Genre</label>
                <select 
                    name="genre_id" 
                    id="genre_id" 
                    class="block w-full rounded-lg bg-gray-50 border border-gray-300 px-4 py-3 text-sm focus:ring-blue-500 focus:border-blue-500" 
                    required>
                    <option value="" disabled>Pilih genre</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" {{ $movie->genre_id == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button 
                    type="submit" 
                    class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Update Movie
                </button>
            </div>
        </form>
    </div>
@endsection