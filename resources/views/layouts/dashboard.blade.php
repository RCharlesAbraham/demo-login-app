@extends('layouts.app')

@push('styles')
<style>
    body {
        overflow: hidden; /* Prevent the entire page from scrolling */
    }

    .dashboard-inner {
        display: grid;
        grid-template-columns: 240px 1fr;
        gap: 25px;
        max-width: 1450px;
        width: calc(100% - 60px);
        margin: 0 auto;
        padding: 20px 0 0 0; 
        height: calc(100vh - 98px); /* Account for the top nav bar */
    }

    /* Override sidebar to be truly static with internal scroll if needed */
    .sidebar {
        height: calc(100vh - 120px) !important;
        position: static !important;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
    }

    .sidebar::-webkit-scrollbar {
        width: 4px;
    }
    .sidebar::-webkit-scrollbar-thumb {
        background: #e2e8f0; 
        border-radius: 10px;
    }

    /* Make the content area the ONLY thing that scrolls */
    .content-area-dashboard {
        padding: 0 10px 50px 0;
        height: calc(100vh - 110px);
        overflow-y: auto;
        overflow-x: hidden;
    }
    
    .content-area-dashboard::-webkit-scrollbar {
        width: 6px;
    }
    .content-area-dashboard::-webkit-scrollbar-thumb {
        background: #cbd5e1; 
        border-radius: 10px;
    }
    .content-area-dashboard::-webkit-scrollbar-track {
        background: transparent;
    }

    @media (max-width: 1100px) {
        .dashboard-inner {
            grid-template-columns: 1fr;
            height: auto;
        }
        body {
            overflow: auto; /* Re-enable scroll for mobile layout */
        }
        .sidebar {
            height: auto !important;
        }
        .content-area-dashboard {
            height: auto;
            overflow: visible;
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
