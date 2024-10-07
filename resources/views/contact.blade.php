@include('layouts.header')


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Social Groups</title>
    <link rel="stylesheet" href="styles/contact.css">
</head>
<body>
    <!-- Contact Us Header Section -->
    <section class="contact-header-section">
        <div class="contact-header-content">
            <h1>Get in Touch with Us</h1>
            <p>We’d love to hear from you! Whether you have a question, feedback, or just want to say hello, feel free to reach out.</p>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form-section">
        <div class="contact-form-container">
            <h2>Contact Us</h2>
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="Enter subject" required>
                </div>

                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea id="message" name="message" rows="6" placeholder="Type your message here..." required></textarea>
                </div>

                <button type="submit" class="cta-button">Send Message</button>
            </form>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="contact-info-section">
        <h2>Our Contact Information</h2>
        <div class="contact-info">
            <div class="info-item">
                <h3>Email Us</h3>
                <p>support@socialgroups.com</p>
            </div>
            <div class="info-item">
                <h3>Call Us</h3>
                <p>+1 (555) 123-4567</p>
            </div>
            <div class="info-item">
                <h3>Visit Us</h3>
                <p>123 Social Lane, Community City, USA</p>
            </div>
        </div>
    </section>



@include('layouts.footer')