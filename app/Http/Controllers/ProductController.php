<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Redirect;
use PDF;
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
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keyword' => 'required',
        ]);
        if ($files = $request->file('image')) {
            $destinationPath = public_path('image'); // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $insert['image'] = "$profileImage";
        }
        $insert['title'] = $request->get('title');
        $insert['category'] = $request->get('category');
        $insert['sub_category'] = $request->get('sub_category');
        $insert['child_sub_category'] = $request->get('child_sub_category');
        $insert['description'] = $request->get('description');
        $insert['keyword'] = $request->get('keyword');
//        $insert['image'] = $request->get('image');
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'keyword' => 'required',
        ]);
        $update = ['title' => $request->title, 'category' => $request->description];
        if ($files = $request->file('image')) {
            $destinationPath = public_path('image'); // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $update['image'] = "$profileImage";
        }
        $update['title'] = $request->get('title');
        $update['category'] = $request->get('category');
        $update['sub_category'] = $request->get('sub_category');
        $update['child_sub_category'] = $request->get('child_sub_category');
        $update['description'] = $request->get('description');
        $update['keyword'] = $request->get('keyword');
        $update['image'] = $request->get('image');
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
        $image = Product::find($id);
        $image_patch = public_path().'/image/'.$image->image;
        if(File::exists($image_patch)) {
            File::delete($image_patch);
        }
        Product::where('id',$id)->delete();
        return Redirect::to('products')->with('success','Product deleted successfully');
    }
}
