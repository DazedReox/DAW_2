const express = require('express');
const http = require('node:http');
const path = require('node:path');

const hostname = '127.0.0.1';
const port = 3000;

const server = http.createServer((req, res) => {
  res.statusCode = 200;
  res.setHeader('Content-Type', 'text/plain');
  res.end('Hello, World!\n');
});

app.get('/', (req, res) => {
  res.sendFile(__dirname + '/index.html');
})

app.use(express.static(path.join(__dirname, 'public')))


server.listen(port, hostname, () => {
  console.log(`Server running at http://${hostname}:${port}/`);
});