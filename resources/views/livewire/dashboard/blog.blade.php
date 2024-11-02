<section>
    <div>
        <h1 class="text-2xl font-semibold text-gray-900 mb-2">Blog</h1>
        <x-partials.dashboard.breadcumb :data="$breadcumb"> </x-partials.dashboard.breadcumb>
    </div>

    <div class="py-4 space-y-4">
            <!-- Top Bar -->
            <div class="flex justify-between max-lg:flex-wrap">
                <div class="w-2/4 flex space-x-4  max-lg:w-full">
                    <div class="w-10/12">
                    <x-input.text  wire:model.live.debounce.300ms="filters.search" placeholder="cari..." />
                    </div>
                    <div x-data class="justify-self-end">
                        <x-button.green  wire:click="toggleShowFilters"> <span class="icon-[mdi--filter]"></span> </x-button.primary>
                    </div>
                </div>

                <div class="space-x-2 flex items-center max-lg:w-full" wire:ignore>
                    <x-input.select wire:model.live="perPage" id="perPage">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </x-input.select>

                    <x-dropdown label="Bulk Actions">
                        <x-dropdown.item type="button" wire:click="exportSelected" class="  items-center space-x-2 hidden">
                            <x-icon.download class="text-cool-gray-400" /> <span>Export</span>
                        </x-dropdown.item>

                        <x-dropdown.item type="button" wire:click="$toggle('showDeleteModal')" class="flex items-center space-x-2">
                            <x-icon.trash class="text-cool-gray-400" /> <span>Delete</span>
                        </x-dropdown.item>
                    </x-dropdown>

                    <x-button.primary @click.prevent="Livewire.navigate('{{ route('account.blog.action', ['action'=>'create']) }}')"  ><x-icon.plus /> New</x-button.primary>
                </div>
            </div>
            @if ($showFilters)
            <div  class="bg-gray-200 p-4 rounded shadow-inner flex relative dark:bg-gray-800">
                    <div class="w-1/2 pr-2 space-y-4">
                        <div wire:ignore>
                            <x-input.group inline for="filter-status" label="Status" >
                                <x-input.select  wire:model.live.debounce.300ms="filters.status" id="filter-status" :placeholder="__('- Pilih Status -')">
                                    <option value="" >Pilih Status...</option>

                                    @foreach (App\Models\Post::STATUSES as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </x-input.select>
                            </x-input.group>
                        </div>
                        <x-input.group inline for="filter-amount-min" label="Materi">
                            <div wire:ignore>
                                <x-input.select wire:model.live="filters.materi" :multiple="'true'" :placeholder="__('- Pilih Materi -')">
                                    @foreach (App\Models\Materi::all() as $k => $v)
                                    <option value="{{ $v->id }}"> {{ $v->title  }} </option>
                                    @endforeach
                                </x-input.select>
                            </div>
                        </x-input.group>
                        <x-input.group inline for="filter-created_at" label="Join Date">
                            <x-input.date wire:model="filters.created_at" id="filter-created_at" placeholder="MM/DD/YYYY" />
                        </x-input.group>
                    </div>

                    <div class="w-1/2 pl-2 space-y-4">
                        <x-input.group inline for="filter-amount-min" label="Kategori">
                            <div wire:ignore>
                                <x-input.select wire:model.live="filters.kategori" :multiple="'true'" :placeholder="__('- Pilih Kategori -')">
                                    @foreach (App\Models\Category::all() as $k => $value)
                                    <option value="{{ $value->id }}">{{ $value->title }}</option>
                                    @endforeach
                                </x-input.select>
                            </div>
                        </x-input.group>
                        <x-input.group inline for="filter-amount-min" label="Kelas">
                            <div wire:ignore>
                                <x-input.select wire:model.live="filters.kelas" :multiple="'true'" :placeholder="__('- Pilih Kelas -')">
                                    @foreach (App\Models\Kelas::all() as $k => $v)
                                    <option value="{{ $v->id }}"> {{ $v->title  }} - {{$v->jenjang->title}}</option>
                                    @endforeach
                                </x-input.select>
                            </div>
                        </x-input.group>

                        <x-input.group inline for="filter-amount-min" label="Kategori">
                            <div wire:ignore>
                                <x-input.select wire:model.live="filters.type" :multiple="'true'" :placeholder="__('- Pilih Kategori -')">
                                     @foreach (App\Models\Post::Type as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </x-input.select>
                            </div>
                        </x-input.group>
                        <x-button.link wire:click="resetFilters" class="absolute right-0 bottom-0 p-4 dark:text-slate-300 mt-5">Reset Filters</x-button.link>
                    </div>
            </div>
            @endif
            <div class="flex-col space-y-4">
                <x-table>
                    <x-slot name="head">
                        <x-table.heading class="pr-0 w-8">
                            <x-input.checkbox wire:model.live="selectPage" />
                        </x-table.heading>
                        <x-table.heading class="w-4">No</x-table.heading>
                        <x-table.heading>.::.</x-table.heading>
                        <x-table.heading sortable multi-column wire:click="sortBy('title')" :direction="$sorts['title'] ?? null"  >Title</x-table.heading>
                        <x-table.heading> Content </x-table.heading>
                        <x-table.heading> Kelas  </x-table.heading>
                        <x-table.heading> Kategori  </x-table.heading>
                        <x-table.heading> Materi  </x-table.heading>
                        <x-table.heading> Image  </x-table.heading>
                        <x-table.heading> Status  </x-table.heading>
                        <x-table.heading> Type  </x-table.heading>
                        <x-table.heading> Di Buat Oleh  </x-table.heading>
                        <x-table.heading  sortable multi-column wire:click="sortBy('created_at')" :direction="$sorts['created_at'] ?? null"> Tanggal dibuat  </x-table.heading>
                    </x-slot>
                    <x-slot name="body">
                    @if ($selectPage)
                        <x-table.row class="bg-cool-gray-200" wire:key="row-message">
                            <x-table.cell colspan="12">
                                @unless ($selectAll)
                                <div>
                                    <span>You have selected <strong>{{ $posts->count() }}</strong> posts, do you want to select all <strong>{{ $posts->total() }}</strong>?</span>
                                    <x-button.link wire:click="selectAllPage" class="ml-1 text-blue-600">Select All</x-button.link>
                                </div>
                                @else
                                <span>You are currently selecting all <strong>{{ $posts->total() }}</strong> users.</span>
                                @endif
                            </x-table.cell>
                        </x-table.row>
                        @endif
                        @forelse ($posts as $k => $post )

                        <x-table.row class="bg-cool-gray-200" wire:key="row-{{ $post->id }}" wire:loading.class.delay="opacity-50"  wire:target="filters.search,perPage,gotoPage, previousPage, nextPage">
                            <x-table.cell class="pr-0">
                                <x-input.checkbox wire:model.live="selected" value="{{ $post->id }}" />
                            </x-table.cell>
                            <x-table.cell class="pr-0 w-4">
                                    {{$k+$posts->firstItem()}}
                            </x-table.cell>
                            <x-table.cell>
                                <div class="flex">
                                    <x-button.link  href="{{ route('account.blog.action', ['action'=>'edit', 'slug'=> $post->slug]) }}" @click.prevent="Livewire.navigate('{{ route('account.blog.action', ['action'=>'edit', 'slug'=> $post->slug]) }}')" class="bg-green-500 mx-1 px-2 py-1 rounded text-white" title="Edit"><span class="icon-[uil--edit]"></span></x-button.link>
                                    <x-button.link target="_blank" href="{{ route('post.detail', ['slug'=>$post->slug]) }}" class="bg-blue-500 mx-1 px-2 py-1 rounded text-white"><span class="icon-[bxs--user-detail]" title="Detail post"></span></x-button.link>
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                {{ $post->title }}
                            </x-table.cell>
                            <x-table.cell>
                                {{ \Illuminate\Support\Str::limit(strip_tags($post->body), 100) }}
                            </x-table.cell>
                            <x-table.cell>
                                @if(isset($post->kelas->jenjang))
                                {{$post->kelas->jenjang->title}} - {{ $post->kelas->title }}
                                @else - @endif
                            </x-table.cell>
                            <x-table.cell>
                                @if (isset($post->kategori))
                                    {{$post->kategori->title}}
                                @else
                                    -
                                @endif
                            </x-table.cell>
                            <x-table.cell>
                                 @if (isset($post->materi) && count($post->materi)>0)
                                    {{collect($post->materi)->pluck('title')->implode(', ')}}
                                @else
                                    -
                                @endif
                            </x-table.cell>
                            <x-table.cell>
                                <div  class="flex flex-col   w-20 " >
                                    <!-- <a href="{{ $post->image }}" class="glightbox" data-gallery="gallery-{{$post->id}}">
                                        <img src="{{ $post->image }}" alt="image not found" class=" object-contain  hover:grayscale transition-all duration-700 ease-in-out mx-auto lg:col-span-4 md:col-span-6 w-full h-full">
                                    </a> -->
                                    @if($post->image)
                                        <x-style.glithbox href="{{ $post->image }}" data-gallery="gallery-{{$post->id}}" data-title="image not found" data-description="tes" class="glightbox" >
                                            <x-style.glithbox.img :url="$post->image" alt="image not found"  class=" object-contain  hover:grayscale transition-all duration-700 ease-in-out mx-auto lg:col-span-4 md:col-span-6 w-full h-full" />
                                        </x-style.glithbox>
                                    @else
                                        <p>Image not available</p>
                                    @endif
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                @if ($post->status == 'published')
                                    <span class="text-xs rounded px-2 py-1 bg-green-500 text-white"> {{ $post->status }} </span>
                                @elseif ($post->status == 'draft')
                                <span class="text-xs rounded px-2 py-1 bg-yellow-500 text-white text-nowrap"> {{ $post->status }} </span>
                                @else
                                <span class="text-xs rounded px-2 py-1 bg-red-500 text-white text-nowrap"> {{ $post->status }} </span>
                                @endif
                            </x-table.cell>
                            <x-table.cell>
                                @if ($post->type == 'public')
                                    <span class="text-xs rounded px-2 py-1 bg-green-500 text-white"> {{ $post->type }} </span>
                                @elseif ($post->type == 'private')
                                <span class="text-xs rounded px-2 py-1 bg-yellow-500 text-white text-nowrap"> {{ $post->type }} </span>
                                @else
                                <span class="text-xs rounded px-2 py-1 bg-red-500 text-white text-nowrap"> {{ $post->type }} </span>
                                @endif
                            </x-table.cell>
                            <x-table.cell>
                                {{ $post->user->name }}
                            </x-table.cell>
                            <x-table.cell>
                                {{ $post->created_at }}
                            </x-table.cell>
                        </x-table.row>

                        @empty
                            <x-table.row>
                                <x-table.cell colspan="12">
                                    <div class="flex justify-center items-center space-x-2">
                                        <x-icon.inbox class="h-8 w-8 text-cool-gray-400" />
                                        <span class="font-medium py-8 text-cool-gray-400 text-xl">No blog found...</span>
                                    </div>
                                </x-table.cell>
                            </x-table.row>
                        @endforelse
                    </x-slot>
                </x-table>
            </div>
            <div>
                    {{ $posts->links() }}
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
</section>


