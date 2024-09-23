<section>

    <div>
        <h1 class="text-2xl font-semibold text-gray-900 mb-2">Users</h1>
        <x-partials.dashboard.breadcumb :data="$breadcumb"> </x-partials.dashboard.breadcumb>

        <div class="py-4 space-y-4">
            <!-- Top Bar -->
            <div class="flex justify-between">
                <div class="w-2/4 flex space-x-4">
                    <x-input.text wire:model.live.debounce.300ms="filters.search" placeholder="Search users..." />
                </div>

                <div class="space-x-2 flex items-center" wire:ignore>
                    <x-input.group borderless paddingless for="perPage" label="Per Page">
                        <x-input.select wire:model.live.debounce.300ms="perPage" id="perPage">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </x-input.select>
                    </x-input.group>

                    <x-dropdown label="Bulk Actions">
                        <x-dropdown.item type="button" wire:click="exportSelected" class="flex items-center space-x-2">
                            <x-icon.download class="text-cool-gray-400" /> <span>Export</span>
                        </x-dropdown.item>

                        <x-dropdown.item type="button" wire:click="$toggle('showDeleteModal')" class="flex items-center space-x-2">
                            <x-icon.trash class="text-cool-gray-400" /> <span>Delete</span>
                        </x-dropdown.item>
                    </x-dropdown>



                    <x-button.primary wire:click="create"><x-icon.plus /> New</x-button.primary>
                </div>
            </div>



            <!-- users Table -->
            <div class="flex-col space-y-4">
                <x-table>
                    <x-slot name="head">
                        <x-table.heading class="pr-0 w-8">
                            <x-input.checkbox wire:model="selectPage" />
                        </x-table.heading>
                        <x-table.heading sortable multi-column wire:click="sortBy('name')" :direction="$sorts['name'] ?? null" class="w-full">Nama</x-table.heading>
                        <x-table.heading sortable multi-column wire:click="sortBy('email')" :direction="$sorts['email'] ?? null">Email</x-table.heading>
                        <x-table.heading>Profile</x-table.heading>
                        <x-table.heading>Join Date</x-table.heading>
                        <x-table.heading>Actions</x-table.heading>
                    </x-slot>

                    <x-slot name="body">
                        @if ($selectPage)
                        <x-table.row class="bg-cool-gray-200" wire:key="row-message">
                            <x-table.cell colspan="6">
                                @unless ($selectAll)
                                <div>
                                    <span>You have selected <strong>{{ $users->count() }}</strong> users, do you want to select all <strong>{{ $users->total() }}</strong>?</span>
                                    <x-button.link wire:click="selectAll" class="ml-1 text-blue-600">Select All</x-button.link>
                                </div>
                                @else
                                <span>You are currently selecting all <strong>{{ $users->total() }}</strong> users.</span>
                                @endif
                            </x-table.cell>
                        </x-table.row>
                        @endif

                        @forelse ($users as $values)
                        <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $values->id }}">
                            <x-table.cell class="pr-0">
                                <x-input.checkbox wire:model="selected" value="{{ $values->id }}" />
                            </x-table.cell>

                            <x-table.cell>
                                <span href="#" class="inline-flex space-x-2 truncate text-sm leading-5">
                                    <p class="text-cool-gray-600 truncate">
                                        {{ $values->name }}
                                    </p>
                                </span>
                            </x-table.cell>

                            <x-table.cell>
                                <span class="text-cool-gray-900 font-medium">{{ $values->email }} </span>
                            </x-table.cell>



                            <x-table.cell>
                                <div class="flex flex-col gallery w-20 ">
                                    <img src="{{ $values->profile }}" alt="image not found" class="gallery-image object-contain rounded-3xl hover:grayscale transition-all duration-700 ease-in-out mx-auto lg:col-span-4 md:col-span-6 w-full h-full">
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                {{ $values->created_at }}
                            </x-table.cell>

                            <x-table.cell>
                                <x-button.link wire:click="edit({{ $values->id }})">Edit</x-button.link>
                            </x-table.cell>
                        </x-table.row>
                        @empty
                        <x-table.row>
                            <x-table.cell colspan="6">
                                <div class="flex justify-center items-center space-x-2">
                                    <x-icon.inbox class="h-8 w-8 text-cool-gray-400" />
                                    <span class="font-medium py-8 text-cool-gray-400 text-xl">No users found...</span>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                        @endforelse
                    </x-slot>
                </x-table>

                <div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>


    </div>

    <div class="lightbox" id="lightbox">
        <span class="close" id="close">×</span>
        <img src="" alt="" class="lightbox-image" id="lightbox-image">
    </div>
</section>
@push('scripts')
<script data-navigate-once>

    document.addEventListener('livewire:navigated', (component) => {
        console.log(component)
        const urlObject = new URL(component.originalTarget.URL);
        if ('/account/users' === urlObject.pathname){
            $(document).ready(function() {
              let x =   $.Modal('tes','123');
              x.updateOnShow(function(ss){
                console.log(ss)
              });
            });

        }
    });

</script>
@endpush
