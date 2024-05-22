<?php



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=0.8, zoom=10%, width=device-width, target-densitydpi=high-dpi">
    <title>Inventory Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;100&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <style>
        body {
            background-color: #f4f6f9;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: white;
        }

        form a {
            text-decoration: underline;
        }

        .form-style {
            width: 500px;
        }

        .carousel {
            margin-top: 76px;
        }

        .carousel img {
            filter: brightness(50%);
        }

        ul,
        li {
            list-style-type: none;
            padding-left: 0;
        }

        .menu-icon {
            margin-left: 260px !important;
            cursor: pointer;
            font-size: 25px;
            transition: margin-left 0.3s ease-in-out;
        }

        .menu-icon-slide {
            margin-left: 75px !important;
            cursor: pointer;
            font-size: 25px;
        }

        .sidebar {
            width: 250px;
            height: 100%;
            background-color: white;
            position: fixed;
            z-index: 10000;
            left: 0;
            top: 0;
            transition: transform 0.3s ease-in-out;
        }

        .sidebar-slide {
            transform: translateX(-70%);
        }

        .body-content {
            margin-left: 270px;
            margin-right: 20px;
            margin-top: 100px;
            margin-bottom: 70px;
            transition: margin-left 0.3s ease-in-out;
        }

        .body-content-slide {
            margin-left: 90px;
            transition: margin-left 0.3s ease-in-out;
        }

        .sidebar-links {
            margin-top: 20px;
        }

        .sidebar li {
            display: flex;
            align-items: center;
        }

        .sidebar li a {
            padding: 15px;
            padding-left: 20px;
            display: flex;
            align-items: center;
            width: 100%;
            font-size: 18px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .sidebar li a:hover {
            color: white;
            background-color: #1976D2;
        }

        .sidebar li a i {
            font-size: 20px;
            margin-top: -3px;
            margin-right: 10px;
        }

        .sidebar-logo {
            width: 150px;
            margin: 25px 0px 0px 40px;
        }

        .sidebar-logo-slide {
            width: 50px;
            margin: 25px 0px 70px 40px;
            margin-left: 187px;
        }

        a {
            text-decoration: none;
        }

        .profile-image {
            border: 3px solid #1976D2;
            border-radius: 50%;
            width: 150px;
            height: 150px;
            display: block;
            margin: auto;
        }

        .btn-primary {
            background-color: #212529;
            border-color: #212529;
            color: white;
            outline: none;
        }

        .btn-primary:hover {
            background-color: #36454F;
            border-color: #36454F;
            color: white;
        }

        .btn-primary:active {
            background-color: #36454F !important;
            border-color: #36454F !important;
            color: white !important;
        }

        a {
            color: #212529;
        }

        .flex-items1 {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .flex-items {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .inner-footer {
            display: flex;
            justify-content: space-between;
        }

        .flex-items1 .content1 {
            margin-left: 30px;
            text-align: justify;
        }

        .flex-items .content {
            margin-right: 30px;
            text-align: justify;
        }

        .dropdown-menu {
            width: 50px !important;
            --bs-dropdown-min-width: 8rem;
        }

        .table {
            width: 100%;
        }

        @media screen and (max-width: 1000px) {
            .table-responsive {
                width: 100%;
            }

            .table {
                width: 1000px;
                overflow-x: scroll;
            }
        }
    </style>
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg py-3 fixed-top shadow">
        <div class="container-fluid">
            <div class="menu-icon" onclick="toggleSidebar()">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 8 8">
                    <path fill="currentColor" d="M0 1v1h8V1zm0 2.97v1h8v-1zm0 3v1h8v-1z" />
                </svg>
            </div>
            <!-- navbar links -->
            <div class="justify-content-end align-center" id="main-nav">
                <div class="btn-group">
                    <span type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="images/profileimg.svg" alt="" width="50px" class="me-3"><span>Admin</span>
                    </span>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="profile">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="body-content">
        <div class="profile-left"><?php include('./partials/sidebar.php') ?></div>
        <script>
            const sidebar = document.querySelector('.sidebar');

            function toggleSidebar() {
                const bodyContent = document.querySelector('.body-content');
                const menuIcon = document.querySelector('.menu-icon');
                const links = document.querySelectorAll('.a');
                const linkIcons = document.querySelectorAll('.sidebar i');
                const sidebarLogo = document.querySelector('.sidebar-logo');

                if (sidebar.classList.contains('sidebar-slide')) {
                    sidebar.classList.remove('sidebar-slide');
                    bodyContent.classList.remove('body-content-slide');
                    menuIcon.classList.remove('menu-icon-slide');
                    sidebarLogo.classList.remove('sidebar-logo-slide');
                    for (let i = 0; i < links.length; i++) {
                        links[i].style.display = 'block';
                    }
                    for (let i = 0; i < linkIcons.length; i++) {
                        linkIcons[i].style.marginLeft = '0px';
                    }
                } else {
                    sidebar.classList.add('sidebar-slide');
                    bodyContent.classList.add('body-content-slide');
                    menuIcon.classList.add('menu-icon-slide');
                    sidebarLogo.classList.add('sidebar-logo-slide');
                    for (let i = 0; i < links.length; i++) {
                        links[i].style.display = 'none';
                    }
                    for (let i = 0; i < linkIcons.length; i++) {
                        linkIcons[i].style.marginLeft = '180px';
                    }
                }
            }

            function toggleSidebarWhenSmall() {
                if (sidebar.offsetWidth < 200) {
                    if (!sidebar.classList.contains('sidebar-slide')) {
                        toggleSidebar();
                    }
                } else {
                    if (sidebar.classList.contains('sidebar-slide')) {
                        toggleSidebar();
                    }
                }
            }
        </script>