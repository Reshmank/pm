<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Products;
use App\Models\Product_Varients;
use App\Models\User;
use App\Helpers\Helper;
use App\Models\Varients;
use Auth;
use yajra\Datatables\Datatables;
use App\Traits\ImageTrait;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 
     use ImageTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        return view('home');
    }


    public function addProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'csv_file' => 'required',
            ]);

       
         if ($validator->fails()) {

             foreach ($validator->errors()->getMessages() as $key => $value) {

                return response()->json(['status'=>false,'errorCode'=>1,'message' =>$value[0],'response' => $validator->errors()->all()], 200);
            }

         }

        // products

    $file = $request->file('csv_file');
    $fileContents = file($file->getPathname());



    // new product

    foreach ($fileContents as $line) {
        $data = str_getcsv($line);
    }





     // Products::create([
     //        'name' => $data[0],
     //        'price' => $data[1],
     //        // Add more fields as needed
     //    ]);

        // if($request->product_id)
        //       {
        //           return response()->json(['status'=>true,'errorCode'=>-1,'message' => 'Product Updated Successfully !'], 200); 
        
        //       }
        //       else
        //       {

        //            return response()->json(['status'=>true,'errorCode'=>-1,'message' => 'Product Created Successfully !'], 200); 
        //       }
          
        //  }
        //  else
        //  {
        //      return response()->json(['status'=>false,'errorCode'=>-1,'message' => 'error'], 200); 
        //  }

    }

    public function deleteProduct(Request $request)
    {
       
        try {
             $delete=Product_Varients::where('fk_product_id',$request->id)->delete();  

             if($delete)
             {
                   Products::where('id',$request->id)->delete();
                      return response()->json(['status'=>true,'errorCode'=>-1,'message' => 'Product Deleted Successfully !'], 200); 
             }
           
             
            
           
            
        } catch (Exception $e) {
          
            return $e->getMessage();
        }



    }

    public function editProduct(Request $request)
    {
         if($request->id)
         {
              $products=Products::with('productVarients')->where('id',$request->id)->first();

               return response()->json(['status'=>true,'errorCode'=>-1,'result' =>$products], 200); 


              

         }


    }

     public function product_list(Request $request)
     {
           if ($request->ajax())
            {
                 $products=Products::select('products.title as product_name','users.name as created_by','products.created_at','products.id')
                  ->join('users','users.id','products.created_by')
                 ->orderBy('products.created_at','desc')
                 ->get();

                  return Datatables::of($products)
                 ->addIndexColumn()
                 ->editColumn('created_at', function($products){
                    if($products->created_at==NULL){
                        return '';
                    }else{
                        return date('d-m-Y H:i:s', strtotime($products->created_at));
                    }  
                 })
                  ->editColumn('action', function ($products) {

                    $row='';

                   $row = '<a  class="dlt-btn p-0" onclick="deleteData(' . $products->id .')"><i class="fa fa-trash" aria-hidden="true"></i></a>';

                   $row=$row.' ';

                   $row=$row.'<a  class="dlt-btn p-0" onclick="editData(' . $products->id .')"><i class="fas fa-edit" aria-hidden="true"></i></a>';

                      return $row;
                  })
                ->rawColumns(['action'])
                ->make(true);

            }


     }
}
