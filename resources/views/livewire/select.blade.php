<div class="input select">
    <label for="{{$name}}">{{$label}}</label>

    <select id="{{$name}}" name="{{$name}}" wire:model="{{$name}}">
        <option value="">Selecione</option>
        @foreach($options as $option)
            <option value="{{$option['value']}}">{{$option['label']}}</option>
        @endforeach
    </select>
</div>
