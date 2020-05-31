<?php

namespace App\Http\Controllers;

use App\Model\Product; // Load Model
use Illuminate\Http\Request;
use Validator; // Class ใช้ตรวจสอบข้อมูลในฟอร์ม

// โหลด library จัดการรูป
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // print_r(config('global.pro_status')[1]);
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
            'product_barcode' => 'required|integer|digits:13|unique:products',
            'product_qty' => 'required',
            'product_price' => 'required',
            'product_category' => 'required'
        ];

        $messages = [
            'required' => 'ฟิลด์ :attribute นี้จำเป็น',
            'integer' => 'ฟิลด์นี้ต้องเป็นตัวเลขเท่านั้น',
            'digits' => 'ฟิลด์ :attribute ต้องเป็นตัวเลขความยาว :digits หลัก',
            'unique' => 'รายการนี้มีอยู่แล้วในตาราง (ห้ามซ้ำ)'
        ];

        $validator = Validator::make($request->all(), $rules,$messages);

        if($validator->fails()){ // ตรวจสอบไม่ผ่าน
            return redirect()->back()->withErrors($validator)->withInput();
        }else{

            $product_data = array(
                'product_name' => $request->product_name,
                'product_detail' => $request->product_detail,
                'product_barcode' => $request->product_barcode,
                'product_qty' => $request->product_qty,
                'product_price' => $request->product_price,
                'product_category' => $request->product_category,
                'product_status' => $request->product_status,
                'created_at' => NOW(),
                'updated_at' => NOW()
            );

            // Upload Product Image
            try{
                $image = $request->file('product_image');
                // เช็คว่ามีการเลือกไฟล์ภาพเข้ามาหรือไม่
                if(!empty($image)){
                    $file_name = "product_".time().".".$image->getClientOriginalExtension();
                    if($image->getClientOriginalExtension() == "jpg" or $image->getClientOriginalExtension() == "png"){
                       
                        $imgWidth = 300;
                        $folderupload = "assets/images/products";
                        $path = $folderupload."/".$file_name;

                        // upload to folder products
                        $img = Image::make($image->getRealPath());

                        if($img->width() > $imgWidth){
                            $img->resize($imgWidth, null, function($constraint){
                                $constraint->aspectRatio();
                            });
                        }

                        $img->save($path);
                        $product_data['product_image'] = $file_name;
                    }else{
                        return redirect()->route('products.create')->withErrors($validator)->withInput()->with('status','<div class="alert alert-danger">ไฟล์ภาพไม่รองรับ อนุญาติเฉพาะ .jpg และ .png</div>');
                    }
                }
            }catch(Exception $e){
                print_r($e);
                return false;
            }

            $status = Product::create($product_data);
            // print_r($status);
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

        $product_data = array(
            'product_name' => $request->product_name,
            'product_detail' => $request->product_detail,
            'product_barcode' => $request->product_barcode,
            'product_qty' => $request->product_qty,
            'product_price' => $request->product_price,
            'product_category' => $request->product_category,
            'product_status' => $request->product_status,
            'updated_at' => NOW()
        );

         // Upload Product Image
         try{
            $image = $request->file('product_image');
            // เช็คว่ามีการเลือกไฟล์ภาพเข้ามาหรือไม่
            if(!empty($image)){
                $file_name = "product_".time().".".$image->getClientOriginalExtension();
                if($image->getClientOriginalExtension() == "jpg" or $image->getClientOriginalExtension() == "png"){
                   
                    $imgWidth = 300;
                    $folderupload = "assets/images/products";
                    $path = $folderupload."/".$file_name;

                    // upload to folder products
                    $img = Image::make($image->getRealPath());

                    if($img->width() > $imgWidth){
                        $img->resize($imgWidth, null, function($constraint){
                            $constraint->aspectRatio();
                        });
                    }

                    $img->save($path);
                    $product_data['product_image'] = $file_name;
                }else{
                    return redirect()->route('products.create')->withErrors($validator)->withInput()->with('status','<div class="alert alert-danger">ไฟล์ภาพไม่รองรับ อนุญาติเฉพาะ .jpg และ .png</div>');
                }
            }
        }catch(Exception $e){
            print_r($e);
            return false;
        }

        $product->update($product_data);
        return redirect()->route('products.index')->with('success','<div class="alert alert-warning text-center" role="alert">รายการสินค้าถูกแก้ไขแล้ว</div>');
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
        return redirect()->route('products.index')->with('success','<div class="alert alert-danger text-center" role="alert">ลบรายการนี้แล้ว</div>');
    }
}
