# GitHub Setup Instructions

## 📚 How to Submit Your Project to GitHub

### Option 1: Using Git Command Line

#### Step 1: Initialize Repository

```bash
# Navigate to your project folder
cd /path/to/books-api

# Initialize git repository
git init

# Add all files
git add .

# Create initial commit
git commit -m "Initial commit: Books CRUD API"
```

#### Step 2: Create GitHub Repository

1. Go to https://github.com
2. Click the "+" icon → "New repository"
3. Repository name: `books-crud-api` (or your preferred name)
4. Description: "RESTful CRUD API for Books Management using PHP and MySQL"
5. Keep it **Public** (required for submission)
6. Do NOT initialize with README (we already have one)
7. Click "Create repository"

#### Step 3: Push to GitHub

```bash
# Add remote repository (replace YOUR_USERNAME)
git remote add origin https://github.com/YOUR_USERNAME/books-crud-api.git

# Rename branch to main (if needed)
git branch -M main

# Push to GitHub
git push -u origin main
```

#### Step 4: Verify Upload

Visit your repository URL:
```
https://github.com/YOUR_USERNAME/books-crud-api
```

You should see:
- All PHP files
- README.md with project documentation
- Proper folder structure (config/, actions/)

---

### Option 2: Using GitHub Desktop

#### Step 1: Download GitHub Desktop
- Download from: https://desktop.github.com/
- Install and sign in with your GitHub account

#### Step 2: Create Repository
1. Click "File" → "New Repository"
2. Name: `books-crud-api`
3. Local Path: Choose your project folder location
4. Click "Create Repository"

#### Step 3: Add Files
1. Copy all your API files into the repository folder
2. GitHub Desktop will automatically detect changes
3. Write commit message: "Initial commit: Books CRUD API"
4. Click "Commit to main"

#### Step 4: Publish to GitHub
1. Click "Publish repository"
2. Ensure "Keep this code public" is UNCHECKED (we want public)
3. Click "Publish Repository"

---

### Option 3: Upload via GitHub Web Interface

#### Step 1: Create Repository
1. Go to https://github.com
2. Click "+" → "New repository"
3. Name: `books-crud-api`
4. Public repository
5. Click "Create repository"

#### Step 2: Upload Files
1. Click "uploading an existing file"
2. Drag and drop all your project files
   - Maintain folder structure!
   - Upload `config/` folder contents
   - Upload `actions/` folder contents
   - Upload root files (README.md, setup.php, etc.)
3. Commit message: "Initial commit: Books CRUD API"
4. Click "Commit changes"

---

## 📁 Required Repository Structure

Your GitHub repo MUST have this structure:

```
books-crud-api/
├── .gitignore
├── README.md
├── DEPLOYMENT_GUIDE.md
├── QUICK_REFERENCE.md
├── setup.php
├── test_api.sh
├── Books_API_Postman_Collection.json
├── config/
│   └── database.php
└── actions/
    ├── read_all.php
    ├── read_one.php
    ├── create.php
    ├── update.php
    └── delete.php
```

---

## ✅ Pre-Submission Checklist

Before submitting your GitHub link:

- [ ] Repository is **PUBLIC** (not private)
- [ ] All PHP files are present
- [ ] `actions/` folder exists with all 5 endpoints
- [ ] `config/database.php` exists
- [ ] `README.md` contains:
  - [ ] Project description
  - [ ] Installation instructions
  - [ ] API endpoint documentation
  - [ ] Testing examples
- [ ] Repository URL works:
  ```
  https://github.com/YOUR_USERNAME/books-crud-api
  ```

---

## 📝 What to Submit

In your assignment submission, provide:

**1. GitHub Repository Link:**
```
https://github.com/YOUR_USERNAME/books-crud-api
```

**2. Deployed API Link:**
```
http://169.239.251.102:280/~your_username/books-api/actions
```

**3. PDF Report:**
- File name: `API_Testing_Report_YourName.pdf`
- Contains screenshots of all CRUD operations
- Shows both commands and responses

---

## 🔐 Important Notes

### Database Credentials
⚠️ **SECURITY WARNING**: Your `config/database.php` contains database credentials.

**Option 1: Safe for Submission (Recommended)**
- Use placeholder values in GitHub:
  ```php
  define('DB_USER', 'your_username');  // Replace before deployment
  define('DB_PASS', 'your_password');  // Replace before deployment
  ```
- Add comment explaining users need to update credentials

**Option 2: Use Environment Variables (Advanced)**
- Create `.env` file (add to .gitignore)
- Use environment variables in code

**Option 3: Separate Config**
- Create `config/database.example.php` with placeholders
- Add `config/database.php` to .gitignore
- Instruct users to copy example file

---

## 🐛 Common GitHub Issues

### Issue: "Permission denied"
**Solution:**
```bash
# Use HTTPS instead of SSH
git remote set-url origin https://github.com/YOUR_USERNAME/books-crud-api.git
```

### Issue: "Repository not found"
**Solution:**
- Verify repository name is correct
- Ensure repository is created on GitHub
- Check you're using the right username

### Issue: "Failed to push"
**Solution:**
```bash
# Pull first if remote has changes
git pull origin main --rebase

# Then push
git push origin main
```

### Issue: Can't see uploaded files
**Solution:**
- Refresh the GitHub page
- Check correct branch (usually 'main')
- Verify files were committed:
  ```bash
  git status
  git log
  ```

---

## 🎯 Git Commands Reference

### First Time Setup
```bash
git config --global user.name "Your Name"
git config --global user.email "your.email@example.com"
```

### Basic Commands
```bash
# Check status
git status

# Add files
git add .

# Commit changes
git commit -m "Your message"

# Push to GitHub
git push origin main

# View commit history
git log

# View remote URL
git remote -v
```

### Update After Changes
```bash
# After modifying files
git add .
git commit -m "Updated API endpoints"
git push origin main
```

---

## 📚 Additional Resources

- Git Documentation: https://git-scm.com/doc
- GitHub Guides: https://guides.github.com/
- Git Cheat Sheet: https://education.github.com/git-cheat-sheet-education.pdf
- Markdown Guide: https://www.markdownguide.org/

---

## ✨ Pro Tips

1. **Write Good Commit Messages**
   - ✅ Good: "Add error handling to create endpoint"
   - ❌ Bad: "update"

2. **Commit Often**
   - Commit after each major feature
   - Don't wait until everything is done

3. **Use .gitignore**
   - Prevents committing unnecessary files
   - Already provided in project

4. **Keep README Updated**
   - Document as you code
   - Include examples and screenshots

5. **Test Before Committing**
   - Ensure code works before pushing
   - Don't commit broken code

---

## 🎓 For the Instructor

This repository contains:
- ✅ Complete CRUD API implementation
- ✅ All required endpoints in `actions/` folder
- ✅ MySQL database integration
- ✅ JSON responses for all operations
- ✅ Comprehensive documentation
- ✅ Testing scripts and examples

Repository structure follows assignment requirements exactly.

---

Need help? Contact your instructor or check the course resources!

**Deadline: Friday, February 13, 2026 (11:59 PM)** ⏰
