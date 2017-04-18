@extends('layouts.master')










@section('main')


<div class="panel panel-default">
    <div class="panel-body">
        <div class="panel-heading"><h2>About Postie</h2></div>
        <hr>
        <p>Moje ime je Goran bavim se razvojem web aplikacija u
            PHP-u. <br></p>
           <p>Postie je blog aplikacija i demonstracija dela mog znanja. <br>
            Dizajn je <a href="https://getbootstrap.com/examples/blog/" target="_blank">pozajmljen odavde</a> i izmenjen malo za potrebe aplikacije.
            Aplikacija je radjena u Laravel framework-u 
            </p>
        <div>
            <p>Na ovoj strani možeš:</p>
            <ul>
                <li><a href="{{ route('register') }}">Da se registruješ</a></li>
                <li><a href="{{ route('login') }}">Da se loguješ</a></li>
                <li><a href="{{ route('postie.create') }}">Da napraviš post koji mogu da vide ostali članovi</a></li>
                <li>Pročitaš postove članova</li>
                <li>..komentarišeš..</li>
                <li>..razgledaš postove po datumu ili nasumično izabrane</li>
                <li>Brišeš i ažuriraš svoje postove</li>
                <li>Pogledaš profil drugog korisnika</li>
                <li>Za sada toliko..</li>
            </ul>
        </div> 
        </p>
    
</div>
</div>




@stop