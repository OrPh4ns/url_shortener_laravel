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
                <table class="table-auto w-full text-gray-700">
                    <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Orginal</th>
                        <th class="px-4 py-2">Shorted</th>
                        <th class="px-4 py-2">Delete</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($shorts as $short)
                        <tr class="hover:bg-gray-100">
                            <td class="border px-4 py-2">{{ $short->orginal_url }}</td>
                            <td class="border px-4 py-2">{{ Request::getHttpHost().'/'.$short->shorted_url }}</td>
                            <td class="border px-4 py-2 items-center"><form>
                                    <div class="flex text-center gap-4">
                                        <x-primary-button>{{ __('Delete') }}</x-primary-button>
                                    </div>
                                </form></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                <!-- End Form -->

            </div>
        </div>

    </div>

</x-app-layout>
