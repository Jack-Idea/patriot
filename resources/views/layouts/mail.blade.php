Имя: {{ $lastname }} {{ $firstname }}
<br>
Присутствие: {{ $invite }}
<br>
Плюс один: {{ $plus_one }}
<br>
@foreach($alcohol as $alco)
{{ $alco['name'] }}
<br>
@endforeach
