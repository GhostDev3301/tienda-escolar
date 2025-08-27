@props(['title','subtitle'=>null])
<div class="mb-6">
  <h2 class="text-2xl md:text-3xl font-bold">{{ $title }}</h2>
  @if($subtitle)
    <p class="text-gray-600">{{ $subtitle }}</p>
  @endif
</div>
