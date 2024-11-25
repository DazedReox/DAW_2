const canvas = document.getElementById('pongCanvas');
const ctx = canvas.getContext('2d');

canvas.width = 800;
canvas.height = 400;

const paddleWidth = 10;
const paddleHeight = 100;
const ballSize = 10;

let playerY = canvas.height / 2 - paddleHeight / 2;
let player2Y = canvas.height / 2 - paddleHeight / 2;
let ballX = canvas.width / 2;
let ballY = canvas.height / 2;
let ballSpeedX = 4;
let ballSpeedY = 4;

let playerSpeed = 0;
let playerSpeed2 = 0;

function drawRect(x, y, width, height, color) {
    ctx.fillStyle = color;
    ctx.fillRect(x, y, width, height);
}

function drawCircle(x, y, size, color) {
    ctx.fillStyle = color;
    ctx.beginPath();
    ctx.arc(x, y, size, 0, Math.PI * 2);
    ctx.fill();
}

function drawText(text, x, y, color) {
    ctx.fillStyle = color;
    ctx.font = "20px Arial";
    ctx.fillText(text, x, y);
}

document.addEventListener('keydown', (e) => {
    if (e.key === 'w') playerSpeed = -6;
    if (e.key === 's') playerSpeed = 6;
});

document.addEventListener('keydown', (f) => {
    if (f.key === 'ArrowUp') playerSpeed2 = -6;
    if (f.key === 'ArrowDown') playerSpeed2 = 6;
});

document.addEventListener('keyup', () => {
    playerSpeed = 0;
});

document.addEventListener('keyup', () => {
    playerSpeed2 = 0;
});

function update() {
    playerY += playerSpeed;
    player2Y += playerSpeed2;

    if (playerY < 0) playerY = 0;
    if (playerY + paddleHeight > canvas.height) playerY = canvas.height - paddleHeight;

    if (player2Y < 0) player2Y = 0;
    if (player2Y + paddleHeight > canvas.height) player2Y = canvas.height - paddleHeight;

    
    ballX += ballSpeedX;
    ballY += ballSpeedY;

    if (ballY <= 0 || ballY >= canvas.height) ballSpeedY = -ballSpeedY;

    if (
        (ballX <= paddleWidth && ballY >= playerY && ballY <= playerY + paddleHeight) ||
        (ballX >= canvas.width - paddleWidth && ballY >= player2Y && ballY <= player2Y + paddleHeight)
    ) {
        ballSpeedX = -ballSpeedX;
    }

    if (ballX < 0 || ballX > canvas.width) {
        ballX = canvas.width / 2;
        ballY = canvas.height / 2;
        ballSpeedX = -ballSpeedX;
    }
}

function draw() {
    drawRect(0, 0, canvas.width, canvas.height, 'black');
    drawRect(0, playerY, paddleWidth, paddleHeight, 'blue');
    drawRect(canvas.width - paddleWidth, player2Y, paddleWidth, paddleHeight, 'blue');
    drawCircle(ballX, ballY, ballSize, 'red');
    drawRect(canvas.width / 2 - 1, 0, 2, canvas.height, 'gray');
}

function gameLoop() {
    update();
    draw();
    requestAnimationFrame(gameLoop);
}

gameLoop();
