<x-layout>
  <div class="container mx-auto p-4">

    <div class="flex flex-row flex-wrap my-5 content-center justify-center items-center">
      <h1 class="text-2xl text-purple-700 font-bold">Book List</h1>
    </div>
    <div class="my-3 flex justify-end">
          <a href="/admin/books/create" type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Add new Book
          </a>
        </div>
    <table class="table-auto w-full">
      <thead>
        <tr>
          <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase">#</th>
          <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase">Title</th>
          <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase">Author</th>
          <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase">Published At</th>
          <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase">ISBN</th>
          <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase">Description</th>
          <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase">Price</th>
          <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($books as $book)
        <tr>
          <td class="border border-gray-400 px-4 py-2">
            <img src="/{{$book->cover_url ?? '/images/blank.png'}}" class="w-32 aspect-auto-[1/2]" alt="">
          </td>
          <td class="border border-gray-400 px-4 py-2">{{$book->title}}</td>
          <td class="border border-gray-400 px-4 py-2">{{$book->author}}</td>
          <td class="border border-gray-400 px-4 py-2">{{$book->published_at?->format('Y-m-d')}}</td>
          <td class="border border-gray-400 px-4 py-2">{{$book->isbn}}</td>
          <td class="border border-gray-400 px-4 py-2">{{$book->description}}</td>
          <td class="border border-gray-400 px-4 py-2">{{$book->price}}</td>
          <td class="border border-gray-400 px-4 py-2">
            <a href="/admin/books/{{$book->id}}/edit" class="text-blue-500 hover:underline">Edit</a>
            <form action="/admin/books/{{$book->id}}" method="post">
              @csrf
              @method('delete')
              <button class="text-red-500 hover:underline">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</x-layout>