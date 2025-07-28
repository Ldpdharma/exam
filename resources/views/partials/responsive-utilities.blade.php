<!-- Responsive Utilities -->
<style>
    /* Mobile-first approach */
    @media (max-width: 576px) {
        /* Forms */
        .form-control-sm {
            width: 100%;
        }
        
        /* Tables */
        .table-responsive {
            overflow-x: auto;
        }
        
        /* Buttons */
        .btn-group-vertical {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        
        /* Cards */
        .card {
            margin-bottom: 1rem;
        }
        
        /* Navigation */
        .navbar-nav {
            flex-direction: column;
            text-align: center;
        }
        
        /* Modals */
        .modal-dialog {
            margin: 1.75rem auto;
            max-width: 90%;
        }
    }

    /* Tablet view */
    @media (min-width: 576px) and (max-width: 768px) {
        /* Grid adjustments */
        .col-sm-12 {
            width: 100%;
        }
        
        /* Form groups */
        .form-group {
            margin-bottom: 1rem;
        }
    }

    /* Desktop view */
    @media (min-width: 768px) {
        /* Reset desktop styles */
        .navbar-nav {
            flex-direction: row;
        }
    }
</style>

<!-- Responsive Grid Classes -->
<div class="d-none d-sm-block">
    <!-- This div will only show on screens >= 576px -->
</div>

<div class="d-sm-none">
    <!-- This div will only show on screens < 576px -->
</div>
