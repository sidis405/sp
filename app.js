var app = require('express');
var server = require('http').Server(app);
var io = require('socket.io')(server);
var redis = require('redis');
 
server.listen(6001);
io.on('connection', function (socket) {
 
  console.log("new client connected");
  var redisClient = redis.createClient();
  redisClient.subscribe('*');
 
  redisClient.on("*", function(channel, message) {
    
    message = JSON.parse(message);

    console.log("new message in queue "+ message + "channel");
    socket.emit(channel + ':' + message.event, message.data);
  });
 
  socket.on('disconnect', function() {
    redisClient.quit();
  });
 
});