# Ontario Trail Network Project

This project is a web application for managing and displaying trails from the Ontario Trail Network. The application features user interaction with trail data, including search functionality, map displays, and activity icons using leaflet.js and Font Awesome.

## Features

- Display list of trails with detailed information
- Interactive map showing trail locations using Leaflet.js
- Search functionality to find trails by name
- Activity icons displayed for trails based on permitted uses
- CRUD operations for trail data

## Getting Started

Follow these instructions to set up the project on your local environment, or deploy it using InfinityFree.

### Prerequisites

- PHP 7.x or above
- MySQL Database
- A modern web browser
- Internet connection for accessing Leaflet and Font Awesome CDNs

### Project Structure

/ontarioTrail
  ├── index.php
  ├── add.php
  ├── updateTrail.php
  ├── reusable/
  │   ├── nav.php
  │   └── connect.php
  ├── inc/
  │   ├── addTrail.php
  │   ├── deleteScript.php
  │   └── updateScript.php
  ├── DATA/
  │   └── coordinates.csv
  ├── assets/
  │   ├── style.css
  └── README.md
