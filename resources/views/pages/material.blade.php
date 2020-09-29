@extends('layouts.app')

@section('title', 'Prodice')

@section('body-attr')
id="product-page"
@endsection

{{-- Header --}}
@section('header')
    @include('layouts.partials.header.blue', [
        'title' => '',
        'withBack' => true,
        'withSearch' => false
    ])
@endsection
<?php //dd($errors);?>
{{-- Content --}}
@section('content')
<section id="intervention" class="px-3 pb-5 pt-1">
    <div class="container">
        <form class="row" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-12 text-white mb-4">
                <h1 class="h4 text-center">Demande d'intervention</h1>
                <h2 class="h6 text-center">{{isset($material) ? $material->label : "Matériel non enregistré"}}</h2>
            </div>

           
            <div class="form-group col-12 text-white">
                <label for="description">Description</label>
                <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="description" placeholder="Description du problème..."></textarea>
                @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
                <small id="descHelp" class="form-text text-white">Merci de décrire aussi précisement que possible le problème rencontré</small>
            </div>
            <div class="form-group col-12 text-white">
                <label for="gravite">Gravité</label>
                <select class="form-control{{ $errors->has('gravite') ? ' is-invalid' : '' }}" name="gravite">
                    <option value="">Gravité...</option>
                    <option value="Fonctionnel">Fonctionnel</option>
                    <option value="Bloquant">Bloquant</option>
                    <option value="Urgent">Urgent</option>
                </select>
                @if ($errors->has('gravite'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('gravite') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-12 text-white">
                <label for="image">Joindre une image</label>
                <input class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" type="file" name="image" id="image" accept="image/*;capture=camera">
                @if ($errors->has('image'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>

            @if($material ?? false)
                <input type="hidden" value="{{$material->id}}" name="material_id">
            @endif

            <div class="@if($material ?? false) d-none @endif form-group col-12 text-white">
                <label for="material_name">Nom du matériel</label>
                <input class="form-control{{ $errors->has('material_name') ? ' is-invalid' : '' }}" placeholder="Nom du matériel" type="text" value="@if($material ?? false) $material->label @endif" name="material_name">
                @if ($errors->has('material_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('material_name') }}</strong>
                    </span>
                @endif
            </div>
            

            @if(isset($message) && $msg_type!="Error")
                <div class="col-12 mt-4">
                    <div class="alert alert-{{ $msg_type=='Error' ? 'danger' : 'success' }}" role="alert">
                        {{$message}}
                    </div>
                    <a href="/" class="btn btn-light btn-block mx-md-3">Effectuer une nouvelle demande</a>
                </div>
            @else
                <div class="col-12 mt-4">
                    <div class="alert alert-{{ $msg_type=='Error' ? 'danger' : 'success' }}" role="alert">
                        {{$message}}
                    </div>
                </div>
                <div class="form-group col-12 mt-4">
                    <input class="form-control btn btn-secondary" type="submit" value="Envoyer">
                </div>
            @endif
            
        </form>
    </div>
</section>

@endsection

{{-- Footer --}}
@section('footer')
    @include('layouts.partials.footer.main', ['footerClass' => 'grey'])
    @section('footer-class')
    grey
    @endsection
@endsection
