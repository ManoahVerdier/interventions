<p>Bonjour</p>
<p>Vous avez recu une demande d'intervention depuis sav.odice.info </p>
<p>
    Utilisateur : {{ $username }}
</p>
<p>
    Client: {{ $client }}
</p>
<p>
    Description du problème : {{ $description }}
</p>
<p>
    Gravité : {{ $gravite }}
</p>

<p>
    Photo : <br>
    <a href="{{ URL::to('/').$image }}">
        <img style="max-width:800px;height:auto" src="{{ URL::to('/').$image }}">
    </a>
</p>

Bonne journée