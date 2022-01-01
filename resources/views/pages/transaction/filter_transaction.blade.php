<form method="GET" action="{{ route('transaction.index') }}"
    class="flex flex-nowrap gap-2 items-center jusify-between w-full overflow-x-auto py-4 bg-gray-100 p-2 border rounded-xl mb-3">
    <div class="w-6/12 pl-5">
        <p class="uppercase tracking-widest text-gray-800 font-bold text-xs">Filter</p>
    </div>
    <div class="w-6/12 flex flex-row justify-content-end gap-2">
        <select id="order_date" name="order_date"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-8 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">-- Sort Date -- </option>
            <option value="asc" {{ $urlquery['ordate'] == 'asc' ? 'Selected' : '' }}>Ascending</option>
            <option value="desc" {{ $urlquery['ordate'] == 'desc' ? 'Selected' : '' }}>Descending</option>
        </select>

        <select id="status" name="status"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-8 py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">-- Select Status -- </option>
            <option value="Unpaid" {{ $urlquery['status'] == 'Unpaid' ? 'Selected' : '' }}>Unpaid</option>
            <option value="Paid / Waiting" {{ $urlquery['status'] == 'Paid / Waiting' ? 'Selected' : '' }}>Paid / Waiting</option>
            <option value="Complete" {{ $urlquery['status'] == 'Complete' ? 'Selected' : '' }}>Complete</option>
        </select>

        <div>
            <button type="submit"
                class="bg-primary hover:bg-green-600 inline-flex items-center justify-center text-xs p-2.5 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                    stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="4" y1="21" x2="4" y2="14"></line>
                    <line x1="4" y1="10" x2="4" y2="3"></line>
                    <line x1="12" y1="21" x2="12" y2="12"></line>
                    <line x1="12" y1="8" x2="12" y2="3"></line>
                    <line x1="20" y1="21" x2="20" y2="16"></line>
                    <line x1="20" y1="12" x2="20" y2="3"></line>
                    <line x1="1" y1="14" x2="7" y2="14"></line>
                    <line x1="9" y1="8" x2="15" y2="8"></line>
                    <line x1="17" y1="16" x2="23" y2="16"></line>
                </svg>
            </button>
        </div>
    </div>
</form>
