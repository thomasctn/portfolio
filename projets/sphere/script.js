// Initialisation
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
const renderer = new THREE.WebGLRenderer({ antialias: true });
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.appendChild(renderer.domElement);

// Création de la sphère
const group = new THREE.Group();
scene.add(group);

// Paramètres
const radius = 3;
const pointCount = 150;
const points = [];
const pointMaterial = new THREE.MeshBasicMaterial({ color: 0x00ff00 }); // Points verts

// Générer les points
for (let i = 0; i < pointCount; i++) {
    const phi = Math.acos(1 - 2 * (i + 0.5) / pointCount);
    const theta = Math.PI * (1 + Math.sqrt(5)) * i;

    const x = radius * Math.sin(phi) * Math.cos(theta);
    const y = radius * Math.sin(phi) * Math.sin(theta);
    const z = radius * Math.cos(phi);

    const point = new THREE.Mesh(new THREE.SphereGeometry(0.05, 8, 8), pointMaterial);
    point.position.set(x, y, z);
    group.add(point);
    points.push(point.position);
}

// Caractéristiques lignes
const lineMaterial = new THREE.LineBasicMaterial({
    color: 0x00ff00,
    transparent: true,
    opacity: 0.5,
});
const lines = [];

// Créer des lignes
function updateConnections() {
    lines.forEach((line) => group.remove(line));
    lines.length = 0;

    for (let i = 0; i < points.length; i++) {
        for (let j = i + 1; j < points.length; j++) {
            const distance = points[i].distanceTo(points[j]);
            if (distance < 1.5) { // Seuil de connexion
                const lineGeometry = new THREE.BufferGeometry().setFromPoints([points[i], points[j]]);
                const line = new THREE.Line(lineGeometry, lineMaterial);
                lines.push(line);
                group.add(line);
            }
        }
    }
}

// Animation
function animatePoints() {
    points.forEach((point) => {
        point.x += (Math.random() - 0.5) * 0.01;
        point.y += (Math.random() - 0.5) * 0.01;
        point.z += (Math.random() - 0.5) * 0.01;
    });
}

let rotationSpeed = 0.002;
function animate() {
    requestAnimationFrame(animate);

    group.rotation.y += rotationSpeed;
    animatePoints();
    updateConnections();

    renderer.render(scene, camera);
}

// Ajustement à la fenêtre
window.addEventListener("resize", () => {
    renderer.setSize(window.innerWidth, window.innerHeight);
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
});

camera.position.z = 10;

// Lancer l'animation
animate();
