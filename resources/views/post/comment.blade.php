<script>
    document.querySelectorAll('.comment').forEach((commentButton) => {
        commentButton.addEventListener('click', function() {
            let commentForm = commentButton.closest('.post').querySelector('.comment-form');
            commentForm.classList.toggle('hidden');
        });
    });
</script>
