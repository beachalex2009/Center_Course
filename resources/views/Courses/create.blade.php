<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Add New Course
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{--  @if ($errors->any())
                        <div class="bg-red-300 text-red-700 rounded border border-red-500 p-5 m-2">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-800 font-bold">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <form enctype="multipart/form-data" method="POST" action="{{ route('Courses.store') }}"
                        class="border rounded-2xl p-2">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <x-input-label for='name'>Name</x-input-label>
                                <x-text-input value="{{ old('name') }}" class="w-full" name='name'></x-text-input>
                                @error('name')
                                    <x-input-label for='name'
                                        class="text-red-800 font-bold">{{ $message }}</x-input-label>
                                @enderror
                            </div>
                            <div>
                                <x-input-label for='hours'>hours</x-input-label>
                                <x-text-input value="{{ old('hours') }}" class="w-full" name='hours'></x-text-input>
                                @error('hours')
                                    <x-input-label for='hours'
                                        class="text-red-800 font-bold">{{ $message }}</x-input-label>
                                @enderror
                            </div>
                            <div>
                                <x-input-label for='price'>price</x-input-label>
                                <x-text-input value="{{ old('price') }}" class="w-full" name='price'></x-text-input>
                                @error('price')
                                    <x-input-label for='price'
                                        class="text-red-800 font-bold">{{ $message }}</x-input-label>
                                @enderror
                            </div>
                        </div>
                        <div class="flex justify-end mt-3">
                            <x-primary-button>
                                Save
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
