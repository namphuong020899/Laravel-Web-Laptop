 @extends('admin/Admin')

@section('title-ad')   
    Manage Order Details
@endsection

 @section('content-ad')

<div class="card shadow mb-4">
        <div class="card-header py-3"><a href="{{route('donhang')}}">
            <button class="btn btn-primary"  type="button">
                <i class="fas fa-reply-all" aria-hidden="true"></i> Return
            </button></a><br>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        	<th>STT</th>
                            <th>Product Name</th>
                            <th>Product Image </th>
                            <th>Product Price</th>
                            <th>Product Amount </th>
                            
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        	<th>STT</th>
                            <th>Product Name</th>
                            <th>Product Image </th>
                            <th>Product Price</th>
                            <th>Product Amount </th>
                           
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($billdetaill as $key => $bd)
                        <tr>
                        	<td>{{$key++}}</td>
                            <td>{{$bd->name}}</td>
                            <td>
                                <img height="50px" width="100px" src="{{ asset('source/image/product/'.$bd->image) }}" alt="">
                            </td>
                            <td>{{$bd->unit_price}}</td>
                            <td>{{$bd->quantity}}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection