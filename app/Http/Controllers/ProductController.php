<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product; 
use App\SubCategory; 
use App\Supplier;
use App\Language;
use App\ProductTranslation;
use App\Group;
use App\Category;
use App\State;
use App\ProductSale;
use App\ComponentList;
use App\Component;
use App\ProductImage;

class ProductController extends Controller
{
     /**
     * Display a listing of the resource.
s     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["products"] = Product::
        with('supplier','group','product_images','product_translations.language')
        ->orderBy('created_at','desc')
        ->get();
        return view('product.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["states"] = State::get();
        $data["languages"] = Language::get();
        $data['subcategories'] = SubCategory::get();
        $data['suppliers'] = Supplier::get();
        $data['groups'] = Group::get();
        $data['categories'] = Category::get();
        $data['component_lists'] = ComponentList::get();
        return view('product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->request);
        $product = new Product;
        $product->fill($request->except(['languages','sales','components','productimages']));
        $product->save();

        foreach ($request['languages'] as $l => $language) {
            $translation = new ProductTranslation;
            $translation->product_id = $product->id;
            $translation->language_id = $language['language_id'];
            $translation->name = $language['name'];
            $translation->description = $language['description'];
            $translation->save();
        }

        if (isset($request["productimages"])) {
            foreach ($request['productimages'] as $ri => $productimage) {
                $db = new ProductImage;
                $db->fill($productimage);
                $db->product_id = $product->id;
                if (isset($productimage["image"])){
                    $path = $productimage['image']->store('productimage');
                    $db->image = $path;
                }
                $db->save();
            }
        }

        if(isset($request['components'])){
            foreach ($request['components'] as $c => $component) {
                $product_component = new Component;
                $product_component->product_id = $product->id;
                $product_component->fill($component);
                $product_component->save();
            }
        }

        foreach ($request['sales'] as $s => $sale) {
            $product_sale = new ProductSale;
            $product_sale->product_id = $product->id;
            $product_sale->state_id = $sale['state_id'];
            $product_sale->stock = $sale['stock'];
            $product_sale->price = $sale['price'];
            $product_sale->discount = $sale['discount'];
            $product_sale->save();
        }

        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['product'] = Product::with('product_sales.state','product_images')->with('components.component_list')->find($id);
        $data["states"] = State::get();
        $data["languages"] = Language::get();
        $data['subcategories'] = SubCategory::get();
        $data['suppliers'] = Supplier::get();
        $data['groups'] = Group::get();
        $data['categories'] = Category::get();
        $data['component_lists'] = ComponentList::get();
        // dd($data);
        return view('product.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $product = Product::with('product_sales')->with('components')->find($id);
        $product->fill($request->except(['languages','sales','components','productimages']));
        $product->update();

        foreach ($request['languages'] as $l => $language) {
            $translation = ProductTranslation::updateOrCreate(
            [
                "id"=>$language['id'] ?? 0
            ],
            [
                "product_id"=>$product->id,
                "language_id"=>$language['language_id'],
                'name'=>$language['name'],
                'description'=>$language['description']
            ]);
        }

        if (isset($request["productimages"])) {
            foreach ($request['productimages'] as $ri => $productimage) {
                $db = ProductImage::firstOrNew(['id'=>$productimage['id'] ?? 0]);
                $db->fill($productimage);
                $db->product_id = $product->id;
                if (isset($productimage["image"])){
                    if (isset($db->image)) {
                        $file = Storage::delete($db->image);
                    }
                    $path = $productimage['image']->store('productimage');
                    $db->image = $path;
                }
                $db->save();
            }
        }

        if(isset($request['components'])){

            $db = $db = Component::where('product_id',$product->id)->delete();
            foreach ($request['components'] as $c => $component) {
                $product_component = new Component;
                $product_component->product_id = $product->id;
                $product_component->fill($component);
                $product_component->save();
            }
            
        }

    
        foreach ($product['product_sales'] as $s => $sale) {
            $sale->product_id = $product->id;
            $sale->stock = $request['sales'][$s]['stock'];
            $sale->price = $request['sales'][$s]['price'];
            $sale->discount = $request['sales'][$s]['discount'];
            $sale->update();
        }
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();
        return response()->json($product);
    }
}
