<div {{ $attributes->merge([
    'class' => 'bg-card border border-border rounded-xl shadow-lg p-6 transition-all duration-200 hover:shadow-xl hover:-translate-y-1'
]) }}>
    {{ $slot }}
</div>