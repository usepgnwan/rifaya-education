@props([
'errorCode' => '',
'msg' => '',
])

@php
$img = $errorCode .'.png';
@endphp
@if ($errorCode == 406)
<div class="w-full mt-14 mb-32 min-h-96 max-lg:mb-20 max-lg:p-2 flex justify-center items-center flex-col text-center">
    <img src="{{ url('asset/img/errors/'.$img) }}" class='lg:w-28 max-lg:w-20  mb-3'>
    <p class=" text-xl max-lg:text-sm mb-3  ">{!!$msg!!}</p>
    <x-button.link href="{{ route('home') }}" class="btn-next-yellow mt-2 ">Kembali ke halaman utama</x-input.link>
</div>
@elseif ($errorCode == 401)
<div class="w-full mt-14 mb-32 min-h-96 max-lg:mb-20 max-lg:p-2 flex justify-center items-center flex-col text-center">
    <img src="{{ url('asset/img/errors/'.$img) }}" class='lg:w-96 max-lg:w-56 mb-3'>
    <p class=" text-xl max-lg:text-sm mb-3  ">{!!$msg!!}</p>
    <x-button.link href="{{ route('home') }}" class="btn-next-yellow mt-2 ">Kembali ke halaman utama</x-input.link>
</div>
@else

@if ($errorCode == 405)
    @php
    $img = '401.png';
    @endphp
@endif
<div class="w-full mt-14 mb-32 min-h-96 max-lg:mb-20 max-lg:p-2 flex justify-center items-center flex-col text-center">
    <img src="{{ url('asset/img/errors/'.$img) }}" class='lg:w-96 max-lg:w-56 '>
    <p class="  text-9xl font-bold max-lg:text-7xl">{{$errorCode}}</p>
    <p class=" text-3xl max-lg:text-sm">{{$msg}}</p>
    <x-button.link href="{{ route('home') }}" class="btn-next-yellow mt-2 ">Kembali ke halaman utama</x-input.link>
</div>

@endif
