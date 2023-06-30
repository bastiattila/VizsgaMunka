
	

        // Függvény a cookie ablak eltüntetéséhez
        function hideCookieConsent() {
            var cookieContainer = document.getElementById("cookie-container");
            cookieContainer.style.display = "none";
        }

        // Az "Elfogadás" gombra kattintva elrejti a cookie ablakot és beállítja a sütit
        var acceptButton = document.getElementById("accept-cookie");
        acceptButton.addEventListener("click", function() {
            hideCookieConsent();
            // Itt lehetne kód a süti beállítására, ha szükséges
        });


