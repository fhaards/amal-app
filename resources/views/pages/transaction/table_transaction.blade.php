@extends('pages.user.profile')

@section('profile-contents')
    <div class="md:mt-0 mt-4 flex flex-1 flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden sm:rounded-xl shadow-sm">
                    <table class="min-w-full w-100 h-100 table-list" id="">
                        <thead class="border rounded-t-xl bg-gray-100">
                            <tr class="">
                                <th scope="col"
                                    class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider">
                                    Transaction Id
                                </th>
                                <th scope="col"
                                    class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider">
                                    Aliases
                                </th>
                                <th scope="col"
                                    class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider">
                                    Amount
                                </th>
                                <th scope="col"
                                    class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider">
                                    Date
                                </th>
                                <th scope="col"
                                    class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider">
                                    Status
                                </th>
                                {{-- <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th> --}}
                            </tr>
                        </thead>
                        <tbody class="w-full h-full">
                            @for ($i = 0; $i < 10; $i++)
                                <!-- Product 1 -->
                                <tr class="bg-white mt-5 border border-b w-full hover:bg-gray-50 ">
                                    <td class="spaceUnder w-16 px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        @php echo md5(date('dmY')); @endphp
                                    </td>
                                    <td class=" spaceUnder text-sm text-gray-500 px-6 py-4 whitespace-nowrap">
                                        Sliver
                                    </td>
                                    <td class="spaceUnder text-sm text-gray-500 px-6 py-4 whitespace-nowrap">
                                        Rp. 2,500,000 
                                    </td>
                                    <td class="spaceUnder text-sm text-gray-500 px-6 py-4 whitespace-nowrap">
                                        NOV 23 2021
                                    </td>
                                    <td class="spaceUnder text-sm text-gray-500 px-6 py-4 whitespace-nowrap">
                                        Paid
                                    </td>
                                    {{-- <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit</a>
                                    </td> --}}
                                </tr>
                            @endfor
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
