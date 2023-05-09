@props(['name'])
@error($name)
<div class="flex gap-2 items-center">
    <x-svgs name="info" class="w-3 text-red-400" />
    <p class="text-red-400 text-xs ">{{ $message }}</p>
</div>
@enderror