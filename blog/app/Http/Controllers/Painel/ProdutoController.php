<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;

class ProdutoController extends Controller
{
    private $product;
    
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $products = $product->all();
        $title = 'listagem dos produtos';
        return view('painel.products.index', compact('products', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $title = 'Cadastros';

        $categories = ['eletronicos', 'moveis', 'limpeza', 'banho'];
        return view('painel.products.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // recebendo a requisicao
        $dataForm = $request->all();

        $dataForm['active'] = ( !isset($dataForm['active'])) ? 0 : 1;
        
        // validando a insercao
        //$this->validate($request, $this->product->rules);
        $validate = validator($dataForm, $this->product->rules);
        if($validate->fails()) {
            return redirect()->route('products.create')
                            ->withErrors($validate)
                            ->withInput();
        }
        // cadastrando o produto advindo do form

        $insert = $this->product->create($dataForm);

        if( $insert )
            return redirect()->route('products.index');
        else
            return redirect()->back('products.create');
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
        $product = $this->product->find($id);
        
        $title = 'Editar Produto ($id)';

        $categories = ['eletronicos', 'moveis', 'limpeza', 'banho'];
        return view('painel.products.create', compact('title', 'categories', 'product'));
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
        return "Editando o item {$id}";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tests()
    {
        /**
        *$insert =   $this->product->create([
        *                'name' => 'Nome do produto',
        *                'number' => '182411',
        *                'active' => false,
        *                'category' => 'electronics',
        *                'description' => 'produto'
        *            ]);
        *if( $insert )
        *    return 'Inserido com sucesso';
        *else    
        *    return 'Falha ao inserir';
        */
        $prod = $this->product->find(1);
        $prod->update([
                    'name' => 'Nome do Produto alterado',
                    'number' => '182411',
                    'active' => false,
                    'category' => 'electronics',
                    'description' => 'produto'
                ]);
        dd($prod->name);
    }
}
