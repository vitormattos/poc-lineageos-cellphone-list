---
pagination:
  collection: device
  perPage: 5
---
<?php
$oi = 'teste';
$this->teste = 'asdfad';
?>
@extends('_layouts.master')

@section('body')
    <h4 class="text-uppercase text-dark-soft wt-light">
        Total Posts: <strong>{{ $device->count() }}</strong>
    </h4>
@endsection
