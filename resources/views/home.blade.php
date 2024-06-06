@extends('layouts.admin-leyout')

@section('content')
<style>
    .web-bg{
        background-color:chartreuse; 
    }

</style>
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-6" onclick="window.location.href = '{{ route('product.index') }}';" style="cursor: pointer;">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $productCount }}</h3>
                        <p>Total Products</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6" onclick="window.location.href = '{{ route('purchase') }}';" style="cursor: pointer;">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $purchaseCount }}</h3>
                        <p>Total Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6" onclick="window.location.href = '{{ route('adminexcel') }}';" style="cursor: pointer;">
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{ $excelCount }}</h3>
                        <p>Total Excel Data</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6" onclick="window.location.href = '{{ route('adminroom') }}';" style="cursor: pointer;">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $roomCount }}</h3>
                        <p>Total Room Booking</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6" onclick="window.location.href = '{{ route('website') }}';" style="cursor: pointer;">
                <div class="small-box web-bg">
                    <div class="inner">
                        <h3>{{ $websiteCount }}</h3>
                        <p>Total Website</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
