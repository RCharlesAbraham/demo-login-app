@extends('layouts.app')

@push('styles')
<style>
    .dashboard-inner {
        display: grid;
        grid-template-columns: 240px 1fr;
        gap: 25px;
        max-width: 1450px;
        width: calc(100% - 60px);
        margin: 0 auto;
        padding: 20px 0 50px;
    }
    .content-area-dashboard {
        padding: 0;
    }
    @media (max-width: 1100px) {
        .dashboard-inner {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<div class="dashboard-inner">
    @include('partials.sidebar')
    <div class="content-area-dashboard">
        @yield('dashboard-content')
    </div>
</div>
@endsection
