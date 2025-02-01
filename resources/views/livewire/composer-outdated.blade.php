<x-pulse::card :cols="$cols" :rows="$rows" :class="$class" wire:poll.5s="">
    <x-pulse::card-header name="Outdated Composer Packages"
                          details="{{$timestamp? \Illuminate\Support\Carbon::createFromTimestamp($timestamp)->format('d/m/y H:i') : '-' }}"
    >
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
                    <col width="30%" /> <!-- Name Column -->
                    <col width="15%" /> <!-- Current Version -->
                    <col width="15%" /> <!-- Latest Version -->
                    <col width="15%" /> <!-- Release Age -->
                    <col width="15%" /> <!-- Repository Link -->
                    <col width="10%" /> <!-- Abandoned Status -->
                </colgroup>
                <x-pulse::thead>
                    <tr>
                        <x-pulse::th class="text-left">Name</x-pulse::th>
                        <x-pulse::th class="text-right">Current</x-pulse::th>
                        <x-pulse::th class="text-right">Latest</x-pulse::th>
                        <x-pulse::th class="text-right">Release Age</x-pulse::th>
                        <x-pulse::th class="text-left">Repository</x-pulse::th>
                        <x-pulse::th class="text-right whitespace-nowrap">Abandoned</x-pulse::th>
                    </tr>
                </x-pulse::thead>
                <tbody>
                @if(count($packages) > 0)
                    @foreach ($packages as $package)
                        <tr wire:key="{{ $package['name'] }}-row">
                            <x-pulse::td class="max-w-[1px] text-left">
                                <code class="block text-xs text-gray-900 dark:text-gray-100 truncate" title="{{ $package['name'] }}">
                                    {{ $package['name'] }}
                                </code>
                            </x-pulse::td>
                            <x-pulse::td class="max-w-[1px] text-right">
                                <code class="block text-xs text-gray-900 dark:text-gray-100" title="{{ $package['version'] }}">
                                    {{ $package['version'] }}
                                </code>
                            </x-pulse::td>
                            <x-pulse::td class="max-w-[1px] text-right">
                                <code class="block text-xs text-gray-900 dark:text-gray-100" title="{{ $package['latest'] }}">
                                    {{ $package['latest'] }}
                                </code>
                            </x-pulse::td>
                            <x-pulse::td class="max-w-[1px] text-right">
                                <code class="block text-xs text-gray-900 dark:text-gray-100" title="{{ $package['release-age'] }}">
                                    {{ $package['release-age'] }}
                                </code>
                            </x-pulse::td>
                            <x-pulse::td class="max-w-[1px] text-left">
                                <a href="{{ $package['source'] }}" target="_blank" rel="noopener noreferrer"
                                   class="block text-xs text-blue-500 hover:underline truncate" title="{{ $package['source'] }}">
                                    {{ Str::limit($package['source'], 30, '...') }}
                                </a>
                            </x-pulse::td>
                            <x-pulse::td class="max-w-[1px] text-right">
                                <code class="block text-xs text-red-300 dark:text-gray-100" title="{{ $package['abandoned'] ? 'Yes' : 'No' }}">
                                    {{ $package['abandoned'] ? 'Yes' : 'No' }}
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
