<?php
include 'partials/header.php';
?>

<section class="dashboard">
<div class="container dashboard_container">
        <button id="hide_sidebar-btn" class="sidebar_toggle"><i class="uil uil-angle-right-b"></i></button>
</button>
<button id="hide_sidebar-btn" class="sidebar_toggle"><i class="uil uil-angle-left-b"></i></button>
        <aside>
            <ul>
                <li><a href="add-post.php"><i class="uil uil-pen"></i>
            <h5>Add post</h5>
            </a></li>
            </ul>
            <ul>
                <li><a href="index.php"><i class="uil uil-pen"></i>
                <h5>Manage post</h5>
            </a></li>
            </ul>
            <ul>
                <li><a href="add-user.php"><i class="uil uil-users-alt"></i>
                <h5>Add user</h5>
            </a></li>
            </ul>
            <ul>
                <li><a href="manage-users.php"><i class="uil uil-pen"></i>
                <h5>Manage user</h5>
            </a></li>
            </ul>
            <ul>
                <li><a href="add-category.php"><i class="uil uil-edit"></i>
                <h5>Add category</h5>
            </a></li>
            </ul>
            <ul>
                <li><a href="manage-categories.php" class="active"><i class="uil uil-list-ul"></i>
                <h5>Manage categories</h5>
            </a></li>
            </ul>
        </aside>
        <main>
        <h2>Manage Users</h2>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
            </table>
            
        </main>
    </div>
</section>

<?php
include '../partials/footer.php';
?>