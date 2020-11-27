//app.js
const express = require('express');
const bodyParser = require('body-parser');
const mongoose = require('mongoose');

// init app
const app = express();

//initialise express router
var router = express.Router();

// connect MongoDB with mongoose
let dev_db_url = 'mongodb+srv://andriy_shakh:skuhskuh@cluster0.urckp.mongodb.net/my_micro_services?retryWrites=true&w=majority';
let mongoDB = process.env.MONGODB_URI || dev_db_url ;
mongoose.connect(mongoDB);
mongoose.Promise = global.Promise;
let db = mongoose.connection;
db.on('connected', console.log.bind(console, "♣ Bien connecté khouia !"));
db.on('error', console.error.bind(console, '♣ Erreur de connexion MongoDB : '));

// Utilisation de body parser
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended : false }));

let port = 5555;

// discussion routes
var discussionsRoutes = require('./discussion/routes');

app.get('/test', (req, res) => {
  res.send('Skuh Skuh!')
})

// // use express router
app.use('/',router);
// //call discussions routing
discussionsRoutes(router);

app.listen (
  port, () => {
    console .log (' Server running on : ' + port );
  }
);