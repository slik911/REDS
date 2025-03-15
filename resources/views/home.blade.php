@extends('layouts.master-admin')

@section('title')
    Dashboard   
@endsection
@section('styles')
    <style>
        .content-card{
            background-color: #F5F7FB !important;
            border: none;
            box-shadow: none
        }

        .dash-cards p{
            font-size: 1.0rem;
            font-weight: bold;
            color: #fff;
        }

        .dash-cards h1{
            font-size: 2.5rem;
            font-weight: bold;
            color: #fff;
        }

    </style>
@endsection


@section('content')


    <!-- Row for statistics cards -->
    <div class="row">
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body dash-cards">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-start" style="width:50%;">
                            <p>Clients</p>
                            <h1>50</h1>
                        </div>
                        <div class="text-end" style="width:50%;">
                            <i class="align-middle mt-n6" data-feather="user"></i>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body dash-cards">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-start" style="width:50%;">
                            <p>RFQ</p>
                            <h1>120</h1>
                        </div>
                        <div class="text-end" style="width:50%;">
                            <i class="align-middle mt-n6" data-feather="file-text"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body dash-cards">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-start" style="width:50%;">
                            <p>Quotation</p>
                            <h1>150</h1>
                        </div>
                        <div class="text-end" style="width:50%;">
                            <i class="align-middle mt-n6" data-feather="dollar-sign"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body dash-cards">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-start" style="width:50%;">
                            <p>Posts</p>
                            <h1>75</h1>
                        </div>
                        <div class="text-end" style="width:50%;">
                            <i class="align-middle mt-n6" data-feather="edit"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header " style="font-weight: bold">Pending Follow Up</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th>Date</th>
                            <th scope="col">Name</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mar 21 2024</td>
                            <td>Noel Cole </td>
                            <td><span class="badge bg-success">Sent</span></td>
              
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Mar 18 2024</td>
                            <td>Tim Frantz </td>
                            <td><span class="badge bg-success">Sent</span></td>
              
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>Mar 17 2024</td>
                            <td>Micheal Cole </td>
                            <td><span class="badge bg-success">Sent</span></td>
              
                          </tr>
                          <tr>
                            <th scope="row">4</th>
                            <td>Mar 23 2024</td>
                            <td>Joel Bradvka </td>
                            <td><span class="badge bg-success">Sent</span></td>
              
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header " style="font-weight: bold">Pending Requests</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Noel Cole </td>
                            <td><span class="badge bg-success">Pending</span></td>
              
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Tim Frantz </td>
                            <td><span class="badge bg-success">Pending</span></td>
              
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>Micheal Cole </td>
                            <td><span class="badge bg-success">Pending</span></td>
              
                          </tr>
                          <tr>
                            <th scope="row">4</th>
                            <td>Joel Bradvka </td>
                            <td><span class="badge bg-success">Pending</span></td>
              
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">RFQ Conversion Rate</div>
                <div class="card-body text-center">
                    <div class="d-flex justify-content-around">
                        <div class="text-center">
                            <div class="progress blue">
                                <span class="progress-left">
                                  <span class="progress-bar"></span>
                                </span>
                                <span class="progress-right">
                                    <span class="progress-bar"></span>
                                </span>
                                <div class="progress-value">90%</div>
                            </div>
                            <p>Last Month</p>
                        </div>
                        <div class="text-center">
                            <div class="progress blue">
                                <span class="progress-left">
                                  <span class="progress-bar"></span>
                                </span>
                                <span class="progress-right">
                                    <span class="progress-bar"></span>
                                </span>
                                <div class="progress-value">90%</div>
                            </div>
                            <p>Current Month</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    // Simple script to animate the progress circle
    document.addEventListener('DOMContentLoaded', function() {
        let circles = document.querySelectorAll('.progress-circle');
        circles.forEach(function(circle) {
            let progress = circle.getAttribute('data-progress');
            let stroke = circle.querySelector('circle:nth-child(2)');
            let radius = stroke.getAttribute('r');
            let circumference = 2 * Math.PI * radius;
            let offset = circumference - (progress / 100) * circumference;
            stroke.style.strokeDasharray = circumference;
            stroke.style.strokeDashoffset = offset;
        });
    });
</script>
    
@endsection