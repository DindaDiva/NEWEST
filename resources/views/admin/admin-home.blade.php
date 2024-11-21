@extends('admin.admin-layouts.admin-header')

@section('home-content')
<div class="page-wrapper">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">Overview</div>
                    <h2 class="page-title">Dashboard</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container">
            <div class="row mt-5">
                <!-- Bagian untuk tampilan chart -->
                <div class="col-md-6">
                    <h3>Product Review Average Rating</h3>
                    <canvas id="productReviewChart"></canvas>
                </div>
                <div class="col-md-6">
                    <h3>Service Review Average Rating</h3>
                    <canvas id="serviceReviewChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.admin-layouts.admin-footer')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart untuk rata-rata rating produk
    const productReviewCtx = document.getElementById('productReviewChart').getContext('2d');
    const productReviewChart = new Chart(productReviewCtx, {
        type: 'bar', 
        data: {
            labels: ['Product Reviews'], // Label chart
            datasets: [{
                label: 'Average Rating',
                data: [{{ $productAvgRating ?? 0 }}], // Data rating produk
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: { 
                    beginAtZero: true 
                }
            }
        }
    });

    // Chart untuk rata-rata rating jasa
    const serviceReviewCtx = document.getElementById('serviceReviewChart').getContext('2d');
    const serviceReviewChart = new Chart(serviceReviewCtx, {
        type: 'bar', 
        data: {
            labels: ['Service Reviews'], // Label chart
            datasets: [{
                label: 'Average Rating',
                data: [{{ $serviceAvgRating ?? 0 }}], // Data rating jasa
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: { 
                    beginAtZero: true 
                }
            }
        }
    });
</script>

@endsection
