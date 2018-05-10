<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
    public function index(){
    	$products=Product::paginate(10);
    	return view('admin.products.index')->with(compact('products'));//listado de productos
    }

        public function create(){
    	return view('admin.products.create');//formulario de registro
    }

        public function store(Request $request){
        //Validar información
        	$rules=[
        		'name'=>'required|min:3',
        		'description'=>'required|max:200',
        		'price'=>'required|numeric|min:0',
        		'code'=>'required'

        	];
        	$messages=[
        		'name.required'=>'Es necesario ingresar nombre del producto.',
        		'name.min'=>'El nombre del producto debe tener al menos 3 caracteres.',
        		'description.required'=>'Es necesario ingresar una descripción.',
        		'description.max'=>'La descripción solo admite 200 caracteres.',
        		'price.required'=>'Es necesario ingresar el precio.',
        		'price.numeric'=>'Es necesario ingresar un precio válido.',
        		'price.min'=>'No se admiten valores negativos.',
        		'code.required'=>'Es necesario ingresar el código del producto.'

        	];
        	$this->validate($request,$rules,$messages);
    	//registrar el nuevo producto en la BD
        	//dd($request->all());
        	$product=new Product();
        	$product->name=$request->input('name');
         	$product->code=$request->input('code');
           	$product->price=$request->input('price');
           	$product->description=$request->input('description');
           	$product->long_description=$request->input('long_description');
           	$product->save();
           	return redirect('/admin/products');
    }

        public function edit($id){
        	//return "Mostrar el form de edición para el producto con id $id";
    		$product=Product::find($id);
    		return view('admin.products.edit')->with(compact('product'));//formulario de registro
    }

        public function update(Request $request, $id){
        	        //Validar información
        	$rules=[
        		'name'=>'required|min:3',
        		'description'=>'required|max:200',
        		'price'=>'required|numeric|min:0',
        		'code'=>'required'

        	];
        	$messages=[
        		'name.required'=>'Es necesario ingresar nombre del producto.',
        		'name.min'=>'El nombre del producto debe tener al menos 3 caracteres.',
        		'description.required'=>'Es necesario ingresar una descripción.',
        		'description.max'=>'La descripción solo admite 200 caracteres.',
        		'price.required'=>'Es necesario ingresar el precio.',
        		'price.numeric'=>'Es necesario ingresar un precio válido.',
        		'price.min'=>'No se admiten valores negativos.',
        		'code.required'=>'Es necesario ingresar el código del producto.'

        	];
        	$this->validate($request,$rules,$messages);
    	//registrar el nuevo producto en la BD
        	//dd($request->all());
        	$product=Product::find($id);
        	$product->name=$request->input('name');
         	$product->code=$request->input('code');
           	$product->price=$request->input('price');
           	$product->description=$request->input('description');
           	$product->long_description=$request->input('long_description');
           	$product->save();//update
           	return redirect('/admin/products');
    }

            public function destroy($id){
    	//registrar el nuevo producto en la BD
        	//dd($request->all());
        	$product=Product::find($id);
            $images=$product->images()->delete();
           	$product->delete();//delete



           	return back();
    }
}
