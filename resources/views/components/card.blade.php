<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <div class="card rounded-lg border-0">
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
    </div>

    <div {{ $attributes->merge(['class' => '']) }}>
        {{ $slot }}
    </div>
</div>
</div>