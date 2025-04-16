fetch("https://steamproxy.ct.ws/steam-proxy.php", {
  method: "POST",
  headers: {
    "Content-Type": "application/json"
  },
  body: JSON.stringify({ test: "hello from GitHub!" })
})
.then(res => res.json())
.then(data => console.log("Ответ:", data))
.catch(err => console.error("Ошибка:", err));