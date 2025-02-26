document.addEventListener("DOMContentLoaded", function () {
  const toggleButton = document.getElementById("toggleTerminalBtn");
  const terminalContainer = document.getElementById("terminalContainer");

  toggleButton.addEventListener("click", function () {
      fetch("component/toggle_terminal.php")
          .then(response => response.json())
          .then(data => {
              if (data.visible) {
                  terminalContainer.style.display = "block";
                  toggleButton.textContent = "▽";
                  toggleButton.style.bottom = "35vh";
              } else {
                  terminalContainer.style.display = "none";
                  toggleButton.textContent = "△";
                  toggleButton.style.bottom = "0";
              }
          });
  });
});
