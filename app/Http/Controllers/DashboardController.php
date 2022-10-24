<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Client\ConnectionException;
use Session;
use App\Models\Server;
use App\Models\Storage;
use App\Models\Report;
use App\Models\ExportData;
use PDF;


class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $data['title'] = 'Dashboard';
        $data['uri'] = 'dashboard';
        $id = auth()->user()->id;

        $servers = DB::table('users')
            ->join('user_server_permission', 'users.id', '=', 'user_server_permission.userid')
            ->join('servers', 'servers.id', '=', 'user_server_permission.serverid')
            ->where('users.id', '=', $id)
            ->select('type')
            ->get();

        $role = DB::table('users')
            ->join('users_level', 'users.level', '=', 'users_level.id')
            ->where('users.id', '=', $id)
            ->select('role')
            ->first();

        // dd($role);

        $ilo = false;
        $ipmi = false;
        $xclarity = false;
        $netapp = true;

        foreach ($servers as $t) {
            if ($t->type == '1') {
                $ilo = true;
            } else if ($t->type == '2') {
                $ipmi = true;
            } else if ($t->type == '3') {
                $xclarity = true;
            }
        }

        $data['ilo'] = $ilo;
        $data['ipmi'] = $ipmi;
        $data['xclarity'] = $xclarity;
        $data['netapp'] = $netapp;
        $data['session_id'] = $id;
        $request->session()->put('role', $role->role);

        return view('dashboard.dashboard_home', $data);
    }

    public function getSummaryIlo(Request $request)
    {
        $id = $request->id;

        if ($request->ajax()) {

            //ambil data server berdasarkan id user
            $servers = Server::getServer($id);

            $data = [];
            $no = 1;

            foreach ($servers as $s) {
                try {
                    if ($s->type == '1') {
                        $response = Http::timeout(3)->withoutverifying()->withBasicAuth($s->username, $s->password)->get('http://' . $s->ip_address . '/json/health_summary');
                        $response = $response->object();

                        $row = [];
                        $row[] = $no++;
                        $row[] = "<span data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"$s->description\">$s->name</span>";
                        $row[] = "<a href=\"http://$s->ip_address\">$s->ip_address</a>";
                        if ($response->hostpwr_state == 'ON') {
                            $row[] = "<span class=\"badge bg-success me-1\"></span>" . strtoupper($response->hostpwr_state);
                        } else {
                            $row[] = "<span class=\"badge bg-danger me-1\"></span>" . strtoupper($response->hostpwr_state);
                        }
                        if ($response->system_health == 'OP_STATUS_OK') {
                            $row[] = "<span class=\"badge bg-success me-1\"></span>" . explode('_', $response->system_health)[2];
                        } else {
                            $row[] = "<span class=\"badge bg-warning me-1\"></span>" . explode('_', $response->system_health)[2];
                        }
                        $row[] = "<button class=\"btn btn-outline-primary btn-sm\" onclick=\"getData($s->serverid, '$s->name', '$s->ip_address')\">
                        <span><svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/><circle cx=\"12\" cy=\"12\" r=\"9\" /><line x1=\"12\" y1=\"8\" x2=\"12.01\" y2=\"8\" /><polyline points=\"11 12 12 12 12 16 13 16\" /></svg></span>
                        Details</button>";
                        $data[] = $row;
                    }
                } catch (\Illuminate\Http\Client\ConnectionException $e) {
                    $row = [];
                    $row[] = $no++;
                    $row[] = "<span data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"$s->description\">$s->name</span>";
                    $row[] = "<a href=\"http://$s->ip_address\">$s->ip_address</a>";
                    $row[] = "<span class=\"badge bg-secondary me-1\"></span>Failed";
                    $row[] = "<span class=\"badge bg-secondary me-1\"></span>Failed";
                    $row[] = "<button class=\"btn btn-outline-primary btn-sm\" onclick=\"getData($s->serverid, '$s->name', '$s->ip_address')\">
                    <span><svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/><circle cx=\"12\" cy=\"12\" r=\"9\" /><line x1=\"12\" y1=\"8\" x2=\"12.01\" y2=\"8\" /><polyline points=\"11 12 12 12 12 16 13 16\" /></svg></span>
                    Details</button>";
                    $data[] = $row;
                }
            }

            $output = [
                "draw" => $request->draw,
                "recordsTotal" => $no,
                "recordsFiltered" => $no,
                "data" => $data
            ];

            echo json_encode($output);
        }


        // return $data;
    }

    public function getSummaryIpmi(Request $request)
    {
        $id = $request->id;

        if ($request->ajax()) {

            //ambil data server berdasarkan id user
            $servers = Server::getServer($id);

            $data = [];
            $no = 1;

            foreach ($servers as $s) {
                try {
                    if ($s->type == '2') {
                        $response = Http::timeout(3)->withoutverifying()->withBasicAuth($s->username, $s->password)->get('http://' . $s->ip_address . '/redfish/v1/Systems/1');
                        // $response = $response->json();

                        $row = [];
                        $row[] = $no++;
                        $row[] = "<span data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"$s->description\">$s->name</span>";
                        $row[] = "<a href=\"http://$s->ip_address\">$s->ip_address</a>";
                        if ($response['PowerState'] == 'On') {
                            $row[] = "<span class=\"badge bg-success me-1\"></span>" . strtoupper($response['PowerState']);
                        } else {
                            $row[] = "<span class=\"badge bg-danger me-1\"></span>" . strtoupper($response['PowerState']);
                        }
                        if ($response['Status']['Health'] == 'OK') {
                            $row[] = "<span class=\"badge bg-success me-1\"></span>" . $response['Status']['Health'];
                        } else {
                            $row[] = "<span class=\"badge bg-warning me-1\"></span>" . $response['Status']['Health'];
                        }
                        $row[] = "<a class=\"btn btn-outline-primary btn-sm\" href=\"http://$s->ip_address\">
                        <span><svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/><line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\" /><line x1=\"15\" y1=\"16\" x2=\"19\" y2=\"12\" /><line x1=\"15\" y1=\"8\" x2=\"19\" y2=\"12\" /></svg></span>
                        Go to IPMI</a>";
                        $data[] = $row;
                    }
                } catch (\Illuminate\Http\Client\ConnectionException $e) {
                    $row = [];
                    $row[] = $no++;
                    $row[] = "<span data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"$s->description\">$s->name</span>";
                    $row[] = "<a href=\"http://$s->ip_address\">$s->ip_address</a>";
                    $row[] = "<span class=\"badge bg-secondary me-1\"></span>Failed";
                    $row[] = "<span class=\"badge bg-secondary me-1\"></span>Failed";
                    $row[] = "<a class=\"btn btn-outline-primary btn-sm\" href=\"http://$s->ip_address\">
                        <span><svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/><line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\" /><line x1=\"15\" y1=\"16\" x2=\"19\" y2=\"12\" /><line x1=\"15\" y1=\"8\" x2=\"19\" y2=\"12\" /></svg></span>
                        Go to IPMI</a>";
                    $data[] = $row;
                }
            }

            $output = [
                "draw" => $request->draw,
                "recordsTotal" => $no,
                "recordsFiltered" => $no,
                "data" => $data
            ];
            echo json_encode($output);
        }

        // return $data;
    }

    public function getSummaryXclarity(Request $request)
    {
        $id = $request->id;

        if ($request->ajax()) {

            //ambil data server berdasarkan id user
            $servers = Server::getServer($id);

            $data = [];
            $no = 1;

            foreach ($servers as $s) {
                try {
                    if ($s->type == '3') {
                        $response = Http::timeout(10)->withoutverifying()->withBasicAuth($s->username, $s->password)->get('https://' . $s->ip_address . '/redfish/v1/Systems/1');
                        // $response = $response->json();

                        $row = [];
                        $row[] = $no++;
                        $row[] = "<span data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"$s->description\">$s->name</span>";
                        $row[] = "<a href=\"http://$s->ip_address\">$s->ip_address</a>";
                        if ($response['PowerState'] == 'On') {
                            $row[] = "<span class=\"badge bg-success me-1\"></span>" . strtoupper($response['PowerState']);
                        } else {
                            $row[] = "<span class=\"badge bg-danger me-1\"></span>" . strtoupper($response['PowerState']);
                        }
                        if ($response['Status']['Health'] == 'OK') {
                            $row[] = "<span class=\"badge bg-success me-1\"></span>" . $response['Status']['Health'];
                        } else {
                            $row[] = "<span class=\"badge bg-warning me-1\"></span>" . $response['Status']['Health'];
                        }
                        $row[] = "<a class=\"btn btn-outline-primary btn-sm\" href=\"http://$s->ip_address\">
                        <span><svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/><line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\" /><line x1=\"15\" y1=\"16\" x2=\"19\" y2=\"12\" /><line x1=\"15\" y1=\"8\" x2=\"19\" y2=\"12\" /></svg></span>
                        Go to X-Clarity</a>";
                        $data[] = $row;
                    }
                } catch (\Illuminate\Http\Client\ConnectionException $e) {
                    $row = [];
                    $row[] = $no++;
                    $row[] = "<span data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"$s->description\">$s->name</span>";
                    $row[] = "<a href=\"http://$s->ip_address\">$s->ip_address</a>";
                    $row[] = "<span class=\"badge bg-secondary me-1\"></span>Failed";
                    $row[] = "<span class=\"badge bg-secondary me-1\"></span>Failed";
                    $row[] = "<a class=\"btn btn-outline-primary btn-sm\" href=\"http://$s->ip_address\">
                        <span><svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/><line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\" /><line x1=\"15\" y1=\"16\" x2=\"19\" y2=\"12\" /><line x1=\"15\" y1=\"8\" x2=\"19\" y2=\"12\" /></svg></span>
                        Go to X-Clarity</a>";
                    $data[] = $row;
                }
            }

            $output = [
                "draw" => $request->draw,
                "recordsTotal" => $no,
                "recordsFiltered" => $no,
                "data" => $data
            ];

            echo json_encode($output);
        }


        // return $data;
    }

    public function getSummaryNetapp(Request $request)
    {   
        $id = $request->id;

        if ($request->ajax()) {

            $storages = Storage::getAllStorages();

            $data = [];
            $no = 1;

            foreach ($storages as $s) {
                // $row = [];
                // $row[] = $no++;
                // $row[] = $s->description;
                // $row[] = $s->uuid;
                // $row[] = $s->brand;
                // $data[] = $row; 
                try {
                    if ($s->brand == '1') {
                        $response = Http::timeout(10)->withoutverifying()->withBasicAuth("moni", "Lihatsaja@1")->get('https://192.168.15.55/api/cluster/nodes/' . $s->uuid);
                        // $response = $response->json();

                        $row = [];
                        $row[] = $no++;
                        $row[] = "<span data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"$s->description\">$s->description</span>";
                        $row[] = $response['management_interfaces'][0]['ip']['address'];
                        if ($response['state'] == 'up') {
                            $row[] = "<span class=\"badge bg-success me-1\"></span>OK";
                        } else {
                            $row[] = "<span class=\"badge bg-danger me-1\"></span>N/A" . strtoupper($response['state']);
                        }
                        $row[] = "<a class=\"btn btn-outline-primary btn-sm\" href=\"https://192.168.15.55\">
                        <span><svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/><line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\" /><line x1=\"15\" y1=\"16\" x2=\"19\" y2=\"12\" /><line x1=\"15\" y1=\"8\" x2=\"19\" y2=\"12\" /></svg></span>
                        Go to NetApp</a>";
                        $data[] = $row;
                    }
                } catch (\Illuminate\Http\Client\ConnectionException $e) {
                    $row = [];
                    $row[] = $no++;
                    $row[] = "<span data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"$s->description\">$s->description</span>";
                    $row[] = "<a href=\"http://$s->description\">$s->description</a>";
                    $row[] = "<span class=\"badge bg-secondary me-1\"></span>Failed";
                    $row[] = "<span class=\"badge bg-secondary me-1\"></span>Failed";
                    $row[] = "<a class=\"btn btn-outline-primary btn-sm\" href=\"http://$s->description\">
                        <span><svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/><line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\" /><line x1=\"15\" y1=\"16\" x2=\"19\" y2=\"12\" /><line x1=\"15\" y1=\"8\" x2=\"19\" y2=\"12\" /></svg></span>
                        Go to NetApp</a>";
                    $data[] = $row;
                }
            }

            $output = [
                "draw" => $request->draw,
                "recordsTotal" => $no,
                "recordsFiltered" => $no,
                "data" => $data
            ];
            echo json_encode($output);
            
        }
        // return $data;
    }

    public function getStatus(Request $request)
    {
        $serverid = $request->serverid;
        $server = DB::table('servers')
            ->where('id', '=', $serverid)
            ->select('ip_address', 'username', 'password')
            ->first();

        $response = Http::timeout(3)->withoutverifying()->withBasicAuth($server->username, $server->password)->get('http://' . $server->ip_address . '/json/health_summary');

        return $response->json();
    }

    public function export(Request $request)
    {
        $data['title'] = 'Export Data';
        $data['uri'] = 'exportData';

        return view('dashboard.dashboard_export', $data);
    }

    public function exportData(Request $request)
    {
        $servers = $request->servers;
        $times = $request->times;
        $date_start = $request->date_start;
        $date_end = $request->date_end;

        $columns = [
            'no',
            'datetime',
            'name',
            'ip_address',
            'power_state',
            'health_summary',
            'detail',
        ];

        $orderBy = $columns[request()->input("order.0.column")];
        $data = ExportData::join('servers', 'servers.id', '=', 'servers_history.serverid')
            ->select('servers_history.*', 'name', 'ip_address');

        // if (request()->input("search.value")) {
        //     $data = $data->where(function ($query) {
        //         $query->whereRaw('LOWER(name) like ?', ['%' . strtolower(request()->input("search.value")) . '%'])
        //             ->orWhereRaw('LOWER(datetime) like ?', ['%' . strtolower(request()->input("search.value")) . '%']);
        //     });
        // }

        if ($date_start && $date_end && $servers && $times) {

            $data = $data->whereRaw('serverid IN(' . implode(',', $servers) . ') AND HOUR(datetime) IN (' . implode(',', $times) . ') AND DATE(datetime) BETWEEN "' . $date_start . '" AND "' . $date_end . '"');
        }

        $recordsFiltered = $data->get()->count();

        $data = $data
            ->skip(request()->input('start'))
            ->take(request()->input('length'))
            ->orderBy($orderBy, request()->input("order.0.dir"))
            ->get();

        $recordsTotal = $data->count();

        return response()->json([
            'draw' => request()->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data,
            'all_request' => request()->all()
        ]);
    }

    public function recordData()
    {
        //set default time zone ke jakarta
        date_default_timezone_set("Asia/Jakarta");

        //ambil data semua server 
        $servers = Server::getAllServer();

        $success = 0;
        $failed = 0;

        foreach ($servers as $s) {
            try {
                if ($s->type == '1') {
                    $response = Http::timeout(10)->withoutverifying()->withBasicAuth($s->username, $s->password)->get('http://' . $s->ip_address . '/json/health_summary');
                    $response = $response->object();

                    $detail = [];

                    foreach ($response as $r => $v) {
                        if ($v == 'OP_STATUS_DEGRADED' || $v == 'OP_STATUS_ABSENT' || $v == 'NOT_REDUNDANT' || $v == 'AMS_UNAVAILABLE' || $v == 'OP_STATUS_CRITICAL') {
                            $detail[] = $r;
                        }
                    }

                    $detail = implode(', ', $detail);

                    // dd($detail);

                    $addHistory = DB::table('servers_history')
                        ->insert([
                            'serverid' => $s->serverid,
                            'datetime' => date('Y-m-d H:i:s'),
                            'power_state' => strtoupper($response->hostpwr_state),
                            'health_summary' => explode('_', $response->system_health)[2],
                            'detail' => $detail,
                        ]);
                    $success++;
                }
                if ($s->type == '2' || $s->type == '3') {
                    $response = Http::timeout(10)->withoutverifying()->withBasicAuth($s->username, $s->password)->get('https://' . $s->ip_address . '/redfish/v1/Systems/1');

                    $addHistory = DB::table('servers_history')
                        ->insert([
                            'serverid' => $s->serverid,
                            'datetime' => date('Y-m-d H:i:s'),
                            'power_state' => strtoupper($response['PowerState']),
                            'health_summary' => strtoupper($response['Status']['Health']),
                            'detail' => '',
                        ]);
                    $success++;
                }
            } catch (\Illuminate\Http\Client\ConnectionException $e) {
                $addHistory = DB::table('servers_history')
                    ->insert([
                        'serverid' => $s->serverid,
                        'datetime' => date('Y-m-d H:i:s'),
                        'power_state' => 'Failed',
                        'health_summary' => 'Failed',
                        'detail' => 'Failed'
                    ]);

                $failed++;
            }
        }
        return redirect('/export');
        // return view('dashboard.dashboard_home');
    }

    public function formReport () {

        $operators = Report::getAllOperators();

        $data['title'] = 'Report';
        $data['uri'] = 'report';
        $data['operators'] = $operators;
        return view('dashboard.dashboard_report', $data);
    }


    // public function generateReport($date_start, $date_end, $servers, $times)
    // {
    //     // dd($date_start, $date_end, $servers, $times);
    //     $data['reports'] = ExportData::join('servers', 'servers.id', '=', 'servers_history.serverid')
    //         ->select('servers_history.*', 'name', 'ip_address')
    //         ->whereRaw('serverid IN(' . $servers . ') AND HOUR(datetime) IN (' . $times . ') AND DATE(datetime) BETWEEN "' . $date_start . '" AND "' . $date_end . '"')
    //         ->get();
    //     $pdf = PDF::loadView('dashboard.dashboard_report', $data)->setPaper('a4', 'landscape');
    //     return $pdf->stream('Laporan_' . $date_start . '-' . $date_end . '.pdf');
    //     // return view('dashboard.dashboard_report', $data);
    // }
}
