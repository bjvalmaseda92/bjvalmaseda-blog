<x-app-layout>
    <x-slot name="header">
        {{__('Últimos artículos')}}
    </x-slot>

    <div class="bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto py-8 sm:py-24 lg:py-8 lg:max-w-none">
                <div class="mt-6 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-6">
                    @foreach ($posts as $post)
                    <div class="mb-9">
                        <x-post-list-item :post="$post"></x-post-list-item>
                    </div>
                    @endforeach
                </div>
                <div class="mt-8">
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
