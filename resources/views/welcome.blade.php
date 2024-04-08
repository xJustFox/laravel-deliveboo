@extends('layouts.app')

@section('body-class', 'homepage')

@section('content')

    <section id="homepage">
        <div class="container">
            <div class="row">

                {{-- Sezione benvenuto --}}
                <section class="section_margin">
                    <div class="col-12">
                        <div class="text-center text-white">
                            <img class="img-fluid" src="./img/Logo.png" alt="">
                            <h1 class="super-ocean mt-5 mb-3">Benvenuto su <span class="txt-orange title">Delive</span><span class="txt-gold title">Boo</span></h1>
                            <h5 class="mt-5 subtitle">Qui puoi gestire, modificare e creare i tuoi ristornanti con il relativo menù. hai a disposizione una dashboard per controllare l'andamento del tuo ristorante e dei singoli piatti.</h5>
                        </div>
                    </div>
                </section>

                {{-- Sezione esposizione dei grafici interattivi --}}
                <div class="col-sm-12 col-md-12 col-lg-6 homepage_chart">
                    <div>
                        <img class="w-100 img-fluid rounded" src="{{URL::asset('/img/chart_1.png')}}" alt="">
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 section_margin">
                    <div class="text-white">
                        <h4>Grafici interattivi: prendi il controllo del tuo ristorante con <span class="txt-orange">Delive</span><span class="txt-gold">Boo</span></h4>
                        <p>Con i grafici interattivi di DeliveBoo, hai una finestra cristallina sul tuo ristorante. Monitora vendite, clienti, tempi di attesa e altro ancora, prendendo decisioni informate per ottimizzare il tuo business.</p>
                        <p>DeliveBoo ti aiuta a:</p>
                        <p><i class="fas fa-chart-line me-2"></i>Controllare il tuo ristorante</p>
                        <p><i class="fas fa-user me-2"></i>Prendere decisioni informate</p>
                        <p><i class="fas fa-arrows-rotate me-2"></i>Aggiornare periodicamente</p>
                    </div>
                </div>

                {{-- Sezione indicativa sul funzionamento --}}
                <div class="col-12">
                    <div class="text-white text-center my-5">
                        <h4>Cosa fa <span class="txt-orange">Delive</span><span class="txt-gold">Boo?</span></h4></h4>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="card text-white bg-blur text-center py-4 m-4">
                        <div class="card-body">
                            <i class="fas fa-utensils fs-1"></i>
                            <h6 class="card-title mt-3">Piatti</h6>
                            <p>Gestisci i piatti del tuo ristorante</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="card text-white bg-blur text-center py-4 m-4">
                        <div class="card-body">
                            <i class="fas fa-users fs-1"></i>
                            <h6 class="card-title mt-3">Clienti</h6>
                            <p>Gestisci i clienti del tuo ristorante</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 justify-content-center d-flex">
                    <div class="col-12 col-md-6 text-center">
                        <div class="card text-white bg-blur text-center py-4 m-4">
                            <div class="card-body">
                                <i class="fas fa-clock fs-1"></i>
                                <h6 class="card-title mt-3">Ordini</h6>
                                <p>Gestisci gli ordini del tuo ristorante</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Sezione grafici profitti  --}}
                <div class="col-sm-12 col-md-12 col-lg-6 section_margin">
                    <div class="text-white">
                        <h4>Come <span class="txt-orange">Delive</span><span class="txt-gold">Boo</span></h4> aumenta i tuoi profitti</h4>
                        <p>Deliveboo è la piattaforma di food delivery più innovativa e conveniente sul mercato, progettata per aumentare i profitti del tuo ristorante in modo significativo rispetto ai concorrenti.</p>
                        <p>Ecco alcuni dei modi in cui DeliveBoo ti aiuta a massimizzare le tue entrate:</p>
                        <p><i class="fas fa-users me-2 txt-gold"></i><span class="txt-gold">Ampio bacino di utenti:</span> DeliveBoo vanta una base di clienti in continua crescita, entusiasta di ordinare cibo online. Il tuo ristorante sarà presente sulla nostra piattaforma, raggiungendo un pubblico più ampio e aumentando le tue possibilità di ricevere ordini.</p>
                        <p><i class="fas fa-magnifying-glass me-2 txt-gold"></i><span class="txt-gold">Posizionamento strategico nei risultati di ricerca:</span> DeliveBoo utilizza algoritmi avanzati per posizionare il tuo ristorante in cima ai risultati di ricerca, garantendoti una maggiore visibilità e attirando più clienti.</p>
                        <p><i class="fab fa-btc me-2 txt-gold"></i><span class="txt-gold">Pagamenti agevolati:</span> L'utilizzo di veloci piattaforme di pagamento consentono a DeliveBoo una rapidità nella gestione degli ordini senza eguali.</p>
                        {{-- <p><i class="fas fa-bullhorn me-2 txt-gold"></i><span class="txt-gold">Marketing mirato:</span> Pruomoviamo il tuo ristorante attraverso campagne di marketing mirate sui social media e canali di marketing online, aumentando la consapevolezza del tuo brand e attirando nuovi clienti.</p> --}}
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 homepage_chart">
                    <div>
                        <img class="w-100 img-fluid rounded" src="{{URL::asset('/img/chart_2.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
