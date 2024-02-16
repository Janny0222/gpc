<button {{ $attributes->merge(['type' => 'submit', 'class' => 'rounded-md inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-green-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-600 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
