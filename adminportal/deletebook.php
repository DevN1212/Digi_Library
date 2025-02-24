<?php
// Place your PHP code here
if (isset($_GET['bid'])) {
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'lms');
    $book_id = $_GET['bid'];

    // Check if the book is issued
    $check_query = "SELECT COUNT(*) AS total_issues FROM issued_books WHERE book_id = $book_id";
    $check_result = mysqli_query($connection, $check_query);
    $row = mysqli_fetch_assoc($check_result);
    $total_issues = $row['total_issues'];

    if ($total_issues > 0) {
        // Book is issued, so display an alert and redirect
        echo '<script>alert("Book has been issued! Cannot delete it."); window.location.href = "updatebooks.php";</script>';
        
    } else {
        // Book is not issued, proceed with deletion
        $query = "DELETE FROM books WHERE book_id = $book_id";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            // Book deleted successfully
            echo '<script>alert("Book deleted successfully!"); window.location.href = "updatebooks.php";</script>';
        }
    }
}
?>
