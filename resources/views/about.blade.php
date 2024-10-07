@include('layouts.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Social Groups</title>
    <link rel="stylesheet" href="styles/about.css">
</head>
<body>
    <!-- Header Section -->
    <section class="header-section">
        <div class="header-content">
            <h1>Connecting Communities, Amplifying Interests</h1>
            <p>Discover social groups tailored to your passions. Join, engage, and create your own community.</p>
            <a href="#how-it-works" class="cta-button">Explore Groups</a>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="our-story">
        <div class="story-content">
            <img src="images/community.jpg" alt="Community Image">
            <div class="story-text">
                <h2>Our Story</h2>
                <p>Founded with a vision to bring people closer, our platform allows users to explore and connect with social media groups that match their interests. Whether you're passionate about technology, art, fitness, or just looking for like-minded individuals, we make it easy to find your community.</p>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="how-it-works">
        <h2>How It Works</h2>
        <div class="steps">
            <div class="step">
                <span class="step-number">1</span>
                <p>Search groups based on your interests across various platforms.</p>
            </div>
            <div class="step">
                <span class="step-number">2</span>
                <p>Explore group details, including member count and activity level.</p>
            </div>
            <div class="step">
                <span class="step-number">3</span>
                <p>Join the group with a single click.</p>
            </div>
            <div class="step">
                <span class="step-number">4</span>
                <p>Add your own group to expand your community.</p>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-us">
        <h2>Why Choose Us?</h2>
        <div class="features">
            <div class="feature">
                <h3>Wide Range of Interests</h3>
                <p>Find groups from different niches and communities.</p>
            </div>
            <div class="feature">
                <h3>One-Click Joining</h3>
                <p>Quickly join any group with a simple click.</p>
            </div>
            <div class="feature">
                <h3>Free to Use</h3>
                <p>Our platform is 100% free for all users.</p>
            </div>
            <div class="feature">
                <h3>Personalized Recommendations</h3>
                <p>Get suggestions based on your interests.</p>
            </div>
        </div>
    </section>

    <!-- Add Your Group Section -->
    <section class="add-your-group">
        <h2>Have a Group? Add It!</h2>
        <p>Expand your community by adding your group to our platform. Share your group’s mission, attract new members, and grow together.</p>
        <a href="#" class="cta-button">Add Your Group</a>
    </section>
</body>
</html>


@include('layouts.footer')