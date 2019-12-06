@if ($paginator->hasPages())
 <nav class="navigation align-center">

    {{-- Pagination Element --}}
    @foreach($elements as $element)
    {{-- Array of Links --}}
    @if(is_array($element))
      @foreach($element as $page =>$url)
      @if($page == $paginator->currentPage())
        <a href="page-numbers bg-border-color current"> <span> {{$page}} </span> </a>
      @else
        <a href=" {{$url}} " class="page-numbers bg-border-color"> <span> {{$page}} </span> </a>
      @endif
      @endforeach
      @endif
      @endforeach
 </nav>
@endif
