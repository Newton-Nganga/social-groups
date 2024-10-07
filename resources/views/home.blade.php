@include('layouts.header')

<main>
    <section class="hero">
        <h1>WhatsApp, Facebook & Telegram Group Links</h1>
        <div class="search-bar-container">
            <div class="search-bar">
                <input type="text" placeholder="Search groups">
                <button type="submit">Search</button>
            </div>
        </div>
    </section>

    <section class="categories">
        <h2>Popular Categories</h2>
        <div class="category-links">
            <a href="#">Android</a>
            <a href="#">laravel</a>
            <a href="#">python</a>
            <a href="#">ios</a>
            <a href="#">java</a>
            <a href="#">Kotlin</a>
            <a href="#">C#</a>
            <a href="#">javascript</a>
            <a href="#">node</a>
            <a href="#">golang</a>
            <a href="#">Make Money</a>
            <a href="#">Regional</a>
        </div>
    </section>

    <section class="whatsapp-groups">
        <h2 class="head-text">WhatsApp Groups</h2>
        <div class="group-cards">

            <div class="group-card" id="group-card">
                <img src="/images/group1.jpg" alt="Group 1">
                <a href="#">American Hot Couple </a>
                <p>Category: Dating</p>
                <button class="join-btn">Join Group</button>
            </div>
            <div class="group-card" id="group-card">
                <img src="/images/group1.jpg" alt="Group 1">
                <a href="#">American Hot Couple </a>
                <p>Category: Dating</p>
                <button class="join-btn">Join Group</button>
            </div>
            <div class="group-card" id="group-card">
                <img src="/images/group1.jpg" alt="Group 1">
                <a href="#">American Hot Couple </a>
                <p>Category: Dating</p>
                <button class="join-btn">Join Group</button>
            </div>
            <div class="group-card" id="group-card">
                <img src="/images/group1.jpg" alt="Group 1">
                <a href="#">American Hot Couple </a>
                <p>Category: Dating</p>
                <button class="join-btn">Join Group</button>
            </div>
        </div>
        <button class="view-all-btn">View All WhatsApp Groups</button>
    </section>

    <!--  section facebook      -->
    <section class="facebook-groups">
        <h2 class="head-text">Facebook Page</h2>
        <div class="group-cards">

            <div class="group-card" id="group-card">
                <img src="/images/group1.jpg" alt="Group 1">
                <a href="#">American Hot Couple </a>
                <p>Category: Dating</p>
                <button class="fbjoin-btn">Join Group</button>
            </div>

            <div class="group-card" id="group-card">
                <img src="/images/group1.jpg" alt="Group 1">
                <a href="#">American Hot Couple </a>
                <p>Category: Dating</p>
                <button class="fbjoin-btn">Join Group</button>
            </div>
            <div class="group-card" id="group-card">
                <img src="/images/group1.jpg" alt="Group 1">
                <a href="#">American Hot Couple </a>
                <p>Category: Dating</p>
                <button class="fbjoin-btn">Join Group</button>
            </div>
            <div class="group-card" id="group-card">
                <img src="/images/group1.jpg" alt="Group 1">
                <a href="#">American Hot Couple </a>
                <p>Category: Dating</p>
                <button class="fbjoin-btn">Join Group</button>
            </div>
        </div>
        <button class="fbview-all-btn">View All Facebook Groups</button>
    </section>



    @include('layouts.footer')

</main>
</body>

</html>
