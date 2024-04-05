@extends('layouts.app')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="container">
        <div class="row">
            <div class="col-12 text-white my-5">
                <h3>Incassi degli ultimi sei mesi</h3>
                <canvas id="line-chart"></canvas>
            </div>
        </div>
    </div>

    {{-- Include il codice JavaScript --}}
    <script>
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
    </script>
@endsection