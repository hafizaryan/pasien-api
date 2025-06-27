<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RS Syafira - API Documentation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background: #862bc6;
            color: white;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        h1 {
            color: #ffffff;
        }

        h2,
        h3,
        h4 {
            color: #333;
            margin: 15px 0 10px;
        }

        .section {
            background: #fff;
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .endpoint {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .endpoint-header {
            background: #862bc6;
            color: white;
            padding: 10px;
            font-weight: bold;
        }

        .method {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 0.9em;
            margin-right: 8px;
            background: #333;
            color: white;
        }

        .method.get { background: #2ecc71; }
        .method.post { background: #3498db; }
        .method.put { background: #f39c12; }
        .method.delete { background: #e74c3c; }

        .endpoint-body {
            padding: 15px;
        }

        pre,
        .code-block {
            background: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 3px;
            padding: 10px;
            overflow-x: auto;
            font-family: monospace;
            margin: 10px 0;
        }

        .response-codes {
            margin-top: 15px;
        }

        .response-code {
            padding: 10px;
            border-radius: 5px;
            border-left: 4px solid;
            margin-bottom: 10px;
        }

        .response-code.success { border-color: #2ecc71; background-color: #e8f8f0; }
        .response-code.error { border-color: #e74c3c; background-color: #fdedec; }
        .response-code.warning { border-color: #f39c12; background-color: #fef5e7; }

        .nav-tabs {
            display: flex;
            border-bottom: 1px solid #ddd;
            margin-bottom: 15px;
        }

        .nav-tab {
            padding: 8px 15px;
            background: #eee;
            border: none;
            cursor: pointer;
            margin-right: 5px;
        }

        .nav-tab.active {
            background: #862bc6;
            color: white;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .base-url {
            background: #f5f5f5;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .try-it-section {
            background: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-top: 15px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        .btn {
            background: #862bc6;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 3px;
            cursor: pointer;
        }

        .result {
            margin-top: 10px;
            padding: 10px;
            border-radius: 3px;
            display: none;
        }

        .result.success {
            background: #f5f5f5;
            border: 1px solid #ddd;
        }

        .result.error {
            background: #f5f5f5;
            border: 1px solid #ddd;
        }

        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            .nav-tabs {
                flex-wrap: wrap;
            }

            .nav-tab {
                margin-bottom: 5px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Rumah Sakit Syafira</h1>
            <p>API Documentation</p>
        </div>

        <div class="base-url">
            <strong>Base URL:</strong> http://127.0.0.1:8000/api
        </div>

        <div class="nav-tabs">
            <button class="nav-tab active" onclick="switchTab('overview')">Overview</button>
            <button class="nav-tab" onclick="switchTab('auth')">Authentication</button>
            <button class="nav-tab" onclick="switchTab('patients')">Patients</button>
            <button class="nav-tab" onclick="switchTab('testing')">Try It</button>
        </div>

        <div id="overview" class="tab-content active">
            <div class="section">
                <h2>Overview</h2>
                <p>API untuk manajemen data pasien Rumah Sakit Syafira yang dibangun menggunakan Laravel. API ini menyediakan
                    operasi CRUD (Create, Read, Update, Delete) untuk data pasien.</p>

                <h3>Authentication</h3>
                <p>Sebagian endpoint memerlukan autentikasi menggunakan token Bearer.</p>

                <h3>Content Type</h3>
                <p>Semua request dan response menggunakan format JSON.</p>

                <h3>Headers</h3>
                <div class="code-block">
                    <pre>Content-Type: application/json
Accept: application/json
Authorization: Bearer {token}  // Untuk endpoint yang membutuhkan autentikasi</pre>
                </div>

                <h3>Response Format</h3>
                <p>Semua response menggunakan format JSON dengan struktur konsisten:</p>
                <div class="code-block">
                    <pre>{
    "success": true/false,
    "message": "Status message",
    "data": {...} // Optional, berisi data response
}</pre>
                </div>
            </div>
        </div>

        <div id="auth" class="tab-content">
            <div class="section">
                <h2>Authentication API</h2>

                <div class="endpoint">
                    <div class="endpoint-header">
                        <span class="method post">POST</span>
                        <span>/auth/signup</span>
                    </div>
                    <div class="endpoint-body">
                        <p><strong>Deskripsi:</strong> Mendaftarkan pengguna baru</p>
                        <p><strong>URL:</strong> http://127.0.0.1:8000/api/auth/signup</p>

                        <h4>Request Body:</h4>
                        <div class="code-block">
                            <pre>{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}</pre>
                        </div>

                        <h4>Response:</h4>
                        <div class="response-codes">
                            <div class="response-code success">
                                <strong>201 Created</strong>
                                <div class="code-block">
                                    <pre>{
    "success": true,
    "message": "User registered successfully",
    "data": {
        "user": {
            "id": 1,
            "name": "John Doe",
            "email": "john@example.com",
            "created_at": "2025-06-27T04:45:00.000000Z"
        },
        "token": "1|abcd1234...",
        "token_type": "Bearer"
    }
}</pre>
                                </div>
                            </div>
                            <div class="response-code warning">
                                <strong>422 Validation Error</strong>
                                <div class="code-block">
                                    <pre>{
    "success": false,
    "message": "Validation failed",
    "errors": {
        "email": ["The email has already been taken."],
        "password": ["The password confirmation does not match."]
    }
}</pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="endpoint">
                    <div class="endpoint-header">
                        <span class="method post">POST</span>
                        <span>/auth/login</span>
                    </div>
                    <div class="endpoint-body">
                        <p><strong>Deskripsi:</strong> Login pengguna</p>
                        <p><strong>URL:</strong> http://127.0.0.1:8000/api/auth/login</p>

                        <h4>Request Body:</h4>
                        <div class="code-block">
                            <pre>{
    "email": "john@example.com",
    "password": "password123"
}</pre>
                        </div>

                        <h4>Response:</h4>
                        <div class="response-codes">
                            <div class="response-code success">
                                <strong>200 OK</strong>
                                <div class="code-block">
                                    <pre>{
    "success": true,
    "message": "Login successful",
    "data": {
        "user": {
            "id": 1,
            "name": "John Doe",
            "email": "john@example.com"
        },
        "token": "2|xyz9876...",
        "token_type": "Bearer"
    }
}</pre>
                                </div>
                            </div>
                            <div class="response-code error">
                                <strong>401 Unauthorized</strong>
                                <div class="code-block">
                                    <pre>{
    "success": false,
    "message": "Invalid credentials"
}</pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="endpoint">
                    <div class="endpoint-header">
                        <span class="method post">POST</span>
                        <span>/auth/logout</span>
                    </div>
                    <div class="endpoint-body">
                        <p><strong>Deskripsi:</strong> Logout pengguna (memerlukan autentikasi)</p>
                        <p><strong>URL:</strong> http://127.0.0.1:8000/api/auth/logout</p>

                        <h4>Headers:</h4>
                        <div class="code-block">
                            <pre>Authorization: Bearer {your_token_here}</pre>
                        </div>

                        <h4>Response:</h4>
                        <div class="response-codes">
                            <div class="response-code success">
                                <strong>200 OK</strong>
                                <div class="code-block">
                                    <pre>{
    "success": true,
    "message": "Logout successful"
}</pre>
                                </div>
                            </div>
                            <div class="response-code error">
                                <strong>401 Unauthorized</strong>
                                <div class="code-block">
                                    <pre>{
    "success": false,
    "message": "Unauthenticated"
}</pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="endpoint">
                    <div class="endpoint-header">
                        <span class="method get">GET</span>
                        <span>/auth/profile</span>
                    </div>
                    <div class="endpoint-body">
                        <p><strong>Deskripsi:</strong> Mendapatkan profil pengguna (memerlukan autentikasi)</p>
                        <p><strong>URL:</strong> http://127.0.0.1:8000/api/auth/profile</p>

                        <h4>Headers:</h4>
                        <div class="code-block">
                            <pre>Authorization: Bearer {your_token_here}</pre>
                        </div>

                        <h4>Response:</h4>
                        <div class="response-codes">
                            <div class="response-code success">
                                <strong>200 OK</strong>
                                <div class="code-block">
                                    <pre>{
    "success": true,
    "message": "Profile retrieved successfully",
    "data": {
        "user": {
            "id": 1,
            "name": "John Doe",
            "email": "john@example.com",
            "created_at": "2025-06-27T04:45:00.000000Z",
            "updated_at": "2025-06-27T04:45:00.000000Z"
        }
    }
}</pre>
                                </div>
                            </div>
                            <div class="response-code error">
                                <strong>401 Unauthorized</strong>
                                <div class="code-block">
                                    <pre>{
    "success": false,
    "message": "Unauthenticated"
}</pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h3>Usage Examples</h3>

                <h4>Using cURL</h4>
                <div class="code-block">
                    <pre># Sign Up
curl -X POST http://127.0.0.1:8000/api/auth/signup \
  -H "Content-Type: application/json" \
  -d '{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
  }'

# Login
curl -X POST http://127.0.0.1:8000/api/auth/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "john@example.com",
    "password": "password123"
  }'

# Get Profile
curl -X GET http://127.0.0.1:8000/api/auth/profile \
  -H "Authorization: Bearer YOUR_TOKEN_HERE"

# Logout
curl -X POST http://127.0.0.1:8000/api/auth/logout \
  -H "Authorization: Bearer YOUR_TOKEN_HERE"</pre>
                </div>

                <h4>Using JavaScript/Fetch</h4>
                <div class="code-block">
                    <pre>// Sign Up
const signupResponse = await fetch("http://127.0.0.1:8000/api/auth/signup", {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
    },
    body: JSON.stringify({
        name: "John Doe",
        email: "john@example.com",
        password: "password123",
        password_confirmation: "password123",
    }),
});

// Login
const loginResponse = await fetch("http://127.0.0.1:8000/api/auth/login", {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
    },
    body: JSON.stringify({
        email: "john@example.com",
        password: "password123",
    }),
});
const { token } = (await loginResponse.json()).data;

// Get Profile
const profileResponse = await fetch("http://127.0.0.1:8000/api/auth/profile", {
    method: "GET",
    headers: {
        Authorization: `Bearer ${token}`,
        "Content-Type": "application/json",
    },
});</pre>
                </div>
            </div>
        </div>

        <div id="patients" class="tab-content">
            <div class="section">
                <h2>Patient Endpoints</h2>

                <div class="endpoint">
                    <div class="endpoint-header">
                        <span class="method get">GET</span>
                        <span>/patients</span>
                    </div>
                    <div class="endpoint-body">
                        <p><strong>Deskripsi:</strong> Mengambil semua data pasien</p>
                        <p><strong>URL:</strong> http://127.0.0.1:8000/api/patients</p>

                        <h4>Response:</h4>
                        <div class="response-codes">
                            <div class="response-code success">
                                <strong>200 OK</strong>
                                <div class="code-block">
                                    <pre>{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "John Doe",
            "nik": "1234567890123456",
            "address": "Jl. Merdeka No. 123",
            "phone": "081234567890",
            "created_at": "2025-06-27T10:30:00.000000Z",
            "updated_at": "2025-06-27T10:30:00.000000Z"
        }
    ]
}</pre>
                                </div>
                            </div>
                            <div class="response-code error">
                                <strong>500 Internal Server Error</strong>
                                <div class="code-block">
                                    <pre>{
    "success": false,
    "message": "Failed to fetch patients"
}</pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="endpoint">
                    <div class="endpoint-header">
                        <span class="method get">GET</span>
                        <span>/patients/{id}</span>
                    </div>
                    <div class="endpoint-body">
                        <p><strong>Deskripsi:</strong> Mengambil data pasien berdasarkan ID</p>
                        <p><strong>URL:</strong> http://127.0.0.1:8000/api/patients/{id}</p>
                        <p><strong>Parameter:</strong> id (integer) - ID pasien</p>

                        <h4>Response:</h4>
                        <div class="response-codes">
                            <div class="response-code success">
                                <strong>200 OK</strong>
                                <div class="code-block">
                                    <pre>{
    "success": true,
    "data": {
        "id": 1,
        "name": "John Doe",
        "nik": "1234567890123456",
        "address": "Jl. Merdeka No. 123",
        "phone": "081234567890",
        "created_at": "2025-06-27T10:30:00.000000Z",
        "updated_at": "2025-06-27T10:30:00.000000Z"
    }
}</pre>
                                </div>
                            </div>
                            <div class="response-code error">
                                <strong>404 Not Found</strong>
                                <div class="code-block">
                                    <pre>{
    "success": false,
    "message": "Patient not found"
}</pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="endpoint">
                    <div class="endpoint-header">
                        <span class="method post">POST</span>
                        <span>/patients</span>
                    </div>
                    <div class="endpoint-body">
                        <p><strong>Deskripsi:</strong> Membuat data pasien baru</p>
                        <p><strong>URL:</strong> http://127.0.0.1:8000/api/patients</p>

                        <h4>Request Body:</h4>
                        <div class="code-block">
                            <pre>{
    "name": "John Doe",
    "nik": "1234567890123456",
    "address": "Jl. Merdeka No. 123",
    "phone": "081234567890"
}</pre>
                        </div>

                        <h4>Validation Rules:</h4>
                        <ul>
                            <li><strong>name:</strong> Required, string, maksimal 255 karakter</li>
                            <li><strong>nik:</strong> Required, string, unique, maksimal 20 karakter</li>
                            <li><strong>address:</strong> Required, string</li>
                            <li><strong>phone:</strong> Required, string, maksimal 20 karakter</li>
                        </ul>

                        <h4>Response:</h4>
                        <div class="response-codes">
                            <div class="response-code success">
                                <strong>201 Created</strong>
                                <div class="code-block">
                                    <pre>{
    "success": true,
    "message": "Patient created successfully",
    "data": {
        "id": 1,
        "name": "John Doe",
        "nik": "1234567890123456",
        "address": "Jl. Merdeka No. 123",
        "phone": "081234567890",
        "created_at": "2025-06-27T10:30:00.000000Z",
        "updated_at": "2025-06-27T10:30:00.000000Z"
    }
}</pre>
                                </div>
                            </div>
                            <div class="response-code warning">
                                <strong>422 Validation Error</strong>
                                <div class="code-block">
                                    <pre>{
    "success": false,
    "message": "Validation failed",
    "errors": {
        "name": ["The name field is required."],
        "nik": ["The nik has already been taken."]
    }
}</pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="endpoint">
                    <div class="endpoint-header">
                        <span class="method put">PUT</span>
                        <span>/patients/{id}</span>
                    </div>
                    <div class="endpoint-body">
                        <p><strong>Deskripsi:</strong> Mengupdate data pasien yang sudah ada</p>
                        <p><strong>URL:</strong> http://127.0.0.1:8000/api/patients/{id}</p>
                        <p><strong>Parameter:</strong> id (integer) - ID pasien</p>

                        <h4>Request Body (semua field opsional):</h4>
                        <div class="code-block">
                            <pre>{
    "name": "Jane Doe",
    "nik": "9876543210987654",
    "address": "Jl. Kemerdekaan No. 456",
    "phone": "089876543210"
}</pre>
                        </div>

                        <h4>Response:</h4>
                        <div class="response-codes">
                            <div class="response-code success">
                                <strong>200 OK</strong>
                                <div class="code-block">
                                    <pre>{
    "success": true,
    "message": "Patient updated successfully",
    "data": {
        "id": 1,
        "name": "Jane Doe",
        "nik": "9876543210987654",
        "address": "Jl. Kemerdekaan No. 456",
        "phone": "089876543210",
        "created_at": "2025-06-27T10:30:00.000000Z",
        "updated_at": "2025-06-27T11:30:00.000000Z"
    }
}</pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="endpoint">
                    <div class="endpoint-header">
                        <span class="method delete">DELETE</span>
                        <span>/patients/{id}</span>
                    </div>
                    <div class="endpoint-body">
                        <p><strong>Deskripsi:</strong> Menghapus data pasien</p>
                        <p><strong>URL:</strong> http://127.0.0.1:8000/api/patients/{id}</p>
                        <p><strong>Parameter:</strong> id (integer) - ID pasien</p>

                        <h4>Response:</h4>
                        <div class="response-codes">
                            <div class="response-code success">
                                <strong>200 OK</strong>
                                <div class="code-block">
                                    <pre>{
    "success": true,
    "message": "Patient deleted successfully"
}</pre>
                                </div>
                            </div>
                            <div class="response-code error">
                                <strong>500 Internal Server Error</strong>
                                <div class="code-block">
                                    <pre>{
    "success": false,
    "message": "Failed to delete patient"
}</pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="testing" class="tab-content">
            <div class="section">
                <h2>Try It Out</h2>

                <div class="try-it-section">
                    <h3>Authentication</h3>
                    
                    <div class="try-it-section">
                        <h4>Sign Up</h4>
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" id="signupName" placeholder="Your name">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" id="signupEmail" placeholder="Your email">
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" id="signupPassword" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password:</label>
                            <input type="password" id="signupPasswordConfirmation" placeholder="Confirm password">
                        </div>
                        <button class="btn" onclick="signup()">Sign Up</button>
                        <div id="signupResult" class="result"></div>
                    </div>

                    <div class="try-it-section">
                        <h4>Login</h4>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" id="loginEmail" placeholder="Your email">
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" id="loginPassword" placeholder="Password">
                        </div>
                        <button class="btn" onclick="login()">Login</button>
                        <div id="loginResult" class="result"></div>
                    </div>

                    <div class="try-it-section">
                        <h4>Get Profile (Requires Token)</h4>
                        <div class="form-group">
                            <label>Token:</label>
                            <input type="text" id="profileToken" placeholder="Paste your token here">
                        </div>
                        <button class="btn" onclick="getProfile()">Get Profile</button>
                        <div id="profileResult" class="result"></div>
                    </div>
                </div>

                <div class="try-it-section">
                    <h3>Patients</h3>
                    
                    <div class="try-it-section">
                        <h4>Get All Patients</h4>
                        <button class="btn" onclick="getAllPatients()">Get All Patients</button>
                        <div id="getAllResult" class="result"></div>
                    </div>

                    <div class="try-it-section">
                        <h4>Get Patient by ID</h4>
                        <div class="form-group">
                            <label>Patient ID:</label>
                            <input type="number" id="getPatientId" placeholder="Enter patient ID">
                        </div>
                        <button class="btn" onclick="getPatientById()">Get Patient</button>
                        <div id="getPatientResult" class="result"></div>
                    </div>

                    <div class="try-it-section">
                        <h4>Create New Patient</h4>
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" id="createName" placeholder="Patient name">
                        </div>
                        <div class="form-group">
                            <label>NIK:</label>
                            <input type="text" id="createNik" placeholder="NIK (16 digits)">
                        </div>
                        <div class="form-group">
                            <label>Address:</label>
                            <textarea id="createAddress" placeholder="Patient address"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone:</label>
                            <input type="text" id="createPhone" placeholder="Phone number">
                        </div>
                        <button class="btn" onclick="createPatient()">Create Patient</button>
                        <div id="createPatientResult" class="result"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const BASE_URL = 'http://127.0.0.1:8000/api';
        let authToken = '';

        function switchTab(tabName) {
            // Hide all tab contents
            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(content => content.classList.remove('active'));

            // Remove active class from all tabs
            const tabs = document.querySelectorAll('.nav-tab');
            tabs.forEach(tab => tab.classList.remove('active'));

            // Show selected tab content
            document.getElementById(tabName).classList.add('active');

            // Add active class to clicked tab
            event.target.classList.add('active');
        }

        function showResult(elementId, data, isSuccess = true) {
            const resultElement = document.getElementById(elementId);
            resultElement.style.display = 'block';
            resultElement.className = `result ${isSuccess ? 'success' : 'error'}`;
            resultElement.innerHTML = `<pre>${JSON.stringify(data, null, 2)}</pre>`;
        }

        // Authentication functions
        async function signup() {
            const name = document.getElementById('signupName').value;
            const email = document.getElementById('signupEmail').value;
            const password = document.getElementById('signupPassword').value;
            const passwordConfirmation = document.getElementById('signupPasswordConfirmation').value;

            if (!name || !email || !password || !passwordConfirmation) {
                showResult('signupResult', {
                    error: 'Please fill all fields'
                }, false);
                return;
            }

            try {
                const response = await fetch(`${BASE_URL}/auth/signup`, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        name: name,
                        email: email,
                        password: password,
                        password_confirmation: passwordConfirmation
                    })
                });

                const data = await response.json();
                showResult('signupResult', data, response.ok);
            } catch (error) {
                showResult('signupResult', {
                    error: error.message
                }, false);
            }
        }

        async function login() {
            const email = document.getElementById('loginEmail').value;
            const password = document.getElementById('loginPassword').value;

            if (!email || !password) {
                showResult('loginResult', {
                    error: 'Please fill all fields'
                }, false);
                return;
            }

            try {
                const response = await fetch(`${BASE_URL}/auth/login`, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        email: email,
                        password: password
                    })
                });

                const data = await response.json();
                showResult('loginResult', data, response.ok);
                
                if (response.ok && data.data && data.data.token) {
                    authToken = data.data.token;
                    document.getElementById('profileToken').value = authToken;
                }
            } catch (error) {
                showResult('loginResult', {
                    error: error.message
                }, false);
            }
        }

        async function getProfile() {
            const token = document.getElementById('profileToken').value || authToken;
            if (!token) {
                showResult('profileResult', {
                    error: 'Please login first or provide a token'
                }, false);
                return;
            }

            try {
                const response = await fetch(`${BASE_URL}/auth/profile`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${token}`
                    }
                });

                const data = await response.json();
                showResult('profileResult', data, response.ok);
            } catch (error) {
                showResult('profileResult', {
                    error: error.message
                }, false);
            }
        }

        // Patient functions
        async function getAllPatients() {
            try {
                const response = await fetch(`${BASE_URL}/patients`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                });

                const data = await response.json();
                showResult('getAllResult', data, response.ok);
            } catch (error) {
                showResult('getAllResult', {
                    error: error.message
                }, false);
            }
        }

        async function getPatientById() {
            const id = document.getElementById('getPatientId').value;
            if (!id) {
                showResult('getPatientResult', {
                    error: 'Please enter patient ID'
                }, false);
                return;
            }

            try {
                const response = await fetch(`${BASE_URL}/patients/${id}`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                });

                const data = await response.json();
                showResult('getPatientResult', data, response.ok);
            } catch (error) {
                showResult('getPatientResult', {
                    error: error.message
                }, false);
            }
        }

        async function createPatient() {
            const name = document.getElementById('createName').value;
            const nik = document.getElementById('createNik').value;
            const address = document.getElementById('createAddress').value;
            const phone = document.getElementById('createPhone').value;

            if (!name || !nik || !address || !phone) {
                showResult('createPatientResult', {
                    error: 'Please fill all fields'
                }, false);
                return;
            }

            try {
                const response = await fetch(`${BASE_URL}/patients`, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        name: name,
                        nik: nik,
                        address: address,
                        phone: phone
                    })
                });

                const data = await response.json();
                showResult('createPatientResult', data, response.ok);

                if (response.ok) {
                    // Clear form
                    document.getElementById('createName').value = '';
                    document.getElementById('createNik').value = '';
                    document.getElementById('createAddress').value = '';
                    document.getElementById('createPhone').value = '';
                }
            } catch (error) {
                showResult('createPatientResult', {
                    error: error.message
                }, false);
            }
        }
    </script>
</body>

</html>