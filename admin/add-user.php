<?php
include 'partials/header.php';
?>

<!-- ======end of nav =====-->
<section class="form_section">
    <div class="container form_section-conainer">
        <h2>Add User</h2>
        <div class="alert_message error">
            <p>This is an error message</p>
        </div>
        <form action="" enctype="multipart/form-data">
            <input type="text" placeholder="First Name">
            <input type="text" placeholder="Last Name">
            <input type="text" placeholder="Userame">
            <input type="email" placeholder="Email">
            <input type="password" placeholder="Create Password">
            <input type="password" placeholder="Confirm Password">
            <select>
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>
            <div class="form_control">
                <label for="avatar">User Avatar</label>
                <input type="file" id="avatar">
            </div>
            <button type="submit" class="btn">Add User</button>
            
        </form>
    </div>
</section>


<!-- ================= footer ======================== -->

<?php
include '../partials/footer.php';
?>