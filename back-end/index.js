// const express = require('express');

// const server = express()

// server.get('/teste', (req, res) => {
//     return res.send("Pota get");
// });

// server.post('/teste', (req, res) => {
//     return res.send("Porta post");
// })


// server.listen(3000)

const express = require('express');
const { resolve } = require('path');

const app = express();
const port = 3000;

app.get('/testeapi', (req, res) => {
  return res.send("Teste porta")
})

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`);
});
