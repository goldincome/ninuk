@if ($paginator->hasPages())

    <div class="py-4 text-sm flex">
        <div class="w-full hidden my-auto sm:w-1/2 sm:block">
            Showing {{$paginator->firstItem()}} -  {{$paginator->lastItem()}} items out of {{ $paginator->total() }}
        </div>

        <div class="w-full sm:w-1/2 my-auto">
            <div class="flex justify-end">
                <div class="mr-4 my-auto">
                    {{$paginator->currentPage()}} of {{$paginator->lastPage()}}
                </div>


                <div class="pagination">
                    @if ($paginator->onFirstPage())
                        <div class="pagination-items group disabled">
                            <div class="fa fa-angle-left pagination-items-icon disabled"></div>
                            <div style="color: #aaa;">
                                Prev
                            </div>
                        </div>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" class="pagination-items group">
                            <div class="fa fa-angle-left pagination-items-icon"></div>
                            <div>
                                Prev
                            </div>
                        </a>
                    @endif


                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" class="pagination-items group">
                            <div>
                                Next
                            </div>
                            <div class="fa fa-angle-right pagination-items-icon text-right"></div>
                        </a>
                    @else
                        <div class="pagination-items group disabled">
                            <div style="color: #aaa;">
                                Next
                            </div>
                            <div class="fa fa-angle-right pagination-items-icon text-right disabled"></div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endif
