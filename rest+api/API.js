const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');

const app = express();
app.use(bodyParser.json());

// Adatbázis kapcsolat inicializálása
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: 'mysql',
  database: 'vizsga'
});

// Adatbázis kapcsolat ellenőrzése
connection.connect((err) => {
  if (err) {
    console.error('Hiba az adatbázis kapcsolat létrehozása során: ', err);
    return;
  }
  console.log('Az adatbázis kapcsolat sikeresen létrejött.');
});

// API végpont - Aktív ügyfelek kilistázása
app.get('/api/borok/aktiv', (req, res) => {
  const sql = 'SELECT * FROM kinalat';

  connection.query(sql, (err, results) => {
    if (err) {
      console.error('Hiba az adatbáziskérés során: ', err);
      res.sendStatus(500);
      return;
    }

    res.json(results);
  });
});

// API végpont - Új ügyfél felvétele
app.post('/api/borok', (req, res) => {
  const { title, race, raiser, vintage, status } = req.body;
  const sql = 'INSERT INTO kinalat (title, race, raiser, vintage, price) VALUES (?, ?, ?, ?, ?)';
  const values = [title, race, raiser, vintage, price];

  connection.query(sql, values, (err, result) => {
    if (err) {
      console.error('Hiba az adatbáziskérés során: ', err);
      res.sendStatus(500);
      return;
    }

    const newCustomer = { id: result.insertId, title, lastname, contact, vintage, price };
    res.json(newCustomer);
  });
});

// API végpont - Ügyfél lekérdezése ID alapján
app.get('/api/borok/:id', (req, res) => {
  const customerId = req.params.id;
  const sql = 'SELECT * FROM kinalat WHERE id = ?';
  const values = [customerId];

  connection.query(sql, values, (err, results) => {
    if (err) {
      console.error('Hiba az adatbáziskérés során: ', err);
      res.sendStatus(500);
      return;
    }

    if (results.length === 0) {
      res.sendStatus(404);
      return;
    }

    const customer = results[0];
    res.json(customer);
  });
});

// API végpont - Ügyfél módosítása ID alapján
app.put('/api/borok/:id', (req, res) => {
  const customerId = req.params.id;
  const { title, race, raiser, vintage, price } = req.body;
  const sql = 'UPDATE kinalat SET title = ?, race = ?, raiser = ?, vintage = ?, price = ? WHERE id = ?';
  const values = [title, race, raiser, vintage, price, customerId];

  connection.query(sql, values, (err, result) => {
    if (err) {
      console.error('Hiba az adatbáziskérés során: ', err);
      res.sendStatus(500);
      return;
    }

    if (result.affectedRows === 0) {
      res.sendStatus(404);
      return;
    }

    res.sendStatus(204);
  });
});

// API végpont - Ügyfél törlése ID alapján
app.delete('/api/borok/:id', (req, res) => {
  const customerId = req.params.id;
  const sql = 'DELETE FROM kinalat WHERE id = ?';
  const values = [customerId];

  connection.query(sql, values, (err, result) => {
    if (err) {
      console.error('Hiba az adatbáziskérés során: ', err);
      res.sendStatus(500);
      return;
    }

    if (result.affectedRows === 0) {
      res.sendStatus(404);
      return;
    }

    res.sendStatus(204);
  });
});

// Szerver figyelése
app.listen(3000, () => {
  console.log('A szerver fut a http://localhost:3000 címen.');
});



