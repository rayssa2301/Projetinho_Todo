<div class="inputArea">
    <label for="{{$name}}">
        {{$label ?? ''}}
    </label>
    <select id="{{$name}}" name="{{$name}}" required>
        <option selected disabled value="">selecione uma opção</option>
        {{ $slot }}
    </select>

</div>
