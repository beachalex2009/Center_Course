<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Edit Course
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{--  @if ($errors->any())
                        <div class="p-5 m-2 text-red-700 bg-red-300 border border-red-500 rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="font-bold text-red-800">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <form enctype="multipart/form-data" method="POST" action="{{ route('Courses.update', $Course->id) }}"
                        class="p-2 border rounded-2xl">
                        @csrf
                        @method('PATCH')
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <x-input-label for='name'>Name</x-input-label>
                                <x-text-input value="{{ old('name', $Course->name) }}" class="w-full"
                                    name='name'></x-text-input>
                                @error('name')
                                    <x-input-label for='name'
                                        class="font-bold text-red-800">{{ $message }}</x-input-label>
                                @enderror
                            </div>
                            <div>
                                <x-input-label for='hours'>hours</x-input-label>
                                <x-text-input value="{{ old('hours', $Course->hours) }}" class="w-full"
                                    name='hours'></x-text-input>
                                @error('hours')
                                    <x-input-label for='hours'
                                        class="font-bold text-red-800">{{ $message }}</x-input-label>
                                @enderror
                            </div>
                            <div>
                                <x-input-label for='price'>price</x-input-label>
                                <x-text-input value="{{ old('price', $Course->price) }}" class="w-full"
                                    name='price'></x-text-input>
                                @error('price')
                                    <x-input-label for='price'
                                        class="font-bold text-red-800">{{ $message }}</x-input-label>
                                @enderror
                            </div>
                        </div>
                        <div class="flex justify-end mt-3">
                            <x-primary-button>
                                Update
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
