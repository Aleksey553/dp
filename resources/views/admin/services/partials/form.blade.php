{{--{{dd($service)}}--}}
{{--{{dd($categories)}}--}}
<label for="">Статус</label>
<select class="form-control" name="published" >
    @if(isset($service->id))
        <option @if($service->published == 0) selected="" @endif value="0">Не опубликованно</option>
        <option @if($service->published == 1) selected="" @endif value="1">Опубликованно</option>
    @else
        <option  value="0">Не опубликованно</option>
        <option  value="1">Опубликованно</option>
    @endif
</select>
<label for="">Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок категории" value="{{isset($service->title) ? $service->title : ""}}"
required>

<label for="">Slug</label>
<input type="text" class="form-control", name="slug" placeholder="автоматическая генерация" value="{{isset($service->slug) ? $service->slug : ""}}"
readonly>
<label for="">Родительская категория</label>
<select class="form-control" name="categories[]" multiple id="">
        <option value="0"> <- Без родительской категиории -> </option>
        @include('admin.services.partials.categories', ['categories' => $categories])
</select>

<label for="">Краткое описание</label>
<textarea name="pr_description" id="pr_description" class="form-control">{{isset($service->pr_description)? $service->pr_description : '' }} </textarea>
<label for="">Полное описание</label>
<textarea name="description" id="description" class="form-control">{{isset($service->description)? $service->description : '' }} </textarea>


<input class="btn btn-primary" type="submit" value="Сохранить">
