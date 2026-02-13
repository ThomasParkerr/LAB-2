# Books Management CRUD API

A complete RESTful API implementing CRUD operations for a books management system using PHP and MySQL.

## 📋 Assignment Requirements

✅ **All CRUD Operations Implemented:**
- Read All (with record IDs)
- Read One (by ID)
- Create
- Update
- Delete

✅ **Database:** MySQL (no static data)

✅ **Folder Structure:** All endpoints in `actions/` subfolder

✅ **JSON Responses:** All responses in JSON format (success, error, and data)

## 🗂️ Project Structure

```
books-api/
├── config/
│   └── database.php          # Database configuration and helper functions
├── actions/                  # API endpoints (REQUIRED folder name)
│   ├── read_all.php         # GET - Retrieve all books
│   ├── read_one.php         # GET - Retrieve one book by ID
│   ├── create.php           # POST - Create new book
│   ├── update.php           # POST - Update existing book
│   └── delete.php           # POST - Delete book by ID
├── setup.php                # Database setup script
└── README.md               # This file
```

## 🚀 Installation & Setup

### Step 1: Update Database Configuration

Edit `config/database.php` and update these values:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'your_username');    // Your MySQL username
define('DB_PASS', 'your_password');    // Your MySQL password
define('DB_NAME', 'books_db');         // Database name
```

### Step 2: Run Database Setup

Run the setup script once to create the database and table:

```bash
php setup.php
```

This will:
- Create the `books_db` database
- Create the `books` table with fields: id, name, phone
- Insert sample data

### Step 3: Upload to Server

Upload the entire project to your server:
```
http://169.239.251.102:280/~your_username/books-api/
```

## 📡 API Endpoints

Base URL: `http://169.239.251.102:280/~your_username/books-api/actions`

### 1. Read All Books
**Endpoint:** `read_all.php`  
**Method:** GET

```bash
curl "http://169.239.251.102:280/~your_username/books-api/actions/read_all.php"
```

**Response:**
```json
{
  "success": true,
  "data": [
    {"id": 1, "name": "The Great Gatsby", "phone": "0240111111"},
    {"id": 2, "name": "To Kill a Mockingbird", "phone": "0240222222"}
  ]
}
```

### 2. Read One Book
**Endpoint:** `read_one.php`  
**Method:** GET  
**Parameters:** `id` (required)

```bash
curl "http://169.239.251.102:280/~your_username/books-api/actions/read_one.php?id=1"
```

**Response (Success):**
```json
{
  "success": true,
  "data": {
    "id": 1,
    "name": "The Great Gatsby",
    "phone": "0240111111"
  }
}
```

**Response (Not Found):**
```json
{
  "success": false,
  "error": "not found"
}
```

### 3. Create Book
**Endpoint:** `create.php`  
**Method:** POST  
**Parameters:** `name`, `phone` (both required)

```bash
curl -X POST "http://169.239.251.102:280/~your_username/books-api/actions/create.php" \
  -d "name=Pride and Prejudice" \
  -d "phone=0240444444"
```

**Response:**
```json
{
  "success": true,
  "data": {
    "id": 4
  }
}
```

### 4. Update Book
**Endpoint:** `update.php`  
**Method:** POST  
**Parameters:** `id`, `name`, `phone` (all required)

```bash
curl -X POST "http://169.239.251.102:280/~your_username/books-api/actions/update.php" \
  -d "id=1" \
  -d "name=The Great Gatsby (Updated)" \
  -d "phone=0240999999"
```

**Response:**
```json
{
  "success": true
}
```

### 5. Delete Book
**Endpoint:** `delete.php`  
**Method:** POST  
**Parameters:** `id` (required)

```bash
curl -X POST "http://169.239.251.102:280/~your_username/books-api/actions/delete.php" \
  -d "id=1"
```

**Response:**
```json
{
  "success": true
}
```

## 🧪 Testing Guide

### Using cURL (Command Line)

1. **Test Read All:**
   ```bash
   curl "http://169.239.251.102:280/~your_username/books-api/actions/read_all.php"
   ```

2. **Test Create + Verify:**
   ```bash
   # Create
   curl -X POST "http://169.239.251.102:280/~your_username/books-api/actions/create.php" \
     -d "name=New Book" \
     -d "phone=0240555555"
   
   # Verify
   curl "http://169.239.251.102:280/~your_username/books-api/actions/read_all.php"
   ```

3. **Test Read One:**
   ```bash
   curl "http://169.239.251.102:280/~your_username/books-api/actions/read_one.php?id=1"
   ```

4. **Test Update + Verify:**
   ```bash
   # Update
   curl -X POST "http://169.239.251.102:280/~your_username/books-api/actions/update.php" \
     -d "id=2" \
     -d "name=Updated Book Name" \
     -d "phone=0240666666"
   
   # Verify
   curl "http://169.239.251.102:280/~your_username/books-api/actions/read_all.php"
   ```

5. **Test Delete + Verify:**
   ```bash
   # Delete
   curl -X POST "http://169.239.251.102:280/~your_username/books-api/actions/delete.php" \
     -d "id=3"
   
   # Verify
   curl "http://169.239.251.102:280/~your_username/books-api/actions/read_all.php"
   ```

### Using Postman

1. **Read All:**
   - Method: GET
   - URL: `http://169.239.251.102:280/~your_username/books-api/actions/read_all.php`

2. **Create:**
   - Method: POST
   - URL: `http://169.239.251.102:280/~your_username/books-api/actions/create.php`
   - Body: x-www-form-urlencoded
   - Add keys: `name`, `phone`

3. **Read One:**
   - Method: GET
   - URL: `http://169.239.251.102:280/~your_username/books-api/actions/read_one.php?id=1`

4. **Update:**
   - Method: POST
   - URL: `http://169.239.251.102:280/~your_username/books-api/actions/update.php`
   - Body: x-www-form-urlencoded
   - Add keys: `id`, `name`, `phone`

5. **Delete:**
   - Method: POST
   - URL: `http://169.239.251.102:280/~your_username/books-api/actions/delete.php`
   - Body: x-www-form-urlencoded
   - Add key: `id`

## 📝 Submission Checklist

- [ ] GitHub repository link
- [ ] Deployed API link: `http://169.239.251.102:280/~your_username/books-api/actions`
- [ ] PDF with screenshots of:
  - [ ] Read All
  - [ ] Read One
  - [ ] Create + follow-up Read showing changes
  - [ ] Update + follow-up Read showing changes
  - [ ] Delete + follow-up Read showing changes

## 🔒 Security Notes

This is a basic API for educational purposes. For production use, consider:
- Input validation and sanitization
- SQL injection protection (already using prepared statements)
- Authentication and authorization
- Rate limiting
- CORS configuration
- HTTPS encryption

## 🗃️ Database Schema

```sql
CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

## ❓ Troubleshooting

**Database Connection Failed:**
- Check your database credentials in `config/database.php`
- Ensure MySQL is running
- Verify database exists

**404 Not Found:**
- Ensure files are uploaded to correct directory
- Check file permissions (should be readable)
- Verify the `actions/` folder exists

**Empty Response:**
- Check PHP error logs
- Ensure all files have proper `<?php` opening tags
- Verify `require_once` paths are correct

## 📞 Support

If you encounter issues, check:
1. PHP error logs on your server
2. MySQL connection credentials
3. File paths and folder structure
4. Server permissions

## 📄 License

This project is for educational purposes as part of the API Assignment.
