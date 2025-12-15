# Master Prompt: Premium School Library System (PHP MVC)

**Role:** You are an expert Full Stack Developer specializing in PHP Native, MVC Architecture, and Modern UI/UX Design (Tailwind CSS + Alpine.js).

**Objective:** Build a complete, premium-quality **School Library Management System** from scratch. The system must be secure, fast, and visually stunning, matching top-tier SaaS aesthetics.

## 1. Technical Stack & Architecture
*   **Backend:** Native PHP (No frameworks like Laravel/CI).
*   **Architecture:** Custom **MVC (Model-View-Controller)** pattern.
    *   `App.php`: Main router.
    *   `Controller.php`: Base controller.
    *   `Database.php`: PDO Wrapper for MySQL.
*   **Frontend:**
    *   **Styling:** Tailwind CSS (via CDN).
    *   **Interactivity:** Alpine.js (via CDN) for modals, dropdowns, and toggles.
    *   **Animations:** AOS (Animate On Scroll) and custom CSS keyframes.
*   **Database:** MySQL.
*   **Font:** 'Plus Jakarta Sans' or 'Inter'.

## 2. Core Features (CRUD & Logic)
1.  **Authentication:**
    *   Secure Login/Logout for Admins (Use `password_verify`).
    *   Session management.
2.  **Dashboard:**
    *   Display real-time stats: Total Books, Active Members, Active Loans.
    *   Show "Recent Transactions" table (Limit 5).
    *   Schedule/Notes widgets.
3.  **Book Management:**
    *   CRUD (Create, Read, Update, Delete).
    *   Fields: Title, Author, Publisher, Year, Stock, Cover Image (Upload).
4.  **Member Management:**
    *   CRUD.
    *   Fields: NIS/NIP, Name, Class/Dept, Phone.
5.  **Loan Management (Transactions):**
    *   Record Book Loans (Member + Book selection).
    *   **Automatic Fine Calculation:** Implement a fine of **Rp 5.000/day** if returned after the due date.
    *   Status tracking: "Borrowed" vs "Returned".
6.  **Calendar System:**
    *   Custom Monthly View (CSS Grid).
    *   Show Loans as "Events" on the calendar (Start Date to Due Date).
    *   **Interactive Modal:** Clicking an event opens a popup with Member & Book details.
    *   Month Navigation (Next/Prev).

## 3. UI/UX Design Requirements (Premium Aesthetic)
*   **Design Philosophy:** Clean, modern, vibrant, and spacious. Reference "Mondays.com" or "SmartNurse" UI.
*   **Dashboard Layout:**
    *   **Sidebar:** collapsible (toggle to icon-only mode) with smooth transitions and tooltips.
    *   **Header:** Search bar, User profile, Notifications.
    *   **Cards:** Soft shadows, rounded corners (`rounded-2xl`), subtle hover effects.
*   **Landing Page (Public):**
    *   **Hero Section:** 3D-style "Floating Book" card, background blobs, parallax effects.
    *   **Features:** Grid layout with modern icons.
    *   **Live Catalog:** Fetch and display the latest books from the database.
    *   **Animations:** Infinite Marquee for categories, AOS fade-ins for all sections.
*   **Responsiveness:** Fully responsive on Mobile, Tablet, and Desktop.

## 4. Deliverables
1.  **Project Structure:**  
    The project follows a strict custom MVC directory structure to ensure separation of concerns and security.
    ```
    /library_project
    ├── /app                # Application Core & Logic
    │   ├── /config         # Config.php (DB Creds, Base URL)
    │   ├── /controllers    # Controllers (Home, Auth, Dashboard, Book, etc.)
    │   ├── /core           # App.php (Router), Controller.php (Base), Database.php
    │   ├── /models         # Models (User, BookModel, MemberModel, LoanModel)
    │   └── /views          # Views (templates/, auth/, admin/, landing/)
    ├── /public             # Publicly accessible files
    │   ├── /css            # Custom CSS
    │   ├── /js             # Custom JS
    │   ├── /uploads        # Book cover images
    │   ├── .htaccess       # Rewrite rules to route everything to index.php
    │   └── index.php       # Main Entry Point (Bootstrapper)
    └── /assets             # SQL dumps, raw design assets
    ```
2.  **Database Schema:** A `database.sql` file.
3.  **Code:** Fully commented, modular, and secure PHP code.

**Constraint:** Do not use any external PHP libraries (Composer packages) unless absolutely necessary. Keep it lightweight and native.