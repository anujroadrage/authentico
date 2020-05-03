var express = require('express');
var app = express();
require('./Preventigo/php/common');
const rdr = require('./Preventigo/php/rdr');
const get_data = require('./Preventigo/php/get_data');
const login = require('./Preventigo/php/login');
app.use('/rdr',rdr);
app.use('/get_data',get_data);
app.use('/login',login);

app.use(express.static('Preventigo'));

app.get('/', function (req, res) {
   res.send('Hello World');
})

var server = app.listen(8081, function () {
   var host = server.address().address
   var port = server.address().port

   console.log("Example app listening at http://%s:%s", host, port)
   base_path= __dirname
})

