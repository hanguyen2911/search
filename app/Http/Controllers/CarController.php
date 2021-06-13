<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Validator;
use App\Models\Manufacturer;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars= Car::all();
        //dd($cars);
        return view('cars.carlist',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manufacturer= Manufacturer::ALL();
        return view('cars.carcreate',compact('manufacturer'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, 
        [
            //Kiểm tra giá trị rỗng 
            'model' => 'required',
            'image' => 'required',
            'mf_name'=>'required',
            'description' => 'required',         
            'produced_on' => 'required|date',

        ],          
        [
            //Tùy chỉnh hiển thị thông báo
            
            'model.required' => 'Bạn chưa nhập model!',
            'description.required' => 'Bạn chưa nhập mô tả!',
            'image.required' => 'Bạn chưa thêm hình ảnh!',
            'mf_name.required'=>'Bạn chưa chọn hãng xe!',
            'produced_on.required' => 'Bạn chưa nhập ngày sản xuất!',
            'produced_on.date' => 'cột produced_on phải là kiểu ngày!',
        ]
    );
     //kiểm tra file tồn tại
     $name='';
        
     if($request->hasfile('image_file'))
     {
         //Hàm kiểm tra dữ liệu
         $this->validate($request, 
             [
             //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                 'image_file' => 'mimes:jpg,jpeg,png,gif|max:2048',
             ],          
             [
             //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                 'image_file.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                 'image_file.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
             ]
         );
         $file = $request->file('image_file');
         $name=time().'_'.$file->getClientOriginalName();
         $destinationPath=public_path('images/cars'); //project\public\images\cars, //public_path(): trả về đường dẫn tới thư mục public
         $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/images/cars
     }   
                     
        $model = $request->input('model');                  
        $description = $request->input('description');  
        $produced_on = $request->input('produced_on')   ;   
        $mf_name =$request->input('mf_name');
                            
        $file = $request->file('image');                    
        $name_img = time() . '_' . $file->getClientOriginalName();                  
        $destinationPath = public_path('images');       //project\public\images\ //public_path(): trả về đường dẫn tới thư mục public           
        $file->move($destinationPath, $name_img);               //lưu hình ảnh vào thư mục public/images/cars   
                            
        $car = new Car();                   
        $car->model = $model;                   
        $car->description = $description;                   
        $car->image = $name_img;
        $car->produced_on=$produced_on;
        $car->mf_id= $mf_name;

        $car->save();
                            
        return redirect('/cars')->with('success', 'Thêm thành công!');                  
                
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
        $car=Car::find($id);
        return view('cars.detail',compact('car','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $car=Car::find($id);
        $manufacturers=Manufacturer::all();
        // dd($manufacturers);
        return view('cars.edit',compact('car','manufacturers'));
        // $car=Car::find($id);
        // return view('cars.edit',compact('car', 'id'));
        //return view('cars.edit',['car'=>$car]);
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
        //
        $model = $request->input('model');                  
        $description = $request->input('description');                  
                            
        $file = $request->file('image');                    
        $name_img =  $file->getClientOriginalName();                  
        $destinationPath = public_path('images');                   
        $file->move($destinationPath, $name_img);                   
                            
        $car = Car::find($id);                  
        $car->model = $model;                   
        $car->description = $description;                   
        $car->image = $name_img;                    
        $car->save();                   
             $car->mf_id = $request->mf_id;               
        return redirect('/cars')->with('success', 'Cập nhật thành công!');              
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
        $car=Car::find($id);
        $car->delete();
        return redirect('/cars')->with('success','Bạn đã xóa thành công');
    }
    public function getSearch(Request $request){
        $cars=Car::all();
        $cars_search=Car::where('description','like','%'.$request->input('search').'%')->orWhere('model','like','%'.$request->input('search').'%')->get();
        //dd($cars_search);
        return view('cars.carlist',compact('cars_search','cars'));
    }
}
