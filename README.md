MovieLib is a simple web application that allows users to search for movies and TV series using the OMDb API. Users can view detailed information, add selected movies to a personalized recommendations list stored in a local database, and manage this list. The application also displays the Top 10 IMDB rated movies on the front page.

## Features

*   **Movie/Show Search:** Search for movies and TV shows by title and, optionally, by year of release using the OMDb API.
*   **Detailed Information:** View movie details including poster, title, a short plot summary, and release date.
*   **Personalized Recommendations:**
    *   Add movies from search results to a local "recommendations" list.
    *   View all recommended movies in a table format.
    *   Delete movies from the recommendations list with a confirmation.
*   **Top 10 IMDB Movies:** Automatically displays a list of the Top 10 IMDB rated movies on the main page upon loading.
*   **Dynamic UI:** The user interface updates dynamically using jQuery and AJAX for operations like displaying search results and managing the recommendations list without full page reloads.

## Technologies Used

*   **Frontend:** HTML, CSS, JavaScript, jQuery
*   **Backend:** PHP
*   **Database:** MySQL
*   **API:** [OMDb API (Open Movie Database)](http://www.omdbapi.com/)

## Setup and Installation

To run movieLib locally, you will need a web server with PHP support (like Apache from XAMPP, WAMP, or MAMP) and a MySQL database server.

1.  **Clone the Repository:**
    ```bash
    git clone https://github.com/jashshah10/movielib.git
    ```
    Or download the ZIP and extract it.

2.  **Place Files:**
    Move the `movielib` folder (or its contents) into your web server's document root (e.g., `htdocs` for XAMPP, `www` for WAMP/MAMP).

3.  **Database Setup:**
    *   Ensure your MySQL server is running.
    *   Create a new database named `movielib`.
    *   Execute the following SQL query to create the necessary `movie` table:
        ```sql
        CREATE TABLE movielib.movie (
            Title VARCHAR(255) NOT NULL,
            Dateofrelease VARCHAR(255),
            PRIMARY KEY (Title)
        );
        ```
    *   The PHP scripts (`addmovie.php`, `delmovie.php`, `getMovies.php`) are configured to connect to the database with the following credentials:
        *   Server: `localhost`
        *   Username: `root`
        *   Password: `""` (empty)
        *   Database Name: `movielib`
        If your MySQL setup uses different credentials, you will need to update these values in each of the PHP files mentioned.

4.  **OMDb API Key:**
    The application uses a pre-configured API key (`5ac357d8`) in `index.html` for fetching data from OMDb. For personal or extended use, it is highly recommended to obtain your own free API key from [OMDb API Key Page](http://www.omdbapi.com/apikey.aspx). Once you have your key, replace the existing one in the `$.getJSON` call within the `index.html` file:
    ```javascript
    // Locate this line in index.html
    $.getJSON("http://www.omdbapi.com/?t="+ encodeURI(search) +"&y="+  encodeURI(year) +"&apikey=YOUR_NEW_API_KEY").then(function(response){
    // ... and similar lines for topmovies
    });
    ```

## How to Use

1.  Start your web server (e.g., Apache) and MySQL server.
2.  Open your web browser and navigate to the `index.html` file of the project. For example, `http://localhost/movielib/index.html` or `http://localhost/your-path-to-project/index.html`.
3.  **Search for Movies:**
    *   Enter the title of a movie or show in the "SEARCH MOVIES/SHOW" input field.
    *   Optionally, enter the year of release in the "YEAR OF RELEASE" input field for a more specific search.
    *   Click the "GO!" button.
4.  **View Search Results:**
    *   The search result will display below the "Your Search Results Appear Here" section, showing the movie's poster (or a default image if not available), title, plot, and release date.
5.  **Add to Recommendations:**
    *   If you like a movie from the search results, click the "Add movie to recommendation" button.
    *   An alert will confirm if the movie was added successfully. The "List of Recommended Movies" table will update.
6.  **View Recommendations:**
    *   The "List of Recommended Movies" table shows all movies you've added, along with their release dates and an option to delete them.
7.  **Delete from Recommendations:**
    *   In the recommendations table, click the "Delete" button next to the movie you wish to remove.
    *   A confirmation dialog will appear. If confirmed, the movie will be removed from the list and the database.
8.  **Top 10 IMDB Movies:**
    *   Scroll down the page to view the "Top 10 IMDB rating movies" section, which is populated on page load.
