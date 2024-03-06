<x-layout>
  <div class="container mx-auto p-4">
    <div class="bg-white shadow-md rounded-lg p-6 flex flex-col gap-4">
      <div class="flex flex-row flex-wrap my-5 content-center justify-center items-center">
        <h1 class="text-2xl text-purple-700 font-bold">Order Details</h1>
      </div>
      <div class="mt-6">
        <p><strong>Order Date:</strong> {{$order->created_at->format('Y-m-d')}}</p>
        <p><strong>Items: </strong> {{$order->items->count()}}</p>
        <p><strong>Total:</strong> ${{number_format($order->price(), 2)}}</p>
        <p><strong>Status:</strong> {{ucwords($order->status)}}</p>
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
    </div>
  </div>
</x-layout>