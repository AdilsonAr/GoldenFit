<style>
    table {
        border-spacing: 0;
    }

    td,
    tr {
        text-align: center;
        border: 1px solid black;
    }

</style>

<body>
    <table width="100%" border="1px">
        <tr>
            <td>Concepto</td>
            <td>Debe</td>
            <td>Haber</td>
        </tr>
        <tr>
            <td>Monto inicial</td>
            <td>{{ number_format($bank->initial_amount, 2) }}</td>
            <td></td>
        </tr>
        @foreach ($debe as $value)
            <tr>
                <td>{{ $value->concept }}</td>
                <td>{{ number_format($value->net_total, 2) }}</td>
                <td></td>
            </tr>
        @endforeach
        @foreach ($haber as $value)
            <tr>
                <td>{{ $value->concept }}</td>
                <td></td>
                <td>{{ number_format($value->net_total, 2) }}</td>
            </tr>
        @endforeach
        <tr>
            <td><b>Total (US$)</b></td>
            <td>{{ number_format($totalDebe, 2) }}</td>
            <td>{{ number_format($totalHaber, 2) }}</td>
        </tr>
    </table>
</body>
