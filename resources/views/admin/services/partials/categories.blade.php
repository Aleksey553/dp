{{--{{dd($categories)}}--}}
@foreach($categories as $category)
    <option value="{{isset($category->id) ? $category->id : ""}}"
            @isset($service->id)
                @foreach($service->categories as $categoryService)
                    @if($category->id == $categoryService->id)
                        selected="selected"
                    @endif
                @endforeach
            @endisset
    >
        {!!isset($delimiter) ? $delimiter : "" !!}{{ $category->title }}
    </option>
    @if(count($category->children) > 0)
        @include('admin.services.partials.categories', [
    'categories' => $category->children,
    'delimiter' => ' - ' . $delimiter
    ])
    @endif
@endforeach
