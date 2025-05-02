<a {{ $attributes(['class' => 'flex items-center gap-1 text-slate-500']) }}>
    <img src="{{ asset('/images/icons8-plus-24.png') }}" alt="add-task" class="size-4">
    <span>{{ $slot }}</span>
</a>
