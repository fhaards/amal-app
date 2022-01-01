<div id="add-payment-modal" aria-hidden="true"
    class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
    <div class="relative w-full max-w-3xl px-4 h-full md:h-auto">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow relative">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-5 border-b rounded-t">
                <h3 class="text-xl lg:text-2xl font-semibold">
                    Tambah Metode Pembayaran
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-toggle="add-payment-modal">
                    <i class="fe fe-x fe-24"></i>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('payment.store') }}" method="post" enctype="multipart/form-data">
                <div class="p-6 space-y-6 w-full">
                    @if (count($errors) > 0)
                        @foreach ($errors->all() as $message)
                            <div id="alert-2" class="flex gap-3 bg-red-100 rounded-lg p-4 mb-4 items-center text-red-700"
                                role="alert">
                                <i class="font-medium fe fe-alert-circle fe-12"></i>
                                <div class="ml-3 text-sm font-medium text-red-700">
                                    {{ $message }}
                                </div>
                                <button type="button"
                                    class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8"
                                    data-collapse-toggle="alert-2" aria-label="Close">
                                    <span class="sr-only">Dismiss</span>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        @endforeach
                    @endif
                    @csrf
                    <div class="flex mb-6 w-full gap-2 sm:flex-row flex-col">
                        <div class="sm:w-1/2 mb-4 space-y-1">
                            <label class="text-gray-500 font-bold" for="name">Nama Metode</label>
                            <input type="text" id="Name" name="payment_name"
                                class="font-semibold capitalize  border border-gray-300  sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder=" Nama Bank / Digital Bank" value="" required>
                        </div>
                        <div class="sm:w-1/2 mb-4 space-y-1">
                            <label class="text-gray-500 font-bold" for="category">Kategori</label>
                            <select name="category"
                                class="font-semibold capitalize  border border-gray-300  sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                required>
                                <option value="Transfer Bank">Transfer Bank</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-6 space-y-2">
                        <label class="text-gray-500 font-bold" for="payment_notes">Catatan Pembayaran</label>
                        <textarea name="payment_notes" id="editor"
                            class="font-semibold border border-gray-300  sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                            rows="10" cols="50"></textarea>
                    </div>
                    <div class="mb-6 space-y-2">
                        <label class="text-gray-500 font-bold" for="image">Logo</label>
                        <input
                            class="block w-full cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 focus:outline-none focus:border-transparent text-sm rounded-lg
                                    @error('image') is-invalid @enderror"
                            aria-describedby="user_avatar_help" id="image" name="image" type="file">
                    </div>

                </div>
                <!-- Modal footer -->
                <div class="flex space-x-2 items-center p-6 border-t border-gray-200 rounded-b">
                    <div class="flex flex-1"></div>
                    <button data-modal-toggle="add-payment-modal" type="submit"
                        class="text-white bg-primary hover:bg-primary focus:ring-4 focus:ring-green-300 font-bold rounded-lg text-xs px-3 py-2 text-center inline-flex gap-2 items-center">
                        Submit
                    </button>
                    <button data-modal-toggle="add-payment-modal" type="button"
                        class="text-white bg-gray-400 hover:bg-gray-500 focus:ring-4 focus:ring-gray-300 font-bold rounded-lg text-xs px-3 py-2 text-center inline-flex gap-2 items-center">
                        Decline
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
