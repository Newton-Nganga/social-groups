<!-- @extends('layouts.header')

@section('content')
    <h1>Scripts</h1>
    <ul>
        @foreach($scripts as $script)
            <li>
                <strong>{{ $script->title }}</strong>
                <p>{{ $script->description }}</p>
                <a href="{{ $script->script_url }}" target="_blank">View Script</a>
            </li>
        @endforeach
    </ul>
@endsection -->
@include('layouts.header')


      <section class="hero">
            <h1>WhatsApp, Facebook & Telegram Group Links</h1>
            <div class="search-bar">
                <input type="text" placeholder="Search groups">
                <button type="submit">Search</button>
            </div>
        </section>

        <section class="whatsapp-groups">
            <h2>WhatsApp Groups</h2>
            <div class="group-cards">
                <div class="group-card">
                    <img src="group1.jpg" alt="Group 1">
                    <a href="#">American Hot Couple WhatsApp Group</a>
                    <p>Category: Dating</p>
                    <button class="join-btn">Join Group</button>
                </div>
                <div class="group-card">
                    <img src="group2.jpg" alt="Group 2">
                    <a href="#">All American Friends WhatsApp Group</a>
                    <p>Category: Dating</p>
                    <button class="join-btn">Join Group</button>
                </div>
                <div class="group-card">
                    <img src="group3.jpg" alt="Group 3">
                    <a href="#">Dating in America WhatsApp Group</a>
                    <p>Category: Dating</p>
                    <button class="join-btn">Join Group</button>
                </div>
                <div class="group-card">
                    <img src="group4.jpg" alt="Group 4">
                    <a href="#">Girls in United Kingdom WhatsApp Group</a>
                    <p>Category: Dating</p>
                    <button class="join-btn">Join Group</button>
                </div>
            </div>
            <button class="view-all-btn">View All WhatsApp Groups</button>
        </section>



@include('layouts.footer')