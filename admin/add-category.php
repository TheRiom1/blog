<?php
include 'partials/header.php';
?>

<!-- ======end of nav =====-->
<section class="form_section">
    <div class="container form_section-conainer">
        <h2>Add Category</h2>
        <div class="alert_message error">
            <p>This is an error message</p>
        </div>
        <form action="">
            <input type="text" placeholder="Title">
            <textarea rows="4" placeholder="Description"></textarea>
            <button type="submit" class="btn">Add Category</button>
        
        </form>
    </div>
</section>


<!-- ================= footer ======================== -->
<?php
include '../partials/footer.php';
?>