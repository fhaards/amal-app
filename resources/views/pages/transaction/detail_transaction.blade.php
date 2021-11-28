<div id="detail-trans-modal" aria-hidden="true"
    class=" hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-10 left-0 right-0 md:inset-0 z-50 justify-center md:items-center items-end">
    <div class="relative w-full max-w-3xl md:px-4 h-100 md:h-auto ">
        <!-- Modal content -->
        <div class=" bg-white md:rounded-lg shadow relative" 
            class="absolute inset-y-0 left-1/2 h-20 flex items-center pl-12 pr-3 space-x-2 bg-gray-800 rounded-tr-full rounded-br-full"
            <!-- Modal header -->
            <div class="flex items-start justify-between p-5 border-b rounded-t">
                <h3 class="text-xl lg:text-2xl font-semibold">
                    Detail Transaction
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg p-1.5 ml-auto inline-flex items-center"
                    data-modal-toggle="detail-trans-modal">
                    <i class="fe fe-x fe-24"></i>
                </button>
            </div>
            <div class="p-6 space-y-6 overflow-y-auto max-h-96">
                <div class="flex py-3">
                    <div class="detail-trans-status text-right"></div>
                </div>
                <div class="owner-info bg-gray-50 rounded-lg py-3 px-5 flex flex-col border">
                    <div class="flex flex-col md:flex-row gap-3 py-1 border-b">
                        <div class="font-semibold md:w-48">Name</div>
                        <div class="detail-owner-name"></div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-3 py-1 border-b">
                        <div class="font-semibold md:w-48">User Phone</div>
                        <div class="detail-owner-phone"></div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-3 py-1">
                        <div class="font-semibold md:w-48">Address</div>
                        <div class="detail-owner-address"></div>
                    </div>
                </div>
                <div class="owner-info bg-gray-50 rounded-lg py-3 px-5 flex flex-col border">
                    <div class="flex flex-col md:flex-row gap-3 py-1 border-b">
                        <div class="font-semibold  md:w-48">Aliases </div>
                        <div class="detail-trans-aliases"></div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-3 py-1 border-b">
                        <div class="font-semibold md:w-48">Amount </div>
                        <div class="detail-trans-amount"></div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-3 py-1 border-b">
                        <div class="font-semibold  md:w-48">Date </div>
                        <div class="detail-trans-created"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
