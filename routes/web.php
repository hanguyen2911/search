<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;/*App là NAMESPA #tên thư mục*/
use App\Models\Car;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\contactController;

// use App\Http\Controllers\CarController;/*App là NAMESPA #tên thư mục*/
// use App\Models\Car;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('cars',CarController::class);
Route::get('Hello/{$id}',function($id){
    $car= Car::find($id);
    return view('cars.show',['car'=>$car]);
});

Route::get('contact',function(){
    return view('contacts.contact');
});

// Route::post('contact',function(Request $request){
//     $contact= new Contact();
//     $contact->name=$request->txtName;
//     $contact->title=$request->txtTitle;
//     $contact->body=$request->teaBody;
//     $contact->save();
//     return redirect('contact')->with('success','Bạn đã gửi thành công');
// });
Route::post('contact',[contactController::class,'insertMessage']);
Route::get('/search',[CarController::class,'getSearch'])->name('cars.search');