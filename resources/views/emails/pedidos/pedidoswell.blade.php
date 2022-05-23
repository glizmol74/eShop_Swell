@component('emails.message')

    <h1 class="sys-title"> {{ $data['msg'][1][0]}}</h1>
    <hr class="sys-separador">

    <br />
    <h2 class="sys-subtitle">{{$data['msg'][1][1]}} </h2> 

    <div class="sys-body">
        <br />
        <p> {{$data['msg'][1][2]}} </p>
        <p><b>Código Tempo : </b> {{$data['cliente']->cli_cod}} </p>
        <p><b>Nombre ó Razón Social : </b> {{$data['cliente']->cli_razon}} </p>
        <p><b>Cuit : </b> {{$data['cliente']->cli_cuit}} </p>
        <br />
        <p> {{$data['msg'][1][6]}} <b> : {{$data['cabecera']->doc_numero}} </b></p>
        <br />
        <div style="overflow-x:auto;">
            <table style="width:100%; text-align:center" class="rpedido">
                <tr>
                    <th class="rpedido">{{$data['msg'][1][7]}}</th>
                    <th class="rpedido">{{$data['msg'][1][8]}}</th>
                    <th class="rpedido">{{$data['msg'][1][9]}}</th>
                    <th class="rpedido">{{$data['msg'][1][10]}}</th>
                    <th class="rpedido">{{$data['msg'][1][11]}}</th>
                    <th class="rpedido">{{$data['msg'][1][12]}}</th>
                    <th class="rpedido">{{$data['msg'][1][13]}}</th>
                </tr>
                @foreach( $data['detalle'] as $items )
                    <tr>
                        <td class="rpedido">{{$items['ddt_cod_tempo']}}</td>
                        <td class="rpedido" align="left">{{$items['ddt_descripcion']}}</td>
                        <td class="rpedido">{{$items['ddt_cantidad'] }}</td>
                        <td class="rpedido" align="right">@php echo  number_format($items['ddt_precio'],2, ",", "," ); @endphp</td>
                        <td class="rpedido" align="right">@php echo  number_format(($items['ddt_cantidad'] * $items['ddt_precio']),2, ",", "," ); @endphp</td>
                        <td class="rpedido"> @php echo  number_format($items['ddt_tax'],2, ",", "," ); @endphp</td>
                        <td class="rpedido" align="right">@php echo  number_format( ( ( $items->ddt_cantidad * $items->ddt_precio) + ( $items->ddt_cantidad * $items->ddt_precio * $items->ddt_tax / 100 ) ) ,2, ",", "," ); @endphp</td>
                    </tr>
                @endforeach
                <tr>
                    <td class="resumen"></td>
                    <td class="resumen"></td>
                    <td class="resumen"></td>
                    <td class="resumen"></td>
                    <td class="resumen">Sub Total</td>
                    <td class="resumen"></td>
                    <td class="resumen">@php echo  number_format($data['cabecera']->doc_subtotal,2, ",", "," ); @endphp</td>
                </tr>

                <tr>
                    <td class="resumen"></td>
                    <td class="resumen"></td>
                    <td class="resumen"></td>
                    <td class="resumen"></td>
                    <td class="resumen">IVA</td>
                    <td class="resumen"></td>
                    <td class="resumen">@php echo  number_format($data['cabecera']->doc_iva,2, ",", "," ); @endphp</td>
                </tr>

                <tr>
                    <td class="resumen"></td>
                    <td class="resumen"></td>
                    <td class="resumen"></td>
                    <td class="resumen"></td>
                    <td class="resumen">Total</td>
                    <td class="resumen"></td>
                    <td class="resumen">@php echo  number_format($data['cabecera']->doc_total,2, ",", "," ); @endphp</td>
                </tr>
            </table>
            <br />
            <p><b>observación : </b>{{$data['cabecera']->doc_observacion}}</p>
        </div>
        <br />
        <br />
        <br />
        <p> {{$data['msg'][1][14]}}  {{$data['msg'][1][15]}}  </p>
        <br />
        <br />
        @component('mail::button', [ 'url' => config('app.url').'/login'])
            {{$data['msg'][1][15]}}
        @endcomponent
        <br />
        <br />
    </div>
    @component('emails.pre_footer')
    @endcomponet
@endcomponent