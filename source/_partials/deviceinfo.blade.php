<div class="row no-gutters">
    <div class="col-md-6">
        <img src="{{ $page->baseUrl }}/images/devices/{{ $page->image }}" class="page-device-image" />
    </div>
    <table class="deviceinfo table col-md-6">
        <tbody>
        <tr>
            <th colspan="2" class="head">{{ $page->vendor }} {{ $page->name }} ({{ $page->codename }})</th>
        </tr>
        <tr>
            <th scope="row">Released</th>
            <td>
            @if (is_array($page->release))
                @foreach($page->release as $release)
                    <?php
                    $model = key($release);
                    $release = current($release);
                    ?>
                    {{ $model }}: @include('_partials.release')
                    @if(!$loop->last)
                        <br/>
                    @endif
                @endforeach
            @else
                <?php $release = explode('-', $page->release); ?>
                @include('_partials.release')
            @endif
            </td>
        </tr>
    
        <tr>
        @if ($page->carrier)
        <tr>
            <th scope="col">Carrier</td>
            <td>{{ $page->carrier }}</td>
        </tr>
        @endif
        </tr>
    
        <tr>
            <th scope="row" colspan="2" class="head">Specifications</td>
        </tr>
        <tr>
            <th scope="row">SoC</td>
            <td>{{ $page->soc }}</td>
        </tr>
        <tr>
            <th scope="row">RAM</td>
            <td>{{ $page->ram }}</td>
        </tr>
        <tr>
            <th scope="row">CPU</td>
            <td>
                @switch($page->cpu_cores)
                    @case('1')
                        Single-core
                        @break
                    @case('2')
                        Dual-core
                        @break
                    @case('4')
                        Quad-core
                        @break
                    @case('6')
                        Hexa-core
                        @break
                    @case('8')
                        Octa-core
                        @break
                    @default
                        {{ $page->cpu_cores }}x
                @endswitch {{ $page->cpu }}<br>{{ $page->cpu_freq }}
            </td>
        </tr>
        <tr>
            <th scope="row">Architecture</td>
            <td>
                @if (is_array($page->architecture))
                    CPU: {{ $page->architecture['cpu'] }}<br/>
                    Android: {{ $page->architecture['userspace'] }}
                @else
                    {{ $page->architecture }}
                @endif
            </td>
        </tr>
        <tr>
            <th scope="row">GPU</td>
            <td>{{ $page->gpu }}</td>
        </tr>
        @if ($page->network && isset($page->network[0]->bands))
        @if ($page->network[0]->bands != '' or $page->network[1]->bands != '' or $page->network[2]->bands != '')
        <tr>
            <th scope="row">Network</td>
            <td>
                <ul>
                    @foreach ($page->network as $el)
                        @if ($el->bands != '')
                            <li>{{ $el->tech }} bands: {{ $el->bands }}</li>
                        @else
                            @continue
                        @endif
                    @endforeach
                </ul>
            </td>
        </tr>
        @endif
        @endif
        <tr>
            <th scope="row">Storage</td>
            <td>{{ $page->storage }}</td>
        </tr>
        @if ($page->sdcard)
        <tr>
            <th scope="row">SD card</td>
            <td>{{ $page->sdcard }}</td>
        </tr>
        @endif
        @if ($page->screen != 'None')
        <tr>
            <th scope="row">Screen</td>
            <td>
                @if (is_string($page->screen))
                    {{ $page->screen }}
                @else
                    <ul>
                    @foreach($page->screen as $screen)
                        <li>{{ key($screen) }} - {{ current($screen) }}</li>
                    @endforeach
                    </ul>
                @endif <br>
                {{ $page->screen_res }} ({{ $page->screen_ppi }} PPI)<br>
                {{ $page->screen_tech }}
            </td>
        </tr>
        @endif
        @if ($page->bluetooth)
        <tr>
            <th scope="row">Bluetooth</td>
            <td>
                @if (!empty($page->bluetooth['profiles']))
                    {{ $page->bluetooth['spec'] }} with <?php echo implode(', ', $page->bluetooth['profiles']); ?>
                @else
                    {{ $page->bluetooth['spec'] }}
                @endif
            </td>
        </tr>
        @endif
        @if ($page->wifi)
        <tr>
            <th scope="row">Wi-Fi</td>
            <td>{{ $page->wifi }}</td>
        </tr>
        @endif
        @if ($page->peripherals != 'None')
        <tr>
            <th scope="row">Peripherals</td>
            <td>
                <ul>
                @foreach($page->peripherals as $peripheral)
                    <li>{{ $peripheral }}</li>
                @endforeach
                </ul>
            </td>
        </tr>
        @endif
        @if ($page->cameras and count($page->cameras) > 0)
        <tr>
            <th scope="row">Cameras</td>
            <td>{{ count($page->cameras) }}
                <ul>
                    @foreach($page->cameras as $el)
                        <li>
                            {{ $el['info'] }},
                            @if ($el['flash'] != '')
                                {{ $el['flash'] }}
                            @else
                                No
                            @endif flash
                        </li>
                    @endforeach
                </ul>
            </td>
        </tr>
        @endif
        @if ($page->height and $page->width and $page->depth)
        <tr>
            <th scope="row">Dimensions</td>
            <td>
                @if (is_string($page->height))
                    {{ $page->height }} (h)<br>
                @else
                    <ul>
                        @foreach($page->height as $height)
                            <li>{{ key($height) }} - {{ current($height) }}</li>
                        @endforeach
                    </ul>
                @endif
                @if (is_string($page->width))
                    {{ $page->width }} (w)<br>
                @else
                    <ul>
                        @foreach($page->width as $width)
                            <li>{{ key($width) }} - {{ current($width) }}</li>
                        @endforeach
                    </ul>
                @endif
                @if (is_string($page->depth))
                    {{ $page->depth }} (d)<br>
                @else
                    <ul>
                        @foreach($page->depth as $depth)
                            <li>{{ key($depth) }} - {{ current($depth) }}</li>
                        @endforeach
                    </ul>
                @endif
            </td>
        </tr>
        @endif
        @if ($page->battery != 'None')
        <tr>
            <th scope="row">Battery</td>
            <td>
                @if (is_numeric(key($page->battery)))
                    @foreach($page->battery as $modelname => $battery_data)
                        @include('_partials/battery')
                        @if(!$loop->last)
                            <br/>
                        @endif
                    @endforeach
                @else
                    <?php $battery_data = $page->battery; ?>
                    @include('_partials/battery')
                @endif
            </td>
        </tr>
        @endif
        <!-- lineage info -->
        @if ($page->maintainers != '')
        <tr>
            <th scope="row" colspan="2" class="head">LineageOS info</td>
        </tr>
        <tr>
            <th scope="row">Maintainers</td>
            <td>
                <ul>
                    @foreach($page->maintainers as $el)
                        <li>{{ $el }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        @if ($page->models)
        <tr>
            <th scope="row">Supported models</td>
            <td>
                <ul>
                @foreach($page->models as $model)
                <li> {{ $model }}
                @endforeach
                </ul>
            </td>
        </tr>
        @endif
        <tr>
            <th scope="row">Supported versions</td>
            <td>
                <ul>
                    @foreach($page->versions as $el)
                        <li>{{ $el }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        @endif
    
        </tbody>
    </table>
</div>