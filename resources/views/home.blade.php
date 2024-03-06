<x-layout>
  <div class="h-full bg-red-500">
    <div class="flex flex-col justify-center items-center h-full max-w-sm mx-auto gap-4">      
      <h1 class="text-3xl font-thin text-white">Welcome to Book Inventory</h1>
      <a class="text-white font-thin text-xl rounded border border-transparent hover:border-white p-2 px-6" href="/books">Explore</a>
    </div>
  </div>
  <div class="h-full bg-orange-500">
    <div class="flex flex-col justify-center items-center h-full max-w-sm mx-auto gap-4">      
      <h1 class="text-3xl font-thin text-white">Have a book in mind?</h1>
      <form class="w-full flex gap-2" action="/books">
        <input type="text" class="w-full bg-transparent rounded border-white border outline-none p-3 text-white placeholder:text-white/50" placeholder="Find your book ..." name="search" required>
        <button class="w-16 text-white font-thin text-xl rounded border border-white p-2 fa fa-search text-white/75" href="/books"></button>
      </form>
    </div>
  </div>
</x-layout>