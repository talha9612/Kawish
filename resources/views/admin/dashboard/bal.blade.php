@extends('layouts.admin.app')
<style>
         .map-container {
            width: 100%!important;
            height: 50vh!important;
            position: relative; /* Ensure absolute positioning inside this container works properly */
            overflow: hidden; /* Hide overflow for the container */
        }

        /* Add styling for the background image */
        .map-background {
            /* position: absolute; */
            top: 0;
            left: 0;
            width: 100%!important;
            height: 50vh!important;
            background-image: url('../pic/5.jpg')!important;
            background-repeat:no-repeat;
            background-size: contain; /* Cover the entire container */
            background-position: center; /* Center the background image */
            z-index: -1; /* Send the background behind other content */
        }

        /* Add styling for the highlighted areas */
        .highlighted {
            opacity: 0.5; /* Adjust opacity as needed */
            background-color: rgba(255, 0, 0, 0.5); /* Semi-transparent red */
        }

        /* Style for the button */
        .btn {
            position: absolute;
            top: 42%;
            left: 68%;
            transform: translate(-50%, -50%);
            margin: 0;
            color: transparent; /* Hide text */
            font-size: 33px;
            cursor: pointer;
            height: 100px;
            width: 150px;
            background: none; /* Transparent background */
            border: none; /* Remove border */
            outline: none; /* Remove outline */
        }
        a{
            /* opacity: 0; */
            color: transparent;
        }

    </style>
 @section('content')
<div class="animated fadeIn">
    <!-- Widgets  -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-1">
                            <i class="pe-7s-cash"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text">$<span class="count">23569</span></div>
                                <div class="stat-heading">Revenue</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-2">
                            <i class="pe-7s-cart"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count">3435</span></div>
                                <div class="stat-heading">New Well</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-3">
                            <i class="pe-7s-browser"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count">349</span></div>
                                <div class="stat-heading">Pumps</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-4">
                            <i class="pe-7s-users"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count">2986</span></div>
                                <div class="stat-heading">Area</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Widgets -->
    <!--  Traffic  -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- <h4 class="box-title">Traffic </h4> -->
                
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card-body">
                            <!-- <canvas id="TrafficChart"></canvas>   -->
                            <!-- <div id="traffic-chart" class="traffic-chart"></div> -->
                            <div class="col-md-9">
                                <div class="map-container" id="mapContainer">
                                    <!-- Background image -->
                                    <div class="map-background"></div>

                                    <!-- Button with hidden text -->
                                    <!-- <button class="btn" ><a href="/punjab">Punjab</a></button>
                                    <button class="btnkpk" ><a href="/kpk">kpk</a></button>
                                    <button class="btnbal" ><a href="/bal">bal</a></button>
                                    <button class="btnsindh" ><a href="/sindh">sindh</a></button> -->
                                    <!-- Define the image map -->
                                    
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="card">
                                <a href="/index"><button>go back</button></a>
                                    <div class="card-header">

                                    </div>
                                    <div class="card-body">
                                       
                                    </div>
                                    <div class="card-footer">
                                        <h2>(Balochistan)</h2>
                                        <table class="table" id="setupCountsTable">
                                            <thead>
                                                <tr>
                                                    <th>Area</th>
                                                    <th>Hand Pump</th>
                                                    <th>New Well</th>
                                                    <th>Repair Well</th>
                                                </tr>
                                            </thead>
                                            <tbody id="setupCountsBody">
                                                <!-- Table body will be populated dynamically -->
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card-body">
                            <div class="progress-box progress-1">
                                <h4 class="por-title">Visits</h4>
                                <div class="por-txt">96,930 Users (40%)</div>
                                <div class="progress mb-2" style="height: 5px;">
                                    <div class="progress-bar bg-flat-color-1" role="progressbar" style="width: 40%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="progress-box progress-2">
                                <h4 class="por-title">Bounce Rate</h4>
                                <div class="por-txt">3,220 Users (24%)</div>
                                <div class="progress mb-2" style="height: 5px;">
                                    <div class="progress-bar bg-flat-color-2" role="progressbar" style="width: 24%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="progress-box progress-2">
                                <h4 class="por-title">Unique Visitors</h4>
                                <div class="por-txt">29,658 Users (60%)</div>
                                <div class="progress mb-2" style="height: 5px;">
                                    <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="progress-box progress-2">
                                <h4 class="por-title">Targeted  Visitors</h4>
                                <div class="por-txt">99,658 Users (90%)</div>
                                <div class="progress mb-2" style="height: 5px;">
                                    <div class="progress-bar bg-flat-color-4" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div> <!-- /.card-body -->
                    </div>
                </div> <!-- /.row -->
                <div class="card-body"></div>
            </div>
        </div><!-- /# column -->
    </div>
    <!--  /Traffic -->
    <div class="clearfix"></div>
   
    
  
    <!-- Modal - Calendar - Add New Event -->
    <div class="modal fade none-border" id="event-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><strong>Add New Event</strong></h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                    <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /#event-modal -->
    <!-- Modal - Calendar - Add Category -->
    <div class="modal fade none-border" id="add-category">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><strong>Add a category </strong></h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">Category Name</label>
                                <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name"/>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Choose Category Color</label>
                                <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                    <option value="success">Success</option>
                                    <option value="danger">Danger</option>
                                    <option value="info">Info</option>
                                    <option value="pink">Pink</option>
                                    <option value="primary">Primary</option>
                                    <option value="warning">Warning</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>
<!-- /#add-category -->
</div>

<script>
   // Function to fetch all setup counts for Punjab
function fetchAllPunjabSetupCounts() {
    fetch(`/get-all-bal-setup-count`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to fetch setup counts for Punjab');
            }
            return response.json();
        })
        .then(data => {
            // Clear previous table rows
            const setupCountsBody = document.getElementById('setupCountsBody');
            setupCountsBody.innerHTML = '';

            // Populate table with setup counts for each area
            Object.entries(data).forEach(([area, counts]) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${area}</td>
                    <td>${counts.handPumpCount}</td>
                    <td>${counts.newWellCount}</td>
                    <td>${counts.repairWellCount}</td>
                `;
                setupCountsBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching setup counts for Punjab:', error.message));
}

// Call the function to fetch all setup counts for Punjab
fetchAllPunjabSetupCounts();


</script>
@endsection
@section('bot')

@endsection