
    window.addEventListener('scroll', () => {
      const scrollPosition = window.pageYOffset;
      const leftElement = document.getElementById('left');
      const rightElement = document.getElementById('right');

      leftElement.style.transform = `translateX(-${scrollPosition * 0.5}px)`;
      rightElement.style.transform = `translateX(${scrollPosition * 0.5}px)`;

      const opacity = 1 - scrollPosition / 500;
      document.querySelector('.split-text').style.opacity = opacity;
    });

    // Background parallax
    document.addEventListener('mousemove', (e) => {
      const x = e.clientX / window.innerWidth;
      const y = e.clientY / window.innerHeight;

      document.querySelector('.background').style.transform =
        `translate(-${x * 10}px, -${y * 10}px)`;
    });

    // Galaxy animation
    const canvas = document.getElementById('galaxy');
    const ctx = canvas.getContext('2d');
    let width, height, centerX, centerY;

    function resizeCanvas() {
      width = canvas.width = window.innerWidth;
      height = canvas.height = window.innerHeight;
      centerX = width / 2;
      centerY = height / 2;
    }

    window.addEventListener('resize', resizeCanvas);
    resizeCanvas();

    const lines = [];
    const boxes = [];
    const numLines = 120;
    const numBoxes = 200;

    for (let i = 0; i < numLines; i++) {
      const angle = Math.random() * 2 * Math.PI;
      lines.push({ angle, length: Math.random() * 300 + 150 });
    }

    for (let i = 0; i < numBoxes; i++) {
      boxes.push({
        angle: Math.random() * 2 * Math.PI,
        distance: Math.random() * 450 + 50,
        size: Math.random() * 3 + 1,
        speed: Math.random() * 0.002 + 0.001
      });
    }

    function animateGalaxy() {
      ctx.clearRect(0, 0, width, height);

      // Draw radial lines
      ctx.strokeStyle = 'rgba(255, 255, 255, 0.1)';
      ctx.lineWidth = 1;
      lines.forEach(line => {
        const x = centerX + Math.cos(line.angle) * line.length;
        const y = centerY + Math.sin(line.angle) * line.length;
        ctx.beginPath();
        ctx.moveTo(centerX, centerY);
        ctx.lineTo(x, y);
        ctx.stroke();
      });

      // Draw orbiting boxes
      boxes.forEach(box => {
        box.angle += box.speed;
        const x = centerX + Math.cos(box.angle) * box.distance;
        const y = centerY + Math.sin(box.angle) * box.distance;
        ctx.fillStyle = 'rgba(255, 255, 255, 0.8)';
        ctx.fillRect(x, y, box.size, box.size);
      });

      requestAnimationFrame(animateGalaxy);
    }

    animateGalaxy();