# Minimalist Click-to-Mark Calendar

This is a simple, minimalist calendar web application that allows users to mark and unmark days of any month with a single click.

## 🗓️ Features

- Click on any day to **mark** or **unmark** it.
- Marked dates are:
  - **Saved on the server** in a plain text file (`marked_days.txt`).
  - **Displayed in a list** next to the calendar for quick reference.

## 🚀 How to Use

1. Open the webpage in your browser.
2. Click on any day in the calendar:
   - If it’s not marked yet, it will become highlighted.
   - If it’s already marked, it will be unmarked.
3. The list on the right updates automatically to show all currently marked days.
4. Your selections are saved to the server and persist between visits.

## 🛠️ Technical Details

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Data Storage:** Marked dates are stored in a text file (`marked_days.txt`) on the server.

## 📁 File Structure
```
project/
├── index.html        # Main webpage with calendar UI
├── marked_days.txt   # Stores marked dates
├── server.php        # PHP backend script to read/write to marked_days.txt
└── README.md
```

## 💡 Example Use Cases

- Habit tracking
- Attendance marking
- Lightweight journal logging
- Quick personal reminders

---

Feel free to fork or modify this project for your own use.

