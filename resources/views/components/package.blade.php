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
                        <x-avatar
                            class="mb-6 object-cover object-center rounded-full"
                            title="{{ $maintainer['name'] }}"
                            search="{{ $maintainer['name'] }}"
                            src="{{ $maintainer['avatar_url'] }}" />
                    @endforeach

                    {{-- <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt=""> --}}

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
        <div class="text-sm text-gray-500">{{ $package->package }}</div>
        <div class="text-sm text-gray-500">Listed on Blade Icon README - {{ $package->listed_on_blade_icon_readme ? 'yes' : 'no' }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        <div class="text-sm text-gray-900">{{ $package->latest_version }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        <div class="text-sm text-gray-900">{{ $package->original_package['name'] }}</div>
        <div class="text-sm text-gray-500">{{ $package->original_package['url'] }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        <div class="text-sm text-gray-900">{{ $package->downloads }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        <div class="text-sm text-gray-900">{{ $package->stars }}</div>
    </td>
</tr>
