@php
$menu = config('sidemenu');
@endphp
<div class="col-lg-3">
    <div class="hero__categories">
        <div class="hero__categories__all">
            <i class="fa fa-bars"></i>
            <span>Danh mục</span>
        </div>
        <div {{ $attributes }}>
            <ul>
                @foreach ($menu as $menuItem)
                <li><a href="{{ $menuItem['route'] }}">{{ $menuItem['item'] }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>