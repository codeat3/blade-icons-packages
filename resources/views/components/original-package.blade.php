<div class="text-sm text-gray-900">
    {{ $package->original_package['name'] }}
    @if(!empty($package->original_package['twitter']))
    (
        <a target="_blank" href="https://twitter.com/{{ $package->original_package['twitter'] }}" title="{{ $package->original_package['twitter'] }}" class="hover:underline text-gray-500">
        {{ '@'.$package->original_package['twitter'] }}
        </a>
    )
    @elseif(!empty($package->original_package['website']))
    (
        <a target="_blank" href="https://{{ $package->original_package['website'] }}/" title="{{ $package->original_package['website'] }}" class="hover:underline text-gray-500">
        {{ $package->original_package['website'] }}
        </a>
    )
    @endif
</div>
<div class="text-sm text-gray-500">
    <a target="_blank" href="{{ $package->original_package['url'] }}" title="{{ $package->original_package['name'] }}" class="hover:underline">
        {{ $package->original_package['url'] }}
    </a>
</div>
