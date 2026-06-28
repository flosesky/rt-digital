<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => '
            w-full
            inline-flex
            justify-center
            items-center
            px-4
            py-3
            bg-green-600
            hover:bg-green-700
            active:bg-green-800
            text-white
            font-semibold
            rounded-xl
            shadow-lg
            transition
            duration-300
            ease-in-out
            focus:outline-none
            focus:ring-4
            focus:ring-green-300
        '
    ]) }}
>
    {{ $slot }}
</button>