@extends('layouts.app')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="container">
        <div class="row">
            <div class="col-12 text-white my-5">
                <h3>Incassi degli ultimi sei mesi</h3>
                <canvas id="line-chart"></canvas>
            </div>

            <div class="col-12 text-white my-5">
                <h3 class="my-5">Ordini ricevuti negli ultimi sei mesi</h3>
                <canvas id="orders-line-chart"></canvas>
            </div>
        </div>
    </div>

    {{-- Include il codice JavaScript --}}
    <script>
            // PRIMO GRAFICO
            // Recupera i dati delle ordinazioni dal server
            let orders = {!! json_encode($orders) !!};

            // Inizializza i mesi e gli incassi
            let lastEightMonths = [];
            let lastEightMonthsIncoming = Array(8).fill(0);
            let lastEightMonthsTotal = Array(8).fill(0);

            // Popola i mesi degli ultimi otto mesi
            for (let i = 0; i < 8; i++) {
                let currentDate = new Date();
                currentDate.setMonth(currentDate.getMonth() - i);
                lastEightMonths.push(currentDate.toLocaleString('default', { month: 'long' }));
            }

            // Inverti l'array dei mesi
            lastEightMonths.reverse();

            // Calcola gli incassi degli ultimi otto mesi
            orders.forEach(order => {
                let orderDate = new Date(order.created_at);
                let orderMonth = orderDate.getMonth();
                let orderYear = orderDate.getFullYear();
                let orderPrice = order.price;

                // Controlla che l'ordine sia nell'anno corrente
                if (orderYear === new Date().getFullYear() && orderMonth < 8) {
                    lastEightMonthsTotal[orderMonth] += orderPrice;

                    if (order.status !== 0) {
                        lastEightMonthsIncoming[orderMonth] += orderPrice;
                    }
                }
            });

            // Configura il grafico a linee
            const line = document.getElementById('line-chart');
            new Chart(line, {
                type: 'line',
                data: {
                    labels: lastEightMonths,
                    datasets: [{
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
            // SECONDO GRAFICO
            const ordersLine = document.getElementById('orders-line-chart');
            lastSixMonths = [];
            for (let i = 0; i < 6; i++) {
                lastSixMonths.push(new Date(new Date().setMonth(new Date().getMonth() - i)).getMonth() + 1)
            }

            let ordersInLastSixMonth = [0, 0, 0, 0, 0, 0]

            orders.forEach(order => {
                let month = new Date(order.created_at).getMonth() + 1
                lastSixMonths.indexOf(month) !== -1 ? ordersInLastSixMonth[lastSixMonths.indexOf(month)] += 1 : null
            })

            lastSixMonths.forEach((month, i) => {
            switch (month) {
                    case 1:
                        lastSixMonths[i] = 'Gennaio';
                        break;
                    case 2:
                        lastSixMonths[i] = 'Febbraio';
                        break;
                    case 3:
                        lastSixMonths[i] = 'Marzo';
                        break;
                    case 4:
                        lastSixMonths[i] = 'Aprile';
                        break;
                    case 5:
                        lastSixMonths[i] = 'Maggio';
                        break;
                    case 6:
                        lastSixMonths[i] = 'Giugno';
                        break;
                    case 7:
                        lastSixMonths[i] = 'Luglio';
                        break;
                    case 8:
                        lastSixMonths[i] = 'Agosto';
                        break;
                    case 9:
                        lastSixMonths[i] = 'Settembre';
                        break;
                    case 10:
                        lastSixMonths[i] = 'Ottobre';
                        break;
                    case 11:
                        lastSixMonths[i] = 'Novembre';
                        break;
                    case 12:
                        lastSixMonths[i] = 'Dicembre';
                        break;
                    default:
                        break;
                }
            })

            lastSixMonths = lastSixMonths.reverse()
            ordersInLastSixMonth = ordersInLastSixMonth.reverse()

            new Chart(ordersLine, {
            type: 'line',
            data: {
                labels: lastSixMonths,
                datasets: [{
                    label: 'Ordini',
                    data: ordersInLastSixMonth,
                    borderWidth: 1,
                    borderColor: 'rgba(142, 250, 246, 1)',
                    backgroundColor: 'rgba(142, 250, 246, 1)'
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