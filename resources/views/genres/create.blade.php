@extends('layouts.app')

@section('title', 'Tambah Genre')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-10 rounded-lg shadow-md border border-gray-200 mt-10">
        <h1 class="text-4xl font-bold text-blue-600 mb-8 text-center">Tambah Genre Baru</h1>
        <form action="{{ route('genres.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Genre Name -->
            <div>
                <label for="name" class="block text-lg font-medium text-gray-700 mb-2">Nama Genre</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="block w-full rounded-lg bg-gray-50 border border-gray-300 px-4 py-3 text-sm focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400" 
                    placeholder="Masukkan nama genre" 
                    required>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button 
                    type="submit" 
                    class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Simpan Genre
                </button>
            </div>
        </form>
    </div>
@endsection
