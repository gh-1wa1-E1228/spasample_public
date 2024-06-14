<template>
    <!--
    <p>
        <strong>Current route path:</strong>{{ $route.fullPath }}
    </p>
    -->

    <header class="p-3 text-bg-dark">
        <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <i class="bi bi-journals" style="font-size: 2rem; color: #fff;"></i>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><router-link class="text-white nav-link px-2 text-secondar" to="/vuejs">Article</router-link></li>
                <li><router-link class="text-white nav-link px-2 text-secondar" to="/vuejs/todo">ToDo</router-link></li>
            </ul>
            <strong>{{ $route.fullPath }}</strong>
        </div>
        </div>
    </header>
    <main>
        <router-view/>
    </main>
</template>