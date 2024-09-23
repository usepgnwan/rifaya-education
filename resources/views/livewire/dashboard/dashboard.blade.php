<section>

    <x-partials.dashboard.breadcumb :data="$breadcumb">  </x-partials.dashboard.breadcumb>
    <div class="  w-full rounded-lg text-center min-h-24 bg-gray-100 dark:bg-gray-900 flex justify-center items-center  ">
        <h1 class="text-2xl">Hallo , {{ auth()->user()->name }}</h1>
    </div>
</section>
