<x-admin.layout>
    <x-slot:title>Image Gallery</x-slot>
    <x-slot:header>Image Gallery</x-slot>

    <div class="bg-white rounded-lg shadow-sm">
        <!-- Header -->
        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
            <div>
                <h2 class="text-lg font-semibold text-gray-900">Gallery Images</h2>
                <p class="mt-1 text-sm text-gray-500">Manage your gallery images here.</p>
            </div>
            <a href="{{ route('admin.images.create') }}"
               class="bg-[#219EBC] text-white px-4 py-2 rounded-lg hover:bg-[#219EBC]/90 transition-colors">
                Add New Image
            </a>
        </div>

        <!-- Gallery Grid -->
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($images as $image)
                    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                        <div class="aspect-video relative">
                            <img src="{{ Storage::url($image->image_path) }}"
                                 alt="{{ $image->title }}"
                                 class="absolute inset-0 w-full h-full object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900">{{ $image->title }}</h3>
                            <p class="text-sm text-gray-500 mt-1">{{ $image->category }}</p>
                            @if($image->description)
                                <p class="text-sm text-gray-600 mt-2">{{ $image->description }}</p>
                            @endif
                            <div class="mt-4 flex gap-2">
                                <a href="{{ route('admin.images.edit', $image) }}"
                                   class="text-sm text-[#219EBC] hover:text-[#219EBC]/90">Edit</a>
                                <form action="{{ route('admin.images.destroy', $image) }}"
                                      method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this image?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-sm text-red-600 hover:text-red-700">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500">No images found. Start by adding some images to your gallery.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $images->links() }}
            </div>
        </div>
    </div>
</x-admin.layout>
