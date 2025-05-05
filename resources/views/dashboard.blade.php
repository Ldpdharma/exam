@extends('layouts.app')
@section('content')
<main class="app-main">
<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid p-0">
        <!--begin::Row-->
        <!-- Contact Info -->
        <div class="d-flex flex-wrap align-items-center gap-3 p-3" style="background-color:rgb(93, 230, 212);">
            <span><i class="fas fa-phone-alt"></i> Phone: +04142 285 601</span>
            <span><i class="fas fa-mobile-alt"></i> Cell: +91 9763297201</span>
            <span><i class="fas fa-envelope"></i> Email: kect@gmail.com</span>
        </div>
                
        <!-- College Name & Logo -->
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center text-center" style="width: 100%;">
            <img src="{{ asset('images/clglogo.png') }}" alt="College Logo" class="img-fluid me-3" style="max-height: 80px; width:80%;">
        </div>
        
        <!-- Image Swipe (Carousel) -->
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/college1.jpg') }}" class="d-block w-100 img-fluid" alt="Slide 1" style="max-height: 250px;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/college2.jpg') }}" class="d-block w-100 img-fluid" alt="Slide 2" style="max-height: 250px;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/college3.jpg') }}" class="d-block w-100 img-fluid" alt="Slide 3" style="max-height: 250px;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/college4.jpg') }}" class="d-block w-100 img-fluid" alt="Slide 1" style="max-height: 250px;">             
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/college5.jpg') }}" class="d-block w-100 img-fluid" alt="Slide 2" style="max-height: 250px;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/college6.jpg') }}" class="d-block w-100 img-fluid" alt="Slide 3" style="max-height: 250px;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/college7.jpg') }}" class="d-block w-100 img-fluid" alt="Slide 1" style="max-height: 250px;">              
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/college8.jpg') }}" class="d-block w-100 img-fluid" alt="Slide 2" style="max-height: 250px;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/college9.jpg') }}" class="d-block w-100 img-fluid" alt="Slide 3" style="max-height: 250px;">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
            <!-- Department Dropdown -->
            <div class="position-absolute top-0 end-0 p-3" style="z-index: 10;">
                <div class="dropdown">
                    <button class="btn dropdown-toggle d-flex justify-content-between align-items-center" style="width:200px;background-color: rgb(103, 212, 216);" type="button" id="departmentDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <span style="color:white;">Department</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="departmentDropdown">
                        <li><a class="dropdown-item">Computer Science</a></li>
                        <li><a class="dropdown-item">Electrical Engineering</a></li>
                        <li><a class="dropdown-item">Mechanical Engineering</a></li>
                    </ul>
                    <!-- <label for="department" class="mt-2" style="color:white;">Department</label>
                    <select id="department" name="department" class="form-select mt-1">
                        @foreach(\App\Models\Student::select('department')->distinct()->get() as $dept)
                            <option value="{{ $dept->department }}">{{ $dept->department }}</option>
                        @endforeach
                    </select> -->
                </div>
            </div>
        </div>
        
        <!-- College Address -->
        <div class="mt-4 bg-white p-4 shadow-sm">
            <div class="row">
                <div class="col-md-4 col-lg-3 ">
                    <h5>Address</h5>
              
                    <p>Nellikuppam High Road, <br> S Kumarapuram, Cuddalore,<br>  Tamil Nadu 607109
                  </p>
                </div>
                <div class="col-md-8 col-lg-9">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3890.555994451121!2d79.71365!3d11.7687326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a54a2411eea3d89%3A0xa2da54bcfd9b6e0b!2sKrishnasamy%20College%20of%20Engineering%20and%20Technology!5e0!3m2!1sen!2sus!4v1698765432100!5m2!1sen!2sus"
                        width="100%" height="200" style="border:0;" allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>

</main>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js" integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>

<script>
    // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
    // IT'S ALL JUST JUNK FOR DEMO
    // ++++++++++++++++++++++++++++++++++++++++++

    /* apexcharts
     * -------
     * Here we will create a few charts using apexcharts
     */

    //-----------------------
    // - MONTHLY SALES CHART -
    //-----------------------

    var sales_chart_options = {
        series: [{
                name: "Digital Goods",
                data: [28, 48, 40, 19, 86, 27, 90],
            },
            {
                name: "Electronics",
                data: [65, 59, 80, 81, 56, 55, 40],
            },
        ],
        chart: {
            height: 180,
            type: "area",
            toolbar: {
                show: false,
            },
        },
        legend: {
            show: false,
        },
        colors: ["#0d6efd", "#20c997"],
        dataLabels: {
            enabled: false,
        },
        stroke: {
            curve: "smooth",
        },
        xaxis: {
            type: "datetime",
            categories: [
                "2023-01-01",
                "2023-02-01",
                "2023-03-01",
                "2023-04-01",
                "2023-05-01",
                "2023-06-01",
                "2023-07-01",
            ],
        },
        tooltip: {
            x: {
                format: "MMMM yyyy",
            },
        },
    };

    var sales_chart = new ApexCharts(
        document.querySelector("#sales-chart"),
        sales_chart_options
    );
    sales_chart.render();

    //---------------------------
    // - END MONTHLY SALES CHART -
    //---------------------------

    //-------------
    // - PIE CHART -
    //-------------

    var pie_chart_options = {
        series: [700, 500, 400, 600, 300, 100],
        chart: {
            type: "donut",
        },
        labels: ["Chrome", "Edge", "FireFox", "Safari", "Opera", "IE"],
        dataLabels: {
            enabled: false,
        },
        colors: [
            "#0d6efd",
            "#20c997",
            "#ffc107",
            "#d63384",
            "#6f42c1",
            "#adb5bd",
        ],
    };

    var pie_chart = new ApexCharts(
        document.querySelector("#pie-chart"),
        pie_chart_options
    );
    pie_chart.render();

    //-----------------
    // - END PIE CHART -
    //-----------------
</script>
@endpush