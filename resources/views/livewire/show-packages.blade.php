<div>
    <!-- Search:START -->
    <div class="my-5 md:mt-0 md:col-span-2">
        <form action="#" method="POST">
            <div class="border-2 border-gray-100 shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                            <input type="text" wire:model.debounce.500ms="search" autocomplete="search" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <label for="sort_by" class="block text-sm font-medium text-gray-700">Sort By</label>
                            <select wire:model="sort_by" autocomplete="sort_by" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option>--</option>
                                <option value="name">Name</option>
                                <option value="downloads">Downloads</option>
                                <option value="stars">Stars</option>
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-1">
                            <label for="sort_order" class="block text-sm font-medium text-gray-700">Sort Order</label>
                            <select wire:model="sort_order" autocomplete="sort_order" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="asc">ASC</option>
                                <option value="desc">DESC</option>
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <fieldset>
                                <div>
                                    <legend class="text-base font-medium text-gray-900">Blade Icons README</legend>
                                    <p class="text-sm text-gray-500">

                                    </p>
                                </div>
                                <div class="mt-4 space-y-1 text-gray-600">
                                    <div class="flex items-center">
                                        <input id="listed_on_readme_yes" wire:model="listed_on_readme" name="listed_on_readme" type="radio" value="yes" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                        <label for="listed_on_readme_yes" class="ml-3 block text-sm font-medium text-gray-700">
                                            Listed
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="listed_on_readme_no" wire:model="listed_on_readme" name="listed_on_readme" type="radio" value="no" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                        <label for="listed_on_readme_no" class="ml-3 block text-sm font-medium text-gray-700">
                                            Not Listed
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="listed_on_readme_all" wire:model="listed_on_readme" name="listed_on_readme" type="radio" value="all" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                        <label for="listed_on_readme_all" class="ml-3 block text-sm font-medium text-gray-700">
                                            All
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Search:END -->
    <!-- Meta Data: START -->
    <!-- <div class="mt-10></div> -->
    <div class=" my-5 md:mt-0 md:col-span-2">
        <div class="overflow-hidden sm:rounded-md text-right">
            <span class="px-4 text-sm text-gray-500">
                <span class="font-bold">Total Downloads:</span> {{ number_format($packages->sum('downloads')) }}
            </span>
            <span class="px-4 text-sm text-gray-500">
                <span class="font-bold">Total Stars:</span> {{ number_format($packages->sum('stars')) }}
            </span>
            <span class="px-4 text-sm text-gray-500">
                <span class="font-bold">Package Count:</span> {{ $packages->count() }} / {{ $total_packages }}
            </span>
            <span class="px-4 text-sm text-gray-500">
                <span class="font-bold">Last Updated:</span> {{ $updated_at->diffForHumans() }}
            </span>
        </div>
    </div>
    <!-- Meta Data: END -->
    <!-- Table: START -->
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Maintainers
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Package
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Listed on <br />Blade Icon README
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Latest Version
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Original Source
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Downloads
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Stars
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($packages as $package)
                            <x-package :package="$package" />
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Table: END -->
</div>
