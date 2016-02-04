
var express = require('express');
var bodyParser = require('body-parser');
var app = express();

app.use(bodyParser.json()); 
app.use(bodyParser.urlencoded({ extended: true }));


var server = app.listen(3000, function(){

	var host = server.address().address;
	var port = server.address().port;

	
	app.use('/',express.static('public'));

	console.log('Our app is running on http://'+host+':'+port);

});










