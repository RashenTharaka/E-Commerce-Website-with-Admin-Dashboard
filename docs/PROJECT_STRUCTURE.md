# SuperLand Project Structure

```text
SuperLand/
├── admin/                  # Admin dashboard pages and admin actions
├── customer/               # Customer website pages and customer actions
├── config/                 # Database connection file
├── assets/                 # Static assets
│   ├── css/                # Stylesheets
│   ├── js/                 # JavaScript files
│   └── images/             # Project images
│       ├── products/       # Product images used by database/product pages
│       ├── categories/     # Category images
│       ├── dashboard/      # Admin dashboard images/icons
│       └── users/          # User/default image assets
├── uploads/                # Runtime upload folders
│   ├── products/           # Product images uploaded through the system
│   └── users/              # User profile images uploaded through the system
├── database/               # SQL database import file
├── docs/                   # User installation and project documentation
├── index.php               # Main website landing page
├── about.php               # About page
├── contact.php             # Contact page
├── terms.php               # Terms page
├── README.md               # Main project documentation
└── .gitignore              # Files ignored by Git
```

## Main Files

- `index.php` - Main customer landing page
- `config/db.php` - Database connection settings
- `database/superland_db.sql` - Database import file
- `admin/AdminDashboard.php` - Admin login/dashboard entry page
- `customer/Login.php` - Customer login page
- `customer/cart.php` - Cart page
- `customer/checkout.php` - Checkout page
- `customer/Profile.php` - Customer profile page

## Do Not Rename Without Updating Code

Avoid renaming these folders unless the code and database paths are updated:

```text
admin/
customer/
assets/
uploads/
database/
config/
```
