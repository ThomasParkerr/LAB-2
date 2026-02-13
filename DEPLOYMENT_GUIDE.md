# Deployment Guide - Books CRUD API

## 📋 Prerequisites

Before deploying, ensure you have:
- [ ] Access to the server at `http://169.239.251.102:280`
- [ ] Your username for the server
- [ ] MySQL credentials (username and password)
- [ ] FTP/SFTP client (FileZilla, WinSCP) or terminal access

## 🚀 Step-by-Step Deployment

### Step 1: Prepare Your Files

1. **Update Database Configuration**
   - Open `config/database.php`
   - Update the following constants:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'your_username');    // Your MySQL username
   define('DB_PASS', 'your_password');    // Your MySQL password
   define('DB_NAME', 'books_db');         // Database name
   ```

2. **Choose Your Project Folder Name**
   - Decide on a folder name (e.g., `books-api`, `contactmgt`, etc.)
   - Remember: the `actions/` subfolder is REQUIRED

### Step 2: Upload Files to Server

#### Option A: Using FTP/SFTP Client (FileZilla, WinSCP)

1. Connect to server:
   - Host: `169.239.251.102`
   - Port: `21` (FTP) or `22` (SFTP)
   - Username: Your username
   - Password: Your password

2. Navigate to your web directory:
   ```
   /home/your_username/public_html/
   ```

3. Create your project folder:
   ```
   /home/your_username/public_html/books-api/
   ```

4. Upload all files maintaining the structure:
   ```
   books-api/
   ├── config/
   │   └── database.php
   ├── actions/
   │   ├── read_all.php
   │   ├── read_one.php
   │   ├── create.php
   │   ├── update.php
   │   └── delete.php
   ├── setup.php
   └── .htaccess
   ```

#### Option B: Using Terminal/SSH

```bash
# Connect to server
ssh your_username@169.239.251.102

# Navigate to web directory
cd public_html

# Create project folder
mkdir books-api

# Upload files (from your local machine)
scp -r /path/to/local/books-api/* your_username@169.239.251.102:~/public_html/books-api/
```

### Step 3: Set File Permissions

```bash
# SSH into server
ssh your_username@169.239.251.102

# Navigate to your project
cd public_html/books-api

# Set appropriate permissions
chmod 755 actions/
chmod 644 actions/*.php
chmod 644 config/database.php
chmod 644 .htaccess
```

### Step 4: Create Database

#### Option A: Using phpMyAdmin

1. Access phpMyAdmin:
   ```
   http://169.239.251.102/phpmyadmin/
   ```

2. Login with your MySQL credentials

3. Click "New" to create database

4. Database name: `books_db` (or your chosen name)

5. Collation: `utf8mb4_general_ci`

6. Click "Create"

#### Option B: Using setup.php

1. Access in browser:
   ```
   http://169.239.251.102:280/~your_username/books-api/setup.php
   ```

2. This will automatically:
   - Create the database
   - Create the books table
   - Insert sample data

3. You should see:
   ```
   Database created successfully or already exists.
   Table 'books' created successfully or already exists.
   Sample data inserted successfully.
   Setup complete! Your API is ready to use.
   ```

#### Option C: Using MySQL Command Line

```bash
# SSH into server
ssh your_username@169.239.251.102

# Login to MySQL
mysql -u your_username -p

# Create database
CREATE DATABASE books_db;

# Use database
USE books_db;

# Create table
CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

# Insert sample data
INSERT INTO books (name, phone) VALUES 
    ('The Great Gatsby', '0240111111'),
    ('To Kill a Mockingbird', '0240222222'),
    ('1984', '0240333333');

# Exit
EXIT;
```

### Step 5: Verify Deployment

Test each endpoint to ensure everything works:

#### 1. Test Read All
```bash
curl "http://169.239.251.102:280/~your_username/books-api/actions/read_all.php"
```

Expected output:
```json
{
  "success": true,
  "data": [
    {"id": 1, "name": "The Great Gatsby", "phone": "0240111111"},
    {"id": 2, "name": "To Kill a Mockingbird", "phone": "0240222222"},
    {"id": 3, "name": "1984", "phone": "0240333333"}
  ]
}
```

#### 2. Test Read One
```bash
curl "http://169.239.251.102:280/~your_username/books-api/actions/read_one.php?id=1"
```

#### 3. Test Create
```bash
curl -X POST "http://169.239.251.102:280/~your_username/books-api/actions/create.php" \
  -d "name=Test Book" \
  -d "phone=0240777777"
```

#### 4. Test Update
```bash
curl -X POST "http://169.239.251.102:280/~your_username/books-api/actions/update.php" \
  -d "id=1" \
  -d "name=Updated Book" \
  -d "phone=0240888888"
```

#### 5. Test Delete
```bash
curl -X POST "http://169.239.251.102:280/~your_username/books-api/actions/delete.php" \
  -d "id=3"
```

## 🐛 Troubleshooting

### Problem: "Database connection failed"

**Solution:**
1. Check database credentials in `config/database.php`
2. Verify MySQL server is running
3. Ensure database exists
4. Check user has proper privileges:
   ```sql
   GRANT ALL PRIVILEGES ON books_db.* TO 'your_username'@'localhost';
   FLUSH PRIVILEGES;
   ```

### Problem: "404 Not Found"

**Solution:**
1. Verify file paths and folder structure
2. Check file permissions (should be readable)
3. Ensure files are in correct location:
   ```
   ~/public_html/books-api/actions/read_all.php
   ```
4. Test URL format:
   ```
   http://169.239.251.102:280/~your_username/books-api/actions/read_all.php
   ```

### Problem: Empty or blank response

**Solution:**
1. Enable error display (already in .htaccess)
2. Check PHP error logs:
   ```bash
   tail -f /var/log/apache2/error.log
   ```
3. Verify PHP is installed and working:
   ```bash
   php -v
   ```
4. Check file syntax:
   ```bash
   php -l actions/read_all.php
   ```

### Problem: "Query preparation failed"

**Solution:**
1. Check database table exists:
   ```sql
   SHOW TABLES FROM books_db;
   ```
2. Verify table structure:
   ```sql
   DESCRIBE books_db.books;
   ```
3. Re-run setup.php

### Problem: CORS errors (if testing from browser)

**Solution:**
Add to `.htaccess`:
```apache
Header set Access-Control-Allow-Origin "*"
Header set Access-Control-Allow-Methods "GET, POST, OPTIONS"
```

## 📝 Final Checklist

Before submission, verify:

- [ ] All files uploaded to correct directory
- [ ] Database configured and running
- [ ] All 5 endpoints return JSON responses
- [ ] Read All includes record IDs
- [ ] Create returns new ID
- [ ] Update/Delete return success messages
- [ ] Error cases return JSON error messages
- [ ] All endpoints in `actions/` folder
- [ ] GitHub repository updated
- [ ] API link accessible:
  ```
  http://169.239.251.102:280/~your_username/books-api/actions
  ```

## 🎯 Submission URLs

Your submission should include:

1. **GitHub Link:**
   ```
   https://github.com/your_username/books-crud-api
   ```

2. **Deployed API Link:**
   ```
   http://169.239.251.102:280/~your_username/books-api/actions
   ```

3. **PDF Report:**
   - Use the generated template
   - Insert screenshots of all tests
   - Show both command and response for each endpoint

## 🔐 Security Notes

For production deployment:
- Remove or protect `setup.php` after first run
- Disable error display in production
- Implement API authentication
- Add rate limiting
- Use HTTPS
- Validate and sanitize all inputs
- Implement proper logging

## ✅ Testing Checklist

Test each endpoint and verify:

- [ ] **Read All**: Returns all records with IDs
- [ ] **Read One**: Returns single record or "not found" error
- [ ] **Create**: Returns new ID, visible in Read All
- [ ] **Update**: Returns success, changes visible in Read All
- [ ] **Delete**: Returns success, record gone from Read All
- [ ] All responses in JSON format
- [ ] Error cases return JSON errors

## 🎓 Tips for Success

1. **Test locally first** before deploying
2. **Keep backups** of your database and files
3. **Document everything** - take screenshots as you go
4. **Test error cases** - try invalid IDs, missing parameters
5. **Check JSON format** - use online JSON validators
6. **Use version control** - commit regularly to GitHub
7. **Ask for help** if stuck - check with classmates or instructor

## 📞 Support Resources

- PHP Documentation: https://www.php.net/docs.php
- MySQL Documentation: https://dev.mysql.com/doc/
- JSON Validator: https://jsonlint.com/
- cURL Tutorial: https://curl.se/docs/manual.html
- Postman Learning: https://learning.postman.com/

Good luck with your deployment! 🚀
