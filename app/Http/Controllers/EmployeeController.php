<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private $baseUrl = 'https://dummy.restapiexample.com/api/v1';

 
    private function makeRequest($endpoint, $method = 'GET', $data = [])
    {
        $curl = curl_init();
        $url = $this->baseUrl . $endpoint;

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        // User agent diperlukan karena beberapa API memblokir request tanpa user agent
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64)");

        if ($method === 'POST') {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        } elseif ($method === 'PUT') {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        } elseif ($method === 'DELETE') {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        }

        if (in_array($method, ['POST', 'PUT'])) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json'
            ]);
        }

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return ['status' => 'error', 'message' => $err];
        }

        return json_decode($response, true);
    }

    // --- 1. LIST DATA ---
    public function index()
    {
        // GET /employees
        $result = $this->makeRequest('/employees');
        
        // Cek jika API mengembalikan data
        $employees = isset($result['data']) ? $result['data'] : [];
        
        return view('index', ['employees' => $employees]);
    }

    // --- 2. FORM TAMBAH (VIEW) ---
    public function create()
    {
        return view('form', ['action' => 'create', 'data' => null]);
    }

    // --- 3. PROSES SIMPAN (STORE) ---
    public function store(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'salary' => $request->input('salary'),
            'age' => $request->input('age'),
        ];

        // POST /create
        $this->makeRequest('/create', 'POST', $data);

        return redirect('/');
    }

    // --- 4. DETAIL DATA (VIEW) ---
    public function show($id)
    {
        // GET /employee/{id}
        $result = $this->makeRequest('/employee/' . $id);
        $employee = isset($result['data']) ? $result['data'] : null;

        return view('detail', ['employee' => $employee]);
    }

    // --- 5. FORM EDIT (VIEW) ---
    public function edit($id)
    {
        // Kita butuh data lama untuk ditampilkan di form
        $result = $this->makeRequest('/employee/' . $id);
        $employee = isset($result['data']) ? $result['data'] : null;

        return view('form', ['action' => 'edit', 'data' => $employee]);
    }

    // --- 6. PROSES UPDATE ---
    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->input('name'),
            'salary' => $request->input('salary'),
            'age' => $request->input('age'),
        ];

        // PUT /update/{id}
        $this->makeRequest('/update/' . $id, 'PUT', $data);

        return redirect('/');
    }

    // --- 7. PROSES DELETE ---
    public function destroy($id)
    {
        // DELETE /delete/{id}
        $this->makeRequest('/delete/' . $id, 'DELETE');

        return redirect('/');
    }
}