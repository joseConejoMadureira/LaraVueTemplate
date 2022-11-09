<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function __construct(Product $product)
    {
        $this->product = $product;
        $this->productRepository = new ProductRepository($this->product);
        
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::info('ProductController@index');
        return response()->json($this->productRepository->getAll(), 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info('ProductController@store: Request:'.json_encode($request->all()) );
        $request->validate($this->product->rules());
        $product = $this->productRepository->create($request->all());

        return response()->json($product, 201);
    }
    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Log::info('ProductController@show id:'.$id);
        $product = $this->productRepository->find($id);
        if ($product === null) {
            Log::info('ProductController@show $product:'. json_encode($product));
            return response()->json(['erro' => 'Recurso  não existe'], 404);
        }
        return response()->json($product, 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Log::info('ProductController@update Request'. json_encode($request) );
        
        $product = $this->productRepository->find($id);
        $request->validate($this->product->rules());
        Log::info('ProductController@update product'. json_encode($product) );
        if ($product === null) {
            return response()->json(['erro' => 'Recurso  não existe'], 404);
        }
        $this->productRepository->update($id, $request->all());

        return response()->json($product, 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Log::info('ProductController@destroy id: '.$id );
        $product = $this->product->find($id);
        Log::info('ProductController@destroy product'.json_encode($product));
        if ($product === null) {
            return response()->json(['erro' => 'Recurso  não existe'], 404);
        }
        $this->productRepository->delete($product);

        return response()->json(['msg' => 'removido com sucesso!'], 200);
    }
    public function abcde()
    {
        return json_encode("teste");
    }
}
