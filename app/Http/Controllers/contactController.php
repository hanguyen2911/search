<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class contactController extends Controller
{
    public function insertMessage(Request $request){
        $contact=new Contact();
        $contact->name=$request->txtName;
        $contact->title=$request->txtTitle;
        $contact->body=$request->teaBody;
        $contact->save();
        return redirect('contact')->with('success','Bạn đã gửi thành công');
    }
}
