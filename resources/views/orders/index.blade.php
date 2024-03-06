<x-layout>
  <div class="container mx-auto p-4">
    <div class="flex flex-row flex-wrap my-5 content-center justify-center items-center">
      <h1 class="text-2xl text-purple-700 font-bold">Orders List</h1>
    </div>
    <div class="flex justify-end">

      <table class="min-w-full">
        <thead>
          <tr>
            <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Order Date</th>
            <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">City</th>
            <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Items</th>
            <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Price</th>
            <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $order)
          <tr>
            <td class="border border-gray-400 px-4 py-2">{{$order->created_at->format('Y-m-d')}}</td>
            <td class="border border-gray-400 px-4 py-2">{{$order->city}}</td>
            <td class="border border-gray-400 px-4 py-2">{{$order->items->count()}}</td>
            <td class="border border-gray-400 px-4 py-2">${{number_format($order->price(), 2)}}</td>
            <td class="border border-gray-400 px-4 py-2">{{ucwords($order->status)}}</td>
            <td class="border border-gray-400 px-4 py-2">
              <a href="/orders/{{$order->id}}" class="text-blue-500 hover:underline">View</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</x-layout>