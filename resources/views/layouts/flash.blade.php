@if ($message = Session::get('success'))
    <div class="fixed inset-x-0 bottom-0 flex justify-end">
        <div x-data="{ show: false }" x-init="() => {
            setTimeout(() => show = true, 500);
            setTimeout(() => show = false, 5000);
        }" x-show="show">
            <div class="m-2 border-2 border-green-500 p-2 rounded">
                <span class="mr-6">
                    {{ $message }}
                </span>
                <button @click="show=false" class="bg-blue-300 py-2 px-4 rounded">
                    {{ __('Close') }}
                </button>
            </div>
        </div>
    </div>
@endif
