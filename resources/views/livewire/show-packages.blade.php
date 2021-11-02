<div>
    <!-- Search:START -->
    <div class="my-5 md:mt-0 md:col-span-2">
        <form action="#" method="POST">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                            <input type="text" wire:model.debounce.500ms="search" autocomplete="search"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <label for="sort_by" class="block text-sm font-medium text-gray-700">Sort By</label>
                            <select wire:model="sort_by" autocomplete="sort_by"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option>--</option>
                                <option value="name">Name</option>
                                <option value="downloads">Downloads</option>
                                <option value="stars">Stars</option>
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-1">
                            <label for="sort_order" class="block text-sm font-medium text-gray-700">Sort Order</label>
                            <select wire:model="sort_order" autocomplete="sort_order"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="asc">ASC</option>
                                <option value="desc">DESC</option>
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input wire:model="listed_on_readme" type="checkbox"
                                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="listed_on_readme" class="font-medium text-gray-700">Blade Icons
                                        README</label>
                                    <p class="text-gray-500">Filter packages listed on <a
                                            href="https://github.com/blade-ui-kit/blade-icons">Blade Icons README</a>.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Search:END -->
    <div class="my-5 md:mt-0 md:col-span-2">
        <div class="overflow-hidden sm:rounded-md text-right">
            <span class="px-4  text-xs font-medium text-gray-500">
                Last Updated At: {{ $updated_at->diffForHumans() }}
            </span>
        </div>
    </div>
    <!-- Table: START -->
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Maintainers
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Package
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Listed on <br />Blade Icon README
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Latest Version
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Original Source
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Downloads
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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
