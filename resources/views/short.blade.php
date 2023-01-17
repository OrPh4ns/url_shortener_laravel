<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Short') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">


            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <!-- Start Form -->
                <form method="post" action="{{ route('short.insert') }}" class="mt-6 space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="url" :value="__('Url link')" />
                        <x-text-input id="url" name="url" type="text" class="mt-1 block w-full" required autofocus autocomplete="url" />
                        <x-input-error class="mt-2" :messages="$errors->get('url')" />
                    </div>

                    @if (session('success'))
                        <div class="mt-2">
                            <p class="accent-green-600">
                                {{ session('success') }}
                            </p>
                            <a href="http://url/{{ session('shorted_url') }}" class="accent-green-600">
                                http://url/{{ session('shorted_url') }}
                            </a>
                        </div>
                    @endif

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Generate') }}</x-primary-button>
                    </div>
                </form>
                <!-- End Form -->

            </div>
        </div>

    </div>

</x-app-layout>
