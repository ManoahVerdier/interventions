@php $sites = $sites ?? auth()->user()->sites(); @endphp
@php $force = $force ?? false; @endphp
<div class="modal fade" id="siteModal" tabindex="-1" role="dialog" aria-labelledby="Choix du site" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Choix du site</h5>
                @if(!$force)
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                @endif
            </div>
            <div class="modal-body">
                <p>Veuillez sélectionner un site.</p>
                <select id="site" name='site' class="form-control">
                    @foreach($sites as $site)
                        <option value="{{$site->id}}">{{$site->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" id="chooseSiteBtn" form="selectSite" class="btn btn-success">Valider</button>
            </div>
        </div>
    </div>
</div>