<nav class="px-3 navbar navbar-expand-md navbar-dark sticky-top" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand fs-3" href="/">Fantastic Book</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link fs-5 self-nav-link" href="/profile/<?= $data['userId'] ?>" id="profile-link">個人頁面</a>
                </li>
            </ul>
            <ul class="navbar-nav my-2 my-lg-0 navbar-nav-scroll">
                <li class="nav-item">
                    <a class="nav-link fs-5 self-nav-link" aria-current="page" href="/doSignOut">登出</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
