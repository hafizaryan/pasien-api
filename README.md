# RS Syafira - Patient API Documentation

API untuk manajemen data pasien Rumah Sakit Syafira yang dibangun menggunakan Laravel.

## Instalasi dan Menjalankan API

1. Pastikan Laragon atau XAMPP sudah aktif.
2. Clone repository.
3. Install dependencies: `composer install`.
4. Jalankan migrasi: `php artisan migrate`.
5. Jalankan server: `php artisan serve`.

## Base URL

```
http://127.0.0.1:8000/api
```

## Sample Login

username: admin@gmail.com
password: admin123

## Headers

```
Content-Type: application/json
Accept: application/json
```

## Authentication

API ini menggunakan Laravel Sanctum untuk authentication dengan Bearer Token.

### Authentication Endpoints

#### 1. Sign Up (Register)

**Endpoint:** `POST /auth/signup`

**Request Body:**

```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}
```

**Response Success (201):**

```json
{
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
}
```

#### 2. Login

**Endpoint:** `POST /auth/login`

**Request Body:**

```json
{
    "email": "john@example.com",
    "password": "password123"
}
```

**Response Success (200):**

```json
{
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
}
```

#### 3. Get Profile (Protected)

**Endpoint:** `GET /auth/profile`

**Headers:**

```
Authorization: Bearer {your_token_here}
```

**Response Success (200):**

```json
{
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
}
```

#### 4. Logout (Protected)

**Endpoint:** `POST /auth/logout`

**Headers:**

```
Authorization: Bearer {your_token_here}
```

**Response Success (200):**

```json
{
    "success": true,
    "message": "Logout successful"
}
```

## Endpoints

### 1. Get All Patients

Mengambil semua data pasien.

**Endpoint:** `GET /patients`

**URL Lengkap:** `http://127.0.0.1:8000/api/patients`

**Response Success (200):**

```json
{
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
}
```

**Response Error (500):**

```json
{
    "success": false,
    "message": "Failed to fetch patients"
}
```

### 2. Get Patient by ID

Mengambil data pasien berdasarkan ID.

**Endpoint:** `GET /patients/{id}`

**URL Lengkap:** `http://127.0.0.1:8000/api/patients/1`

**Response Success (200):**

```json
{
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
}
```

**Response Error (404):**

```json
{
    "success": false,
    "message": "Patient not found"
}
```

### 3. Create New Patient

Membuat data pasien baru.

**Endpoint:** `POST /patients`

**URL Lengkap:** `http://127.0.0.1:8000/api/patients`

**Request Body:**

```json
{
    "name": "John Doe",
    "nik": "1234567890123456",
    "address": "Jl. Merdeka No. 123",
    "phone": "081234567890"
}
```

**Validation Rules:**

-   `name`: Required, string, maksimal 255 karakter
-   `nik`: Required, string, unique, maksimal 20 karakter
-   `address`: Required, string
-   `phone`: Required, string, maksimal 20 karakter

**Response Success (201):**

```json
{
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
}
```

**Response Validation Error (422):**

```json
{
    "success": false,
    "message": "Validation failed",
    "errors": {
        "name": ["The name field is required."],
        "nik": ["The nik has already been taken."]
    }
}
```

**Response Server Error (500):**

```json
{
    "success": false,
    "message": "Failed to create patient"
}
```

### 4. Update Patient

Mengupdate data pasien yang sudah ada.

**Endpoint:** `PUT /patients/{id}`

**URL Lengkap:** `http://127.0.0.1:8000/api/patients/1`

**Request Body (semua field opsional):**

```json
{
    "name": "Jane Doe",
    "nik": "9876543210987654",
    "address": "Jl. Kemerdekaan No. 456",
    "phone": "089876543210"
}
```

**Validation Rules:**

-   `name`: Optional, string, maksimal 255 karakter
-   `nik`: Optional, string, unique (kecuali untuk ID yang sedang diupdate), maksimal 20 karakter
-   `address`: Optional, string
-   `phone`: Optional, string, maksimal 20 karakter

**Response Success (200):**

```json
{
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
}
```

**Response Validation Error (422):**

```json
{
    "success": false,
    "message": "Validation failed",
    "errors": {
        "nik": ["The nik has already been taken."]
    }
}
```

**Response Server Error (500):**

```json
{
    "success": false,
    "message": "Failed to update patient"
}
```

### 5. Delete Patient

Menghapus data pasien.

**Endpoint:** `DELETE /patients/{id}`

**URL Lengkap:** `http://127.0.0.1:8000/api/patients/1`

**Response Success (200):**

```json
{
    "success": true,
    "message": "Patient deleted successfully"
}
```

**Response Error (500):**

```json
{
    "success": false,
    "message": "Failed to delete patient"
}
```

## API Status Endpoints

### Get API Status

```
GET /api/status
```

Menampilkan informasi lengkap tentang API, termasuk versi, status database, dan daftar endpoint.

### Health Check

```
GET /api/health
```

Endpoint untuk monitoring kesehatan API dan database connection.

### Statistics

```
GET /api/statistics
```

Menampilkan statistik penggunaan API dan data pasien.

## Contoh Penggunaan dengan cURL

### Get All Patients

```bash
curl -X GET "http://127.0.0.1:8000/api/patients" \
-H "Accept: application/json" \
-H "Content-Type: application/json"
```

### Get Patient by ID

```bash
curl -X GET "http://127.0.0.1:8000/api/patients/1" \
-H "Accept: application/json" \
-H "Content-Type: application/json"
```

### Create New Patient

```bash
curl -X POST "http://127.0.0.1:8000/api/patients" \
-H "Accept: application/json" \
-H "Content-Type: application/json" \
-d '{
    "name": "John Doe",
    "nik": "1234567890123456",
    "address": "Jl. Merdeka No. 123",
    "phone": "081234567890"
}'
```

### Update Patient

```bash
curl -X PUT "http://127.0.0.1:8000/api/patients/1" \
-H "Accept: application/json" \
-H "Content-Type: application/json" \
-d '{
    "name": "Jane Doe",
    "phone": "089876543210"
}'
```

### Delete Patient

```bash
curl -X DELETE "http://127.0.0.1:8000/api/patients/1" \
-H "Accept: application/json" \
-H "Content-Type: application/json"
```

## Contoh Penggunaan dengan JavaScript (Fetch API)

### Get All Patients

```javascript
fetch("http://127.0.0.1:8000/api/patients", {
    method: "GET",
    headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
    },
})
    .then((response) => response.json())
    .then((data) => console.log(data))
    .catch((error) => console.error("Error:", error));
```

### Create New Patient

```javascript
fetch("http://127.0.0.1:8000/api/patients", {
    method: "POST",
    headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
    },
    body: JSON.stringify({
        name: "John Doe",
        nik: "1234567890123456",
        address: "Jl. Merdeka No. 123",
        phone: "081234567890",
    }),
})
    .then((response) => response.json())
    .then((data) => console.log(data))
    .catch((error) => console.error("Error:", error));
```

### Get All Patients

```javascript
function getAllPatients() {
    const url = "http://127.0.0.1:8000/api/patients";
    const options = {
        method: "GET",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
        },
    };

    try {
        const response = UrlFetchApp.fetch(url, options);
        const data = JSON.parse(response.getContentText());
        console.log(data);
        return data;
    } catch (error) {
        console.error("Error:", error);
        return null;
    }
}
```

### Create New Patient

```javascript
function createPatient() {
    const url = "http://127.0.0.1:8000/api/patients";
    const payload = {
        name: "John Doe",
        nik: "1234567890123456",
        address: "Jl. Merdeka No. 123",
        phone: "081234567890",
    };

    const options = {
        method: "POST",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
        },
        payload: JSON.stringify(payload),
    };

    try {
        const response = UrlFetchApp.fetch(url, options);
        const data = JSON.parse(response.getContentText());
        console.log(data);
        return data;
    } catch (error) {
        console.error("Error:", error);
        return null;
    }
}
```

## Error Codes

-   **200**: OK - Request berhasil
-   **201**: Created - Data berhasil dibuat
-   **404**: Not Found - Data tidak ditemukan
-   **422**: Unprocessable Entity - Validation error
-   **500**: Internal Server Error - Server error

API akan berjalan di `http://127.0.0.1:8000`

## Testing

### 1. Web Interface Testing

Anda dapat menggunakan interface web untuk testing yang sudah tersedia di:

**URL:** `http://127.0.0.1:8000/auth-test.html`

Interface ini menyediakan form untuk testing semua endpoint authentication:

-   Sign Up
-   Login
-   Get Profile
-   Logout

### 2. Postman Collection

Import file collection Postman yang tersedia di:

-   `/docs/Auth_API.postman_collection.json` - untuk testing authentication endpoints
-   `/docs/Patient_API.postman_collection.json` - untuk testing patient endpoints

### 3. Command Line Testing

#### Authentication dengan cURL/PowerShell

**Sign Up:**

```bash
curl -X POST "http://127.0.0.1:8000/api/auth/signup" \
-H "Content-Type: application/json" \
-d '{
    "name": "Test User",
    "email": "test@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}'
```

**Login:**

```bash
curl -X POST "http://127.0.0.1:8000/api/auth/login" \
-H "Content-Type: application/json" \
-d '{
    "email": "test@example.com",
    "password": "password123"
}'
```

**Get Profile (with token):**

```bash
curl -X GET "http://127.0.0.1:8000/api/auth/profile" \
-H "Authorization: Bearer YOUR_TOKEN_HERE"
```

#### PowerShell Examples

**Sign Up:**

```powershell
Invoke-RestMethod -Uri "http://127.0.0.1:8000/api/auth/signup" -Method POST -ContentType "application/json" -Body '{"name": "Test User", "email": "test@example.com", "password": "password123", "password_confirmation": "password123"}'
```

**Login:**

```powershell
Invoke-RestMethod -Uri "http://127.0.0.1:8000/api/auth/login" -Method POST -ContentType "application/json" -Body '{"email": "test@example.com", "password": "password123"}'
```

## Error Handling

API menggunakan format error response yang konsisten:

```json
{
    "success": false,
    "message": "Error description",
    "errors": {} // Optional validation errors
}
```

**HTTP Status Codes:**

-   200: Success
-   201: Created (successful registration)
-   401: Unauthorized (invalid credentials or token)
-   422: Validation Error
-   500: Server Error
