@extends('layouts.master-admin')
@section('title')
    Create Quotation
@endsection

@section('scripts')
<script>
$(document).ready(function () {
    // Function to calculate the total based on unit price and quantity
    function calculateTotal(input) {
        let row = $(input).closest('tr');
        let unitPrice = parseFloat(row.find('.unit-price').val()) || 0;
        let quantity = parseInt(row.find('.quantity').val()) || 1;
        let total = unitPrice * quantity;

        row.find('.total').val(total.toFixed(2)); // Update total with 2 decimal places
    }

    // Function to update row numbers and trix-editor IDs
    // function updateRowNumbers() {
    //     $('.feature-row').each(function (index) {
    //         let rowNumber = index + 1;
    //         $(this).find('.row-number').text(rowNumber);
    //     });
    // }

    // Function to add a new row
    function addRow() {
        let rowCount = $('.feature-row').length + 1; // Get the next row number

        let newRow = `
            <tr class="feature-row">
                <td class="row-number">${rowCount}</td>
                <td>
                    <select name="services[]" class="form-select">
                        ${$('#services-table-body select[name="services[]"]').first().html()}
                    </select>
                </td>
                <td>
                    <trix-toolbar id="my_toolbar_${rowCount}" class="mt-2"  style="max-width:350px"></trix-toolbar>
                    <input type="hidden" name="description[]" class="content-field" id="my_input_${rowCount}">
                     <input class="my_input_${rowCount}" type="hidden"  value="">
                    <trix-editor input="my_input_${rowCount}"  toolbar="my_toolbar_${rowCount}" class="trix-editor" style="max-width:350px"></trix-editor>
                     
                           
                </td>
                <td>
                    <input type="number" name="unit_price[]" class="form-control unit-price" value="0" step="0.01">
                </td>
                <td>
                    <input type="number" name="quantity[]" class="form-control quantity" value="1" min="1">
                </td>
                <td>
                    <input type="text" name="total[]" class="form-control total" value="0" readonly>
                </td>
                <td>
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-primary add-feature">+</button>
                        <button type="button" class="btn btn-danger remove-feature">-</button>
                    </div>
                </td>
            </tr>`;

        $('#services-table-body').append(newRow); // Append new row to the table body
        // updateRowNumbers(); // Update row numbers and Trix editor IDs
        attachEventListeners(); // Reattach event listeners
    }

    // Function to remove a row
    function removeRow() {
        if ($('.feature-row').length > 1) {
            $(this).closest('tr').remove();
            updateRowNumbers(); // Update row numbers and Trix editor IDs after removing a row
        }
    }

    // Function to attach event listeners
    function attachEventListeners() {
        $('.add-feature').off('click').on('click', addRow);
        $('.remove-feature').off('click').on('click', removeRow);
        $('.unit-price, .quantity').off('input').on('input', function () {
            calculateTotal(this);
        });
    }

    // Initialize event listeners on page load
    attachEventListeners();
});

    // Function to get client information
    
    function getClientInfo(uuid) {
     
     $.ajax({
         url: '/client/info',
         type: 'get',
         data: {
             uuid: uuid, // ID of the client record in the database
         },
         success: function(response) {
             if (response) {
                 $("#phone").val(response.phone_number).prop("readonly", true)
                 $("#email ").val(response.email).prop("readonly", true);
                 $("#rfq_id").empty().append('<option value="">Select RFQ</option>'); // Clear and add default option
                    
                    if(response.rfq.length > 0) {
                        $.each(response.rfq, function(index, rfq) {
                            $("#rfq_id").append('<option value="' + rfq.uuid + '">' + rfq.RFQ_number + '</option>');
                        });
                    }
             }
             else {
                 console.log(response.message);
             }
         },
         error: function() {
         
             alert('An error occurred while getting information.');
         }
     });
 }

</script>
@endsection
@section('content')
   <form action="{{route('admin.quotation.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
        
            <div class="row">
                <div class="col-md-6">
                   
                    <div class="mb-3 col-md-12">
                        <label for="title" class="form-label">Client</label>
                        <select name="client_uuid" id="client_uuid" class="form-select" onchange="getClientInfo(this.value)">
                            <option value="">Select Client</option>
                            @foreach ($clients as $client)
                                <option value="{{$client->uuid}}">{{ $client->first_name }} {{ $client->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control col-md-8" id="phone" name="phone_number" value="{{old('phone_number') }}" readonly  placeholder="Enter Phone Number">
                        </div>
        
                        <div class="mb-3 col-md-8">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="text" class="form-control col-md-8" id="email" name="email" value="{{old('email') }}" readonly placeholder="Enter Email">
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="title" class="form-label">REFERENCE NUMBER</label>
                            <select name="rfq_id" id="rfq_id" class="form-select">
                                <option value="">Select RFQ</option>
                                @foreach ($rfqs as $rfq)
                                    <option value="{{ $rfq->uuid }}" {{ $rfq_number == $rfq->rfq_number ? 'selected' : '' }}>{{ $rfq->rfq_number }}</option>
                                @endforeach
                            </select>
                            <small class="text-danger">Not required</small>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="title" class="form-label">Quote Number</label>
                            <input type="text" class="form-control col-md-12" id="quote_number" name="quote_number" value="{{  $quotation_number }}" readonly>
                        </div>

                        
                   </div>
                       
                </div>
            </div>

            <div class="mb-3 col-md-12">
                <label class="form-label">Services</label>
                <div id="services-container" class="table-responsive">
                    <table class="table table-bordered wrap table-responsive">
                        <thead class="table">
                            <tr>
                                <th style="width: 5%;">#</th>
                                <th class="service-column">Service</th>
                                <th class="description-column">Description</th>
                                <th style="width: 10%;">Unit Price</th>
                                <th style="width: 10%;">Quantity</th>
                                <th style="width: 10%;">Total</th>
                                <th style="width: 15%;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="services-table-body">
                            <tr class="feature-row">
                                <td class="row-number">1</td> <!-- Row Number -->
                                <td>
                                    <select name="services[]" class="form-select" required>
                                        <option value="">select Service</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->uuid }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <trix-toolbar id="my_toolbar_1" class="mt-2"  style="max-width:350px"></trix-toolbar>
                                    <input type="hidden" name="description[]" class="content-field" id="my_input_1">
                                    <input class="my_input_1" type="hidden" value="">
                                    <trix-editor toolbar="my_toolbar_1" input="my_input_1"  style="max-width:350px" required></trix-editor>                    
                                </td>
                                <td>
                                    <input type="number" name="unit_price[]" required class="form-control unit-price" value="0" step="0.01" oninput="calculateTotal(this)">
                                </td>
                                <td>
                                    <input type="number" name="quantity[]" required class="form-control quantity" value="1" min="1" oninput="calculateTotal(this)">
                                </td>
                                <td>
                                    <input type="text" name="total[]" required class="form-control total" value="0" readonly>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-primary add-feature">+</button>
                                        <button type="button" class="btn btn-danger remove-feature">-</button>
                                    </div>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
  
            

        </div>
    </div>
    <button type="submit" class="btn btn-primary">Create Quotation</button>
   </form>
@endsection