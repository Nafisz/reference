<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedLevel = $_POST['level'];

    $urls = [
        'kb' => 'https://contoh.link/paud',
        'mas' => 'https://contoh.link/sma'
    ];

    if (array_key_exists($selectedLevel, $urls)) {
        header("Location: " . $urls[$selectedLevel]);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pilih Jenjang Pendidikan</title>
  <link rel="stylesheet" href="style.css" />

  <!-- MathJax untuk render rumus -->
  <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js" async></script>

  <style>
    body {
      margin: 0;
      background: #0d0d0d;
      color: white;
      font-family: sans-serif;
      overflow: hidden;
    }

    .container {
      position: relative;
      z-index: 1;
      padding: 60px 20px;
      text-align: center;
    }

    h2.neon-text {
      font-size: 2.5rem;
      color: #00ffff;
    }

    .level-container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
      margin-top: 40px;
    }

    .level-card {
      background: rgba(0, 255, 255, 0.1);
      border: 1px solid #00ffff;
      border-radius: 10px;
      padding: 20px 30px;
      width: 180px;
      text-align: center;
      cursor: pointer;
      color: #fff;
      transition: background 0.3s, transform 0.3s;
    }

    .level-card:hover {
      background: rgba(0, 255, 255, 0.2);
      transform: translateY(-5px);
    }

    /* Background rumus matematika */
    #math-bg {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      pointer-events: none;
      overflow: hidden;
      z-index: 0;
    }

    .math-item {
      position: absolute;
      font-size: 1.5rem;
      color: rgba(255, 255, 255, 0.97);
      animation: floatUp linear infinite;
      white-space: nowrap;
    }

    @keyframes floatUp {
      0% {
        transform: translate3d(0, 100vh, 0) rotate(0deg);
        opacity: 0;
      }
      10% {
        opacity: 0.3;
      }
      100% {
        transform: translate3d(var(--dx), -120vh, 0) rotate(var(--rot));
        opacity: 0;
      }
    }
  </style>
</head>
<body>
  <!-- Background Math -->
  <div id="math-bg"></div>

  <div class="container">
    <h2 class="neon-text">PILIH JENJANG PENDIDIKAN</h2>
    <p class="font-size"><small>Pendaftaran dibuka untuk tahun ajaran 2025/2026</small></p>
    <form method="post" class="level-container">
      <button type="submit" name="level" value="paud" class="level-card">
        <h3>KB</h3>
        <p>Pendidikan Anak Usia Dini</p>
      </button>
      <button type="submit" name="level" value="sma" class="level-card">
        <h3>MAS</h3>
        <p>Madrasah Aliyah Swasta</p>
      </button>
    </form>
  </div>

  <!-- Script untuk memunculkan rumus -->
  <script>
    const formulas = [
      '\\displaystyle E=mc^2',
      '\\displaystyle a^2 + b^2 = c^2',
      '\\displaystyle \\int_0^\\infty e^{-x} dx = 1',
      '\\displaystyle \\sum_{n=1}^\\infty \\frac{1}{n^2} = \\frac{\\pi^2}{6}',
      '\\displaystyle F = G\\frac{m_1 m_2}{r^2}',
      '\\displaystyle e^{i\\pi} + 1 = 0',
      '\\displaystyle \\lim_{x\\to 0} \\frac{\\sin x}{x} = 1',
      '\\displaystyle \\nabla \\cdot \\vec{E} = \\frac{\\rho}{\\varepsilon_0}'
    ];

    const container = document.getElementById('math-bg');
    const count = 25;

    for (let i = 0; i < count; i++) {
      const span = document.createElement('span');
      span.className = 'math-item';
      const tex = formulas[Math.floor(Math.random() * formulas.length)];
      span.innerHTML = `\\(${tex}\\)`;

      const startX = Math.random() * 100;
      const dx = (Math.random() - 0.5) * 50;
      const duration = 12 + Math.random() * 8;
      const delay = -Math.random() * duration;
      const rot = (Math.random() - 0.5) * 60 + 'deg';

      Object.assign(span.style, {
        left: startX + 'vw',
        animationDuration: duration + 's',
        animationDelay: delay + 's'
      });
      span.style.setProperty('--dx', dx + 'vw');
      span.style.setProperty('--rot', rot);

      container.appendChild(span);
    }

    // Trigger MathJax render
    window.MathJax && MathJax.typesetPromise();
  </script>
</body>
</html>