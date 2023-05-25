<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Cat;
use App\Models\Product;
use App\Models\Thumb;
use App\Models\Product_Cat;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    //
    function add()
    {

        $colors = Color::all();
        $cats = Cat::all();
        return view('admin.product.add', compact('colors', 'cats'));
    }

    function store(Request $request)
    {
        if (!empty($request->input('btn_add_color'))) {
            $request->validate([
                'color' => 'string|nullable'
            ]);
            Color::create([
                'name' => $request->input('color')
            ]);
            return redirect()->route('product.add');
        }
        $validate = $request->validate([
            'name' => 'required|string|unique:products',
            'description' => 'required|string',
            'count' => 'required|integer',
            'price' => 'required|integer',
            'type' => 'required|string',
            'supplier' => 'required|string',
            'specifications' => 'string|nullable',
            // 'salient_features' => 'required|string',

        ]);
        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'count' => $request->input('count'),
            'price' => $request->input('price'),
            'type' => $request->input('type'),
            'supplier' => $request->input('supplier'),
            'specifications' => $request->input('specifications'),
            // 'salient_features' => $request->input('salient_features'),
        ]);
        if ($request->hasFile('files')) {
            $files = $request->file('files');
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $path =  $file->move('uploads/images', $filename);
                $thumbnail = 'uploads/images/' . $filename;
                Thumb::create([
                    'link' => $thumbnail,
                    'product_id' => $product->id
                ]);
            }
        }
        $product->cats()->attach($request->input('cats'));
        $product->colors()->attach($request->input('colors'));
        return redirect()->route('product.show')->with('status', 'Đã thêm sản phẩm thành công');
    }
    function detail($id)
    {

        $product = Product::find($id);
        $cats = Cat::all();
        $colors = Color::all();
        return view('admin.product.detail', compact('product', 'cats', 'colors'));
    }
    function action($id, Request $request)
    {
        $product_color = $request->input('product_color');
        $product = Product::find($id);
        if ($request->input('btn_act') == 'update') {
            $validate = $request->validate([
                'name' => 'required|string|unique:products,name,' . $product->id,
                'description' => 'required|string',
                'count' => 'required|integer',
                'price' => 'required|integer',
                'type' => 'required|string',
                'supplier' => 'required|string',
                'specifications' => 'string|nullable',
                // 'salient_features' => 'required|string',
            ]);
            $product->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'count' => $request->input('count'),
                'price' => $request->input('price'),
                'type' => $request->input('type'),
                'supplier' => $request->input('supplier'),
                'specifications' => $request->input('specifications'),
                // 'salient_features' => $request->input('salient_features'),
            ]);
            if ($request->hasFile('files')) {
                $files = $request->file('files');
                foreach ($files as $file) {
                    $filename = $file->getClientOriginalName();
                    $path =  $file->move('uploads/images', $filename);
                    $thumbnail = 'uploads/images/' . $filename;
                    Thumb::create([
                        'link' => $thumbnail,
                        'product_id' => $product->id,
                    ]);
                }
            }
            if ($request->input('thumb_colors')) {
                $thumb_colors = $request->input('thumb_colors');
                foreach ($thumb_colors as $col) {
                    if (!empty($col)) {
                        $ids = explode(",", $col);
                        $thumb_id = $ids[0];
                        $color_id = $ids[1];
                        $thumb = Thumb::find($thumb_id);
                        $thumb->update([
                            'color_id' => $color_id,
                        ]);
                    }
                }
            }
            $product->cats()->sync($request->input('cats', []));
            foreach ($product->colors as $color) {
                $product_color = $request->input('product_color');
                $product->colors()->syncWithoutDetaching([$color->id => ['count' => $product_color[$color->id]['count']]]);
            }
            $product->colors()->sync($request->input('colors', []));
            return redirect()->route('product.show')->with('status', 'Đã chỉnh sửa sản phẩm thành công');
        } else if ($request->input('btn_act' == 'delete')) {
            $product->delete();
            return redirect()->route('product.show')->with('status', 'Đã xóa sản phẩm thành công');
        }
    }

    function thumb_delete($id)
    {
        $thumb = Thumb::find($id);
        $product = $thumb->product;
        File::delete($thumb->link);
        $thumb->delete();
        return redirect()->route('product.detail', $product->id);
    }
    public function filter(Request $request)
    {
        $products = Product::paginate(5);
        $filter = $request->input('btn_filter');
        if ($filter == 'supplier') {
            $supplier = $request->input('supplier');
            if (empty($supplier)) return $this->show($products);
            $products = Product::where('supplier', $supplier)->paginate(5);
        } else if ($filter == 'arrange') {
            $arrange = $request->input('arrange');
            if (empty($arrange)) return $this->show($products);
            $arrange = explode(",", $arrange);
            $part_1 = $arrange[0];
            $part_2 = $arrange[1];
            $products = Product::orderBy($part_1, $part_2)->paginate(5);
        } else if ($filter == 'cat') {
            $cats = $request->input('cats');
            if (empty($cats)) return $this->show($products);
            $product_ids = Product_cat::whereIn('cat_id', $cats)->distinct()->pluck('product_id')->toArray();
            $products = Product::whereIn('id', $product_ids)->paginate(5);
        } else if ($filter == 'type') {
            $types = $request->input('types');
            if (empty($types)) return $this->show($products);
            $products = Product::whereIn('type', $types)->paginate(5);
        } else if ($filter == 'search') {
            $keyword = $request->input('keyword');
            if (empty($keyword)) return $this->show($products);
            $products = Product::where('name', 'LIKE', "%{$keyword}%")->paginate(5);
        }
        return $this->show($products);
    }
    public function show($products =  null)
    {
        if (!$products) $products = Product::paginate(5);
        $cats = Cat::all();
        $types = Product::distinct()->pluck('type');
        $suppliers = Product::distinct()->pluck('supplier');
        return view('admin.product.show', compact('products', 'cats', 'types', 'suppliers'));
    }
    function search_ajax(Request $request)
    {
        if ($request->input('query')) {

            $query = $request->input('query');
            $data = Product::where('name', 'LIKE', "%{$query}%")->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($data as $row) {
                $output .= '
               <li class ="px-3"><a href="' . route('product.detail', $row->id) . '">' . "  " . $row->id . "---" . $row->name . '</a></li>
               ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
