{{--{{dd($category)}}--}}
{{--{{dd($categories)}}--}}
<label for="">Статус</label>
<select class="form-control" name="published" id="">
    @if(isset($category->id))
        <option @if($category->published == 0) selected @endif value="0">Не опубликованно</option>
        <option @if($category->published == 1) selected @endif value="1">Опубликованно</option>
    @else
        <option  value="0">Не опубликованно</option>
        <option  value="1">Опубликованно</option>
    @endif
</select>
<label for="">Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок категории" value="{{isset($category->title) ? $category->title : ""}}"
required>

<label for="">Slug</label>
<input type="text" class="form-control", name="slug" placeholder="автоматическая генерация" value="{{isset($category->slug) ? $category->slug : ""}}"
readonly>
<label for="">Родительская категория</label>
<select class="form-control" name="parent_id" >
        <option value="0"> <- Без родительской категиории -> </option>
        @include('admin.categories.partials.categories', ['categories' => $categories])
</select>

<input class="btn btn-primary" type="submit" value="Сохранить">
