<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-active btn-secondary disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
