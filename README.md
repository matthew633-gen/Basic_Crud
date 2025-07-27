# Gen_Tech Landing Page & Contact System

This project is a modern landing page for Gen_Tech, featuring a responsive portfolio, dark mode, and a contact form that saves messages to a MySQL database.

## Features

- Responsive landing page with hero section and portfolio grid
- Bootstrap 5 styling and custom CSS
- Animated modal contact form
- Contact form data saved to MySQL via PHP ([submit.php](submit.php))
- Success page after form submission ([success.html](success.html))
- Dark mode toggle
- View contacts (link to `view.php`)

## Getting Started

### Prerequisites

- PHP 7.x+
- MySQL server
- Web server (e.g., Apache)

### Setup

1. **Clone or copy the project files** to your web server directory.
2. **Create the database**:

   ```sql
   CREATE DATABASE contact_db;
   USE contact_db;
   CREATE TABLE contact_messages (
     id INT AUTO_INCREMENT PRIMARY KEY,
     name VARCHAR(100) NOT NULL,
     email VARCHAR(100) NOT NULL,
     subject VARCHAR(150) NOT NULL,
     message VARCHAR(500) NOT NULL,
     submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```

3. **Configure database credentials** in [submit.php](submit.php) if needed.

4. **Access the site** via your browser (e.g., `http://localhost/Basic_Crud/index.html`).

## File Structure

- [index.html](index.html): Main landing page
- [style.css](style.css): Custom styles
- [submit.php](submit.php): Handles contact form submissions
- [success.html](success.html): Shown after successful submission
- `cover.jpg`, `covered.jpg`: Images for backgrounds

## Credits

- Bootstrap, Bootstrap Icons, Google Fonts
- Images from Unsplash

---

*For questions or feedback, use the contact form on the site!*
