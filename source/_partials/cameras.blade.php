<strong>{{ count($device->cameras) }}</strong>
<?php /*
@if ($device->cameras)
<ul class="list-group">
    <li class="list-group-item">
    </li>
    @foreach ($device->cameras as $camera)
        <li class="list-group-item">
        @if ($camera['flash'])
            <?php
            $numbers = [
                '0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,
                '3' => 'three','4' => 'four','5' => 'five',
                '6' => 'six','7' => 'seven','8' => 'eight',
                '9' => 'nine'
            ];
            echo Emojione\Emojione::getClient()->toImage(':' . $numbers[$loop->iteration] . ':');
            ?>
            <i class="fa fa-bolt" aria-hidden="true"></i>
            {{ $camera['flash'] }}
        @endif
        {{ $camera['info'] }}
        </li>
    @endforeach
</ul>
@else
    None
@endif
*/?>