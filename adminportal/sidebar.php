<style>
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        width: 260px;
        background: url("../welcome images/library2.jpg");
        background-size: cover;
        z-index: 100;
        transition: all 0.5s ease;
        border-right: 2px solid white;
    }

    .nav-logo{
        margin-top: 10px;
        margin-left: 25px;
    }
    .nav-logo a:hover{
        text-decoration: none;
        color: white;
    }
    img {
        display: flex;
        width: 65px;
        cursor: pointer;
        padding-right: 10px;
    }

    a {
        display: flex;
        text-decoration: none;
        color: white;
        align-items: center;
    }

    .color {
        color: aqua;
    }

    .sidebar .nav-links {
        height: 100%;
        padding: 15px 0 150px 0;
        overflow: auto;
    }

    .sidebar .nav-links::-webkit-scrollbar {
        display: none;
    }

    .sidebar .nav-links li {
        position: relative;
        list-style: none;
        padding: 4px;
    }

    .sidebar .nav-links li:hover {
        background: #1d1b31;
        border-left: 3px solid #fff;
    }

    .sidebar .nav-links li .iocn-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .sidebar .nav-links li i {
        height: 50px;
        min-width: 78px;
        text-align: center;
        line-height: 50px;
        color: #fff;
        font-size: 20px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .sidebar .nav-links li.showMenu i.arrow {
        transform: rotate(-180deg);
    }

    .sidebar .nav-links li a {
        display: flex;
        align-items: center;
        text-decoration: none;
    }

    .sidebar .nav-links li a .link_name {
        font-size: 18px;
        font-weight: 400;
        color: #fff;
        transition: all 0.4s ease;
    }

    .sidebar .nav-links li .sub-menu {
        padding: 6px 6px 14px 80px;
        margin-top: -10px;
        background: #1d1b31;
        display: none;
    }

    .sidebar .nav-links li.showMenu .sub-menu {
        display: block;
    }

    .sidebar .nav-links li .sub-menu a {
        color: #fff;
        font-size: 15px;
        padding: 5px 0;
        white-space: nowrap;
        opacity: 0.6;
        transition: all 0.3s ease;
    }

    .sidebar .nav-links li .sub-menu a:hover {
        opacity: 1;
    }

    .sidebar.close .nav-links li .sub-menu {
        position: absolute;
        left: 100%;
        top: -10px;
        margin-top: 0;
        padding: 10px 20px;
        border-radius: 0 6px 6px 0;
        opacity: 0;
        display: block;
        pointer-events: none;
    }


    .sidebar .nav-links li .sub-menu .link_name {
        display: none;
    }

    .sidebar .nav-links li .sub-menu.blank {
        opacity: 1;
        pointer-events: auto;
        padding: 3px 20px 6px 16px;
        opacity: 0;
        pointer-events: none;
    }

    .sidebar .nav-links li:hover .sub-menu.blank {
        top: 50%;
        transform: translateY(-50%);
    }

    .sidebar .profile-details {
        position: fixed;
        bottom: 0;
        width: 255px;
        left:0px;
        border-left: 2px solid white;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #1d1b31;
        padding: 12px 0;
        transition: all 0.5s ease;
    }

    .sidebar .profile-details .profile-content {
        display: flex;
        align-items: center;
    }

    .sidebar .profile-details img {
        height: 52px;
        width: 60px;
        padding: 0px 0px;
        object-fit: cover;
        border-radius: 10px;
        margin: 0 0px 0 15px;
        background: #1d1b31;
        border:1px solid white;
        transition: all 0.5s ease;
    }

    .sidebar .profile-details .profile_name,
    .sidebar .profile-details .job {
        color: #fff;
        font-size: 18px;
        font-weight: 500;
        white-space: nowrap;
        margin-left: 15px;
    }

    .sidebar .profile-details .job {
        font-size: 12px;
    }
</style>
<div class="sidebar">
    <div class="nav-logo">
        <span style="color: white; font-size: 25px;"><a class="logo" href="admindashboard.php
                "><img src="../welcome images/lib.png" alt="logo">Digi<span class="color">Library</a></span></span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="admindashboard.php">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="updatebooks.php">
                <i class='bx bx-line-chart'></i>
                <span class="link_name">Issue Book</span>
            </a>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-collection'></i>
                    <span class="link_name">Manage Books</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Manage Books</a></li>
                <li><a href="addbook.php">Add Books</a></li>
                <li><a href="updatebooks.php">View Books</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-book-alt'></i>
                    <span class="link_name">Manage Category</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Manage Category</a></li>
                <li><a href="addcat.php">Add Category</a></li>
                <li><a href="updatecat.php">View Categories</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-book-alt'></i>
                    <span class="link_name">Manage Authors</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Manage Authors</a></li>
                <li><a href="addauthor.php">Add Author</a></li>
                <li><a href="updateauthors.php">View Authors</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-book-alt'></i>
                    <span class="link_name">Manage Racks</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Manage Racks</a></li>
                <li><a href="addrack.php">Add Racks</a></li>
                <li><a href="updaterack.php">View Racks</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-book-alt'></i>
                    <span class="link_name">Manage Publishers</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Manage Publishers</a></li>
                <li><a href="addpub.php">Add Publisher</a></li>
                <li><a href="updatepub.php">View Publishers</a></li>
            </ul>
        </li>
        <li>
            <a href="reqbooks.php">
                <i class='bx bx-compass'></i>
                <span class="link_name">Requested Books</span>
            </a>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-plug'></i>
                    <span class="link_name">Manage Profile</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Manage Profile</a></li>
                <li><a href="viewprofile.php">View Profile</a></li>
                <li><a href="changedetails.php">Change Details</a></li>
            </ul>
        </li>
        <li>
            <div class="profile-details">
                <div class="profile-content">
                    <img src="<?php echo $profile_image;?>" alt="profileImg">
                </div>
                <div class="name-job">
                    <div class="profile_name"><?php echo $_SESSION['name']; ?></div>
                    <div class="job">Welcome! Admin</div>
                </div>
                <a href="logout.php"><i class='bx bx-log-out'></i></a>
            </div>
        </li>
    </ul>
</div>
<script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
        });
    }
</script>