document.getElementById('searchForm').addEventListener('submit', function(e) {
    e.preventDefault();  // Prevent the form from submitting the traditional way

    const searchQuery = document.getElementById('search').value;
    
    // Check if the search query is not empty
    if (searchQuery.trim() !== "") {
        // Send AJAX request
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'search_result.php?search_query=' + encodeURIComponent(searchQuery), true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Replace the content of #search-results with the response from the server
                document.getElementById('search-results').innerHTML = xhr.responseText;

                // Hide Suzuki and Honda sections
                document.querySelector('.suzuki').style.display = 'none';
                document.querySelector('.honda').style.display = 'none';
            }
        };
        xhr.send();
    }
});
