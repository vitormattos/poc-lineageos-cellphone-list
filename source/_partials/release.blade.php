<?php
$months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
if(is_numeric($release) && $release > 10000) {
    $release = explode('-', date('Y-m-d', $release));
} elseif (is_array($release)) {
    $current = current($release);
    if (is_numeric($current) && $current > 10000) {
        $release = explode('-', date('Y-m-d', $current));
    } elseif(count($release) == 1) {
        $release = $release[0];
    }
}
?>
@if (is_array($release)) 
    @if (count($release) == 2)
        <?php $cur_month = $release[1]-1; ?>
        {{ $months[$cur_month] }} {{ $release[0] }}
    @elseif (count($release) == 3)
        <?php $cur_month = $release[1]-1; ?>
        {{ $months[$cur_month] }} {{ $release[2] }}, {{ $release[0] }}
    @endif
@else
    {{ $release }}
@endif
