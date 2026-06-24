@extends('user.layout')
@section('title', 'About Us')
@section('content') 
<section class="about-Container-con about-team-con">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 order-lg-last">
              <div class="team-img"><img src="{{url('images/file.enc')}}" alt="RK"/></div>
              <div class="postcost-btn"><a href="https://open.spotify.com/show/6FM3uHj2QpEu8rGwzhkMDZ" target="_blank" class="btn btn-info"><img src="{{url('front/images/about/podcast.svg')}}" alt="podcast icon"> Things I didn't learn at<br>Harvard Podcast</a></div>
            </div>
            <div class="col-lg-8">
              <div class="teamabout-con">
                <h2>"RKRaj.in is an open blogging platform where anyone can share thoughts, stories, and ideas — easily create, publish, and share your content with the world."</h2>

                <p>Welcome to rkraj.in, a creative blogging platform by Ramkrishna Shrivas where anyone can write, share ideas, and generate unique content links to reach a wider audience. Whether you're telling stories, sharing knowledge, or expressing opinions — this is your space to be heard.</p>

                <br><br>

                <p>Blogging is a powerful way to share your knowledge, express your ideas, and connect with others. It helps you build your personal brand, improve your writing skills, and reach a global audience. Through blogging, you can inspire, educate, and engage with like-minded people — all while documenting your journey and making your voice heard. Start writing today and let your words make an impact on rkraj.in!</p>
              </div>
            </div>
        </div> 
    </div> 

    <div class="container my-5">
        <h2 class="text-center mb-4">✨ Why Use <strong>rkraj.in</strong> ?</h2>
        
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">🚀 Write Anything, Share with Friends</h5>
                        <p class="card-text">rkraj.in gives you the freedom to write about anything — your thoughts, stories, knowledge, news, or even fun ideas. After writing, simply generate a link and share it with your friends or audience. Anyone can read your blog post through that link.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">🌟 SEO-Friendly – Promote Your Blog</h5>
                        <p class="card-text">You can do your own SEO for every blog post! Customize your blog title, description, and keywords to improve your visibility on Google and search engines. No technical knowledge required — it’s all built-in.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">🎬 Embed YouTube Videos</h5>
                        <p class="card-text">Make your blogs more engaging! You can embed YouTube videos easily inside your blog post — great for tutorials, vlogs, music, or any visual content.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">🆓 100% Free to Use</h5>
                        <p class="card-text">rkraj.in is completely FREE — no hidden charges, no subscription required. Just register, write, and share. That's it!</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">👤 Show Your Name & Profile</h5>
                        <p class="card-text">Your name and profile picture will be visible on every blog post you publish. Build your personal brand and let readers know who you are.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">👀 Track Your Visitors</h5>
                        <p class="card-text">Want to know how many people are reading your posts? You can see visitor count for every blog you publish — track your reach and understand your audience.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <h4>💬 Final Note</h4>
            <p class="lead">rkraj.in is an open platform where <strong>everyone can write and be heard</strong>. Start writing today — your voice matters!</p>
        </div>
    </div>
</section> 
@endsection