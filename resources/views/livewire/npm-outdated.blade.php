<x-pulse::card :cols="$cols" :rows="$rows" :class="$class" wire:poll.5s="">
    <x-pulse::card-header name="Outdated Npm Packages"
                          details="{{ $timestamp? \Illuminate\Support\Carbon::createFromTimestamp($timestamp)->format('d/m/y H:i'): ' - ' }}">
        <x-slot:icon>
            <x-pulse::icons.clock/>
        </x-slot:icon>
    </x-pulse::card-header>
    <x-pulse::scroll :expand="$expand">
        <div class="grid grid-cols-3 gap-3 text-center">
        </div>
        <div>
            <x-pulse::table>
                <colgroup>
                    <col width="55%" /> <!-- Name Column -->
                    <col width="15%" /> <!-- Current Version -->
                    <col width="15%" /> <!-- Wanted Version -->
                    <col width="15%" /> <!-- Latest Version -->

                </colgroup>
                <x-pulse::thead>
                    <tr>
                        <x-pulse::th class="text-left">Name</x-pulse::th>
                        <x-pulse::th class="text-right">Current</x-pulse::th>
                        <x-pulse::th class="text-right">Wanted</x-pulse::th>
                        <x-pulse::th class="text-right">Latest</x-pulse::th>
                    </tr>
                </x-pulse::thead>
                <tbody>
                @if(count($packages) > 0)

                    @foreach ($packages as $name => $package)
                        <tr wire:key="{{ $name }}-row">
                            <x-pulse::td class="max-w-[1px] text-left">
                                <code class="block text-xs text-gray-900 dark:text-gray-100 truncate" title="{{ $name }}">
                                    {{ $name }}
                                </code>
                            </x-pulse::td>
                            <x-pulse::td class="max-w-[1px] text-right">
                                <code class="block text-xs text-gray-900 dark:text-gray-100" title="{{ $package['current'] }}">
                                    {{ $package['current'] }}
                                </code>
                            </x-pulse::td>
                            <x-pulse::td class="max-w-[1px] text-right">
                                <code class="block text-xs text-gray-900 dark:text-gray-100" title="{{ $package['wanted'] }}">
                                    {{ $package['wanted'] }}
                                </code>
                            </x-pulse::td>
                            <x-pulse::td class="max-w-[1px] text-right">
                                <code class="block text-xs text-gray-900 dark:text-gray-100" title="{{ $package['latest'] }}">
                                    {{ $package['latest'] }}
                                </code>
                            </x-pulse::td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500 dark:text-gray-400">
                            No outdated packages found.
                        </td>
                    </tr>
                @endif
                </tbody>
            </x-pulse::table>
        </div>
    </x-pulse::scroll>
</x-pulse::card>
