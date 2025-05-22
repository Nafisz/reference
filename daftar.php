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
      background: rgb(3, 3, 3);
      color: white;
      font-family: 'Arial', sans-serif;
      overflow: hidden;
    }

    .container {
      position: relative;
      z-index: 1;
      padding: 60px 20px;
      text-align: center;
    }

    h2.text {
      font-size: 2.5rem;
      color: rgb(252, 252, 252);
      font-weight: 700;
      letter-spacing: 2px;
      margin-bottom: 10px;
    }

    .subtitle {
      font-size: 1rem;
      color: rgba(255, 255, 255, 0.7);
      margin-bottom: 40px;
    }

    .level-container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 40px;
      margin-top: 50px;
    }

    .level-card {
      background: linear-gradient(145deg, rgba(20, 20, 20, 0.95), rgba(40, 40, 40, 0.95));
      border: 2px solid rgba(255, 255, 255, 0.3);
      border-radius: 20px;
      padding: 40px 30px;
      width: 220px;
      height: 180px;
      text-align: center;
      cursor: pointer;
      color: #fff;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      position: relative;
      overflow: hidden;
      backdrop-filter: blur(10px);
      box-shadow: 
        0 8px 32px rgba(0, 0, 0, 0.3),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
    }

    .level-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
      transition: left 0.5s;
    }

    .level-card:hover::before {
      left: 100%;
    }

    .level-card:hover {
      background: linear-gradient(145deg, rgba(30, 30, 30, 0.98), rgba(60, 60, 60, 0.98));
      border: 2px solid rgba(255, 255, 255, 0.6);
      transform: translateY(-10px) scale(1.05);
      box-shadow: 
        0 20px 60px rgba(0, 0, 0, 0.4),
        0 0 30px rgba(255, 255, 255, 0.1),
        inset 0 1px 0 rgba(255, 255, 255, 0.2);
    }

    .level-card h3 {
      font-size: 2.5rem;
      font-weight: 900;
      margin: 0 0 15px 0;
      letter-spacing: 3px;
      background: linear-gradient(135deg, #ffffff, #e0e0e0);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .level-card p {
      font-size: 0.95rem;
      font-weight: 500;
      margin: 0;
      color: rgba(255, 255, 255, 0.8);
      line-height: 1.4;
      letter-spacing: 0.5px;
    }

    .level-card:hover h3 {
      background: linear-gradient(135deg, #ffffff, #f0f0f0);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .level-card:hover p {
      color: rgba(255, 255, 255, 0.95);
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
      font-size: 1.3rem;
      color: rgba(255, 255, 255, 0.95);
      animation: floatUp linear infinite;
      white-space: nowrap;
    }

    @keyframes floatUp {
      0% {
        transform: translate3d(0, 100vh, 0) rotate(0deg);
        opacity: 3;
      }
      10% {
        opacity: 0.2;
      }
      100% {
        transform: translate3d(var(--dx), -120vh, 0) rotate(var(--rot));
        opacity: 3;
      }
    }

    /* Responsive */
    @media (max-width: 768px) {
      .level-container {
        flex-direction: column;
        align-items: center;
        gap: 30px;
      }
      
      .level-card {
        width: 280px;
      }
      
      h2.neon-text {
        font-size: 2rem;
      }
    }
  </style>
</head>
<body>
  <!-- Background Math -->
  <div id="math-bg"></div>

  <div class="container">
    <h2 class="text">PILIH JENJANG PENDIDIKAN</h2>
    <p class="subtitle">Pendaftaran dibuka untuk tahun ajaran 2025/2026</p>
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