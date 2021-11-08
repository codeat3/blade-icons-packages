{{-- {{ dd($package) }} --}}
{{-- "id" => "1"
"package" => "codeat3/blade-academicons"
"name" => "Blade Academicons"
"original_package" => null
"latest_version" => "1.0.1"
"downloads" => "55"
"stars" => "1"
"author_name" => "swapnilsarwe"
"author_avatar" => "https://www.gravatar.com/avatar/0a4d4844e866bb689ea4602071e9dfe7?d=identicon"
] --}}
<tr>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
            <div class="flex-shrink-0 h-10 w-10">
                <div class="flex -space-x-2 overflow-hidden">
                    @foreach ($package->maintainers as $maintainer)
                    <x-avatar class="mb-6 object-cover object-center rounded-full" title="{{ $maintainer['name'] }}"
                        search="{{ $maintainer['name'] }}" src="{{ $maintainer['avatar_url'] }}" />
                    @endforeach
                </div>
            </div>
            <div class="ml-4">
                <div class="text-sm font-medium text-gray-900">
                    {{ $package->author_name }}
                </div>
                <div class="text-sm text-gray-500">
                    {{-- jane.cooper@example.com --}}
                </div>
            </div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-900">{{ $package->name }}</div>
        <div class="text-sm text-gray-500">
            <a href="{{ $package->package_url }}" title="{{ $package->package }}" class="hover:underline">
                {{ $package->package }}
            </a>
        </div>

    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        <div class="flex items-center">
            <div class="text-sm text-gray-900">
                @if($package->listed_on_blade_icon_readme)
                <span class="text-green-400">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.2426 16.3137L6 12.071L7.41421 10.6568L10.2426 13.4853L15.8995 7.8284L17.3137 9.24262L10.2426 16.3137Z"
                            fill="currentColor" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12ZM12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21Z"
                            fill="currentColor" />
                    </svg>
                </span>
                @else
                <span class="text-red-500">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.3394 9.32245C16.7434 8.94589 16.7657 8.31312 16.3891 7.90911C16.0126 7.50509 15.3798 7.48283 14.9758 7.85938L12.0497 10.5866L9.32245 7.66048C8.94589 7.25647 8.31312 7.23421 7.90911 7.61076C7.50509 7.98731 7.48283 8.62008 7.85938 9.0241L10.5866 11.9502L7.66048 14.6775C7.25647 15.054 7.23421 15.6868 7.61076 16.0908C7.98731 16.4948 8.62008 16.5171 9.0241 16.1405L11.9502 13.4133L14.6775 16.3394C15.054 16.7434 15.6868 16.7657 16.0908 16.3891C16.4948 16.0126 16.5171 15.3798 16.1405 14.9758L13.4133 12.0497L16.3394 9.32245Z"
                            fill="currentColor" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12ZM12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21Z"
                            fill="currentColor" />
                    </svg>
                </span>
                @endif
            </div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        <div class="text-sm text-gray-900">{{ $package->latest_version }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        <div class="text-sm text-gray-900">{{ $package->original_package['name'] }}</div>
        <div class="text-sm text-gray-500">
            <a target="_blank" href="{{ $package->original_package['url'] }}" title="{{ $package->original_package['name'] }}" class="hover:underline">
                {{ $package->original_package['url'] }}
            </a>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        <div class="text-sm text-gray-900">
        <a target="_blank" href="{{ $package->packagist_stats_url }}" title="{{ $package->name }}" class="hover:underline">
        {{ number_format($package->downloads) }}
        </a>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        <div class="text-sm text-gray-900">{{ number_format($package->stars) }}</div>
    </td>
</tr>
