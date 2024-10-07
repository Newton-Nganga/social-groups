@include('layouts.header')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Group</title>
    <link rel="stylesheet" href="styles/styles.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            padding: 2rem;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .form-container:hover {
            transform: scale(1.01);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #00BFFF;
            font-size: 1.8rem; /* Increased size for better visibility */
            font-weight: 600;  /* Bold font weight */
        }

        .form-container form {
            display: flex;
            flex-direction: column;
        }

        .form-container label {
            font-size: 1rem;
            margin-bottom: 0.5rem;
            color: #333; /* Darker color for better contrast */
        }

        .form-container input, 
        .form-container textarea, 
        .form-container select {
            padding: 0.75rem;
            margin-bottom: 1.5rem; /* Increased margin for spacing */
            border: 1px solid #ddd;
            border-radius: 5px; /* Slightly rounded corners */
            font-size: 1rem;
            transition: border-color 0.3s; /* Smooth transition */
        }

        .form-container input:focus,
        .form-container textarea:focus {
            border-color: #00BFFF; /* Highlighted border on focus */
            outline: none; /* Remove default outline */
        }

        .form-container button {
            padding: 0.75rem;
            background-color: #00BFFF;
            color: white;
            border: none;
            border-radius: 5px; /* Rounded corners */
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s, transform 0.2s; /* Smooth transitions */
        }

        .form-container button:hover {
            background-color: #007acc; /* Darker color on hover */
            transform: translateY(-2px); /* Slight lift on hover */
        }

        .form-container .back-btn {
            display: block;
            margin-top: 1rem;
            text-align: center;
            color: #00BFFF;
            text-decoration: none;
            font-weight: 500; /* Slightly bolder text */
        }

        .form-container .back-btn:hover {
            text-decoration: underline; /* Underline effect on hover */
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add Your Group</h2>
        <form action="{{ route('groups.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="group_image">Group Image</label>
            <input type="file" id="group_image" name="group_image" accept="image/*" required>

            <label for="description">Group Description</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <label for="location">Location</label>
            <input type="text" id="location" name="location" required>

            <button type="submit">Submit Group</button>
        </form>

        <a href="{{ route('home') }}" class="back-btn">Go Back</a>
    </div>

    <!-- Include CKEditor CDN -->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <!-- Initialize CKEditor -->
    <script>
        CKEDITOR.replace('description', {
            toolbar: [
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
                { name: 'paragraph', items: ['NumberedList', 'BulletedList'] },
                { name: 'links', items: ['Link', 'Unlink'] },
                { name: 'insert', items: ['Image', 'Table', 'HorizontalRule'] }
            ]
        });
    </script>
@include('layouts.footer')
