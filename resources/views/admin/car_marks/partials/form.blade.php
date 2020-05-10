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

<input class="btn btn-primary" type="submit" value="Сохранить">
