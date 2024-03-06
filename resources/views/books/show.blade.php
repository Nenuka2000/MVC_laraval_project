<x-layout>
  <div class="flex justify-center items-center h-screen">
    <div class="container w-10/12 mx-auto p-4">
      <div class="rounded-lg overflow-hidden shadow-xl bg-white w-96 md:w-800 mx-auto">
        <div class="px-6 py-4">
          <img src="/{{$book->cover_url ?? 'images/blank.png'}}" alt="Book Cover" class="w-full h-48 object-cover">
          <div class="text-xl font-semibold mb-2">{{$book?->title}}</div>
          <p class="text-gray-600 text-base">Author: {{$book?->author}}</p>
          <p class="text-gray-800 text-base">Published At: {{$book->published_at->format('Y-m-d')}}</p>
          <p class="text-gray-800 text-base">ISBN: {{$book->isbn}}</p>
          <p class="text-gray-700 text-base">Description: {{$book->description}}</p>
          <p class="text-gray-600 text-base">Price: ${{number_format($book?->price, 2)}}</p>
          <form class="text-center" method="post" action="/cart/add/{{$book->id}}">
            @csrf
            <button class="m-3 p-3 bg-indigo-500 rounded-md text-white hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-400 fas fa-cart-plus text-2xl"></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-layout>
