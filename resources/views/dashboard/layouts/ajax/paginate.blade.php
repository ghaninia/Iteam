@if (isset($items))
    {{ $items->fragment($fragment ?? "")->appends( request()->all() )->links("dashboard.layouts.paginate") }}
@endif
