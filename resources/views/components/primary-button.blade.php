<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-active btn-primary transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
