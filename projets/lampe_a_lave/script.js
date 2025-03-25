const canvas = document.getElementById('lavaLamp');
const ctx = canvas.getContext('2d');

canvas.width = 400;
canvas.height = 600;

const bubbles = [];

// Classe balle
class Metaball {
  constructor(x, y, radius, vx, vy) {
    this.x = x;
    this.y = y;
    this.radius = radius;
    this.vx = vx;
    this.vy = vy;
  }

  update() {
    this.x += this.vx;
    this.y += this.vy;

    // Collision
    if (this.x - this.radius < 0 || this.x + this.radius > canvas.width) {
      this.vx *= -1;
    }
    if (this.y - this.radius < 0 || this.y + this.radius > canvas.height) {
      this.vy *= -1;
    }

    // Répulsion
    for (const other of bubbles) {
      if (other === this) continue;

      const dx = other.x - this.x;
      const dy = other.y - this.y;
      const distance = Math.sqrt(dx * dx + dy * dy);

      if (distance < this.radius + other.radius) {
        const overlap = this.radius + other.radius - distance;
        const angle = Math.atan2(dy, dx);

        this.vx -= Math.cos(angle) * overlap * 0.00001;
        this.vy -= Math.sin(angle) * overlap * 0.00001;
        other.vx += Math.cos(angle) * overlap * 0.00001;
        other.vy += Math.sin(angle) * overlap * 0.00001;
      }
    }
  }
}

// Initialisation
for (let i = 0; i < 5; i++) {
  const radius = Math.random() * 80 + 30;
  const x = Math.random() * (canvas.width - radius * 2) + radius;
  const y = Math.random() * (canvas.height - radius * 2) + radius;
  const vx = Math.random() * 2 - 1;
  const vy = Math.random() * 2 - 1;

  bubbles.push(new Metaball(x, y, radius, vx, vy));
}

// Dessiner les balles
function drawMetaballs() {
  const imageData = ctx.createImageData(canvas.width, canvas.height);
  const data = imageData.data;

  for (let x = 0; x < canvas.width; x++) {
    for (let y = 0; y < canvas.height; y++) {
      let value = 0;

      // Calcul de l'influence
      for (const bubble of bubbles) {
        const dx = 1+ x - bubble.x;
        const dy = 1+y - bubble.y;
        const dist = Math.sqrt(dx * dx + dy * dy);

        if (dist > 0) {
            value += (bubble.radius * bubble.radius) / (dist * dist + 100); // Diffusion plus large

        }
      }

      const threshold = 1.8;
      if (value > threshold) {
        const index = (x + y * canvas.width) * 4;
        const intensity = Math.min(255, value * 80);

        // Appliquer une couleur
        data[index] = 255; // Rouge
        data[index + 1] = 69; // Orange
        data[index + 2] = 0;  // Bleu
        data[index + 3] = intensity; // Opacité
      }
    }
  }

  ctx.putImageData(imageData, 0, 0);
}

// Animer les bulles
function animate() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  // Mise à jour des bulles
  for (const bubble of bubbles) {
    bubble.update();
  }

  // Dessine les balles
  drawMetaballs();

  requestAnimationFrame(animate);
}

animate();
