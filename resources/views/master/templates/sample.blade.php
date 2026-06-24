<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Happy Anniversary</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Roboto&display=swap" rel="stylesheet" />
  <style>
    body {
      background-color: #3b2f2f;
      color: #fff;
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 20px;
    }

    .template-wrapper {
      max-width: 600px;
      margin: auto;
      background: #3b2f2f;
      border-radius: 20px;
      overflow: hidden;
      padding: 20px;
      position: relative;
    }

    .polaroid {
      background: white;
      padding: 10px 10px 20px;
      width: 150px;
      box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
      margin: 10px;
      transform: rotate(-3deg);
    }

    .polaroid img {
      width: 100%;
      height: auto;
      display: block;
    }

    .polaroid:nth-child(2) {
      transform: rotate(3deg);
    }

    .polaroid:nth-child(3) {
      transform: rotate(-5deg);
    }

    .polaroid:nth-child(4) {
      transform: rotate(2deg);
    }

    .photos {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .message {
      text-align: center;
      margin-top: 30px;
    }

    .message h1 {
      font-family: 'Great Vibes', cursive;
      font-size: 48px;
      color: #fff;
    }

    .message p {
      font-size: 16px;
      color: #e0e0e0;
      margin-top: 10px;
    }

    .flowers {
      position: absolute;
      bottom: -20px;
      left: 20px;
      right: 20px;
      display: flex;
      justify-content: space-between;
      pointer-events: none;
    }

    .flowers img {
      width: 60px;
      height: auto;
      opacity: 0.8;
    }

    @media (max-width: 576px) {
      .polaroid {
        width: 100px;
      }

      .message h1 {
        font-size: 36px;
      }
    }
  </style>
</head>
<body>
  <div class="template-wrapper">
    <div class="photos">
      <div class="polaroid"><img src="https://via.placeholder.com/150x200?text=Photo+1" alt="Photo 1" /></div>
      <div class="polaroid"><img src="https://via.placeholder.com/150x200?text=Photo+2" alt="Photo 2" /></div>
      <div class="polaroid"><img src="https://via.placeholder.com/150x200?text=Photo+3" alt="Photo 3" /></div>
      <div class="polaroid"><img src="https://via.placeholder.com/150x200?text=Photo+4" alt="Photo 4" /></div>
    </div>

    <div class="message">
      <h1>Happy Anniversary</h1>
      <p>
        Here's to celebrating the love, laughter, and beautiful moments we've shared.  
        I cherish every moment with you.
      </p>
    </div>

    <div class="flowers">
      <img src="https://cdn-icons-png.flaticon.com/512/744/744922.png" alt="Flower Left" />
      <img src="https://cdn-icons-png.flaticon.com/512/744/744922.png" style="transform: scaleX(-1);" alt="Flower Right" />
    </div>
  </div>
</body>
</html>
