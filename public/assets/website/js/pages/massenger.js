(function () {
  "use strict";
  // Start Emojy
  $(function () {
    window.emojiPicker = new EmojiPicker({
      emojiable_selector: "[data-emojiable=true]",
      assetsPath: "../lib/img/",
      popupButtonClasses: "fa fa-smile-o",
    });
    window.emojiPicker.discover();
  });
  // Google Analytics
  (function (i, s, o, g, r, a, m) {
    i["GoogleAnalyticsObject"] = r;
    (i[r] =
      i[r] ||
      function () {
        (i[r].q = i[r].q || []).push(arguments);
      }),
      (i[r].l = 1 * new Date());
    (a = s.createElement(o)), (m = s.getElementsByTagName(o)[0]);
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m);
  })(
    window,
    document,
    "script",
    "//www.google-analytics.com/analytics.js",
    "ga"
  );
  ga("create", "UA-49610253-3", "auto");
  ga("send", "pageview");
  // End Emojy

  // **** Start Messenger PopUp
  let startChatButton = document.getElementById("startChat"),
    popUpElement = document.getElementById("chatPopUp"),
    closePopupButton = document.getElementById("closePopup"),
    popupWrapper = document.querySelector(".popup-wrapper"),
    disabledInput = document.querySelector(".disabledInput"),
    disabledButton = document.querySelector(".disabledButton");

  startChatButton.onclick = function () {
    if (this.textContent == "Begin Chatting") {
      this.textContent = "End Chatting";
      disabledInput.classList.remove("disabledInput");
      disabledButton.classList.remove("disabledButton");
    } else {
      this.textContent = "Begin Chatting";
      disabledInput.classList.add("disabledInput");
      disabledButton.classList.add("disabledButton");
    }
    this.addEventListener("click", function () {
      if (this.textContent !== "End Chatting") {
        popUpElement.classList.remove("hidden");
      }
    });
  };

  // Rtl
  if (document.body.classList.contains("rtl")) {
    startChatButton.onclick = function () {
      if (this.textContent == "بدأ المراسلة") {
        this.textContent = "إنهاء المراسلة";
        disabledInput.classList.remove("disabledInput");
        disabledButton.classList.remove("disabledButton");
      } else {
        this.textContent = "بدأ المراسلة";
        disabledInput.classList.add("disabledInput");
        disabledButton.classList.add("disabledButton");
      }
      this.addEventListener("click", function () {
        if (this.textContent !== "إنهاء المراسلة") {
          popUpElement.classList.remove("hidden");
        }
      });
    };
  }
  closePopupButton.onclick = function () {
    popUpElement.classList.add("hidden");
  };
  popUpElement.onclick = function () {
    popUpElement.classList.add("hidden");
  };
  popupWrapper.onclick = function (e) {
    e.stopPropagation();
  };

  // popUp Voting Satrs
  let starsUl = document.querySelector(".rating");
  starsUl.addEventListener("click", doSomething, false);
  function doSomething(e) {
    if (e.target !== e.currentTaregt) {
      let clickedItem = e.target;
      Array.from(starsUl.children).forEach((element) =>
        element.classList.remove("selected")
      );
      clickedItem.classList.add("selected");
    }
  }
})();
