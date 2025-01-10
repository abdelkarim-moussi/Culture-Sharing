<?php
require_once 'Comment.php';

// Database connection
$db = new PDO('mysql:host=localhost;dbname=your_database_name', 'username', 'password');
$comment = new Comment($db);

// Add a new comment
if (isset($_POST['subcommment'])) {
    $articleId = $_POST['articleId'];
    $name = "Anonymous"; // You can replace this with a logged-in user's name
    $commentText = $_POST['comment'];

    if ($comment->addComment($articleId, $name, $commentText)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
    exit();
}

// Fetch comments
if (isset($_GET['fetchComments'])) {
    $articleId = $_GET['articleId'];
    $comments = $comment->getComments($articleId);
    echo json_encode($comments);
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section>
    <!-- Comments form -->
    <form class="text-sm mt-20 border-t py-2" method="post" action="../includes/article.inc.php">
        <label for="comment" class="font-semibold capitalize">Leave a comment</label>
        <textarea name="comment" id="comment" class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
        <input type="hidden" name="articleId" value="<?php echo $article['article_id']; ?>">
        <button type="submit" name="subcommment" class="bg-orange-400 py-2.5 px-4 mt-3 rounded-md text-white">Save comment</button>
    </form>

    <!-- Comments container -->
    <div class="flex flex-col gap-5" id="comments">
        <!-- Comments will be dynamically loaded here -->
    </div>
</section>


<script>

document.addEventListener('DOMContentLoaded', function () {
    const commentForm = document.querySelector('form');
    const commentsContainer = document.getElementById('comments');
    const articleId = document.querySelector('input[name="articleId"]').value;

    // Load comments on page loadt
    loadComments();

    // Handle form submission
    commentForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(commentForm);

        fetch('../includes/article.inc.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                commentForm.reset();
                loadComments();
            } else {
                alert('Error submitting comment.');
            }
        });
    });

    // Function to load comments
    function loadComments() {
        fetch(`../includes/article.inc.php?fetchComments=1&articleId=${articleId}`)
        .then(response => response.json())
        .then(comments => {
            commentsContainer.innerHTML = ''; // Clear existing comments
            comments.forEach(comment => {
                const commentDiv = document.createElement('div');
                commentDiv.className = 'text-sm shadow-md p-3 mt-10 rounded-lg bg-gray-100';
                commentDiv.innerHTML = `
                    <div class="flex flex-col mb-2">
                        <h3 class="font-semibold capitalize">${comment.name}</h3>
                        <h3 class="">${new Date(comment.created_at).toLocaleDateString()}</h3>
                    </div>
                    <p class="text-sm">${comment.comment}</p>
                `;
                commentsContainer.appendChild(commentDiv);
            });
        });
    }
});

</script>

</body>
</html>

