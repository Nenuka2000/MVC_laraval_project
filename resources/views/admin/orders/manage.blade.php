<x-layout>
  <div class="container mx-auto p-4">
    <form method="post" action="/admin/orders/{{$order->id}}" class="bg-white shadow-md rounded-lg p-6 flex flex-col gap-4">
      @method('put')
      @csrf
      <div class="flex flex-row flex-wrap my-5 content-center justify-center items-center">
        <h1 class="text-2xl text-purple-700 font-bold">Order Details</h1>
      </div>
      <div class="mt-6">
        <p><strong>Order Date:</strong> {{$order->created_at->format('Y-m-d')}}</p>
        <p><strong>Customer:</strong> {{$order->user->first_name}} {{$order->user->last_name}}</p>
        <p><strong>Items: </strong> {{$order->items->count()}}</p>
        <p><strong>Total:</strong> ${{number_format($order->price(), 2)}}</p>
      </div>
        <div class="mb-4">
          <label for="status" class="block text-gray-700 font-semibold">Status:</label>
          <select id="status" name="status" class="border border-gray-300 p-2 rounded-md" required>
            <option value="pending" @selected($order->status == 'pending')>Pending</option>
            <option value="processing" @selected($order->status == 'processing')>Processing</option>
            <option value="shipped" @selected($order->status == 'shipped')>Shipped</option>
            <option value="delivered" @selected($order->status == 'delivered')>Delivered</option>
            <option value="returned" @selected($order->status == 'returned')>Returned</option>
          </select>
        </div>
        <div>
          <h1 class="text-xl mb-4">Items</h1>
          @foreach($order->items as $item)
            <p>{{$item->book->title}} x{{$item->quantity}} - ${{$item->quantity * $item->price}}</p>
          @endforeach
        </div>
        <div>
          <h1 class="text-xl mb-4">Address</h1>
          <div>
              <p><strong>First Name:</strong></p>
              <p>{{ $order->first_name }}</p>
          </div>
          <div>
              <p><strong>Last Name:</strong></p>
              <p>{{ $order->last_name }}</p>
          </div>
          <div>
              <p><strong>Phone:</strong></p>
              <p>{{ $order->phone }}</p>
          </div>
          <div>
              <p><strong>Company:</strong></p>
              <p>{{ $order->company }}</p>
          </div>
          <div>
              <p><strong>Address Line 1:</strong></p>
              <p>{{ $order->address_line_1 }}</p>
          </div>
          <div>
              <p><strong>Address Line 2:</strong></p>
              <p>{{ $order->address_line_2 }}</p>
          </div>
          <div>
              <p><strong>City:</strong></p>
              <p>{{ $order->city }}</p>
          </div>
          <div>
              <p><strong>Zip:</strong></p>
              <p>{{ $order->zip }}</p>
          </div>
        </div>
        <div class="flex justify-end">
          <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Update
          </button>
        </div>
    </form>
  </div>
</x-layout>