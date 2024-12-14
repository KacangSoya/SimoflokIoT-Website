<div class="container-fluid">
    <!-- Content Row -->
    <h1>Data Sensor</h1>
    <div class="row">
        <div class="col-xl-2 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary mb-1">
                                DATA pH</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="ph">0
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-water fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Earnings (Monthly) Card Example -->
        <div class="col-xl-2 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                data suhu</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="suhu">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-temperature-low   fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-2 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Kadar Oksigen
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="o2">0 mg/L</div>
                                </div>
                                <div class="col">

                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-lungs fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Tekanan Aerator</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="aerator">-</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shower fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Kadar Amoniak</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="amoniak">0 ppm</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-flask fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-md-6">
            <div class="card shadow mb-4 w-100 border">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Chart Data pH</h6>
                </div>
                <div class="card-body" style="overflow-x:auto;">
                    <div class="chart-area" style="width: 100%; min-width: 800px; margin: auto;">
                        <canvas id="phChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Chart Data Oksigen</h6>
                    </div>
                    <div class="card-body" style="overflow-x:auto;">
                        <div class="chart-area" style="width: 100%; min-width: 800px; margin: auto;">
                            <canvas id="oksigenChart"></canvas>
                        </div>
                    </div>
                </div> 
            
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Chart Data Suhu</h6>
                </div>
                <div class="card-body" style="overflow-x:auto;">
                    <div class="chart-area" style="width: 100%; min-width: 800px; margin: auto;">
                        <canvas id="suhuChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
        <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Chart Data Aerator</h6>
    </div>
    <div class="card-body" style="overflow-x:auto; display: flex; justify-content: center; align-items: center;">
        <div class="chart-area" style="width: 100%; max-width: 800px;">
            <canvas id="aeratorChart"></canvas>
        </div>
    </div>
</div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Chart Data Amoniak</h6>
                    </div>
                    <div class="card-body" style="overflow-x:auto;">
                        <div class="chart-area" style="width: 100%; min-width: 800px; margin: auto;">
                            <canvas id="amoniakChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
</div>