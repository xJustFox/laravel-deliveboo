@extends('layouts.app')

@section('content')

    {{-- CDN chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="container">
        <div class="row">
            <div class="col-12 text-white my-5">
                <h3>Incassi degli ultimi sei mesi</h3>
                <canvas id="line-chart"></canvas>
            </div>
        </div>
    </div>


    <script>
        let orders = {!! json_encode($orders) !!};

        // Line chart
        const line = document.getElementById('line-chart');
        let lastEightMonths = [];
        let lastEightMonthsIncoming = [0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00];
        let lastEightMonthsTotal = [0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00];
        let incomingTotal = [0.00, 0.00]
        for (let i = 0; i < 8; i++) {
            lastEightMonths.push(new Date(new Date().setMonth(new Date().getMonth() - i)).getMonth() + 1)
        }

        lastEightMonths = lastEightMonths.reverse();

        orders.forEach(order => {
            if (order.status !== 0) {
                incomingTotal[1] += order.price;
            }
            if (order.status !== 0) {
                incomingTotal[0] += order.price;
            }
            if (lastEightMonths.includes(new Date(order.created_at).getMonth() + 1)) {
                lastEightMonthsTotal[lastEightMonths.indexOf(new Date(order.created_at)
                    .getMonth() + 1)] += order.price;

                if (order.status !== 0) {
                    lastEightMonthsIncoming[lastEightMonths.indexOf(new Date(order.created_at).getMonth() +
                        1)] += order.price
                }
            }
        })

        lastEightMonths.forEach((month, i) => {
            switch (month) {
                case 1:
                    lastEightMonths[i] = 'Gennaio';
                    break;
                case 2:
                    lastEightMonths[i] = 'Febbraio';
                    break;
                case 3:
                    lastEightMonths[i] = 'Marzo';
                    break;
                case 4:
                    lastEightMonths[i] = 'Aprile';
                    break;
                case 5:
                    lastEightMonths[i] = 'Maggio';
                    break;
                case 6:
                    lastEightMonths[i] = 'Giugno';
                    break;
                case 7:
                    lastEightMonths[i] = 'Luglio';
                    break;
                case 8:
                    lastEightMonths[i] = 'Agosto';
                    break;
                case 9:
                    lastEightMonths[i] = 'Settembre';
                    break;
                case 10:
                    lastEightMonths[i] = 'Ottobre';
                    break;
                case 11:
                    lastEightMonths[i] = 'Novembre';
                    break;
                case 12:
                    lastEightMonths[i] = 'Dicembre';
                    break;
                default:
                    break;
            }
        })

        new Chart(line, {
            type: 'line',
            data: {
                labels: lastEightMonths,
                datasets: 
                [{
                    label: 'Totale Netto',
                    data: lastEightMonthsIncoming,
                    hoverBorderWidth: 5,
                    borderWidth: 1,
                    borderColor: 'rgb(31, 135, 88)',
                    backgroundColor: 'rgb(31, 135, 88)',
                    
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endsection