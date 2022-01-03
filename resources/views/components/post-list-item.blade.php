<div class="group relative">
    <div
        class="relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
        <img src="{{$post->image}}" alt="{{$post->title}}" class="w-full h-full object-center object-cover">
    </div>
    <h3 class="mt-6 text-sm text-gray-500">
        <a href="#">
            <span class="absolute inset-0"></span>
            {{$post->tags->pluck('name')->join(",")}}
        </a>
    </h3>
    <p class="text-base font-semibold text-gray-900">{{$post->title}}</p>
</div>
