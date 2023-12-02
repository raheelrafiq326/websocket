/**
 * A function that adds two numbers.
 *
 * @param {url} url - The first number.
 */
function Socket(url) {
  this.url = url
  this.socket = new WebSocket(this.url)
}

Socket.prototype.onopen = function(callback) {
  this.socket.onopen = (event) => callback(event)
}

Socket.prototype.send = function({
  channel = null,
  eventName = null,
  data
}) {
  if (!data) return Error("Empty event data!")
  const event = {}
  console.log("event ==> ", event, data)
  if (channel) event.channel = channel
  if (eventName) event.event = eventName
  event.data = data
  console.log("event ==> ", event)
  this.socket.send(JSON.stringify(event))
}

Socket.prototype.listen = function({ channel = null, event = null, callback }) {
  this.socket.onmessage = ({ data }) => {
      data = JSON.parse(data)
      if (channel && data.channel != channel) return;
      if (event && data.event != event) return;
      callback(data)
  }
}

Socket.prototype.onclose = function(callback) {
  this.socket.onclose = ({ data }) => callback(data)
}

window.Socket = Socket
