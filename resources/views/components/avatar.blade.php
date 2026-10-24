@props(['search' => null, 'src' => null])

<img src="{{ $src ?: 'https://unavatar.io/github/' . urlencode($search) }}"
     alt="{{ $attributes->get('title') ?? $search }}"
     loading="lazy"
     {{ $attributes }} />
