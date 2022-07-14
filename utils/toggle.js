const eyeOn = document.querySelector(".eye-on");
const eyeOff = document.querySelector(".eye-off");
const fieldInput = document.querySelector(".field-input-password");

eyeOff.addEventListener("click", function () {
  this.style.display = "none";
  eyeOn.style.display = "block";
  fieldInput.type = "password";
});
eyeOn.addEventListener("click", function () {
  this.style.display = "none";
  eyeOff.style.display = "block";
  fieldInput.type = "text";
});
