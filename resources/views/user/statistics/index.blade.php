@extends('layouts.app')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="container">
        <div class="row">
            
            <div class="col-12 my-5 card bg-blur ">
                <div class="card-header text-white super-ocean">
                    <h3 class="my-4">Ordini ricevuti negli ultimi sei mesi</h3>
                </div>
                <div class="card-body mb-4">
                    <canvas id="orders-line-chart"></canvas>
                </div>
            </div>

            <div class="col-12 my-5 card bg-blur ">
                <div class="card-header text-white super-ocean">
                    <h3 class="my-4">Rapporto quantità/ordini piatti</h3>
                </div>
                <div class="card-body mb-4">
                    <canvas id="dishes-mixed-chart"></canvas>
                </div>
            </div>

        </div>
    </div>

    <script>
        // PRIMO GRAFICO
        
        // Recupera i dati delle ordinazioni dal server
        let orders = {!! json_encode($orders) !!};
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
        Chart.defaults.color = '#fff';
        new Chart(ordersLine, {
            type: 'line',
            data: {
                labels: lastSixMonths,
                datasets: [{
                    label: 'Ordini',
                    data: ordersInLastSixMonth,
                    borderWidth: 1,
                    borderColor: 'rgba(142, 250, 246, 1)',
                    backgroundColor: 'rgba(142, 250, 246, 1)',
                    
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

        const dishes = {!! json_encode($dishes) !!};
        let dishesQuantity = [];
        let totalQuantity = 0;
        dishes.forEach(dish => {
            dishesQuantity.push(0)
        })
        orders.forEach(order => {
            order.dishes.forEach(dish => {
                totalQuantity += dish.pivot.quantity
                dishes.forEach((d, i) => {
                    if (d.name === dish.name) {
                        dishesQuantity[i] += dish.pivot.quantity
                    }
                })
            })
        })
        let dishesQuantityPercentage = dishesQuantity.map(dish => {
            return (dish / totalQuantity) * 100
        })
        const dishesMixed = document.getElementById('dishes-mixed-chart');

        const dishesMixedChart = new Chart(dishesMixed, {
            data: {
                datasets: [{
                    type: 'bar',
                    label: 'Quantità',
                    data: dishes.map(dish => dish.price),
                    borderWidth: 2,
                    borderColor: 'rgba(142, 250, 246, 1)',
                    backgroundColor: 'rgba(142, 250, 246, 0.2)'
                }, {
                    type: 'line',
                    label: 'Percentuale piatto ordinato',
                    data: dishesQuantityPercentage,
                    borderColor: 'rgb(255, 33, 33)',
                    backgroundColor: 'rgb(255, 33, 33)'
                }],
                labels: dishes.map(dish => dish.name)
            },
            options: {
                onHover: (e) => {
                    const canvasPosition = Chart.helpers.getRelativePosition(e, dishesMixedChart);
                    const dataX = dishesMixedChart.scales.x.getValueForPixel(canvasPosition.x);
                    const dataY = dishesMixedChart.scales.y.getValueForPixel(canvasPosition.y);
                    if (dishes.map(dish => dish.price)[dataX] >= dataY && dataY >= 0) {
                        dishesMixed.style.cursor = 'pointer';
                    } else {
                        dishesMixed.style.cursor = 'default';
                    }
                },
                onClick: (e) => {
                    const canvasPosition = Chart.helpers.getRelativePosition(e, dishesMixedChart);
                    const dataX = dishesMixedChart.scales.x.getValueForPixel(canvasPosition.x);
                    const dataY = dishesMixedChart.scales.y.getValueForPixel(canvasPosition.y);
                    if (dishes.map(dish => dish.price)[dataX] >= dataY) location.href =
                        `/admin/dishes/${dishes[dataX].id}`
                },
            }
        });  
            
    </script>
@endsection