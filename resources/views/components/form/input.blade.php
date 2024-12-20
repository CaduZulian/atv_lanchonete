@props(['name', 'label', 'type'])
<div class="input">
    <label for="{{$name}}">{{$label}}</label>

    <input type="{{$type}}" id="{{$name}}" name="{{$name}}" wire:model="{{$name}}" step="0.01" />

    @error($name)
        <span class="input-error"> {{$message}} </span>
    @enderror
</div>
