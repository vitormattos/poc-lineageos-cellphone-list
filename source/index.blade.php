---
title: Home
pagination:
  collection: device
---
@extends('_layouts.master')
@section('body')
<section class="section-content padding-y">
    <div class="container">
    <div class="row">
        <main class="col-md-12">
        <header class="border-bottom mb-4 pb-3">
            <div class="form-inline">
                <span class="mr-md-auto">{{ $device->count() }} Items found </span>
            </div>
        </header>
    @foreach ($pagination->items as $device)
        <article class="card card-product-list">
            <div class="row no-gutters">
                <aside class="col-md-3">
                    <a href="{{ $page->baseUrl }}/device/{{ $device->codename }}" class="img-wrap"><img src="{{ $page->baseUrl }}/images/devices/{{ $device->image }}" class="img-thumbnail"></a>
                </aside>
                <div class="col-md-9">
                    <div class="info-main">
                        <a href="{{ $page->baseUrl }}/device/{{ $device->codename }}" class="h5 title">{{ $device->vendor }} {{ $device->name }}</a>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $device->vendor }} {{ $device->name }}</td>
                                    <th>Release</th>
                                    <td>{{ $device->singleRelease }}</td>
                                </tr>
                                <tr>
                                    <th>Cameras</th>
                                    <td>
                                        @include('_partials.cameras')
                                    </td>
                                    <th>Branch</th>
                                    <td>{{ $device->current_branch }}</td>
                                </tr>
                                <tr>
                                    <th>Battery</th>
                                    <td>
                                        @if (is_string($device->battery))
                                            {{ $device->battery }}
                                        @elseif(!empty($device->battery['capacity']) && !empty($device->battery['tech']))
                                            {{ $device->battery['capacity'] }} {{ $device->battery['tech'] }}
                                        @endif
                                    </td>
                                    <th>Name</th>
                                    <td>{{ $device->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </article>
    @endforeach
    
    
    
    <nav aria-label="Page navigation sample">
      <ul class="pagination justify-content-center">

        @if ($previous = $pagination->previous)
            <li class="page-item">
                <a class="page-link" href="{{ $page->baseUrl }}{{ $pagination->first }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="{{ $page->baseUrl }}{{ $previous }}">Previous</a></li>
        @else
            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
        @endif
        @foreach ($pagination->pages as $pageNumber => $path)
            @if ($pagination->currentPage < $pageNumber -4 || $pagination->currentPage > $pageNumber + 4)
                @continue
            @endif
            <li class="page-item {{ $pagination->currentPage == $pageNumber ? 'active' : '' }}">
                <a href="{{ $page->baseUrl }}{{ $path }}" class="page-link">
                    {{ $pageNumber }}
                </a>
            </li>
        @endforeach
        @if ($next = $pagination->next)
            <li class="page-item"><a class="page-link" href="{{ $page->baseUrl }}{{ $next }}">Next</a></li>
            <li class="page-item">
              <a class="page-link" href="{{ $page->baseUrl }}{{ $pagination->last }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
        @else
            <li class="page-item disabled"><a class="page-link" href="{{ $page->baseUrl }}{{ $next }}">Next</a></li>
        @endif
      </ul>
    </nav>
        </main>
    </div>
    </div>
</section>
@endsection