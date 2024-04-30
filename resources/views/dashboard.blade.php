@extends('layouts.app')

@section('style')

<style type="text/css">
    
.error{

    color: red;
}


</style>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product Managment System</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
  </li>

  <li class="nav-item" role="presentation">
    <button class="nav-link" id="products-tab" data-bs-toggle="tab" data-bs-target="#products" type="button" role="tab" aria-controls="deposit" aria-selected="false">Products</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="product_list-tab" data-bs-toggle="tab" data-bs-target="#product_list" type="button" role="tab" aria-controls="withdraw" aria-selected="false">Product List</button>
  </li>
  
  
</ul>
<div class="tab-content" id="myTabContent">


  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<br>    
    <div class="card">

            <div class="card-header">Welcome  {{ Auth::user()->name }}</div>
        <div class="card-body">

         

            <div class="row">

                <div class="col-md-12">

                    <div class="col-md-6">
                        
                         Email Id   :   {{ Auth::user()->email }} 
                    </div>

                    <div class="col-md-6">
                        
                         Name    :   {{ Auth::user()->name  }}
                    </div>
                </div>
            
            </div>
  </div>
</div>
  </div>

 <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="products-tab">
      
      <br>

        <div class="card">
        <div class="card-header">Product</div>
        <div class="card-body">

            <a href="/assets/Products - Sheet.csv" download="Products">Product Download</a>

           <form id="productForm">

           <div class="row mb-3">
                    <label for="image" class="col-md-4 col-form-label text-md-end">Product Upload</label>

                            <div class="col-md-6">
                            <input id="csv_file" type="file" class="form-control"  name="csv_file" value="{{ old('csv_file') }}"  accept=".csv">

                            </div>
            </div>           

            <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Import CSV
                                </button>
                            </div>
            </div>

           </form>
</div>
</div>

</div>

<div class="tab-pane fade show" id="product_list" role="tabpanel" aria-labelledby="product_list-tab">

<br>    
    <div class="card">

            <div class="card-header">Product List</div>
        <div class="card-body">

            <div class="tab-pane fade show active m-0" id="home2" role="tabpanel" aria-labelledby="home-tab2">
                  <div class="dt-responsive table-responsive data-hw">
                     <table class="table text-md-nowrap key-buttons" width="100%" id="productListTable">
                        <thead>
                           <tr>
                              <th data-data="DT_RowIndex" data-orderable="false">#</th>
                              <th data-data="product_name">Product Name</th>
                              <th data-data="created_by">Created By</th>
                              <th data-data="created_at" >Created At</th>
                              <th data-data="action">Action</th>
                              
                           </tr>
                        </thead>
                     </table>
                  </div>
               </div>



         

          

     

     
  </div>
</div>
  </div>





</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')

<script>

 $(document).ready(function(){

     
     $('#varientForm').validate({ // initialize the validation
        rules: {
            name :{
               required: true,
            },
          
        },
        messages: {
            name:{
                required: "Please enter name",
            },
                     
        },

        errorElement: "div",
       
        errorPlacement: function(error, element) {
            error.insertAfter($(element).closest('.required_item'));
        }
    });

      $('.varient_append').on('click', '.remove-varient', function () {

    

         $(this).closest('.row-index').remove();  

      });


    $('#varientForm').submit(function(e){
            e.preventDefault();

        if($('#varientForm').valid()){

         var form = $('#varientForm')[0];
         var formData = new FormData(form);
         formData.append("_token",'{{ csrf_token() }}');
         

          $.ajax({
                    type: "POST",
                    url: '/addVarient',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, 
                    data: formData, 
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        if(response.status==true){

                           iziToast.success({
                                    title: 'Success!',
                                    message:response.message,
                                    position: 'topRight'
                                });  

                                $('#statement-tab').addClass('active'); 
                                $('#statement').addClass('active');
                                $('#deposit-tab').removeClass('active'); 
                                $('#deposit').removeClass('active');  

                            // setTimeout(function() {
                            //         window.location.href = "/home";
                            //     },6000);


                        }
                        else
                        {
                             iziToast.error({
                                        title: 'error !',
                                        message: response.message,
                                        position: 'topRight'
                                    });

                        
                        }
                      
                    },
                    error: function(err) {

                             iziToast.error({
                                        title: 'error !',
                                        message: 'Something went wrong from server',
                                        position: 'topRight'
                                    });

                        
                    }
                });
      }
                

            });



      $('.add_varients').on('click', function () {

            $('.varient_append').append(` <tr class="row-index">
        <td>
         <select name="varient_attribute[]" class="form-control">
            <option value="">Select atrribute</option>
            <option value="size">Size</option>
            <option value="color">Color</option>
            

        </select>
    </td>
        <td><input type="text" name="varient_name[]" class="form-control"></td>
         <td> <button type="button" class="ms-2 remove-varient">-</button></td>
       
      </tr>
`);


  });

  callBackDataTablesSan('#productListTable',"{{ url('product_list') }}",{dom:'frtip'});
    
  $('#productForm').validate({ // initialize the validation
        rules: {
            csv_file :{
               required: true,
            },
         
        },
        messages: {
            csv_file:{
                required: "Please enter title",
            },
            
                     
        },

        errorElement: "div",
       
        errorPlacement: function(error, element) {
            error.insertAfter($(element).closest('.required_item'));
        }
    });

    $('#productForm').submit(function(e){
            e.preventDefault();

        if($('#productForm').valid()){

         var form = $('#productForm')[0];
         var formData = new FormData(form);
         formData.append("_token",'{{ csrf_token() }}');
         
          $.ajax({
                    type: "POST",
                    url: '/addProduct',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, 
                    data: formData, 
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        if(response.status==true){

                           iziToast.success({
                                    title: 'Success!',
                                    message:response.message,
                                    position: 'topRight'
                                });  

                                $('#product_list-tab').addClass('active'); 
                                $('#product_list').addClass('active');
                                $('#products-tab').removeClass('active'); 
                                $('#products').removeClass('active');  
                                $('#productListTable').DataTable().ajax.reload();

                            // setTimeout(function() {
                            //         window.location.href = "/home";
                            //     },6000);


                        }
                        else
                        {
                             iziToast.error({
                                        title: 'error !',
                                        message: response.message,
                                        position: 'topRight'
                                    });

                        
                        }
                      
                    },
                    error: function(err) {

                             iziToast.error({
                                        title: 'error !',
                                        message: 'Something went wrong from server',
                                        position: 'topRight'
                                    });

                        
                    }
                });
      }
                

            });


 });

 function editData(id)
 {
          var html='';    
         $.ajax({
                             
                             url: '/editProduct',
                             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, 
                           
                            data: {
                                id:id,
                               
                            },
                            success: function (output) { 


                                   if(output.status==true){

                                    $('#title').val(output.result.title);
                                    $('#description').html(output.result.description);
                                    $('#product_id').val(output.result.id);

                          

                   $.each(output.result.product_varients, function(index1, val1){

                

                        html+=`<tr class="row-index">
        <td>
         <select name="varient_attribute[]" class="form-control">
            <option value="">Select atrribute</option>`;
            if(val1['attribute']=='size')


              html+=`<option value="size" selected>Size</option>`;

            else


              html+=`<option value="color" selected>Color</option>`;

       html+=`</select>
    </td>
        <td><input type="text" name="varient_name[]" value="`+val1['name']+`" class="form-control"></td> <td> <button type="button" class="ms-2 remove-varient">-</button></td>
       
      </tr>`;

                         
                   });  


                     $('.varient_append').append(html);
                                    

                                $('#product_list-tab').removeClass('active'); 
                                $('#product_list').removeClass('active');
                                $('#products-tab').addClass('active'); 
                                $('#products').addClass('active'); 

                                $('#products').addClass('show');  
                                $('#products').removeClass('fade');
                                $('.first_dev').css("display", "none");

                                       
                                   }


                            },
                            error: function (output) {
                            }
                        });





 }


   function deleteData(id)
        {
            var msg="Do you want to delete?";
           

            $.confirm({
            title: 'Are you sure ',
            content: msg,
            type:'blue',
            buttons: {
                    confirm: function () {
                        $.ajax({
                             
                             type: 'POST',
                             url: '/deleteProduct',
                             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, 
                           
                            data: {
                                id:id,
                               
                            },
                            success: function (output) { 


                                   if(output.status==true){

                                        iziToast.success({
                                            title: 'Success!',
                                            message:output.message,
                                            position: 'topRight'
                                        });  


                                     $('#productListTable').DataTable().ajax.reload();

                                   }


                            },
                            error: function (output) {
                            }
                        });
                    },
                    cancel: function () {

                    },

                }
            });
    
        }

</script>




@endsection
