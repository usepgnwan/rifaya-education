<div wire:init="getComponentId" id="my-component">
<form id="loginForm" wire:submit.prevent="login" class="w-full mt-2">
    <div class="mb-5">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your name</label>
        <input type="name" id="name" name="name" wire:model="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name@gmail.com" required="">
        @error('name')
        <small class="text-xs text-red-500 d-block mt-1">{{$message}}</small>
        @enderror
    </div>
    <div class="mb-5">
        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your last_name</label>
        <input type="last_name" id="last_name" name="last_name" wire:model="last_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required="">
        @error('last_name')
        <small class="text-xs text-red-500 d-block mt-1">{{$message}}</small>
        @enderror
    </div>
    <div class="mb-5">
        <label for="file" class="block mb-2">Upload File</label>
        <input type="file" id="file" name="file" accept=".jpeg,.png,.jpg,.gif,.svg">
        @if ($errors->has('file'))
            <div class="error">{{ $errors->first('file') }}</div>
        @endif
    </div>
</form>
</div>

