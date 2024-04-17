const pswrdField = document.querySelector(".form input[type='password']"),
  toggleIcon = document.querySelector(".form .field i");

toggleIcon.onclick = () => {
  if (pswrdField.type === "password") {
    pswrdField.type = "text";
    toggleIcon.classList.add("active");
  } else {
    pswrdField.type = "password";
    toggleIcon.classList.remove("active");
  }
};

const form = document.querySelector(".login form"),
  continueBtn = form.querySelector(".button input"),
  errorText = form.querySelector(".error-text");

form.onsubmit = (e) => {
  e.preventDefault();
};

continueBtn.onclick = () => {
  if (errorText.value !== " ") {
    errorText.style.display = "block";
  }
};
