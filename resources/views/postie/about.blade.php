@extends('layouts.master')










@section('main')


<div class="panel panel-default">
    <div class="panel-body">
        <div class="panel-heading"><h2>About Postie</h2></div>
        <hr>
        <p>Pozdrav zovem se Goran bavim se razvojem web aplikacija
            uglavnom u PHP programskom jeziku.
            Postie je demonstracija dela mog znanja...
            Radjena je u Laravel Framework-u.
            Dizajn je ukraden i izmenjen malo za potrebe aplikacije.
            Namerno nisam MAZNUO NADRKANI template hteo sam se iscimam pa šta bude...
            Aplikacija je radjena u Laravel-u + samo malo JS-a i frontend  Bootstrap, HTML I CSS zanimacija :)
        <div>
            <p>Na ovoj strani možeš:</p>
            <ul>
                <li><a href="{{ route('register') }}">Da se registruješ</a></li>
                <li><a href="{{ route('login') }}">Da Se loguješ</a></li>
                <li><a href="{{ route('postie.create') }}">Da postuješ nešto...šta god al moraš da se registruješ...</a></li>
                <li>Razgledaš..</li>
                <li> komentarišeš..</li>
                <li>Brišeš i ažuriraš svoje postove..</li>
                <li>Razgledaš postove po datumu ili nasumično izabrane</li>
                <li>Špijuniraš tudje profile..</li>
                <li> ..i..</li>
                <li>Za sada toliko..</li>
            </ul>
        </div> 
        </p>
    <a href="https://getbootstrap.com/examples/blog/" target="_blank">Početna ukradena odavde</a> 
</div>
</div>




@stop