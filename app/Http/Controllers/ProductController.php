<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Redirect;
use PDF;
use App\Http\Requests\ProductStoreRequest;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::orderBy('id','asc')->paginate(10);
        return view('product.list',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        if ($files = $request->file('file')) {
            $destinationPath = public_path('file'); // upload path
            $profilefile = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profilefile);
            $insert['file'] = "$profilefile";
        }
        $insert['title'] = $request->get('title');
        $insert['category'] = $request->get('category');
        $insert['sub_category'] = $request->get('sub_category');
        $insert['child_sub_category'] = $request->get('child_sub_category');
        $insert['description'] = $request->get('description');
        $insert['keyword'] = $request->get('keyword');
        $insert['price'] = $request->get('price');
        $insert['viewpage'] = $request->get('viewpage');

        Product::insert($insert);
        return Redirect::to('products')
            ->with('success','Greate! Product created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $data['product_info'] = Product::where($where)->first();
        return view('product.edit', $data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductStoreRequest $request, $id)
    {
        $update = ['title' => $request->title, 'category' => $request->category];
        if ($files = $request->file('file')) {
            $destinationPath = public_path('file'); // upload path
            $profilefile = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profilefile);
            $update['file'] = "$profilefile";
        }
        $update['title'] = $request->get('title');
        $update['category'] = $request->get('category');
        $update['sub_category'] = $request->get('sub_category');
        $update['child_sub_category'] = $request->get('child_sub_category');
        $update['description'] = $request->get('description');
        $update['keyword'] = $request->get('keyword');
        // $update['file'] = $request->get('file');
        $update['price'] = $request->get('price');
        $update['viewpage'] = $request->get('viewpage');

        Product::where('id',$id)->update($update);
        return Redirect::to('products')
            ->with('success','Great! Product updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Product::find($id);
        $file_patch = public_path().'/file/'.$file->file;
        if(File::exists($file_patch)) {
            File::delete($file_patch);
        }
        Product::where('id',$id)->delete();
        return Redirect::to('products')->with('success','Product deleted successfully');
    }
}
