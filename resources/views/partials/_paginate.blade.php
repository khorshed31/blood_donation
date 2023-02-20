{{--@if ($data->appends(request()->query())->count() > 0)--}}
    <nav aria-label="..." style="float: right" class="my-1">
        <ul class="pagination mb-0">
            <li class=" @if($data->appends(request()->query())->currentPage() == 1) disabled @endif page-item">
                <a class="page-link" href="{{ $data->appends(request()->query())->url(1) }}">← First</a>
            </li>

            <li class=" @if($data->appends(request()->query())->currentPage() == 1) disabled @endif page-item">
                <a class="page-link" href="{{ $data->appends(request()->query())->previousPageUrl() }}"><i class="uil-backward"></i></a>
            </li>
            @foreach(range(1, $data->appends(request()->query())->lastPage()) as $i)
                @if($i >= $data->appends(request()->query())->currentPage() - 4 && $i <= $data->appends(request()->query())->currentPage() + 4)
                    @if ($i == $data->appends(request()->query())->currentPage())
                        <li class="active page-link"><span>{{ $i }}</span></li>
                    @else
                        <li><a href="{{ $data->appends(request()->query())->url($i) }}" class="page-link">{{ $i }}</a></li>
                    @endif
                @endif
            @endforeach

            <li class=" @if($data->appends(request()->query())->lastPage() == $data->appends(request()->query())->currentPage()) disabled @endif page-item">
                <a class="page-link" href="{{ $data->appends(request()->query())->nextPageUrl() }}"><i class="uil-forward"></i></a>
            </li>
            <li class=" @if($data->appends(request()->query())->lastPage() == $data->appends(request()->query())->currentPage()) disabled @endif page-item">
                <a class="page-link" href="{{ $data->appends(request()->query())->url($data->lastPage()) }}">Last →</a>
            </li>
        </ul>
    </nav>




