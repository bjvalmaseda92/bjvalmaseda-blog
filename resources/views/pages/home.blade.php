<x-app-layout>
    <div class="bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto py-8 sm:py-24 lg:py-8 lg:max-w-none">
                <h2 class="text-2xl font-extrabold text-gray-900">Collections</h2>

                <div class="mt-6 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-6">
                    <x-post-list-item></x-post-list-item>
                    <x-post-list-item></x-post-list-item>
                    <x-post-list-item></x-post-list-item>
                    <x-post-list-item></x-post-list-item>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>