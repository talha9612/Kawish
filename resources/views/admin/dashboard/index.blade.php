@extends('layouts.admin.app')


@section('top')
    <style>
        #per {
            height: 20rem;
            overflow: hidden;
        }

        .progress-box {
            margin-bottom: 2px !important;
        }

        #down {
            gap: 5rem;
            margin-top: 10rem;
            width: 51rem;
        }

        #Bold {
            font-weight: bold;
        }

        .card .card-top button,
        .card .card-footer button {
            background: none;
            border: none;
            -webkit-box-shadow: none;
            box-shadow: none;
            color: #868e96;
            font-size: 12px;
            padding: 0 5px;
            /* margin-left: 22%;
            margin-top: 10%; */
            /* top: 50% !important; */
        }

        .return {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;

        }

        .card .card-top,
        .card .card-footer {
            background: #fafafa;
            border-bottom: 1px solid #e8e9ef;
            float: left;
            padding: .5rem !important;
            width: 25rem !important;
            height: 12rem !important;
        }

        #uppertable tbody,
        td,
        th,
        thead,
        tr {
            border: 0 solid;
            font-size: 10px;
            padding: 0 !important;
            border-color: inherit;
        }

        .table td,
        .table th {
            border: 0 solid;
            font-size: 10px;
            padding: 0 !important;
            border-color: inherit;
        }

        #head {
            font-size: 10px !important;
        }

        .card .card-footer {
            padding: 5px !important;
            height: auto;
            margin-top: 10px;
            background-color: #f0f3f5;
            border-top: 1px solid #c2cfd6;
        }

        #regionSelect {
            text-transform: none;
            margin: 20px 10px;
        }

        .displaypunjab .table td,
        .table th {
            font-size: 1rem;
        }

        .displaysindh .table td,
        .table th {
            font-size: 1rem;
        }

        .displaykpk .table td,
        .table th {
            font-size: 1rem;
        }

        .displaybal .table td,
        .table th {
            font-size: 1rem;
        }

        td,
        tr {
            text-align: right;
        }

        .container {
            background-color: white;
            margin-top: 0 !important;
        }

        .map-container {
            width: 500px;
            height: 400px;
            position: relative;
            /* Ensure absolute positioning inside this container works properly */
            overflow: hidden;
            /* Hide overflow for the container */
        }

        /* Add styling for the background image */
        .map-background {
            /* position: absolute; */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/pic/1.jpeg');
            background-repeat: no-repeat;
            background-size: contain;
            /* Cover the entire container */
            background-position: center;
            /* Center the background image */
            z-index: -1;
            /* Send the background behind other content */
            /* transform:translatex(); */
            /* transform: scale(1.2); */

        }

        /* Add styling for the highlighted areas */
        .highlighted {
            opacity: 0.5;
            /* Adjust opacity as needed */
            background-color: rgba(255, 0, 0, 0.5);
            /* Semi-transparent red */
        }

        .btn button {
            border: none !important;
        }

        .return button {
            width: 100px;
            height: 50px;
            background-color: grey !important;
            color: white !important;
            font-weight: bold;
            font-size: 1.5rem !important;
        }

        /* Style for the button */
        .btn {
            position: absolute;
            top: 48%;
            left: 65%;
            transform: translate(-50%, -50%);
            margin: 0;
            color: transparent;
            /* Hide text */
            font-size: 33px;
            cursor: pointer;
            height: 100px;
            width: 150px;
            background: none;
            /* Transparent background */
            border: none !important;
            /* Remove border */
            outline: none;
            /* Remove outline */
        }

        .btnkpk {
            position: absolute;
            top: 20%;
            left: 58%;
            transform: translate(-50%, -50%);
            margin: 0;
            color: transparent;
            /* Hide text */
            font-size: 33px;
            cursor: pointer;
            height: 100px;
            width: 150px;
            background: none;
            /* Transparent background */
            border: none;
            /* Remove border */
            outline: none;
            /* Remove outline */
        }

        .btnbal {
            position: absolute;
            top: 65%;
            left: 25%;
            transform: translate(-50%, -50%);
            margin: 0;
            color: transparent;
            /* Hide text */
            font-size: 33px;
            cursor: pointer;
            height: 100px;
            width: 150px;
            background: none;
            /* Transparent background */
            border: none;
            /* Remove border */
            outline: none;
            /* Remove outline */
        }

        .btnsindh {
            position: absolute;
            top: 80%;
            left: 46%;
            transform: translate(-50%, -50%);
            margin: 0;
            color: transparent;
            /* Hide text */
            font-size: 33px;
            cursor: pointer;
            height: 100px;
            width: 150px;
            background: none;
            /* Transparent background */
            border: none;
            /* Remove border */
            outline: none;
            /* Remove outline */
        }

        .btnthar {
            position: absolute;
            top: 78%;
            left: 76%;
            transform: translate(-50%, -50%);
            margin: 0;
            color: transparent;
            /* Hide text */
            font-size: 33px;
            cursor: pointer;
            height: 100px;
            width: 150px;
            background: none;
            /* Transparent background */
            border: none;
            /* Remove border */
            outline: none;
            /* Remove outline */
        }

        .map-container button a {
            /* opacity: 0; */
            color: transparent !important;
        }

        .vard-footer button,
        input,
        optgroup,
        select,
        textarea {

            position: absolute;
            bottom: 0px;
        }

        @media screen and (width<1300px) {

            #down {
                width: 30rem;
            }

            #down .table thead th {

                font-size: 10px;
            }

            #down h2 {

                font-size: 25px !important;
            }

            .displaypunjab .table td,
            .table th {
                font-size: 0.7rem !important;
            }

            .displaykpk .table td,
            .table th {
                font-size: 0.7rem !important;
            }

            .displaybal .table td,
            .table th {
                font-size: 0.7rem !important;
            }

            .displaysindh .table td,
            .table th {
                font-size: 0.7rem !important;
            }

        }

        @media screen and (width<700px) {
            #per {
                /* height: 20rem; */
                overflow: visible;
                /* padding-top: 12rem; */
            }

            #wide {
                height: 50rem;
            }

            #down {
                margin-bottom: 12rem;
            }
        }
    </style>
@endsection
@section('content')
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">


            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <img src="/pic/water-well.png" alt="PUMP" width="50px">
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span id="head_new_well_count"></span></div>
                                    <div class="stat-heading">New Well</div>
                                    <!-- <div class="newell">New Well Count: </div> -->
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
                                <img src="/pic/hand-pump.png" alt="PUMP" width="50px">
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span id="head_count"></span></div>
                                    <div class="stat-heading">Pumps</div>
                                    <!-- <div class="pump">Handpump Count: </div> -->
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
                                <img src="/pic/repair.png" alt="PUMP" width="50px">
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span id="head_repair_well_count"></span></div>
                                    <div class="stat-heading">Repair Well</div>
                                    <!-- <div class="rwell">Repair Well Count: </div> -->
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
                            <div class="stat-icon dib flat-color-1">
                                <img src="/pic/sigma.png" alt="PUMP" width="50px">
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span id="head_total_count"></span></div>
                                    <div class="stat-heading">Total</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Widgets -->
        <!--  Traffic  -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="card-body">
                                        <div class="col-md-12" id="wide">
                                            <div class="row">
                                                <div class="map-container col-md-9" id="mapContainer">
                                                    <!-- Background image -->
                                                    <div class="map-background"></div>

                                                    <!-- Button with hidden text -->
                                                    <button class="btn" id="punjabBtn"></button>
                                                    <button class="btnkpk" id="kpkBtn">KPK</button>
                                                    <button class="btnbal" id="balochistanBtn">Balochistan</button>
                                                    <button class="btnsindh" id="sindhBtn">Sindh</button>
                                                    <button class="btnthar" id="tharBtn"></button>
                                                    <!-- Define the image map -->
                                                </div>
                                                <div class="card-footer col-md-3">
                                                    <!-- <h4>Total Setup Counts by Region</h4> -->
                                                    <select name="regionSelect" id="regionSelect">
                                                        <option value="main">Pakistan</option>
                                                        <option value="Punjab">Punjab</option>
                                                        <option value="KPK">Kpk</option>
                                                        <option value="Sindh">Sindh</option>
                                                        <option value="Balochistan">Balochistan</option>
                                                    </select>

                                                    <table class="table" id="uppertable">
                                                        <thead>
                                                            <tr>
                                                                <th id="head">Region</th>
                                                                <th id="head">Hand Pump</th>
                                                                <th id="head">New Well</th>
                                                                <th id="head">Repair Well</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Punjab</td>
                                                                <td id="punjabHandPumpCount"></td>
                                                                <td id="punjabNewWellCount"></td>
                                                                <td id="punjabRepairWellCount"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>KPK</td>
                                                                <td id="khyber-pakhtunkhwaHandPumpCount"></td>
                                                                <td id="khyber-pakhtunkhwaNewWellCount"></td>
                                                                <td id="khyber-pakhtunkhwaRepairWellCount"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Balochistan</td>
                                                                <td id="balochistanHandPumpCount"></td>
                                                                <td id="balochistanNewWellCount"></td>
                                                                <td id="balochistanRepairWellCount"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sindh</td>
                                                                <td id="sindhHandPumpCount"></td>
                                                                <td id="sindhNewWellCount"></td>
                                                                <td id="sindhRepairWellCount"></td>

                                                            </tr>
                                                            <tr>
                                                                <td id="Bold">Total</td>
                                                                <td id="total_count"></td>
                                                                <td id="total_new_well_count"></td>
                                                                <td id="total_repair_well_count"></td>
                                                            </tr>
                                                        </tbody>

                                                    </table>
                                                    <div class="displaypunjab" style="display:none" id="down">
                                                        <div class="card-footer col-md-6">
                                                            <h2>(Punjab)</h2>
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
                                                    <div class="displaykpk" style="display:none" id="down">
                                                        <div class="card-footer col-md-6">
                                                            <h2>(Khyber Pakhtunkhwa)</h2>
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
                                                    <div class="displaybal" style="display:none" id="down">
                                                        <div class="card-footer col-md-6">
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
                                                    <div class="displaysindh" style="display:none" id="down">
                                                        <div class="card-footer col-md-6">
                                                            <h2>(Sindh)</h2>
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

                                                    <!-- <a href="#" class="return"><button>Main</button></a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3" id="per">
                                    <div class="progress-box progress-1">
                                        <h4 class="por-title">Punjab</h4>
                                        <div class="por-txt" id="punjper"></div>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-flat-color-1" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="progress-box progress-2">
                                        <h4 class="por-title">KPK</h4>
                                        <div class="por-txt" id="kpkper"></div>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-flat-color-2" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="progress-box progress-3">
                                        <h4 class="por-title">Balochistan</h4>
                                        <div class="por-txt" id="balper"></div>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="progress-box progress-4">
                                        <h4 class="por-title">Sindh</h4>
                                        <div class="por-txt" id="sindhper"></div>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-flat-color-4" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    
                                </div> <!-- /.col-lg-3 -->
                            </div> <!-- /.row -->
                        </div>
                    </div><!-- /.card -->
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
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
                        <button type="button" class="btn btn-success save-event waves-effect waves-light">Create
                            event</button>
                        <button type="button" class="btn btn-danger delete-event waves-effect waves-light"
                            data-dismiss="modal">Delete</button>
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
                                    <input class="form-control form-white" placeholder="Enter name" type="text"
                                        name="category-name" />
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Choose Category Color</label>
                                    <select class="form-control form-white" data-placeholder="Choose a color..."
                                        name="category-color">
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
                        <button type="button" class="btn btn-danger waves-effect waves-light save-category"
                            data-dismiss="modal">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#add-category -->
    </div>
@endsection
@section('bot')
    <script>
        fetch("/punjper")
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch percentage for Punjab region');
                }
                return response.text();
            })
            .then(data => {
                // Update the percentage in the HTML element
                document.getElementById('punjper').textContent = data + '%';
            })
            .catch(error => {
                console.error('Error fetching percentage for Punjab region:', error.message);
            });
        fetch("/kpkper")
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch percentage for Punjab region');
                }
                return response.text();
            })
            .then(data => {
                // Update the percentage in the HTML element
                document.getElementById('kpkper').textContent = data + '%';
            })
            .catch(error => {
                console.error('Error fetching percentage for Punjab region:', error.message);
            });
        fetch("/balper")
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch percentage for Punjab region');
                }
                return response.text();
            })
            .then(data => {
                // Update the percentage in the HTML element
                document.getElementById('balper').textContent = data + '%';
            })
            .catch(error => {
                console.error('Error fetching percentage for Punjab region:', error.message);
            });
        fetch("/sindhper")
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch percentage for Punjab region');
                }
                return response.text();
            })
            .then(data => {
                // Update the percentage in the HTML element
                document.getElementById('sindhper').textContent = data + '%';
            })
            .catch(error => {
                console.error('Error fetching percentage for Punjab region:', error.message);
            });
    </script>


    <script>
        // Fetch total hand pump setups count using AJAX
        fetch("{{ route('head.handpump.setups') }}")
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch total hand pump setups count');
                }
                return response.text();
            })
            .then(data => {
                // Update the total count in the HTML element
                document.getElementById('head_count').textContent = data;
            })
            .catch(error => {
                console.error('Error fetching total hand pump setups count:', error.message);
            });
        fetch("{{ route('head.newwell.setups') }}")
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch total new well setups count');
                }
                return response.text();
            })
            .then(data => {
                // Update the total count in the HTML element
                document.getElementById('head_new_well_count').textContent = data;
            })
            .catch(error => {
                console.error('Error fetching total new well setups count:', error.message);
            });

        // Fetch total repair well setups count using AJAX
        fetch("{{ route('head.repairwell.setups') }}")
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch total repair well setups count');
                }
                return response.text();
            })
            .then(data => {
                // Update the total count in the HTML element
                document.getElementById('head_repair_well_count').textContent = data;
            })
            .catch(error => {
                console.error('Error fetching total repair well setups count:', error.message);
            });
        fetch("{{ route('head.counts') }}")
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch total counts');
                }
                return response.json();
            })
            .then(data => {

                // Calculate total count by summing up individual counts
                const totalSum = data.headNewWellSetupsCount + data.headHandPumpSetupsCount + data
                    .headRepairWellSetupsCount;
                document.getElementById('head_total_count').textContent = totalSum;
            })
            .catch(error => {
                console.error('Error fetching total counts:', error.message);
            });
    </script>


    <script>
        // Fetch total hand pump setups count using AJAX
        fetch("{{ route('total.handpump.setups') }}")
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch total hand pump setups count');
                }
                return response.text();
            })
            .then(data => {
                // Update the total count in the HTML element
                document.getElementById('total_count').textContent = data;
            })
            .catch(error => {
                console.error('Error fetching total hand pump setups count:', error.message);
            });
        fetch("{{ route('total.newwell.setups') }}")
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch total new well setups count');
                }
                return response.text();
            })
            .then(data => {
                // Update the total count in the HTML element
                document.getElementById('total_new_well_count').textContent = data;
            })
            .catch(error => {
                console.error('Error fetching total new well setups count:', error.message);
            });

        // Fetch total repair well setups count using AJAX
        fetch("{{ route('total.repairwell.setups') }}")
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch total repair well setups count');
                }
                return response.text();
            })
            .then(data => {
                // Update the total count in the HTML element
                document.getElementById('total_repair_well_count').textContent = data;
            })
            .catch(error => {
                console.error('Error fetching total repair well setups count:', error.message);
            });
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var returnButton = document.querySelector('.return button');
            returnButton.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default behavior of the anchor link

                // Change the background image URL
                document.querySelector('.map-background').style.backgroundImage = "url('/pic/1.jpeg')";
                document.querySelector('.displaykpk').style.display = 'none';
                document.querySelector('.displaybal').style.display = 'none';
                document.querySelector('.displaysindh').style.display = 'none';
                document.querySelector('.displaypunjab').style.display = 'none';
            });

            // Rest of your script...
        });
    </script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var tharButton = document.querySelector('.btnthar');
            tharButton.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default behavior of the anchor link

                // Change the background image URL
                document.querySelector('.map-background').style.backgroundImage =
                    "url('/pic/tharparkar.png')";
                document.querySelector('.displaykpk').style.display = 'none';
                document.querySelector('.displaybal').style.display = 'none';
                document.querySelector('.displaysindh').style.display = 'none';
                document.querySelector('.displaypunjab').style.display = 'none';
            });

            // Rest of your script...
        });
    </script>


    <script>
        // Get all the buttons
        var buttons = document.querySelectorAll('.map-container button');

        // Get the select element
        var regionSelect = document.getElementById('regionSelect');

        // Add change event listener to the select element
        regionSelect.addEventListener('change', function() {
            // If "Pakistan" option is selected
            if (regionSelect.value === 'main') {
                // Show all buttons
                buttons.forEach(function(btn) {
                    btn.style.display = 'block'; // Assuming buttons were initially set to display: none;
                });
            }
        });

        // Loop through each button
        buttons.forEach(function(button) {
            // Add click event listener to each button
            button.addEventListener('click', function() {
                // Hide all buttons except the clicked one and the tharBtn
                buttons.forEach(function(btn) {
                    if (btn !== button && btn !== document.getElementById('tharBtn')) {
                        btn.style.display = 'none';
                    }
                });
            });
        });
    </script>






    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var regionSelect = document.getElementById('regionSelect');
            var punjabBtn = document.getElementById('punjabBtn');
            var kpkBtn = document.getElementById('kpkBtn');
            var balochistanBtn = document.getElementById('balochistanBtn');
            var sindhBtn = document.getElementById('sindhBtn');
            var tharBtn = document.getElementById('tharBtn');


            punjabBtn.addEventListener('click', function() {
                regionSelect.value = "Punjab";
                simulateChangeEvent(regionSelect);
            });

            kpkBtn.addEventListener('click', function() {
                regionSelect.value = "KPK";
                simulateChangeEvent(regionSelect);
            });

            balochistanBtn.addEventListener('click', function() {
                regionSelect.value = "Balochistan";
                simulateChangeEvent(regionSelect);
            });

            sindhBtn.addEventListener('click', function() {
                regionSelect.value = "Sindh";
                simulateChangeEvent(regionSelect);
            });

            tharBtn.addEventListener('click', function() {
                regionSelect.value = "thar";
                simulateChangeEvent(regionSelect);
            });

            function simulateChangeEvent(element) {
                var event = new Event('change', {
                    bubbles: true,
                    cancelable: true,
                });
                element.dispatchEvent(event);
            }


        });
    </script>




    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var regionSelect = document.getElementById('regionSelect');

            regionSelect.addEventListener('change', function() {
                var selectedOption = regionSelect.options[regionSelect.selectedIndex];

                if (selectedOption.value === "Punjab") {
                    document.querySelector('.map-background').style.backgroundImage = "url('/pic/2.png')";
                    document.querySelector('.map-background').style.height = "35rem";
                    document.querySelector('.col-md-9').style.height = "35rem";
                    fetch(`/get-all-punjab-setup-count`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Failed to fetch setup counts for Punjab');
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Render Punjab setup counts data
                            renderSetupCounts(data, '.displaypunjab');
                            document.querySelector('.displaykpk').style.display = 'none';
                            document.querySelector('.displaybal').style.display = 'none';
                            document.querySelector('.displaysindh').style.display = 'none';
                        })
                        .catch(error => console.error('Error fetching setup counts for Punjab:', error
                            .message));
                } else if (selectedOption.value === "KPK") {
                    document.querySelector('.map-background').style.backgroundImage =
                        "url('/pic/kpk (1).jpg')";
                    document.querySelector('.map-background').style.height = "35rem";
                    document.querySelector('.col-md-9').style.height = "35rem";

                    fetch(`/get-all-kpk-setup-count`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Failed to fetch setup counts for KPK');
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Render KPK setup counts data
                            renderSetupCounts(data, '.displaykpk');
                            document.querySelector('.displaypunjab').style.display = 'none';
                            document.querySelector('.displaybal').style.display = 'none';
                            document.querySelector('.displaysindh').style.display = 'none';
                        })
                        .catch(error => console.error('Error fetching setup counts for KPK:', error
                            .message));
                } else if (selectedOption.value === "Balochistan") {
                    document.querySelector('.map-background').style.backgroundImage = "url('/pic/bal.png')";
                    document.querySelector('.map-background').style.height = "35rem";
                    document.querySelector('.col-md-9').style.height = "35rem";
                    fetch(`/get-all-bal-setup-count`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Failed to fetch setup counts for KPK');
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Render KPK setup counts data
                            renderSetupCounts(data, '.displaybal');
                            document.querySelector('.displaykpk').style.display = 'none';
                            document.querySelector('.displaypunjab').style.display = 'none';
                            document.querySelector('.displaysindh').style.display = 'none';
                        })
                        .catch(error => console.error('Error fetching setup counts for KPK:', error
                            .message));
                } else if (selectedOption.value === "Sindh") {
                    document.querySelector('.map-background').style.backgroundImage = "url('/pic/3.png')";
                    document.querySelector('.map-background').style.height = "35rem";
                    document.querySelector('.col-md-9').style.height = "35rem";
                    fetch(`/get-all-sindh-setup-count`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Failed to fetch setup counts for KPK');
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Render KPK setup counts data
                            renderSetupCounts(data, '.displaysindh');
                            document.querySelector('.displaykpk').style.display = 'none';
                            document.querySelector('.displaybal').style.display = 'none';
                            document.querySelector('.displaypunjab').style.display = 'none';
                        })
                        .catch(error => console.error('Error fetching setup counts for KPK:', error
                            .message));
                } else if (selectedOption.value === "main") {
                    document.querySelector('.map-background').style.backgroundImage = "url('/pic/1.jpeg')";
                    document.querySelector('.displaypunjab').style.display = 'none';
                    document.querySelector('.displaykpk').style.display = 'none';
                    document.querySelector('.displaybal').style.display = 'none';
                    document.querySelector('.displaysindh').style.display = 'none';
                } else if (selectedOption.value === "thar") {
                    document.querySelector('.map-background').style.backgroundImage =
                        "url('/pic/tharparkar.png')";
                    document.querySelector('.displaypunjab').style.display = 'none';
                    document.querySelector('.displaykpk').style.display = 'none';
                    document.querySelector('.displaybal').style.display = 'none';
                    document.querySelector('.displaysindh').style.display = 'none';
                } else {
                    // Hide both Punjab and KPK displays if the selected region is neither Punjab nor KPK
                    document.querySelector('.displaypunjab').style.display = 'none';
                    document.querySelector('.displaykpk').style.display = 'none';
                    document.querySelector('.displaybal').style.display = 'none';
                    document.querySelector('.displaysindh').style.display = 'none';
                }
            });
        });

        function renderSetupCounts(data, displayClass) {
            // Clear the previous setup counts data
            const setupCountsBody = document.querySelector(displayClass + ' tbody');
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

            // Display the div after rendering data
            document.querySelector(displayClass).style.display = 'block';
        }
    </script>

<script>
    // Function to fetch percentage and update the corresponding progress bar
function fetchPercentage(url, elementId, progressBarClass) {
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Failed to fetch percentage from ${url}`);
            }
            return response.text();
        })
        .then(data => {
            // Update the percentage in the HTML element
            const value = parseFloat(data); // Assuming the server returns a numeric value
            document.getElementById(elementId).textContent = `${value}%`;

            // Update the progress bar width
            document.querySelector(progressBarClass).style.width = `${value}%`;
        })
        .catch(error => {
            console.error(`Error fetching percentage from ${url}:`, error.message);
        });
}

// Fetching percentages for each region
fetchPercentage("/punjper", 'punjper', '.progress-bar.bg-flat-color-1');
fetchPercentage("/kpkper", 'kpkper', '.progress-bar.bg-flat-color-2');
fetchPercentage("/balper", 'balper', '.progress-bar.bg-flat-color-3');
fetchPercentage("/sindhper", 'sindhper', '.progress-bar.bg-flat-color-4');

</script>






    <script>
        // Function to fetch total counts for each region
        // Function to fetch total counts for each region
        function fetchTotalCountsByRegion() {
            fetch(`/get-total-counts-by-region`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to fetch total counts by region');
                    }
                    return response.json();
                })
                .then(data => {
                    // Update HTML elements with total counts by region
                    Object.entries(data).forEach(([region, counts]) => {
                        const handPumpElement = document.getElementById(`${region.toLowerCase()}HandPumpCount`);
                        const newWellElement = document.getElementById(`${region.toLowerCase()}NewWellCount`);
                        const repairWellElement = document.getElementById(
                            `${region.toLowerCase()}RepairWellCount`);

                        if (handPumpElement && newWellElement && repairWellElement) {
                            handPumpElement.textContent = counts.totalHandPumpCount;
                            newWellElement.textContent = counts.totalNewWellCount;
                            repairWellElement.textContent = counts.totalRepairWellCount;
                        } else {
                            console.error(`One or more elements not found for region: ${region}`);
                        }
                    });
                })
            // .catch(error => console.error('Error fetching total counts by region:', error.message));
        }

        // Call the function to fetch total counts for each region
        fetchTotalCountsByRegion();
    </script>
@endsection
