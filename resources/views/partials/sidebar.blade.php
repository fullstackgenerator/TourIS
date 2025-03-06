<div class="page">
    <aside class="navbar navbar-vertical navbar-expand-sm bg-dark d-flex flex-column position-sticky top-0 vh-100 overflow-auto" style="width: 250px; min-width: 250px;">
        <div class="container-fluid">
            <h1 class="navbar-brand navbar-brand-autodark text-white py-6">TourIS</h1>
            <ul class="navbar-nav pt-lg-6 w-100">
                <li class="nav-item">
                    <a href="{{ route('touris.index') }}" class="btn btn-blue w-75 my-3 mx-5">Packages</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('accommodations.index') }}" class="btn btn-azure w-75 my-3 mx-5">Accommodations</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('flights.index') }}" class="btn btn-cyan w-75 my-3 mx-5">Flights</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('clients.index') }}" class="btn btn-teal w-75 my-3 mx-5">Clients</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('sales.index') }}" class="btn btn-green w-75 my-3 mx-5">Sales</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('vendors.index') }}" class="btn btn-lime w-75 my-3 mx-5">Back</a>
                </li>
            </ul>
        </div>
    </aside>
</div>
