<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\CodePromo;
use App\Site;
use App\Notifications\NewOrder;
use App\Notifications\OrderConfirmation;
use App\Order;
use App\OrderLine;
use App\Material;
use App\Product;
use App\ProductRange;
use App\User;
use App\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

class SiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Affiche la page d'accueil
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $materials = auth()
            ->user()
            ->materials()
            ->whereNotNull("product_range_id")
            ->with('productRanges')
            ->get();
        $product_ranges = $materials
            ->pluck('productRanges')
            ->unique()
            ->filter();
            
        if (!$request->session()->has('site') && auth()->user()->sites()->count()==1) {
            
            if(auth()->user()->sites()->first() ?? false){
                session(['site' => auth()->user()->sites()->first()->id]);
                session(['site_name' => auth()->user()->sites()->first()->name]);
            }
        }
        else{
            $site = Site::find(session('site'));
            $materials = $site->materials()->whereNotNull("product_range_id")
            ->with('productRanges')
            ->get();
            $product_ranges = $materials
            ->pluck('productRanges')
            ->unique()
            ->filter();
        }
        $force=!$request->session()->has('site');
        
        return view('pages.home', compact('product_ranges', 'force'));
    }

    public function chooseSite(Request $request){
        session(['site' => $request->get('site')]);
        session(['site_name' => Site::find($request->get('site'))->name]);
        return env('SITE_URL');
    }

    /**
     * Affiche les catégories de niveau 0
     *
     * @return \Illuminite\Http\Response
     */
    public function search($fromMenu=true)
    {
        $fromMenu = request()->get('fromMenu') ?? true;
        $materials = auth()
            ->user()
            ->materials()
            ->whereNotNull("product_range_id")
            ->with('productRanges')
            ->get();
        $product_ranges = $materials
            ->pluck('productRanges')
            ->unique()
            ->filter();
        

        $materialsCount = $materials->count();

        return view(
            'pages.search', 
            compact(
                'product_ranges',
                'fromMenu',
                'materialsCount'
            )
        );
    }

    /**
     * Affiche les résultats de la recherche
     * Sur la base du label ou du model
     *
     * @return \Illuminite\Http\Response
     */
    public function searchResults()
    {
        $q = request('q');
        $materials = auth()
            ->user()
            ->materials()
            ->where(
                function ($query) use ($q) {
                    $query->where("label", 'like', "%$q%")
                        ->orWhere("model", 'like', "%$q%")
                        ->orWhere("product_code", 'like', "%$q%");
                }
            )
            ->groupBy("id")
            ->with('productRanges')
            ->get();

        $materialsCount = $materials->count();

        return view(
            'pages.search_results', 
            compact(
                'materials', 
                'q',
                'materialsCount'
            )
        );
    }

    /**
     * Affiche le formulaire de demande d'intervention pour un matériel
     *
     * @return \Illuminite\Http\Response
     */
    public function material($id)
    {
        $material = $materials = auth()
            ->user()
            ->materials()
            ->findOrFail($id);

        return view(
            'pages.material', 
            compact(
                'material', 
            )
        );
    }

    /**
     * Affiche le formulaire de demande d'intervention hors matériel listé
     *
     * @return \Illuminite\Http\Response
     */
    public function materialOther()
    {
        return view(
            'pages.material'
        );
    }

    /**
     * Traitement du formulaire de demande d'intervention POST 
     * 
     * @param Request $request le formulaire posté
     * 
     * @return void
     */
    public function materialPost(Request $request)
    {    
        $request->validate(
            [
                'description' => 'required',
                'gravite' => 'required',
                'material_name'=>'required',
                'image'=>'nullable|file'
            ],
            [
                'required'=>"Le champ :attribute est requis"
            ]
        );

        if($request->get('material_id') ?? false) {
            $material = Material::find($request->get('material_id'));
        }

        if(!$request->has("image") || $filePath = $this->upload($request->file('image'))) {
            Mail::send(
                'mail.demande_intervention',
                array(
                    'description' => $request->get('description'),
                    'gravite' => $request->get('gravite'),
                    'material' => $material ?? null,
                    'material_name' => $request->get('material_name'),
                    'image' => $filePath ?? null,
                    'username' => auth()->user()->name,
                    'client' => auth()->user()->domain->name,
                    'societe' => Config::get('filesystems.distant_img_root_default'),
                ), function ($message) {
                    $message->from('sav@odice.cc');
                    $message
                        //->to('verdier.developpement@gmail.com', 'SAV Odice')
                        ->to('sav@odice.cc', 'SAV Odice')
                        ->subject('Demande intervention');
                }
            );
            $message = "Demande envoyée !";
            $msg_type="Success";
        } else {
            $message = "Fichier invalide";
            $msg_type="Error";
        }

        if($material ?? false )
            return view('pages.material', compact('material', 'message', 'msg_type'));
        else
            return view('pages.material', compact('message', 'msg_type'));
    }

    /**
     * Stocke un fichier soumis dans un formulaire
     *
     * @param file $file le fichier traité
     * 
     * @return void
     */
    protected function upload($file)
    {
        if (!is_null($file) && isset($file) && $file->isValid()) {
            $fileName = (new \DateTime())
                ->format('d.m.Y-hsi').'.'.$file->guessExtension();
            $file->move(storage_path() . '/app/public/uploads', $fileName);
            return '/storage/uploads/' . $fileName;
        } else {
            return false;
        }        
    }

    /**
     * Affiche les produits liés à une catégorie ou ses sous-catégories.
     *
     * @return \Illuminite\Http\Response
     */
    public function productRange($id)
    {
        $product_range = ProductRange::findOrFail($id);
        
        $product_ranges = $product_range->children()->get();

        $materials = auth()
            ->user()
            ->materials()
            ->whereIn('product_range_id', [$id])
            ->get();
        
        return view(
            'pages.product_range', 
            compact(
                'product_range', 
                'product_ranges', 
                'materials'
            )
        );
    }
}
