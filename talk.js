// Talk extension, https://github.com/GiovanniSalmeri/yellow-talk

"use strict";
window.addEventListener("load", function() {
    var textareas = document.querySelectorAll("form.talk-form textarea");
    for (var i = 0; i<textareas.length; i++) {
        textareas[i].setAttribute("style", "height:"+textareas[i].scrollHeight+"px;overflow-y:hidden;resize:none");
        textareas[i].addEventListener("input", updateSize);
    }
    function updateSize() {
        this.style.height = "auto";
        this.style.height = this.scrollHeight + "px";
    }
});

window.addEventListener("DOMContentLoaded", function() {
    var signupEmail = document.querySelector("form.talk-signup #email");
    var signupName = document.querySelector("form.talk-signup #name");
    if (signupEmail && signupName) {
        signupEmail.addEventListener("change", extractName);
    }
    function extractName() {
        signupName.value = this.value
            .split("@")[0]
            .match(/\p{L}+/gu)
            .map(function(word) { return word[0].toUpperCase()+word.slice(1).toLowerCase(); })
            .join(" ");
    }

    var forms = document.querySelectorAll("form[data-token-lifetime]");
    for (var i = 0; i<forms.length; i++) {
        var tokenLifetime = forms[i].getAttribute("data-token-lifetime");
        var submitElement = forms[i].querySelector("input[type=submit]");
        setTimeout(function(submitElement) { submitElement.setAttribute("disabled", "disabled"); }, (tokenLifetime-3)*1000, submitElement);
    }

    var popup = null;
    document.addEventListener("mousemove", function(event) {
        const anchor = event.target.closest("a[href$='.jpg'i], a[href$='.jpeg'i], a[href$='.png'i], a[href$='.gif'i], a[href$='.webp'i]");
        const max = 300;
        if (anchor) {
            if (!popup) {
                popup = document.createElement("img");
                popup.style.position = "fixed";
                popup.style.maxWidth = max+"px";
                popup.style.maxHeight = max+"px";
                popup.style.zIndex = "9999";
                popup.src = anchor.href;
                document.body.appendChild(popup);
            }
            const x = event.clientX + 15;
            const y = event.clientY + 15;
            popup.style.left = Math.min(x, window.innerWidth-max-10)+"px";
            popup.style.top = Math.min(y, window.innerHeight-max-10)+"px";
        } else {
            if (popup) {
                popup.remove();
                popup = null;
            };
        }
    });
});
