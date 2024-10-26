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
        <x-input.group :inline="'true'" for="title" label="Pertanyaan" :error="$errors->first('form.title')">
            <x-input.text type="title" wire:model="form.title" id="title" placeholder="Pertanyaan" />
        </x-input.group>
        <form wire:submit.prevent="save">
            <div class="w-full">
                <x-input.group :inline="'true'" for="body" label="Jawaban" :error="$errors->first('form.body')">
                    <div class="w-full" wire:ignore>
                        <x-input.tiny-text :id="__('body')" :content="$form['body']" />
                    </div>
                </x-input.group>
            </div>

            <div class="w-full flex justify-end max-md:flex-wrap">
                <x-button class="mr-2 max-md:w-full max-md:mx-0 max-md:my-2" @click.prevent="Livewire.navigate('{{ route('account.master.qa' )}}')"> Cancel </x-button>
                <x-button.primary type="submit" class=" max-md:w-full "><span class="icon-[uil--edit]"></span> Save</x-button.primary>

            </div>
        </form>
    </div>
</section>
