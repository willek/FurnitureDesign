@if ($paginator->hasPages())
    {{--<ul class="pagination">--}}
        {{-- Previous Page Link --}}
        {{--@if ($paginator->onFirstPage())--}}
        {{--<li class="disabled"><span>@lang('pagination.previous')</span></li>--}}
        {{--@else--}}
        {{--<li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></li>--}}
        {{--@endif--}}

        {{-- Next Page Link --}}
        {{--@if ($paginator->hasMorePages())--}}
        {{--<li><a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></li>--}}
        {{--@else--}}
        {{--<li class="disabled"><span>@lang('pagination.next')</span></li>--}}
        {{--@endif--}}
    {{--</ul>--}}

<section class="section gradient-bgcolor section-padding-top-bottom">
  <div class="container">
    <div class="sixteen columns">
      <div class="blog-left-right-links">
          {{-- Previous Page Link --}}
          @if ($paginator->onFirstPage())
          {{--<li class="disabled"><span>@lang('pagination.previous')</span></li>--}}
          {{--<a href="#"><div class="blog-left-link"><p>older</p></div></a>--}}
          @else
          {{--<li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></li>--}}
          <a href="{{ $paginator->previousPageUrl() }}"><div class="blog-left-link"><p>older</p></div></a>
          @endif

          {{-- Next Page Link --}}
          @if ($paginator->hasMorePages())
          {{--<li><a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></li>--}}
          <a href="{{ $paginator->nextPageUrl() }}"><div class="blog-right-link"><p>newer</p></div></a>
          @else
          {{--<li class="disabled"><span>@lang('pagination.next')</span></li>--}}
          {{--<a href="#"><div class="blog-right-link"><p>newer</p></div></a>--}}
          @endif
      </div>
    </div>
  </div>
</section>
@endif