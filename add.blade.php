
    
@extends('layout.admin.master')
@section('content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid mt-3">
        <div class="container-fluid mt-3">
            <div class="card">
            <div class="card-header">
                    <h5>Add New Purchase</h5>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ url('admin/purchase/store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                <label>Suppliers</label>
                                <select class="form-control" name="supplier_id" required>
                                    <option value="">select</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="alert alert-danger">{{$message}}<div>
                                 @enderror 

                            </div>
                                </div>
                                <div class="col-md-3">
                            <div class="form-group">
                                <label>Reference</label>
                                <input type="text" class="form-control input-flat" name="reference" value="{{strtoupper(uniqid())}}" readonly>
                                @error('name')
                                <div class="alert alert-danger">{{$message}}<div>
                                 @enderror 
                            </div>
                                </div>
                            
                            <div class="col-md-3">
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" class="form-control input-flat" name="reference" value="{{strtoupper(uniqid())}}" required>
                                @error('name')
                                <div class="alert alert-danger">{{$message}}<div>
                                 @enderror 
                            </div>
                            </div>
                            </div>
                            
                         
                            

                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                <select class="form-control" id="itemList" name="item_id" onchange="get_item(this.value)">
                                    <option value="">select</option>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}" data-name="{{$item->name}}" data-price="{{$item->purchase_price}}">{{ $item->name }}</option>
                                    @endforeach
                                </select>  
                            </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table" id="ItemTable">
                                        <thead>
                                            <tr class="dynamicRows">
                                                <th>Item Name</th>
                                                <th>Quantity</th>
                                                <th>unit Price</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endsection

  @push ('custom-scripts')

    <script>
        let itemsArray = [];
        var newRow ="";
        function get-item(id) {
            var element = $("#itemList").find('option:selected');
            var name = element. attr("data-name");
            var unit-price = element.attr("data-price");

            if(!in_array(id, itemsArray)){
                var newRow ="<tr>"
                +"<td><input type='hidden' name='item_id[]' value='"+id+"'>"+name+"</td>"
                +"<td><input id='item-row-"+id+"' onchange='update-qty("+id+")' type='number' name='quantity[]' class='form-control' value='"+1+"'></td>"
                +"<td id='price-row-"+id+"'>"+unit_price+"</td>"
                +"<td id='amount-row-"+id+"'>"+unit_price+"</td>"
                +"</tr>";
             $(newRow).insertAfter($('table tr.dynamicRows:last'));
            }
            items Array.push(id);

            $('#itemList').prop('selectedIndex',0);
            console.log(itemsArray); 
        }
        function update_qty(id){
            qty = Number($("#item-row-"+id).val());
            unit_price = Number($("#price-row-"+id).text());
            $("#amount-row-"+id).html(qty*unit_price);
        }
        function in-array(search, array)
        {
            for(i = 0; i < array.length; i++)
        {
            if(array[]== search)
        {
            return true;
        }
        }
        return false;
        }
    </script>
@endpush();



