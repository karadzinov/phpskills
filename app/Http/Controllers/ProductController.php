<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $quantity = array();
        $price = array();
        foreach($products as $product)
        {
            $quantity[] = $product['quantity'];
            $price[] = $product['price'];
        }

        $quantity = array_sum($quantity);
        $price = array_sum($price);
        $total = $quantity * $price;
        $data = ['total' => $total, 'products' => $products];
        return view('admin.products.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->ajax()) {
            $input = $request->all();
            $product = Product::create($input);
            $products = Product::all();

            $quantity = array();
            $price = array();
            foreach($products as $product)
            {
                $quantity[] = $product['quantity'];
                $price[] = $product['price'];
            }

            $quantity = array_sum($quantity);
            $price = array_sum($price);
            $total = $quantity * $price;
            $data = ['total' => $total, 'product' => $product];
            return $data;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }
}
