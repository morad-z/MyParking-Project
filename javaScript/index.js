// Get all elements with class name "example"
var elements = document.getElementsByClassName("list-group-item list-group-item-action");

// Loop through the elements and add the SVG image
for(var i = 0; i < (elements.length); i++) {
  elements[i].innerHTML = `park `+ `<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi-eye" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
</svg>`+`<svg  xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi-bi-pencile" viewBox="0 0 16 16">
<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
</svg>`+`<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi-trash" viewBox="0 0 16 16">
<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
<path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
</svg>`;
}

// script.js
$(document).ready(function () {
  const darkModeSwitch = $("#darkModeSwitch");
  const darkModeKey = "darkModeState";


  // Retrieve the dark mode state from Local Storage on page load
  const savedDarkModeState = localStorage.getItem(darkModeKey);
  if (savedDarkModeState === "true") {
    enableDarkMode();
    darkModeSwitch.prop("checked", true);

  }

  darkModeSwitch.click(function () {
    // Toggle the dark mode class
    $("body, footer, header, div, main").toggleClass("dark-mode");

    // Save the dark mode state to Local Storage
    const isDarkModeEnabled = $("body").hasClass("dark-mode");
    localStorage.setItem(darkModeKey, isDarkModeEnabled);
  });

  function enableDarkMode() {
    $("body, footer, header, div, main").addClass("dark-mode");
  }
});


document.getElementById('signout-link').addEventListener('click', function(event) {
  event.preventDefault();
  var confirmation = confirm('Are you sure you want to sign out?');
  if (confirmation) {
      document.getElementById('signout-form').submit();
  }
});
