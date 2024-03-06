<x-layout>
  <div class="container mx-auto p-4">
    <h2 class="text-2xl font-semibold mb-4">Cart Items</h2>

    <table class="w-full border divide-gray-200">
      <thead class="bg-gray-100">
        <tr>
          <th class="py-2 px-4 border">Item</th>
          <th class="py-2 px-4 border">Quantity</th>
          <th class="py-2 px-4 border">Price</th>
          <th class="py-2 px-4 border">Actions</th>
        </tr>
      </thead>

      <tbody>
        @foreach($cart as $item)
        <tr class="hover:bg-gray-100">
          <td class="py-2 px-4 border text-center">{{$item?->book->title}}</td>
          <td class="py-2 px-4 border text-center flex">
            <form class="text-center" method="post" action="/cart/sub/{{$item?->book->id}}">
              @csrf
              <button class="px-2 py-1 disabled:bg-indigo-300 bg-indigo-500 text-white rounded hover:bg-indigo-700" wire:click="decrementQuantity" @if($item->quantity <= 1) disabled @endif>-</button>
            </form>
            <span class="mx-2">{{$item->quantity}}</span>
            <form class="text-center" method="post" action="/cart/add/{{$item?->book->id}}">
              @csrf
              <button class="px-2 py-1 bg-indigo-500 text-white rounded hover:bg-indigo-700" wire:click="incrementQuantity">+</button>
            </form>
          </td>
          <td class="py-2 px-4 border text-center">${{$item?->book->price * $item->quantity}}</td>
          <td class="py-2 px-4 border text-center">
            <form class="text-center" method="post" action="/cart/remove/{{$item?->book->id}}">
              @csrf
              <button class="bg-red-500 text-white p-1 rounded hover:bg-red-700" wire:click="removeFromCart">
                Remove
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <div class="mt-4 flex justify-between items-center">
      <p class="text-2xl font-semibold">Total Price: ${{$total}}</p>
      @if($cart->count())
      <a href="/checkout" class="bg-green-500 text-white py-2 px-4 rounded-full hover:bg-green-700 ml-4">Go to Checkout</a>
      @else
      <button class="bg-green-300 text-white py-2 px-4 rounded-full ml-4 cursor-not-allowed" title="Your cart is empty" disabled>Go to Checkout</button>
      @endif
    </div>

  </div>
</x-layout>