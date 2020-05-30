<?php

namespace App\Http\Controllers;

use App\Model\Product; // Load Model
use Illuminate\Http\Request;
use Validator; // Class ใช้ตรวจสอบข้อมูลในฟอร์ม
use Image; // อัพโหลดไฟล์

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // อ่านข้อมูล
        $products = Product::latest()->paginate(5);
        // print_r($products);
        return view('backend.pages.products.index', compact('products'))->with('i', (request()->input('page', 1) -1 ) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo $request->input('product_name');
        // echo $request->product_barcode;
        echo "<pre>";
        print_r($request->all());
        echo "</pre>";

        $rules = [
            'product_name' => 'required',
            'product_barcode' => 'required|integer|digits:13',
            'product_qty' => 'required',
            'product_price' => 'required',
            'product_category' => 'required'
        ];

        $messages = [
            'required' => 'ฟิลด์ :attribute นี้จำเป็น',
            'integer' => 'ฟิลด์นี้ต้องเป็นตัวเลขเท่านั้น',
            'digits' => 'ฟิลด์ :attribute ต้องเป็นตัวเลขความยาว :digits หลัก'
        ];

        $validator = Validator::make($request->all(), $rules,$messages);

        if($validator->fails()){ // ตรวจสอบไม่ผ่าน
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            
            // $status = Product::create($request->all());  // Add All
            // print_r($status);

            $data_product = array(
                'product_name' => $request->product_name,
                'product_detail' => $request->product_detail,
                'product_barcode' => $request->product_barcode,
                'product_qty' => $request->product_qty,
                'product_price' => $request->product_price,
                'product_category' => $request->product_category,
                'product_status' => $request->product_status,
                'updated_at' => NOW(),
                'created_at' => NOW(),
            );

            // Upload image
            try {

                $image = $request->file('product_image');

                if (!empty($image)) {
                    $file_name = "product_" . time() . "." . $image->getClientOriginalExtension();
                    if ($image->getClientOriginalExtension() == "jpg" or $image->getClientOriginalExtension() == "png") {

                        $imgwidth = 300;
                        $folderupload = 'assets/images/products';
                        $path = $folderupload . '/' . $file_name;

                        // uploade to folder users
                        $img = Image::make($image->getRealPath());
                        if ($img->width() > $imgwidth) {
                            $img->resize($imgwidth, null, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                        }
                        $img->save($path);

                        $data_product['product_image'] = $file_name;
                    } else {
                        return redirect()->back()->withErrors($validator)->withInput()->with('status', '<div class="alert alert-danger">ไฟล์ภาพไม่รองรับ อนุญาติเฉพาะ .jpg และ .png</div>');
                        // return redirect()->route('products.create')->with('status', '<div class="alert alert-danger">ไฟล์ภาพไม่รองรับ อนุญาติเฉพาะ .jpg และ .png</div>');
                    }
                }

            } catch (Exception $e) {
                report($e);
                return false;
            }

            $status = Product::create($data_product);
            return redirect()->route('products.create')->with('success','บันทึกรายการสินค้าใหม่เรียบร้อย');

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('backend.pages.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('backend.pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index')->with('success','รายการสินค้าถูกแก้ไขแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','ลบรายการนี้แล้ว');
    }
}
