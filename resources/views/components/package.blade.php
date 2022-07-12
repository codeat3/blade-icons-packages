<tr>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
            <div class="flex -space-x-2 overflow-hidden">
                @foreach ($package->maintainers as $maintainer)
                    <a href="https://github.com/{{ $maintainer['name'] }}" target="_blank">
                    <x-avatar
                        class="inline-block h-8 w-8 rounded-full ring-2 ring-white"
                        title="{{ $maintainer['name'] }}"
                        search="{{ $maintainer['name'] }}"
                        src="{{ $maintainer['avatar_url'] }}" />
                    </a>
                @endforeach
              </div>

            <div class="ml-4">
                <div class="text-sm font-medium text-gray-900">
                    {{-- {{ $package->author_name }} --}}
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
                    <x-success />
                @else
                    <x-failure />
                @endif
            </div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        <div class="text-sm text-gray-900">{{ $package->latest_version }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        <x-original-package :package="$package" />
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
