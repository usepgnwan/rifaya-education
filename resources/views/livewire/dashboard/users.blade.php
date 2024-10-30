<section>
    <div>
        <h1 class="text-2xl font-semibold text-gray-900 mb-2">Users {{ ucfirst($label_type)  ?? ''}}</h1>
        <x-partials.dashboard.breadcumb :data="$breadcumb"> </x-partials.dashboard.breadcumb>

        <div class="py-4 space-y-4">
            <!-- Top Bar -->
            <div class="flex justify-between max-lg:flex-wrap">
                <div class="w-2/4 flex space-x-4  max-lg:w-full">
                    <div class="w-10/12">
                    <x-input.text  wire:model.live.debounce.300ms="filters.search" placeholder="users..." />
                    </div>
                    <div x-data class="justify-self-end">
                        <x-button.green  wire:click="toggleShowFilters"> <span class="icon-[mdi--filter]"></span> </x-button.primary>
                    </div>
                </div>

                <div class="space-x-2 flex items-center max-lg:w-full" wire:ignore>
                    <x-input.select wire:model.live.debounce.300ms="perPage" id="perPage">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </x-input.select>

                    <x-dropdown label="Bulk Actions" class="hidden">
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

            @if ($showFilters)
            <div  class="bg-gray-200 p-4 rounded shadow-inner flex relative dark:bg-gray-800">
                    <div class="w-1/2 pr-2 space-y-4">
                        <div wire:ignore>
                            <x-input.group inline for="filter-status" label="Status" >
                                <x-input.select  wire:model.live.debounce.300ms="filters.status" id="filter-status" :placeholder="__('- Pilih Status -')">
                                    <option value="" >Pilih Status...</option>

                                    @foreach (App\Models\User::STATUSES as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </x-input.select>
                            </x-input.group>
                        </div>
                        <div wire:ignore>
                                <x-input.select wire:model.live="filters.mapel" :multiple="'true'" :placeholder="__('- Pilih mata pelajaran -')">

                                @foreach ($mapel as $key => $value)
                                    <option value="{{ $value['id'] }}" @if(isset($request['mapel'])     && !empty($request['mapel']) && in_array($value['id'], $request['mapel'])) selected  @endif >{{ $value['title'] }}</option>
                                @endforeach
                                </x-input.select>
                            </div>
                    </div>

                    <div class="w-1/2 pl-2 space-y-4">
                        <x-input.group inline for="filter-amount-min" label="Roles">
                            <div wire:ignore>
                                <x-input.select wire:model.live="filters.roles" :multiple="'true'" :placeholder="__('- Pilih roles -')">

                                @foreach ($roles as $key => $value)
                                    <option value="{{ $value['id'] }}" @if(isset($request['roles'])     && !empty($request['roles']) && in_array($value['id'], $request['roles'])) selected  @endif >{{ $value['title'] }}</option>
                                @endforeach
                                </x-input.select>
                            </div>

                            <x-input.group inline for="filter-created_at" label="Join Date">
                                <x-input.date wire:model="filters.created_at" id="filter-created_at" placeholder="MM/DD/YYYY" />
                            </x-input.group>
                        </x-input.group>
                        <x-button.link wire:click="resetFilters" class="absolute right-0 bottom-0 p-4 dark:text-slate-300">Reset Filters</x-button.link>
                    </div>
            </div>
            @endif
            <!-- users Table -->
            <div class="flex-col space-y-4">
                <x-table>
                    <x-slot name="head">
                        <x-table.heading class="pr-0 w-8">
                            <x-input.checkbox wire:model.live="selectPage" />
                        </x-table.heading>
                        <x-table.heading class="pr-0 w-8">No.</x-table.heading>
                        <x-table.heading>.::.</x-table.heading>
                        <x-table.heading>Profile</x-table.heading>
                        <x-table.heading sortable multi-column wire:click="sortBy('name')" :direction="$sorts['name'] ?? null" class="w-full">Nama</x-table.heading>
                        <x-table.heading sortable multi-column wire:click="sortBy('email')" :direction="$sorts['email'] ?? null">Email</x-table.heading>
                        <x-table.heading sortable multi-column wire:click="sortBy('username')" :direction="$sorts['username'] ?? null">Username</x-table.heading>
                        <x-table.heading>No. Telp / Wa</x-table.heading>
                        <x-table.heading>Role</x-table.heading>
                        <x-table.heading>Mata Pelajaran</x-table.heading>
                        <x-table.heading >Metode Pengajaran</x-table.heading>
                        <x-table.heading>Status</x-table.heading>
                        <x-table.heading>Join Date</x-table.heading>

                    </x-slot>

                    <x-slot name="body">
                        @if ($selectPage)
                        <x-table.row class="bg-cool-gray-200" wire:key="row-message">
                            <x-table.cell colspan="9">
                                @unless ($selectAll)
                                <div>
                                    <span>You have selected <strong>{{ $users->count() }}</strong> users, do you want to select all <strong>{{ $users->total() }}</strong>?</span>
                                    <x-button.link wire:click="selectAllPage" class="ml-1 text-blue-600">Select All</x-button.link>
                                </div>
                                @else
                                <span>You are currently selecting all <strong>{{ $users->total() }}</strong> users.</span>
                                @endif
                            </x-table.cell>
                        </x-table.row>
                        @endif

                        @forelse ($users as $k => $values)

                        <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $values->id }}" wire:target="filters.search,perPage,gotoPage, previousPage, nextPage">

                            <x-table.cell class="pr-0">
                                <x-input.checkbox wire:model.live="selected" value="{{ $values->id }}" />
                            </x-table.cell>
                            <x-table.cell class="pr-0">
                                {{$k+$users->firstItem()}}
                            </x-table.cell>
                            <x-table.cell>
                                <div class="flex">
                                    <x-button.link wire:click="edit({{ $values->id }})" class="bg-green-500 mx-1 px-2 py-1 rounded text-white" title="Edit"><span class="icon-[uil--edit]"></span></x-button.link>

                                    @if(in_array('2',$values->roles->pluck('id')->toArray()))
                                    <x-button.link title="profile tutor"  href="{{ route('account.users.profile', ['username'  => $values->username]) }} " @click.prevent="Livewire.navigate('{{ route('account.users.profile', ['username'  => $values->username]) }}')" class="bg-blue-500 mx-1 px-2 py-1 rounded text-white"><span class="icon-[bxs--user-detail]" title="Detail Profile"></span></x-button.link>
                                    <x-button.link title="download cv" href="{{ $values->user_profile->cv  ?? ''}}" target="_blank" class="bg-blue-500 mx-1 px-2 py-1 rounded text-white">
                                    <span class="icon-[prime--file-pdf]  text-xl inline-block"></span>
                                    </x-button.link>
                                    @endif
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                <!-- <div class="flex flex-col gallery w-20 ">
                                    <img src="{{ $values->profile }}" alt="image not found" class="gallery-image object-contain rounded-3xl hover:grayscale transition-all duration-700 ease-in-out mx-auto lg:col-span-4 md:col-span-6 w-full h-full">
                                </div> -->

                                <x-style.glithbox href="{{ $values->profile }}"   data-title="{{ $values->name }}"  class="glightbox" >
                                        <x-style.glithbox.img :url="$values->profile" alt="image not found"  class=" object-contain  hover:grayscale transition-all duration-700 ease-in-out mx-auto lg:col-span-4 md:col-span-6 w-full h-full" />
                                </x-style.glithbox>
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
                                <span class="text-cool-gray-900 font-medium">{{ $values->username }} </span>
                            </x-table.cell>
                            <x-table.cell>
                                <span class="text-cool-gray-900 font-medium">{{ $values->user_profile->no_telp ?? '-' }} </span>
                            </x-table.cell>
                            <x-table.cell>
                                @if (isset($values->roles))
                                    {{collect($values->roles)->pluck('title')->implode(', ')}}
                                @endif
                            </x-table.cell>
                            <x-table.cell >
                                <div  class="flex  flex-wrap w-36">
                                @forelse ($values->mata_pelajaran as $v )
                                    <span class="flex mb-1 text-xs rounded px-2 py-1 bg-green-500 text-white ml-1"> {{ $v->title }} </span>
                                @empty
                                -
                                @endforelse
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                @forelse ($values->user_metodemengajar as $v )
                                <div  class="flex flex-row">
                                        @if($v->title == 'offline')
                                            <span class="text-xs mb-1 mb rounded px-2 py-1 bg-red-500 text-white text-nowrap"> {{ $v->title }} (Mengajar ke rumah) </span> <br>
                                        @else
                                            <span class="text-xs rounded px-2 py-1 bg-green-500 text-white"> {{ $v->title }} </span>
                                        @endif
                                </div>
                                @empty
                                    -
                                @endforelse
                            </x-table.cell>
                            <x-table.cell>
                                @if ($values->status == 'aktif')
                                    <span class="text-xs rounded px-2 py-1 bg-green-500 text-white"> {{ $values->status }} </span>
                                @else
                                <span class="text-xs rounded px-2 py-1 bg-red-500 text-white text-nowrap"> {{ $values->status }} </span>
                                @endif
                            </x-table.cell>
                            <x-table.cell>
                                {{ $values->created_at }}
                            </x-table.cell>
                        </x-table.row>
                        @empty
                        <x-table.row>
                            <x-table.cell colspan="8">
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
        <!-- Delete Transactions Modal -->
        <form wire:submit.prevent="deleteSelected">
            <x-modal.confirmation wire:model.defer="showDeleteModal">
                <x-slot name="title">Delete User</x-slot>

                <x-slot name="content">
                    <div class="py-8 text-cool-gray-700">Are you sure you? This action is irreversible.</div>
                </x-slot>

                <x-slot name="footer">
                    <x-button.secondary wire:click="$set('showDeleteModal', false)">Cancel</x-button.secondary>

                    <x-button.primary type="submit">Delete</x-button.primary>
                </x-slot>
            </x-modal.confirmation>
        </form>
        <!-- Save Transaction Modal -->
        <form wire:submit.prevent="save">
                <x-modal.dialog wire:model.defer="showEditModal">
                    <x-slot name="title">Edit Transaction</x-slot>

                    <x-slot name="content">
                        <x-input.group :inline="'true'" for="email" label="Email" :error="$errors->first('request.email')">
                            <x-input.text type="email" wire:model="request.email" id="email" placeholder="email" />
                        </x-input.group>

                        <x-input.group :inline="'true'" for="name" label="Name" :error="$errors->first('request.name')">
                            <x-input.text type="name" wire:model="request.name" id="name" placeholder="name" />
                        </x-input.group>

                        {{--
                        <x-input.group  for="date_for_editing" label="Date" :error="$errors->first('editing.date_for_editing')">
                            <x-input.date wire:model="editing.date_for_editing" :timepicker="'true'" id="date_for_editing" />
                        </x-input.group>
                        <div class="w-full  " wire:ignore>
                            <x-input.group for="amount" label="Amount" :error="$errors->first('editing.amount')"  >
                                 <x-input.tiny-text :id="__('description')" />
                            </x-input.group>
                        </div> --}}

                        <div >
                            <x-input.group :inline="'true'" for="status" label="status" :error="$errors->first('request.status')">
                                <div wire:ignore>

                                    <x-input.select  wire:model.live.debounce.300ms="request.status" :placeholder="__('- Pilih Status -')">
                                    <option value="">- Pilih Status -</option>
                                    @foreach (App\Models\User::STATUSES as $value => $label)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                    </x-input.select>
                                </div>
                            </x-input.group>
                        </div>

                        <div >
                            <x-input.group :inline="'true'" for="Roles" label="Roles" :error="$errors->first('request.roles')" >
                                <div wire:ignore>
                                    <x-input.select  wire:model.live.debounce.300ms="request.roles" :multiple="'true'" :placeholder="__('- Pilih roles -')">

                                    @foreach ($roles as $key => $value)
                                        <option value="{{ $value['id'] }}" @if(isset($request['roles'])     && !empty($request['roles']) && in_array($value['id'], $request['roles'])) selected  @endif >{{ $value['title'] }}</option>
                                    @endforeach
                                    </x-input.select>
                                </div>
                            </x-input.group>
                        </div>
                        {{--
                        <x-input.group for="date_for_editing" label="Date" :error="$errors->first('editing.date_for_editing')">
                            <x-input.date wire:model="editing.date_for_editing" :timepicker="'true'" id="date_for_editing" />
                        </x-input.group> --}}

                    </x-slot>

                    <x-slot name="footer">
                        <x-button.secondary wire:click="$set('showEditModal', false)">Cancel</x-button.secondary>

                        <x-button.primary type="submit">Save</x-button.primary>
                    </x-slot>
                </x-modal.dialog>
            </form>
    </div>

    <div class="lightbox" id="lightbox">
        <span class="close" id="close">×</span>
        <img src="" alt="" class="lightbox-image" id="lightbox-image">
    </div>
</section>
@push('scripts')

<script data-navigate-once>
// document.addEventListener('livewire:update', () => {
//     const galleryImages = document.querySelectorAll('.gallery-image');
//     cosole.log(galleryImages)
//     if (galleryImages.length > 0) {
//         galleryImages.forEach(image => {
//             // Add your logic here for handling .gallery-image elements
//             console.log('Gallery image found:', image);
//             // Example: image.style.filter = 'grayscale(0)';
//         });
//     } else {
//         console.log('No gallery images found');
//     }
// });
    document.addEventListener('livewire:navigated', (component) => {
         console.log(component)
        const urlObject = new URL(component.originalTarget.URL);
        if ('/account/users' === urlObject.pathname){
            // $(document).ready(function() {
            //   let x =   $.Modal('tes','123');
            //   x.updateOnShow(function(ss){
            //     console.log(ss)
            //   });
            // });

        }
    });

</script>
@endpush
