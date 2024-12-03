@props(['disabled' => false])

<input @disabled($disabled)
    {{ $attributes->merge(['class' => 'input input-bordered input-primary rounded-md shadow-sm']) }}>
