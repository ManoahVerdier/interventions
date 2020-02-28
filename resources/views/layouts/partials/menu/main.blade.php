<div class="universe-menu">
    {{-- Close button --}}
    <div class="row">
        <div class="col-12 close">
            <a href="#"><i class="fas fa-times"></i></a>
        </div>
    </div>

    {{-- Universes --}}
    <div class="row">
        <div class="col-12">
            <div class="universe subaqua active" data-universe="subaqua">@svg('categories/SUBAQUA', ['width' => 48, 'height' => 48])</div>
            <div class="universe fishing" data-universe="fishing">@svg('categories/PECHE', ['width' => 48, 'height' => 48])</div>
            <div class="universe riding" data-universe="riding">@svg('categories/GLISSE', ['width' => 48, 'height' => 48])</div>
            <div class="universe nautic" data-universe="nautic">@svg('categories/NAUTISME', ['width' => 48, 'height' => 48])</div>
        </div>
    </div>

    {{-- Categories --}}
    <div class="category subaqua">
        <div class="row">
            <div class="col-sm-10 bordered">
                <span class="label">Sub aquatique</span>
            </div>
            <div class="col-sm-1 bordered text-center">
                <span class="count">122</span>
            </div>
            <div class="col-sm-1 text-center">
                <span class="icon">@svg('categories/csm', ['width' => 32, 'height' => 32])</span>
            </div>
        </div>
    </div>
    <div class="category fishing" style="display: none">
        <div class="row">
            <div class="col-sm-10 bordered">
                <span class="label">Pêche</span>
            </div>
            <div class="col-sm-1 bordered text-center">
                <span class="count">122</span>
            </div>
            <div class="col-sm-1 text-center">
                <span class="icon">@svg('categories/csm', ['width' => 32, 'height' => 32])</span>
            </div>
        </div>
    </div>
    <div class="category riding" style="display: none">
        <div class="row">
            <div class="col-sm-10 bordered">
                <span class="label">Glisse</span>
            </div>
            <div class="col-sm-1 bordered text-center">
                <span class="count">122</span>
            </div>
            <div class="col-sm-1 text-center">
                <span class="icon">@svg('categories/csm', ['width' => 32, 'height' => 32])</span>
            </div>
        </div>
    </div>
    <div class="category nautic" style="display: none">
        <div class="row">
            <div class="col-sm-10 bordered">
                <span class="label">Nautisme</span>
            </div>
            <div class="col-sm-1 bordered text-center">
                <span class="count">122</span>
            </div>
            <div class="col-sm-1 text-center">
                <span class="icon">@svg('categories/csm', ['width' => 32, 'height' => 32])</span>
            </div>
        </div>
    </div>

    {{-- Sub-categories --}}
    <div class="sub-category subaqua" data-universe="subaqua" data-id="1">
        <div class="row">
            <div class="col-sm-10 bordered">
                <span class="label">Pêche en mer</span>
            </div>
            <div class="col-sm-1 bordered text-center">
                <span class="count">34</span>
            </div>
            <div class="col-sm-1 text-center">
                <span class="icon">@svg('categories/snorkeling', ['width' => 32, 'height' => 32])</span>
            </div>
        </div>
    </div>
    <div class="sub-category subaqua" data-universe="subaqua" data-id="2">
        <div class="row">
            <div class="col-sm-10 bordered">
                <span class="label">Pêche en rivière</span>
            </div>
            <div class="col-sm-1 bordered text-center">
                <span class="count">5</span>
            </div>
            <div class="col-sm-1 text-center">
                <span class="icon">@svg('categories/free_diving', ['width' => 32, 'height' => 32])</span>
            </div>
        </div>
    </div>

    <div class="sub-category fishing" data-universe="fishing" data-id="3" style="display: none">
        <div class="row">
            <div class="col-sm-10 bordered">
                <span class="label">Plongée sous-marine</span>
            </div>
            <div class="col-sm-1 bordered text-center">
                <span class="count">67</span>
            </div>
            <div class="col-sm-1 text-center">
                <span class="icon">@svg('categories/snorkeling', ['width' => 32, 'height' => 32])</span>
            </div>
        </div>
    </div>
    <div class="sub-category fishing" data-universe="fishing" data-id="4" style="display: none">
        <div class="row">
            <div class="col-sm-10 bordered">
                <span class="label">Plongée libre</span>
            </div>
            <div class="col-sm-1 bordered text-center">
                <span class="count">0</span>
            </div>
            <div class="col-sm-1 text-center">
                <span class="icon">@svg('categories/free_diving', ['width' => 32, 'height' => 32])</span>
            </div>
        </div>
    </div>

    <div class="sub-category riding" data-universe="riding" data-id="5" style="display: none">
        <div class="row">
            <div class="col-sm-10 bordered">
                <span class="label">Plongée libre</span>
            </div>
            <div class="col-sm-1 bordered text-center">
                <span class="count">0</span>
            </div>
            <div class="col-sm-1 text-center">
                <span class="icon">@svg('categories/free_diving', ['width' => 32, 'height' => 32])</span>
            </div>
        </div>
    </div>

    <div class="sub-category nautic" data-universe="nautic" data-id="6" style="display: none">
        <div class="row">
            <div class="col-sm-10 bordered">
                <span class="label">Plongée libre</span>
            </div>
            <div class="col-sm-1 bordered text-center">
                <span class="count">0</span>
            </div>
            <div class="col-sm-1 text-center">
                <span class="icon">@svg('categories/free_diving', ['width' => 32, 'height' => 32])</span>
            </div>
        </div>
    </div>

    {{-- Inputs --}}
    <input type="hidden" name="universe" value="subaqua" /> <!-- TODO: Set universe dynamicaly -->
    <input type="hidden" name="category" />
</div>