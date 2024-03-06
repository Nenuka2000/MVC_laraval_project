@props([
  'book' => null
])

<x-layout>
  <div class="container mx-auto p-4">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-2xl p-4">
      <h2 class="text-2xl font-semibold mb-4">@if($book) Edit Book @else Add a New Book @endif</h2>
      <form method="POST" action="/admin/books/{{$book?->id ?? ''}}" enctype='multipart/form-data'>
        @if($book) @method('put') @endif
        @csrf

        <!-- Title Input -->
        <div class="mb-4">
          <label for="title" class="block text-gray-700 font-semibold">Title:</label>
          <input type="text" name="title" id="title" value="{{ old('title', $book?->title ?? null) }}" class="border border-gray-300 p-1 rounded-md w-full">
          @error('title')<span class="text-red-600">{{$message}}</span>@enderror
        </div>

        <!-- Author Input -->
        <div class="mb-4">
          <label for="author" class="block text-gray-700 font-semibold">Author:</label>
          <input type="text" name="author" id="author" value="{{ old('author', $book?->author ?? null) }}" class="border border-gray-300 p-1 rounded-md w-full">
          @error('author')<span class="text-red-600">{{$message}}</span>@enderror
        </div>

        <!-- Published At Input -->
        <div class="mb-4">
          <label for="published_at" class="block text-gray-700 font-semibold">Published At:</label>
          <input type="date" name="published_at" id="published_at" value="{{ old('published_at', $book?->published_at?->format('Y-m-d') ?? null) }}" class="border border-gray-300 p-1 rounded-md w-full">
          @error('published_at')<span class="text-red-600">{{$message}}</span>@enderror
        </div>

        <!-- ISBN Input -->
        <div class="mb-4">
          <label for="isbn" class="block text-gray-700 font-semibold">ISBN:</label>
          <input type="text" name="isbn" id="isbn" value="{{ old('isbn', $book?->isbn ?? null) }}" class="border border-gray-300 p-1 rounded-md w-full">
          @error('isbn')<span class="text-red-600">{{$message}}</span>@enderror
        </div>

        <!-- Description Input -->
        <div class="mb-4">
          <label for="description" class="block text-gray-700 font-semibold">Description:</label>
          <textarea name="description" id="description" class="border border-gray-300 p-1 rounded-md w-full">{{ old('description', $book?->description ?? null) }}</textarea>
          @error('description')<span class="text-red-600">{{$message}}</span>@enderror
        </div>

        <!-- Price Input -->
        <div class="mb-4">
          <label for="price" class="block text-gray-700 font-semibold">Price:</label>
          <input type="number" name="price" id="price" value="{{ old('price', $book?->price ?? null) }}" class="border border-gray-300 p-1 rounded-md w-full">
          @error('price')<span class="text-red-600">{{$message}}</span>@enderror
        </div>

        <!-- Cover Image -->
        <div class="mb-4">
          <label for="cover" class="block text-gray-700 font-semibold mb-2">{{$book ? 'Change' : ''}} Cover Image:</label>
          <input type="file" name="cover" id="cover" accept="image/*">
        </div>
        @error('cover')<span class="text-red-600">{{$message}}</span>@enderror

        <div class="flex justify-end">
          <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Submit
          </button>
        </div>

      </form>
    </div>
  </div>

</x-layout>