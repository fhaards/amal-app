<div id="detail-trans-modal" aria-hidden="true"
    class="modal hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-10 left-0 right-0 md:inset-0 z-50 justify-center md:items-center items-end">
    <div class="relative w-full max-w-3xl md:px-4 h-100 md:h-auto ">
        <!-- Modal content -->
        <div class=" bg-white md:rounded-lg shadow relative"
            class="absolute inset-y-0 left-1/2 h-20 flex items-center pl-12 pr-3 space-x-2 bg-gray-800 rounded-tr-full rounded-br-full">
            <!-- Modal header -->
            <div class="flex items-center justify-between px-5 py-3 border-b rounded-t">
                <h3 class="text-lg lg:text-lg font-semibold">
                    Detail Transaksi
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg p-1.5 ml-auto inline-flex items-center"
                    data-modal-toggle="detail-trans-modal">
                    <i class="fe fe-x fe-24"></i>
                </button>
            </div>
            <div class="flex flex-wrap px-5 py-3 w-full border-b justify-between items-center">
                <div
                    class="flex flex-col sm:gap-3 sm:flex-row text-md text-xs lg:text-md font-semibold text-gray-600 sm:mb-0 mb-4">
                    <span>ID :</span>
                    <span class="detail-trans-id py-0 uppercase tracking-widest text-blue-600"></span>
                </div>
                <div class="detail-trans-status text-right"></div>
            </div>
            <div class="p-6 space-y-6 overflow-y-auto max-h-96">
                <div class="owner-info rounded-lg py-3 px-5 flex flex-col border">
                    <div class="flex flex-col md:flex-row gap-3 py-2 border-b">
                        <div class="font-semibold md:w-48 pb-0">Nama</div>
                        <div class="detail-owner-name py-0"></div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-3 py-2 border-b">
                        <div class="font-semibold md:w-48 pb-0">No. Telpon</div>
                        <div class="detail-owner-phone py-0"></div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-3 py-2">
                        <div class="font-semibold md:w-48">Alamat</div>
                        <div class="detail-owner-address"></div>
                    </div>
                </div>
                <div class="owner-info rounded-lg py-3 px-5 flex flex-col border">
                    <div class="flex flex-col md:flex-row gap-3 py-2 border-b">
                        <div class="font-semibold  md:w-48 pb-0">Nama Lain </div>
                        <div class="detail-trans-aliases py-0"></div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-3 py-2 border-b">
                        <div class="font-semibold md:w-48 pb-0">Nominal </div>
                        <div class="detail-trans-amount py-0"></div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-3 py-2">
                        <div class="font-semibold  md:w-48 pb-0">Tanggal </div>
                        <div class="detail-trans-created py-0"></div>
                    </div>
                </div>


                <div class="upload-proofment owner-info rounded-lg py-3 px-5 flex flex-col border">
                    <form method="POST" id="update-transaction" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id_transaction" class="detail-trans-input-id">
                        @if ($user->user_group == 'user')
                            <label class="block capitalize tracking-wide text-gray-500 text-sm font-bold mb-2"
                                for="photo">
                                Upload Bukti Pembayaran
                            </label>
                            <input
                                class="@error('file') is-invalid @enderror block w-full cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 focus:outline-none focus:border-transparent text-sm rounded-lg"
                                aria-describedby="user_avatar_help" id="user_avatar" name="file" type="file">
                            @include('components/save-button')
                        @endif
                    </form>
                    <div class="flex flex-col sm:flex-row sm:flex-between gap-3" id="img-proofment">
                        <div class="font-semibold md:w-48 pb-0">Transfer Proofment</div>
                        <div class="img-proofment-file"></div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
