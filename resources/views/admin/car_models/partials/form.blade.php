{{--{{dd($model->carType->first()->id)}}--}}
{{--{{dd($categories)}}--}}
{{--{{dd($model->carMark->first()->id)}}--}}
<label for="">Статус</label>
<div class="form-group">
    <select class="form-control" name="published" id="">
        @if(isset($model->id))
            <option @if($model->published == 0) selected @endif value="0">Не опубликованно</option>
            <option @if($model->published == 1) selected @endif value="1">Опубликованно</option>
        @else
            <option  value="0">Не опубликованно</option>
            <option  value="1">Опубликованно</option>
        @endif
    </select>
</div>

<div class="form-group">
    <select class="form-control" name="types[]" id="">
        <option value="0">Тип не выбрана</option>
        @foreach($types as $type)
            <option value="{{isset($type->id) ? $type->id : ""}}"
                    @isset($model->id)
                        @if($model->carType->first()->id == $type->id)
                            selected
                        @endif
                    @endisset
            >
                {!! $type->title !!}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <select class="form-control" name="marks[]" id="" >
        <option value="0">Марка не выбран</option>
        @foreach($marks as $mark)
            <option value="{{isset($mark->id) ? $mark->id : ""}}"
                @isset($model->id)
                    @if($model->carMark->first()->id == $mark->id)
                        selected
                    @endisset
                @endif
            >
                {!! $mark->title !!}
            </option>
        @endforeach
    </select>
</div>




<label for="">Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок категории" value="{{isset($model->title) ? $model->title : ""}}"
required>

<input class="btn btn-primary" type="submit" value="Сохранить">
