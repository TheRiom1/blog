<?php
include 'partials/header.php';
?>
<section class="form_section">
    <div class="container form_section-conainer">
        <h2>Update User</h2>
        <form action="" enctype="multipart/form-data">
            <input type="text" placeholder="First Name">
            <input type="text" placeholder="Last Name">
            <select>
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>

            <button type="submit" class="btn">Update User</button>
            
        </form>
    </div>
</section>


<?php
include '../partials/footer.php';
?>