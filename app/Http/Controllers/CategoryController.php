<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::latest()->paginate(5);
        // dd($categorys);
        return view('backend.pages.categorys.index', compact('categorys'))->with('i', (request()->input('page', 1) -1 ) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.categorys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'category_name' => 'required'
        ];

        $messages = [
            'required' => 'ฟิลด์ :attribute นี้จำเป็น'
        ];

        $validator = Validator::make($request->all(), $rules,$messages);

        if($validator->fails()){ // ตรวจสอบไม่ผ่าน
            return redirect()->back()->withErrors($validator)->withInput();
        }else{

            $category_data = array(
                'category_name' => $request->category_name,
                'status' => 1,
                'created_at' => NOW(),
                'updated_at' => NOW()
            );

            // Upload File PDF/Docx
            try{
                $file = $request->file('category_attachment');
                // เช็คว่ามีการเลือกไฟล์ภาพเข้ามาหรือไม่
                if(!empty($file)){
                    $file_name = "category_".time().".".$file->getClientOriginalExtension();
                    if($file->getClientOriginalExtension() == "pdf" or $file->getClientOriginalExtension() == "docx"){

                        $path = "assets/images/categorys";

                        // ฟังก์ชันอัพโหลดไฟล์
                        $file->move($path,$file_name);
                      
                        $category_data['category_attachment'] = $file_name;
                    }else{
                        return redirect()->route('categorys.create')->withErrors($validator)->withInput()->with('status','<div class="alert alert-danger">ไฟล์ไม่รองรับ อนุญาติเฉพาะ .pdf และ .docx</div>');
                    }
                }
            }catch(Exception $e){
                print_r($e);
                return false;
            }

            $status = Category::create($category_data);
            // print_r($status);
            return redirect()->route('categorys.create')->with('success','บันทึกหมวดหมู่ใหม่เรียบร้อย');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
