@if (isset($modelname))
{{ $modelname }}:&nbsp;
@endif
@if (!empty($battery_data['removable']))
    Removable
@else
    Non-removable
@endif &nbsp;
@if ($battery_data['tech'])
    {{ $battery_data['tech'] }}&nbsp;
@endif
{{ $battery_data['capacity'] }} mAh
@if ($battery_data['fastcharge'])
    &nbsp;with fast charging
@endif
