<div class="cms-options-foot col-md-12">
    <div class="cms-options-pagination-stats">

        {!! $items->appends(Request::except('page'))->render() !!}
        @if ($items->total() > 0)
            <p class="cms-options-stats">Showing {{ $items->firstItem() }} - {{ $items->lastItem() }}  of {{ $items->total() }}</p>
        @endif
    </div> <!-- =cms-options-pagination-stats -->
</div>