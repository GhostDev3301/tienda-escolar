@props(['active'=>false])

<span {{ $attributes->merge([
  'class' => ($active ? 'bg-primary text-white' : 'bg-white text-gray-700 hover:bg-gray-100')
            . ' inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-gray-200 text-sm transition'
  ]) }}>
  {{ $slot }}
</span>
