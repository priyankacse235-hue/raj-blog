<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Invitation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #fdf6f6;
            overflow-x: hidden;
        }

        header {
            position: relative;
            text-align: center;
            color: white;
        }

        header img {
            width: 100%;
            height: 60vh;
            object-fit: cover;
            filter: brightness(0.6);
        }

        header h1 {
            position: absolute;
            top: 30%;
            width: 100%;
            font-size: 3rem;
            font-weight: bold;
        }

        header p {
            position: absolute;
            top: 45%;
            width: 100%;
            font-size: 1.3rem;
        }

        .couple-section img {
            border-radius: 50%;
            width: 180px;
            height: 180px;
            object-fit: cover;
            border: 5px solid white;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
        }

        .wedding-details {
            background: #fff;
            border-radius: 20px;
            padding: 40px;
            margin: 40px auto;
            max-width: 800px;
            text-align: center;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        /* Balloon Animation */
        .balloon {
            position: absolute;
            bottom: -150px;
            width: 60px;
            height: 80px;
            background: red;
            border-radius: 50% 50% 50% 50%;
            animation: float 10s linear infinite;
            z-index: 1;
        }

        .balloon::after {
            content: "";
            position: absolute;
            top: 80px;
            left: 28px;
            width: 2px;
            height: 50px;
            background: gray;
        }

        @keyframes float {
            0% {
                transform: translateX(0) translateY(0);
                opacity: 1;
            }
            50% {
                opacity: 0.7;
            }
            100% {
                transform: translateX(50px) translateY(-800px);
                opacity: 0;
            }
        }

        /* Confetti Canvas */
        canvas.confetti {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            pointer-events: none;
        }
    </style>
</head>

<body>
    <!-- Confetti Canvas -->
    <canvas class="confetti"></canvas>

    <!-- Balloons -->
    <div class="balloon" style="left: 20%; background: pink; animation-delay: 0s;"></div>
    <div class="balloon" style="left: 40%; background: yellow; animation-delay: 2s;"></div>
    <div class="balloon" style="left: 60%; background: lightblue; animation-delay: 4s;"></div>
    <div class="balloon" style="left: 80%; background: lightgreen; animation-delay: 6s;"></div>

    <!-- Hero Section -->
    <header>
        <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e" alt="Wedding">
        <h1>John & Emma</h1>
        <p>We are getting married - 25th December 2025</p>
    </header>

    <!-- Couple Section -->
    <section class="couple-section text-center my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <img src="https://images.unsplash.com/photo-1600566753190-16c2a3e49c07" alt="Groom">
                    <h3 class="mt-3">John</h3>
                </div>
                <div class="col-md-4">
                    <img src="https://images.unsplash.com/photo-1557862921-37829c790f19" alt="Bride">
                    <h3 class="mt-3">Emma</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Wedding Details -->
    <section class="wedding-details">
        <h2>Wedding Ceremony</h2>
        <p class="mt-3">Join us to celebrate our love on <strong>25th December 2025</strong> at</p>
        <p><strong>Rose Garden Banquet Hall, New York</strong></p>
        <a href="#" class="btn btn-danger btn-lg mt-3">RSVP Now</a>
    </section>

    <footer class="text-center py-4">
        <p>Made with ❤️ for our special day</p>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Confetti Animation -->
    <script>
        const canvas = document.querySelector('.confetti');
        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        let confetti = [];

        function randomColor() {
            const colors = ['#ff0a54', '#ff477e', '#ff7096', '#ff85a1', '#fbb1bd', '#f9bec7'];
            return colors[Math.floor(Math.random() * colors.length)];
        }

        function createConfetti() {
            return {
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height - canvas.height,
                r: Math.random() * 6 + 4,
                d: Math.random() * 0.5 + 0.5,
                color: randomColor(),
                tilt: Math.random() * 10 - 10
            };
        }

        for (let i = 0; i < 150; i++) {
            confetti.push(createConfetti());
        }

        function draw() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            confetti.forEach(c => {
                ctx.beginPath();
                ctx.fillStyle = c.color;
                ctx.fillRect(c.x, c.y, c.r, c.r);
            });
            update();
        }

        function update() {
            confetti.forEach(c => {
                c.y += c.d * 3;
                c.x += Math.sin(c.tilt / 10);
                if (c.y > canvas.height) {
                    c.y = -10;
                    c.x = Math.random() * canvas.width;
                }
            });
        }

        function animate() {
            draw();
            requestAnimationFrame(animate);
        }
        animate();
    </script>
</body>

</html>
