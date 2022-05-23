<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Swell-eShop')
<img src="{{url('/storage/images/logoEmpresa.png')}}" class="logo" alt="Laravel Logo"  width="150px">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
