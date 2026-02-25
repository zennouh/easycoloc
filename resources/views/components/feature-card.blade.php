@props([
    'title',
    'description',
    'icon',
])

<x-card class="text-center flex flex-col items-center">
    <div class="p-4 bg-primary/10 rounded-full text-primary mb-4">
        {{ $icon }}
    </div>

    <h3 class="text-xl font-semibold mb-2">
        {{ $title }}
    </h3>

    <p class="text-muted-foreground">
        {{ $description }}
    </p>
</x-card>