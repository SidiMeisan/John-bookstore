### **Project Name**: Bookstore Popularity Tracker

A simple web application created to assist our client, John Doe, who owns a bookstore business. The main focus of his business is to rent or sell books. John reached out to us with a request to streamline his book collection, enabling him to categorize it based on popularity.

**Client Story**:

John Doe, the owner of a bookstore, has approached us to enhance the management of his book inventory. His primary objective is to organize the collection based on popularity. The goal is to provide a better customer experience by suggesting the best books in the store, considering factors such as the most popular books or authors.

To achieve this, every time a customer visits, John encourages them to give a rating to the book they purchase or borrow. The data collected through these ratings will be used to sort and present the most popular books, helping John offer personalized recommendations to his customers.

The "Bookstore Popularity Tracker" aims to make the process of sorting and recommending books more efficient, enhancing the overall experience for both the bookstore owner and its customers.


## Prerequisites

Make sure you have the following installed:

- [PHP](https://www.php.net/) (>= 8.1)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) (for frontend assets, if applicable)

## Accessing the Application

Ensure you have completed the necessary installation steps before attempting to access the application.

1. **Home Page - List of Books with Filter:**
   - Open your web browser and navigate to [http://localhost/](http://localhost/).
   - This will take you to the home page displaying a list of books with options to apply filters. Make sure to explore the provided filters.

2. **Authors Page - Top 10 Famous Authors:**
   - To view the list of the top 10 famous authors, open your web browser and go to [http://localhost/authors](http://localhost/authors).
   - This page will present you with the list of the top 10 authors, sorted by votes.

3. **Create New Rating - Input Rating:**
   - To submit a new rating for a book, access [http://localhost/ratings/create](http://localhost/ratings/create).
   - This page allows you to input your rating for a specific book.



## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/SidiMeisan/John-bookstore
   
2. Change into the project directory:
   ```bash
   cd John-bookstore

3. Copy the .env.example file to .env:
   ```bash
   cp .env.example .env
   
4. Generate an application key:
   ```bash
   php artisan key:generate

5. Configure your database and other settings in the .env file.
6. Run database migrations and seed:
   ```bash
   php artisan migrate --seed
 
7. Serve your application:
   ```bash
   php artisan serve


