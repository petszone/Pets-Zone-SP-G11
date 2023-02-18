@if ($paginator->hasPages())


<div class="pagination-box fix">
    <ul class="blog-pagination ">
        @if ($paginator->onFirstPage())
            {{-- <li class="active" aria-label="@lang('pagination.previous')"><a href="#">1</a></li> --}}
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="fa fa-angle-right"></i></a>
            </li>
        @endif
        @foreach ($elements as $element)
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><a href="#">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

       {{-- Next Page Link --}}
       @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="fa fa-angle-left"></i></a></li>
         
        @endif
    </ul>




    {{-- <div class="toolbar-sorter-footer">
        <label>show</label>
        <select class="sorter" name="sorter">
            <option value="Position" selected="selected">12</option>
            <option value="Product Name">15</option>
            <option value="Price">30</option>
        </select>
        <span>per page</span>
    </div> --}}
</div>
@endif


