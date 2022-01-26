<div id="delete-slider-modal" aria-hidden="true"
    class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-10 left-0 right-0 md:inset-0 z-50 justify-center md:items-center items-end">
    <div class="relative w-full max-w-xl md:px-4 h-100 md:h-auto ">
        <!-- Modal content -->
        <div class=" bg-white md:rounded-lg shadow relative transition-overlay duration-300"
            class="absolute inset-y-0 left-1/2 h-20 flex items-center pl-12 pr-3 space-x-2 bg-gray-800 rounded-tr-full rounded-br-full">
            <!-- Modal header -->
            <div class="flex items-center justify-between px-5 py-3 border-b rounded-t">
                <h3 class="text-lg lg:text-lg font-semibold">
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg p-1.5 ml-auto inline-flex items-center"
                    data-modal-toggle="delete-slider-modal">
                    <i class="fe fe-x fe-24"></i>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="p-6 space-y-6 overflow-y-auto max-h-96">
                <form method="POST" id="delete-slider" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    {{-- <input type="text" name="id_slider" value=""> --}}
                    <div class="flex flex-col gap-3">
                        <div>
                            <h4 class="text-2xl font-bold text-gray-700 text-center">
                                Yakin Menghapus Data ?
                            </h4>
                        </div>
                        <div class="flex flex-row-reverse">
                            <button type="submit"
                                class="mt-6 text-white bg-red-600 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                <i class="fe fe-trash fe-14 mr-3 text-bold"></i> Hapus
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
