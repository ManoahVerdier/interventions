<p>Bonjour</p>
<p>Vous avez recu une demande d'intervention depuis sav.odice.info </p>
<p>
    Société : {{ $societe }}
</p>
<p>
    Utilisateur : {{ $username }}
</p>
<p>
    Client: {{ $client }}
</p>
@if($material ?? false)
    <p>
        Matériel : {{$material->label}} (Modèle : {{$material->model}})
    </p>
    <p>
        Référence : {{$material->serial}}
    </p>
    <p>
        Code P : {{$material->product_code}}
    </p>
@else
    <p>
        Matériel : {{$material_name}} (Non enregistré - saisie libre)
    </p>
@endif
<p>
    Description du problème : {{ $description }}
</p>
<p>
    Gravité : {{ $gravite }}
</p>

@if($image ?? false)
<p>
    Photo : <br>
    <a href="{{ URL::to('/').$image }}">
        <img style="max-width:800px;height:auto" src="{{ URL::to('/').$image }}">
    </a>
</p>
@endif

Bonne journée