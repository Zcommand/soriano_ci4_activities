# CodeIgniter 4 Activities
# Submitted by Soriano, John Ronen
# BSIT:WMA/TW33

This repository contains my CodeIgniter 4 laboratory activities and projects developed throughout the semester.

## Activities

### Basic Point-of-Sale System

The `tfa_ci4` project is a basic four-page Point-of-Sale (POS) web application developed using CodeIgniter 4. It demonstrates routing, controllers, views, static PHP arrays, and the MVC architecture.

#### Features

- Landing page
- About page
- Customer Accounts page
- User Accounts page
- Static PHP arrays as temporary data sources
- Navigation between all pages

#### Routes

| Route        | Description                |
| `/`          | Landing page               |
| `/about`     | About page                 |
| `/customers` | Customer account records   |
| `/users`     | User/staff account records |

#### Local Setup

1. Clone this repository.
2. Navigate to the `tfa_ci4` project directory.
3. Install the required dependencies using Composer:
   
   composer install

4. Copy the env file and rename the copy to .env.
5. Configure app.baseURL in .env according to the local environment. For example:
# app.baseURL = 'http://localhost:8888/ci4/tfa_ci4/public/'

# no database used yet as instructed.
## Customer and user/staff records are stored in static PHP arrays inside their respective controllers as temporary data sources.

AI Use Declaration: I used OpenAI's ChatGPT to assist me throughout the development of this activity, particularly for understanding CodeIgniter 4 concepts, troubleshooting errors, and improving the application's structure and interface. I reviewed, implemented, and tested the suggestions provided.