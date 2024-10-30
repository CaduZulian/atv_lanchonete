@props(['name', 'label', 'options', 'wireChange' => null])
<div class="input select">
    <label for="{{$name}}">{{$label}}</label>

    <select
        id="{{$name}}"
        name="{{$name}}"
        wire:model="{{$name}}"
        @if($wireChange) wire:change="{{$wireChange}}" @endif>
        <option value="">Selecione</option>
        @foreach($options as $option)
        <option value="{{$option['value']}}">{{$option['label']}}</option>
        @endforeach
    </select>

    @error($name)
    <span class="input-error"> {{$message}} </span>
    @enderror
</div>