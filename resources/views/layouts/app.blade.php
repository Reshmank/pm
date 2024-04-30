<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

      <link href="{{ asset('assets/modules/select2/css/select2.min.css')}}" rel="stylesheet">
    <!-- confirm -->
    <link rel="stylesheet" href="{{asset('assets/modules/jquery-confirm-plugin/jquery-confirm.min.css')}}">

     <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />  

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <!-- Internal Data table css -->
        <!-- <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" /> -->
       
        <!-- <link href="{{asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" /> -->
        <link href="{{asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
        <!-- <link href="{{asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet"> -->

    <style type="text/css">
         
         .error{
            color: red;
         }


    </style>
     <link rel="stylesheet" href="{{asset('assets/modules/izitoast/css/iziToast.min.css')}}">

     @yield('style')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                           
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>

    <script src="{{asset('assets/modules/jquery-confirm-plugin/jquery-confirm.min.js')}}"></script>

     <script src="{{asset('developer/js/jquery.validate.js')}}"></script>
     <script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js')}}"></script>
      <!-- Internal Data tables -->
       <!--  <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script> -->
          <!--- Data table js --->
        <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>

     <script type="text/javascript">

         $(document).ready(function() {

                $('.numberonly').keypress(function (e){
                var charCode=(e.which)?e.which:event.keyCode
                if(String.fromCharCode(charCode).match(/[^0-9]/g))
                    return false;                        
                });

         });
         
   
     
      function createColumns(table_id){
            var columns = [];
            $(table_id).find('thead th').each(function(){
                var data =[]
                $.each(this.attributes, function() {
                    if(this.specified) {
                        if(this.name.includes("data")){
                            var name = this.name.replace("data-","");
                            var value = this.value;
                            data.push({[name] :value});
                        }
                    }
                  });
                columns.push(data);
            });
            console.log(columns);
            return columns;
        }
        function callBackDataTablesSan(table_id,url,options=[],extra_data=null){

            var columns = createColumns(table_id,extra_data);
             let defaults = {
                    responsive: true,
                    bDestroy: true,
                    bSearchable:true,
                    deferRender: true,
                    serverSide: true,
                    processing: true,
                    paging: true,

                    // drawCallback: changeListCheck,
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: '',
                        // lengthMenu: 'MENU ',
                    },
                    lengthMenu: [[-1, 10, 25, 50, 100, 500, 1000], ['All', 10, 25, 50, 100, 500, 1000]],
                    bAutoWidth: false,
                    ajax: {
                        url:url,
                        data:function ( d ) {
                              return extra_data ? $.extend( {}, d, extra_data ) : d ;
                          }
                    },
                    method: "GET",
                    columns: columns,
                    pageLength: 10,
                    searching: true,
                    bFilter: false,
                    bStateSave: true,
                    fnStateSave : function (oSettings, oData) {
                        localStorage.setItem(table_id, JSON.stringify(oData));
                    },
                    fnStateLoad: function (oSettings) {
                        return JSON.parse(localStorage.getItem(table_id));
                    }
                };
                jQuery.extend(defaults, options)
                // console.log(defaults);
            var table = $(table_id).DataTable(defaults);
            table.buttons().container().appendTo( '#example_wrapper .col-md-6:eq(0)' );
            $(table_id).DataTable().ajax.reload();
            return table;
        }        

     </script>

    @yield('script')
</body>
</html>
