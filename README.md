
![biteconnect-high-resolution-logo](https://github.com/mn29983/BiteConnect/assets/148076319/d712018d-5b40-4147-abe4-f2abf8d5cd16)

<a name="readme-top"></a>
<div align="center">
  <h3 align="center">Bite Connect</h3>

  <p align="center">
    A web page for ordering food from restaurants
  </p>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#license">License</a></li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->
## About The Project

### Built With

* [Laravel PHP](https://laravel.com/): A powerful PHP web application framework.

<!-- GETTING STARTED -->
## Getting Started

This section will guide users on how to set up and run your Bite Connect system locally.

### Prerequisites
* Visual Studio Code
* PHP
* XAMPP
* Composer
* MySql

### Installation

* Download the project
* Open a terminal
* Navigate to the project directory
* Run the following commands:
  ```sh
  composer install
  cp .env.example .env
  php artisan key:generate
  ```
* Configure the database connection in the .env file with your MySQL credentials.
  ```sh
  php artisn migrate
  php artisan db:seed
  ```

  <p align="right">(<a href="#readme-top">back to top</a>)</p>
<!-- USAGE -->
## Usage

Welcome to Bite Connect - Your Ultimate Food Ordering Platform!

### Admin Panel

* When loggin in with admin account will redirect to the dashboard.

#### Creating a New Restaurant
1. In the Navigation bar, click on the "Restaurants" option.
2. Click on the "Create New Restaurant" button.
3. Fill in the required details such as Restaurant Name, Description, Location, Cost and Upload an image.
4. Click the "Create Restaurant" button to create a new Restaurant.

#### Editing/Updating a Restaurant
1. In the Navigation bar, click on the "Restaurants" option.
2. Locate the Restaurant you want to edit and click on the "Edit" option.
3. Update the necessary information and click "Update Restaurant" to apply the changes.

#### Deleting a Restaurant
1. In the Navigation bar, click on the "Restaurants" option.
2. Find the Restaurant you wish to delete and click on the "Delete" option.

#### View All Orders
1. In the Navigation bar, click on the "Orders" option.
2. It will display all Orers made by the users.

#### Users
1. In the Navigation bar, click on the "Users" option.
2. It will display all users that have made an account.
   - Find the user you wish to delete and click on the "Delete" option.
   - Find the user you wish to edit the user infromation and click on the "Edit" option
   - Find the user you wish to view his infromation and click on the "View" option.

#### Going to the User Site
1. In the Navigation bar on the left sie, click on the "User Site" option.
2. It will redirect you to the User site.

### User Panel

#### Viewing Restaurants and Food Categories
1. In the Navigation bar, click on the "Restaurants" option.
2. It will show all available Restaurants and Food Categories.

#### Viewing the Menu
1. Follow the previous steps.
2. Locate the Restaurant you want to view and click on in.

#### Adding to cart
1. Follow the previous steps.
2. Click on the "Plus".
3. It will be added to the cart.

#### Checking out
1. Follow the previous steps.
2. And on the right side of the menu you will the cart
3. Click on the "Checkout" to continue making the order
4. Fill in the required details such as Delivery infromation and Payment Details.
5. Click on the "Place Order" to make the order.

## Additional Notes

- Ensure proper authentication and authorization when accessing the Admin Panel.
- For security reasons, regular users are not granted access to administrative functionalities.

Feel free to explore and use the various features available in the Bite Connect website. If you encounter any issues, please don't hesitate to report the bug.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE.txt` for more information.
