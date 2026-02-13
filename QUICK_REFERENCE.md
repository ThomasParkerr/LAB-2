# Quick Reference Card - Books CRUD API

## 📍 Base URL
```
http://169.239.251.102:280/~your_username/books-api/actions
```

## 🔗 Endpoints Quick Reference

### 1️⃣ READ ALL
```bash
curl "http://169.239.251.102:280/~your_username/books-api/actions/read_all.php"
```
**Response:** `{"success": true, "data": [{"id": 1, "name": "...", "phone": "..."}]}`

---

### 2️⃣ READ ONE
```bash
curl "http://169.239.251.102:280/~your_username/books-api/actions/read_one.php?id=1"
```
**Response:** `{"success": true, "data": {"id": 1, "name": "...", "phone": "..."}}`

---

### 3️⃣ CREATE
```bash
curl -X POST "http://169.239.251.102:280/~your_username/books-api/actions/create.php" \
  -d "name=Book Name" \
  -d "phone=0240555555"
```
**Response:** `{"success": true, "data": {"id": 10}}`

---

### 4️⃣ UPDATE
```bash
curl -X POST "http://169.239.251.102:280/~your_username/books-api/actions/update.php" \
  -d "id=1" \
  -d "name=Updated Name" \
  -d "phone=0240999999"
```
**Response:** `{"success": true}`

---

### 5️⃣ DELETE
```bash
curl -X POST "http://169.239.251.102:280/~your_username/books-api/actions/delete.php" \
  -d "id=1"
```
**Response:** `{"success": true}`

---

## 📸 Screenshot Checklist

For your PDF report, capture:

- [ ] **Read All** - command + response
- [ ] **Read One** - command + response  
- [ ] **Create** - command + response
- [ ] **Create Verify** - Read All showing new record
- [ ] **Update** - command + response
- [ ] **Update Verify** - Read All showing updated record
- [ ] **Delete** - command + response
- [ ] **Delete Verify** - Read All showing deleted record gone

---

## 🎯 Postman Quick Setup

1. Import collection: `Books_API_Postman_Collection.json`
2. Update variable: `base_url` = your actual URL
3. Test all endpoints in order
4. Take screenshots of each test

---

## ⚠️ Common Errors

| Error | Cause | Fix |
|-------|-------|-----|
| `"error": "not found"` | Invalid ID | Use existing ID |
| `"error": "ID is required"` | Missing parameter | Add `id` parameter |
| `"error": "Database connection failed"` | Wrong credentials | Check `config/database.php` |
| Empty response | PHP error | Check error logs |

---

## ✅ Requirements Checklist

- [ ] CRUD: Read All (with IDs) ✓
- [ ] CRUD: Read One ✓
- [ ] CRUD: Create ✓
- [ ] CRUD: Update ✓
- [ ] CRUD: Delete ✓
- [ ] MySQL database (no static data) ✓
- [ ] Folder: `actions/` ✓
- [ ] All responses JSON ✓
- [ ] Error responses JSON ✓

---

## 📦 Submission Package

1. **GitHub Link**
   - Repository with all code
   - Include README.md

2. **API Link**
   ```
   http://169.239.251.102:280/~your_username/books-api/actions
   ```

3. **PDF Report**
   - Screenshots of all tests
   - Follow template provided

---

## 🚀 Testing Workflow

```bash
# 1. Initial Read
curl ".../read_all.php"

# 2. Create new record
curl -X POST ".../create.php" -d "name=Test" -d "phone=0240777777"

# 3. Verify create
curl ".../read_all.php"

# 4. Read one
curl ".../read_one.php?id=NEW_ID"

# 5. Update
curl -X POST ".../update.php" -d "id=NEW_ID" -d "name=Updated" -d "phone=0240888888"

# 6. Verify update
curl ".../read_all.php"

# 7. Delete
curl -X POST ".../delete.php" -d "id=NEW_ID"

# 8. Verify delete
curl ".../read_all.php"
```

---

## 💾 Database Schema

```sql
CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

---

## 🔧 Quick Fixes

**Can't connect to database?**
```php
// In config/database.php, update:
define('DB_HOST', 'localhost');
define('DB_USER', 'your_mysql_user');
define('DB_PASS', 'your_mysql_pass');
define('DB_NAME', 'books_db');
```

**404 errors?**
```bash
# Check file location
ls -la ~/public_html/books-api/actions/

# Check permissions
chmod 644 actions/*.php
```

**Empty responses?**
```bash
# Check PHP syntax
php -l actions/read_all.php

# Enable errors in .htaccess
php_flag display_errors on
```

---

## 📞 Need Help?

1. Check error logs
2. Verify all files uploaded
3. Test database connection
4. Validate JSON output
5. Ask instructor/classmates

---

**Deadline: Friday, February 13, 2026 (11:59 PM)**

Good luck! 🎓✨
