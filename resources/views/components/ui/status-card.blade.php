@props(['status', 'description'])
<div class="status-card {{ $status }}">
    <span class="description"> {{ $description }} </span>

    {{ $slot }}
</div>