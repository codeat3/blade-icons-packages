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
                    <x-avatar
                        class="mb-6 object-cover object-center rounded-full"
                        search="{{ $package->author }}"
                        src="{{ $package->author_avatar }}" />

            </div>
            <div class="ml-4">
                <div class="text-sm font-medium text-gray-900">
                    {{ $package->authors }}
                </div>
                <div class="text-sm text-gray-500">
                    {{-- jane.cooper@example.com --}}
                </div>
            </div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-900">{{ $package->package }}</div>
        <div class="text-sm text-gray-500">{{ $package->name }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        <div class="text-sm text-gray-900">{{ $package->latest_version }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        <div class="text-sm text-gray-900">{{ $package->original_package }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        <div class="text-sm text-gray-900">{{ $package->downloads }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        <div class="text-sm text-gray-900">{{ $package->stars }}</div>
    </td>
</tr>
