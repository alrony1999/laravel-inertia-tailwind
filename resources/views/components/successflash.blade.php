@if(session()->has('success'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false,4000)" x-show='show' class=' fixed  px-4 rounded top-3 z-[1000] right-3 text-sm animate-waving-hand p-2  border-[1px] bg-white border-blue-500 border-2 shadow-xl  h-fit'>
    <p class="text-blue-500">{{session('success')}}</p>
</div>
@endif