{{--{{dd($categories)}}--}}
@foreach($categories as $categoryList)
    <option value="{{isset($categoryList->id) ? $categoryList->id : ""}}"
            @isset($category->id)
                @if($category->id == $categoryList->parent_id)
                selected=""
                @endif
                @if($category->id == $categoryList->id)
                hidden
                @endif
            @endisset
    >
        {!!isset($delimiter) ? $delimiter : "" !!}{{ $categoryList->title }}
    </option>
    @if(count($categoryList->children) > 0)
        @include('admin.categories.partials.categories', [
    'categories' => $categoryList->children,
    'delimiter' => ' - ' . $delimiter
    ])
    @endif
@endforeach
