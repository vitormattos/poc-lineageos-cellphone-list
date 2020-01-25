@if (isset($modelname))
{{ $modelname }}:&nbsp;
@endif
@if (!empty($battery_data['removable']))
    Removable
@else
    Non-removable
@endif &nbsp;
@if (!empty($battery_data['tech']))
    {{ $battery_data['tech'] }}&nbsp;
@endif
@if (!empty($battery_data['capacity']))
    {{ $battery_data['capacity'] }} mAh
@endif
@if (!empty($battery_data['fastcharge']))
    &nbsp;with fast charging
@endif
