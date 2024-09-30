<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Surveyed;

class mapController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard.index');
    }
    public function punjab()
    {
        return view('admin.dashboard.punjab');
    }
    public function kpk()
    {
        return view('admin.dashboard.kpk');
    }
    public function bal()
    {
        return view('admin.dashboard.bal');
    }
    public function sindh()
    {
        return view('admin.dashboard.sindh');
    }
    public function headCount()
    {
        // Calculate the total hand pump setups count
        $headNewWellSetupsCount = Surveyed::where('setup', 'New Well')->count();
        $headHandPumpSetupsCount = Surveyed::where('setup', 'Hand Pump')->count();
        $headRepairWellSetupsCount = Surveyed::where('setup', 'Repair Well')->count();

        // Return the counts as an array
        return [
            'headNewWellSetupsCount' => $headNewWellSetupsCount,
            'headHandPumpSetupsCount' => $headHandPumpSetupsCount,
            'headRepairWellSetupsCount' => $headRepairWellSetupsCount,
        ];
    }
    public function getheadHandPumpSetupsCount()
    {
        // Calculate the total hand pump setups count
        $headHandPumpSetupsCount = Surveyed::where('setup', 'Hand Pump')->count();

        // Return the count
        return $headHandPumpSetupsCount;
    }
    public function getheadNewWellSetupsCount()
    {
        // Calculate the total count of setups where setup is "New Well"
        $headNewWellSetupsCount = Surveyed::where('setup', 'New Well')->count();

        // Return the count
        return $headNewWellSetupsCount;
    }

    public function getheadRepairWellSetupsCount()
    {
        // Calculate the total count of setups where setup is "Repair Well"
        $headRepairWellSetupsCount = Surveyed::where('setup', 'Repair Well')->count();

        // Return the count
        return $headRepairWellSetupsCount;
    }

    public function getTotalHandPumpSetupsCount()
    {
        // Calculate the total hand pump setups count
        $totalHandPumpSetupsCount = Surveyed::where('setup', 'Hand Pump')->count();

        // Return the count
        return $totalHandPumpSetupsCount;
    }
    public function getTotalNewWellSetupsCount()
    {
        // Calculate the total count of setups where setup is "New Well"
        $totalNewWellSetupsCount = Surveyed::where('setup', 'New Well')->count();

        // Return the count
        return $totalNewWellSetupsCount;
    }

    public function getTotalRepairWellSetupsCount()
    {
        // Calculate the total count of setups where setup is "Repair Well"
        $totalRepairWellSetupsCount = Surveyed::where('setup', 'Repair Well')->count();

        // Return the count
        return $totalRepairWellSetupsCount;
    }






    public function getTotalCountsByRegion()
    {
        try {
            // Define all regions
            $regions = ['Punjab', 'Sindh', 'Khyber-Pakhtunkhwa', 'Balochistan'];

            // Initialize an array to store counts for all regions
            $totalCountsByRegion = [];

            // Loop through each region
            foreach ($regions as $region) {
                // Fetch counts for each setup type in the current region
                $totalHandPumpCount = Surveyed::where('region', $region)->where('setup', 'Hand Pump')->count();
                $totalNewWellCount = Surveyed::where('region', $region)->where('setup', 'New Well')->count();
                $totalRepairWellCount = Surveyed::where('region', $region)->where('setup', 'Repair Well')->count();

                // Store counts for the current region
                $totalCountsByRegion[$region] = [
                    'totalHandPumpCount' => $totalHandPumpCount,
                    'totalNewWellCount' => $totalNewWellCount,
                    'totalRepairWellCount' => $totalRepairWellCount,
                ];
            }

            // Return the counts for all regions
            return response()->json($totalCountsByRegion);
        } catch (\Exception $e) {
            // Handle any exceptions and return an error response
            return response()->json(['error' => 'Failed to fetch total counts by region'], 500);
        }
    }

    public function getAllRegionSetupCounts($region)
    {
        try {
            $areas = Surveyed::where('region', ucfirst($region))->distinct()->pluck('area')->toArray();
            $data = [];

            foreach ($areas as $area) {
                $handPumpCount = Surveyed::where('region', ucfirst($region))->where('area', $area)->where('setup', 'Hand Pump')->count();
                $newWellCount = Surveyed::where('region', ucfirst($region))->where('area', $area)->where('setup', 'New Well')->count();
                $repairWellCount = Surveyed::where('region', ucfirst($region))->where('area', $area)->where('setup', 'Repair Well')->count();

                $data[$area] = [
                    'handPumpCount' => $handPumpCount,
                    'newWellCount' => $newWellCount,
                    'repairWellCount' => $repairWellCount,
                ];
            }

            return response()->json([$region => $data]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch setup counts'], 500);
        }
    }
    


    public function getAllPunjabSetupCounts()
    {
        try {
            // Fetch the counts of hand pumps, new wells, and repair wells for all areas in Punjab
            $areas = Surveyed::where('region', 'Punjab')->distinct()->pluck('area')->toArray();
            $data = [];
    
            foreach ($areas as $area) {
                $handPumpCount = Surveyed::where('region', 'Punjab')->where('area', $area)->where('setup', 'Hand Pump')->count();
                $newWellCount = Surveyed::where('region', 'Punjab')->where('area', $area)->where('setup', 'New Well')->count();
                $repairWellCount = Surveyed::where('region', 'Punjab')->where('area', $area)->where('setup', 'Repair Well')->count();
    
                $data[$area] = [
                    'handPumpCount' => $handPumpCount,
                    'newWellCount' => $newWellCount,
                    'repairWellCount' => $repairWellCount,
                ];
            }
    
            // Return the setup counts as JSON
            return response()->json($data);
        } catch (\Exception $e) {
            // Handle any exceptions and return an error response
            return response()->json(['error' => 'Failed to fetch setup counts'], 500);
        }
    }
   
    public function getAllkpkSetupCounts()
    {
        try {
            // Fetch the counts of hand pumps, new wells, and repair wells for all areas in Punjab
            $areas = Surveyed::where('region', 'Khyber-Pakhtunkhwa')->distinct()->pluck('area')->toArray();
            $data = [];
    
            foreach ($areas as $area) {
                $handPumpCount = Surveyed::where('region', 'Khyber-Pakhtunkhwa')->where('area', $area)->where('setup', 'Hand Pump')->count();
                $newWellCount = Surveyed::where('region', 'Khyber-Pakhtunkhwa')->where('area', $area)->where('setup', 'New Well')->count();
                $repairWellCount = Surveyed::where('region', 'Khyber-Pakhtunkhwa')->where('area', $area)->where('setup', 'Repair Well')->count();
    
                $data[$area] = [
                    'handPumpCount' => $handPumpCount,
                    'newWellCount' => $newWellCount,
                    'repairWellCount' => $repairWellCount,
                ];
            }
    
            // Return the setup counts as JSON
            return response()->json($data);
        } catch (\Exception $e) {
            // Handle any exceptions and return an error response
            return response()->json(['error' => 'Failed to fetch setup counts'], 500);
        }
    }
    public function getAllsindhSetupCounts()
    {
        try {
            // Fetch the counts of hand pumps, new wells, and repair wells for all areas in Punjab
            $areas = Surveyed::where('region', 'Sindh')->distinct()->pluck('area')->toArray();
            $data = [];
    
            foreach ($areas as $area) {
                $handPumpCount = Surveyed::where('region', 'Sindh')->where('area', $area)->where('setup', 'Hand Pump')->count();
                $newWellCount = Surveyed::where('region', 'Sindh')->where('area', $area)->where('setup', 'New Well')->count();
                $repairWellCount = Surveyed::where('region', 'Sindh')->where('area', $area)->where('setup', 'Repair Well')->count();
    
                $data[$area] = [
                    'handPumpCount' => $handPumpCount,
                    'newWellCount' => $newWellCount,
                    'repairWellCount' => $repairWellCount,
                ];
            }
    
            // Return the setup counts as JSON
            return response()->json($data);
        } catch (\Exception $e) {
            // Handle any exceptions and return an error response
            return response()->json(['error' => 'Failed to fetch setup counts'], 500);
        }
    }
    public function getAllbalSetupCounts()
    {
        try {
            // Fetch the counts of hand pumps, new wells, and repair wells for all areas in Punjab
            $areas = Surveyed::where('region', 'Balochistan')->distinct()->pluck('area')->toArray();
            $data = [];
    
            foreach ($areas as $area) {
                $handPumpCount = Surveyed::where('region', 'Balochistan')->where('area', $area)->where('setup', 'Hand Pump')->count();
                $newWellCount = Surveyed::where('region', 'Balochistan')->where('area', $area)->where('setup', 'New Well')->count();
                $repairWellCount = Surveyed::where('region', 'Balochistan')->where('area', $area)->where('setup', 'Repair Well')->count();
    
                $data[$area] = [
                    'handPumpCount' => $handPumpCount,
                    'newWellCount' => $newWellCount,
                    'repairWellCount' => $repairWellCount,
                ];
            }
    
            // Return the setup counts as JSON
            return response()->json($data);
        } catch (\Exception $e) {
            // Handle any exceptions and return an error response
            return response()->json(['error' => 'Failed to fetch setup counts'], 500);
        }
    }
}
