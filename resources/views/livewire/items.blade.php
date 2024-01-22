{{-- $item->id
<a   class="group"> --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mx-4 my-8">
    <!-- Card 1 -->
    @foreach ($item as $item)
        <div class="bg-white p-6 rounded-md shadow-md transition-transform transform hover:scale-105">
            <img src="{{$item->images}}" alt="Card Image" class="w-full h-32 object-cover mb-4 rounded-md">
            <h3 class="text-xl font-semibold mb-2">{{$item->name}}</h3>
            <p class="text-gray-700">{{$item->name}}</p>
            <a href="{{url('details', $item->id)}}">
            <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors">Learn
                More</button>
            </a>

        </div>
    @endforeach


    <!-- Card 2 -->


    <!-- Repeat similar structure for more cards -->

</div>
