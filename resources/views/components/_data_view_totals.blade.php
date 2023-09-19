@if (Auth::user()->name == 'User: Chris Hawker')
    <table class="tablesum">
        <thead>
        <tr>
            <th>Year</th>
            <th>30 Day</th>
            <th>{{date('M')}}</th>
            <th>Week</th>
            <th>{{date('D')}}</th>
        </tr>
        </thead>
        <tbody>

        <tr style="height:25px;">
            <td class="sum" style="font-size:14px;">{{ $invoiceTotals['year'] }} </td>
            @if ( $invoiceTotals['thirty'] >= '15000')
                <td class="sum" style="font-size:14px; color:lime;">{{ $invoiceTotals['thirty'] }} </td>
            @else
                <td class="sum" style="font-size:14px;">{{ $invoiceTotals['thirty'] }} </td>
            @endif
            <td class="sum" style="font-size:14px;">{{ $invoiceTotals['month'] }} </td>
            @if ( $invoiceTotals['week'] >= '3000')
                <td class="sum" style="font-size:14px; color:lime;">{{ $invoiceTotals['week'] }} </td>
            @else
                <td class="sum" style="font-size:14px;">{{ $invoiceTotals['week'] }} </td>
            @endif
            @if ( $invoiceTotals['daily'] >= '600')
                <td class="sum" style="font-size:14px; color:lime;">{{ $invoiceTotals['daily'] }} </td>
            @else
                <td class="sum" style="font-size:14px;">{{ $invoiceTotals['daily'] }} </td>
            @endif
        </tr>
        </tbody>
    </table>
@endif