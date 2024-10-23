<section>
    <div>
         <h1 class="text-2xl font-semibold text-gray-900 mb-2">Blog {{ ucfirst($action) }}</h1>
        <x-partials.dashboard.breadcumb :data="$breadcumb"> </x-partials.dashboard.breadcumb>
    </div>

    <div class="w-full border-t border-gray-100 dark:border-t-gray-800  shadow overflow-hidden sm:rounded-lg p-5 dark:bg-gray-800 ">
        <div class="w-ful">
            <h3 class="text-sm">Form {{ ucfirst($action) }}</h3>
        </div>
        <hr class="dark:border-gray-700 my-4 w-full">
        <form wire:submit.prevent="save">
            <div class="flex flex-wrap ">
                <div class="w-full max-md:w-full pl-2 space-y-4">
                    <x-input.group for="Judul" :inline="'true'" label="Judul" :error="$errors->first('form.title')"  >
                        <x-input.text :id="__('title')" wire:model.live="form.title" placeholder="masukan judul" />
                    </x-input.group>
                </div>
                <div class="w-1/2 max-md:w-full pl-2 space-y-4"  wire:ignore>
                    <x-input.group for="Kelas" :inline="'true'" label="Kelas" :error="$errors->first('form.class_id')"  >
                        <x-input.select  wire:model.live.debounce.300ms="form.class_id"  :placeholder="__('- Pilih Kelas -')">
                            <option value="" >Pilih Status...</option>
                            @foreach ($kelas as $value => $label)
                            <option value="{{ $label->id }}" @if($form['class_id'] == $label->id)  selected @endif>{{ $label->title }} - {{ $label->jenjang->title }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                </div>
                <div class="w-1/2 max-md:w-full pl-2 space-y-4"  wire:ignore>
                    <x-input.group for="Mareri" :inline="'true'" label="Materi" :error="$errors->first('form.materi_id')"  >
                        <x-input.select  wire:model.live.debounce.300ms="form.materi_id" :multiple="'true'" :placeholder="__('- Pilih Materi -')">
                            @foreach ($materi as $value => $label)
                            <option value="{{ $label->id }}" @if(count($form['materi_id'])>0 && in_array($label->id, $form['materi_id'])) selected  @endif >{{ $label->title }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                </div>
                <div class="w-1/2 max-md:w-full pl-2 space-y-4"  wire:ignore>
                    <x-input.group for="Kategoru" :inline="'true'" label="Kategori" :error="$errors->first('form.category_id')"  >
                    <x-input.select  wire:model.live.debounce.300ms="form.category_id"  :placeholder="__('- Pilih Kategori -')">
                            <option value="" >Pilih</option>
                            @foreach ($category as $value => $label)
                            <option value="{{ $label->id }}"  @if($form['category_id'] == $label->id)  selected @endif>{{ $label->title }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                </div>
                <div class="w-1/2 max-md:w-full pl-2 space-y-4" >
                    <x-input.group for="Status" :inline="'true'" label="Status" :error="$errors->first('form.status')"  >
                        <div wire:ignore>
                            <x-input.select  wire:model.live.debounce.300ms="form.status"  :placeholder="__('- Pilih Status -')">
                                <option value="" >Pilih</option>
                                @foreach (App\Models\Post::STATUSES as $value => $label)
                                <option value="{{ $value }}" @if($form['status'] == $value )  selected @endif >{{ $label }}</option>
                                @endforeach
                            </x-input.select>
                        </div>
                    </x-input.group>
                </div>
                <div class="w-1/2 max-md:w-full pl-2 space-y-4"  >
                    <x-input.group for="type" :inline="'true'" label="type" :error="$errors->first('form.type')"  >
                        <div wire:ignore>
                            <x-input.select  wire:model.live.debounce.300ms="form.type"  :placeholder="__('- Pilih Type -')">
                                <option value="" >Pilih</option>
                                @foreach (App\Models\Post::Type as $value => $label)
                                <option value="{{ $value }}" @if($form['type'] == $value )  selected @endif>{{ $label }}</option>
                                @endforeach
                            </x-input.select>
                        </div>
                    </x-input.group>
                </div>
                <div class="w-full max-md:w-full pl-2 space-y-4">
                    <x-input.group for="Title" :inline="'true'" label="Foto" :error="$errors->first('form.image')"  >
                        <div
                            x-data="{ uploading: false, progress: 0 ,
                                    resetFileInput() {
                                        document.getElementById('file').value = ''; // Reset file input
                                        $wire.set('form.image', 'remove'); // Clear Livewire model
                                    }
                            }"
                            x-on:livewire-upload-start="uploading = true"
                            x-on:livewire-upload-finish="uploading = false; progress = 0;"
                            x-on:livewire-upload-progress="progress = $event.detail.progress" >
                            @if ( $form['image'] )
                                <div class="relative">
                                <button type="button" class="absolute top-0  @if (is_null($form['image']) || $form['image'] == 'remove') hidden @endif left-2 rounded bg-red-500 p-3 mt-1 text-white" @click="resetFileInput()">X</button>
                                @if (method_exists($form['image'], 'temporaryUrl'))
                                    @if (method_exists($form['image'], 'getMimeType') && str_starts_with($form['image']->getMimeType(), 'image/'))
                                        <img class="object-cover mb-3 w-96" src="{{ $form['image']->temporaryUrl() }}" alt="Image preview">
                                    @else
                                       <p class="text-red-500">Invalid file type. Only image files are allowed.</p>
                                    @endif
                                @else
                                    <img class="object-cover mb-3 w-96 @if ($form['image'] =='remove') hidden  @endif" src="{{ $form['image'] }}" alt="Image preview">
                                @endif
                                </div>
                            @endif
                            <input type="file" name="file" id="file" wire:model="form.image" accept="image/*">
                            <p class="text-xs text-gray-400 mt-2">PNG, JPG SVG  and GIF are Allowed.</p>
                            <div x-show="uploading">
                                <div class="w-full h-4 bg-slate-100 rounded-lg shadow-inner mt-3">
                                    <div class="bg-green-500 h-4 rounded-lg" :style="{ width: `${progress}%` }"></div>
                                </div>
                            </div>
                        </div>
                    </x-input.group>
                </div>
                <div class="w-full   pl-2 space-y-4">
                    <x-input.group for="Content" :inline="'true'" label="Content" :error="$errors->first('form.body')"  >
                        <div class="w-full"  wire:ignore>
                            <x-input.tiny-text :id="__('body')" :content="$form['body']" />
                        </div>
                    </x-input.group>
                </div>
            </div>

            <div class="w-full flex justify-end max-md:flex-wrap">
                <x-button  class="mr-2 max-md:w-full max-md:mx-0 max-md:my-2" @click.prevent="Livewire.navigate('{{ route('account.blog' )}}')"> Cancel </x-button>
                <x-button.primary  type="submit"  class=" max-md:w-full "><span class="icon-[uil--edit]"></span> Save</x-button.primary>

            </div>
        </form>
    </div>
</section>
