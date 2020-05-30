{{--{{dd($carMark)}}--}}
{{--{{dd($categories)}}--}}
<label for="">Статус</label>
<select class="form-control" name="published" id="">
    @if(isset($carMark->id))
        <option @if($carMark->published == 0) selected @endif value="0">Не опубликованно</option>
        <option @if($carMark->published == 1) selected @endif value="1">Опубликованно</option>
    @else
        <option  value="0">Не опубликованно</option>
        <option  value="1">Опубликованно</option>
    @endif
</select>
<label for="">Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок категории" value="{{isset($carMark->title) ? $carMark->title : ""}}"
required>

<div class="form-group">
    <select class="form-control" name="types[]" multiple>
        <option value="0">Тип не выбрана</option>
        @foreach($types as $type)
            <option value="{{isset($type->id) ? $type->id : ""}}"
                    @isset($carMark->id)
                        @foreach($carMark->carType as $carMarkType)
                        {{-- {{dd($carMarkType)}} --}}
                            @if($type->id == $carMarkType->id)
                                selected="selected"
                            @endif
                        @endforeach
                    @endisset
            >
                {!! $type->title !!}
            </option>
        @endforeach
    </select>
</div>

<input class="btn btn-primary" type="submit" value="Сохранить">
