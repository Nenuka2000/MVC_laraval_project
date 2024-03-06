<x-layout>
  <div class="max-w-screen-xl p-5 mx-auto">
    <div class="flex flex-row flex-wrap my-5 content-center justify-center items-center">
      <h1 class="text-2xl text-purple-700 font-bold">Meet your next favorite book</h1>
    </div>
    <div class="border bordered-purple-300 my-5">
      <form action="" method="GET">
        <div class="flex items-center border-b-2 border-indigo-500 py-2">
          <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" name="search" placeholder="Search for books..." value="{{ request('search') }}">
          <button class=" mx-7 flex-shrink-0 bg-indigo-500 hover:bg-indigo-700 border-indigo-500 hover:border-indigo-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">
            Search
          </button>
        </div>
      </form>
    </div>
    <div class="grid grid-cols-4 gap-4">
      @foreach($books as $book)
      <a href="/books/{{$book->id}}" class="w-full">
        <div class="rounded-lg overflow-hidden shadow-xl bg-white">
          <img src="/{{$book->cover_url ?? 'images/blank.png'}}" alt="Book Cover" class="w-full h-48 object-cover">
          <div class="px-6 py-4">
            <div class="text-xl font-semibold mb-2">{{$book?->title}}</div>
            <p class="text-gray-600 text-base">Author: {{$book?->author}}</p>
            <p class="text-gray-600 text-base">Price: ${{number_format($book?->price, 2)}}</p>
          </div>
          <div class="px-6 py-4">
          <form class="text-center" method="post" action="/cart/add/{{$book->id}}">
            @csrf
            <button class="m-3 p-3 bg-indigo-500 rounded-md text-white hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-400 fas fa-cart-plus text-2xl"></button>
          </form>
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</x-layout>